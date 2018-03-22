<?php

namespace TCCP\Plugins;


use TCCP\ServiceContainerInterface;

interface PluginInterface
{
    public function register(ServiceContainerInterface $container);
}
