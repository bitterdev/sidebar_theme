<?php

namespace Bitter\SidebarTheme\Routing;

use Bitter\SidebarTheme\API\V1\Middleware\FractalNegotiatorMiddleware;
use Bitter\SidebarTheme\API\V1\Configurator;
use Concrete\Core\Routing\RouteListInterface;
use Concrete\Core\Routing\Router;

class RouteList implements RouteListInterface
{
    public function loadRoutes(Router $router)
    {
        $router
            ->buildGroup()
            ->setNamespace('Concrete\Package\SidebarTheme\Controller\Dialog\Support')
            ->setPrefix('/ccm/system/dialogs/sidebar_theme')
            ->routes('dialogs/support.php', 'sidebar_theme');
    }
}