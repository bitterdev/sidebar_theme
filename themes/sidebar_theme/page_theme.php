<?php

namespace Concrete\Package\SidebarTheme\Theme\SidebarTheme;

use Concrete\Core\Page\Theme\Theme;

class PageTheme extends Theme
{
    protected $pThemeGridFrameworkHandle = 'bootstrap5';

    public function getThemeName(): string
    {
        return t('Sidebar Theme ');
    }

    public function getThemeDescription(): string
    {
        return t('A Concrete CMS theme built for version 9.');
    }

    public function registerAssets()
    {
        $this->requireAsset('javascript', 'jquery');
        $this->requireAsset('javascript', 'bootstrap');
        $this->requireAsset('css', 'font-awesome');
        $this->requireAsset('vue');
    }

}
