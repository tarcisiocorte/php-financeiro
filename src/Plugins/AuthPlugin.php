<?php

declare(strict_types=1);

namespace TCCP\Plugins;

use Interop\Container\ContainerInterface;
use TCCP\Auth\Auth;
use TCCP\Auth\JasnyAuth;
use TCCP\ServiceContainerInterface;

class AuthPlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy('jasny.auth', function (ContainerInterface $container){
            return new JasnyAuth($container->get('user.repository'));
        });
        $container->addLazy('auth', function (ContainerInterface $container) {
            return new Auth($container->get('jasny.auth'));
        });
    }
}