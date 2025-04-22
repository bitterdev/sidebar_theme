<?php

namespace Bitter\SidebarTheme\Provider;

use Bitter\SidebarTheme\Routing\RouteList;
use Concrete\Core\Foundation\Service\Provider;
use Concrete\Core\Application\Application;
use Concrete\Core\Routing\RouterInterface;

class ServiceProvider extends Provider
{
    protected RouterInterface $router;

    public function __construct(
        Application     $app,
        RouterInterface $router
    )
    {
        parent::__construct($app);

        $this->router = $router;
    }


    public function register()
    {
        $this->router->loadRouteList(new RouteList());
    }

}