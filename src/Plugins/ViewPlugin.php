<?php
declare(strict_types=1);

namespace TCCP\Plugins;


use Aura\Router\RouterContainer;
use Interop\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;
use TCCP\ServiceContainerInterface;
use TCCP\View\ViewRenderer;
use TCCP\View\ViewRendererInterface;
use Zend\Diactoros\ServerRequestFactory;

class ViewPlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy('twig', function (ContainerInterface $container) {
            $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../templates');
            $twig = new \Twig_Environment($loader);
            $generator = $container->get('routing.generator');
            $twig->addFunction(new \Twig_SimpleFunction('route', 
                function(string $name, array $params = []) use($generator) {
                    return $generator->generate($name, $params);
            }));           
            return $twig;
        });        

        $container->addLazy('view.renderer', function (ContainerInterface $container) {
            $twigEnviroment = $container->get('twig');
            return new ViewRenderer($twigEnviroment);
        });
    }
}
?>