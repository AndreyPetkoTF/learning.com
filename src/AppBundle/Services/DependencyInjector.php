<?php
/**
 * Created by PhpStorm.
 * User: andreypetko
 * Date: 11/22/17
 * Time: 16:31
 */

namespace AppBundle\Services;

/**
 * Class DependencyInjector
 * @package AppBundle\Services
 */
class DependencyInjector
{
    /**
     * @var array
     */
    private $services = [];
    /**
     * @var
     */
    private $config;

    /**
     * DependencyInjector constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        $this->generateDi();
    }

    /**
     * @return array
     */
    public function listServices()
    {
        return array_keys($this->config);
    }

    /**
     * @param string $serviceName
     * @return mixed
     * @throws \Exception
     */
    public function getService(string $serviceName)
    {
        if(!array_key_exists($serviceName, $this->config)) {
            throw new \Exception("The service: {$serviceName} does not exist");
        }

        if(isset($this->services[$serviceName])) {
            return $this->services[$serviceName];
        }

        return $this->initService($serviceName);
    }

    /**
     *
     */
    public function generateDi()
    {
        foreach ($this->config as $serviceName => $item) {
            if($item['lazy'] === true) {
                continue;
            }

            $this->initService($serviceName);
        }
    }

    /**
     * @param string $serviceName
     * @return mixed
     */
    public function __get(string $serviceName)
    {
        return $this->services[$serviceName];
    }

    /**
     * @param string $serviceName
     * @return \StdClass
     */
    private function initService(string $serviceName)
    {
        $item = $this->config[$serviceName];

        $class = new \ReflectionClass($item['class']);
        $obj = $class->newInstanceArgs($item['arguments']);

        return $this->services[$serviceName] = $obj;
    }
}