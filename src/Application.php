<?php
declare(strict_types = 1);
namespace TCCP;

use TCCP\Plugins\PluginInterface;
use Psr\Http\Message\RequestInterface;

class Application
{
    private $serviceContainer;

    /**
     * Application constructor.
     * @param $serviceContainer
     */
    public function __construct(ServiceContainerInterface $serviceContainer)
    {
        $this->serviceContainer = $serviceContainer;
    }

    public function service($name)
    {
        return $this->serviceContainer->get($name);
    }

    public function addService(string $name, $service):void{
        if (is_callable($service)) {
            $this->serviceContainer->addLazy($name, $service);
        } else {
            $this->serviceContainer->add($name, $service);
        }
    }

    public function plugin(PluginInterface $plugin):void{
        $plugin->register($this->serviceContainer);
    }

    public function get($path, $action, $name = null):Application{
        $routing = $this->service('routing');
        $routing->get($name, $path, $action);
        return $this;
    }

    public function start(){
        $route = $this->service('route');

        $request = $this->service(RequestInterface::class);
        /***IF THE ROUTE DOESN'T EXIST */
        if(!$route)
        {
            echo "Page not found";
            exit;
        }

        foreach($route->attributes as $key => $value){
            $request =$request->withAttribute($key, $value);
        }
    
        $callable = $route->handler;
        $callable($request);
    }
}
?>