<?php

namespace Concrete\Package\SidebarTheme;

use Bitter\SidebarTheme\Provider\ServiceProvider;
use Concrete\Core\Package\Package;
use Concrete\Core\Entity\Package as PackageEntity;

class Controller extends Package
{
    protected string $pkgHandle = 'sidebar_theme';
    protected string $pkgVersion = '0.1.1';
    protected $appVersionRequired = '9.0.0';
    protected $pkgAllowsFullContentSwap = true;
    protected $pkgAutoloaderRegistries = [
        'src/Bitter/SidebarTheme' => 'Bitter\SidebarTheme',
    ];

    public function getPackageDescription(): string
    {
        return t('Sidebar Theme is a sleek and minimal Concrete CMS theme powered by Bootstrap 5, featuring a clean layout with a left-hand sidebar for intuitive site navigation.');
    }

    public function getPackageName(): string
    {
        return t('Sidebar Theme');
    }

    public function on_start()
    {
        /** @var ServiceProvider $serviceProvider */
        $serviceProvider = $this->app->make(ServiceProvider::class);
        $serviceProvider->register();
    }

    public function install(): PackageEntity
    {
        $pkg = parent::install();
        $this->installContentFile("data.xml");
        return $pkg;
    }

    public function upgrade()
    {
        parent::upgrade();
        $this->installContentFile("data.xml");
    }
}
