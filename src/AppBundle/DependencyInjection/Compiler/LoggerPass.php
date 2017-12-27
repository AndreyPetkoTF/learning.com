<?php

namespace AppBundle\DependencyInjection\Compiler;

use AppBundle\Patterns\Strategy\LoggerService;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class LoggerPass
 * @package AppBundle\DependencyInjection\Compiler
 */
class LoggerPass implements CompilerPassInterface
{

    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->has('learning.strategy.logger_service')) {
            return;
        }

        $definition = $container->findDefinition('learning.strategy.logger_service');

        $taggedServices = $container->findTaggedServiceIds('learning.logger');

        foreach ($taggedServices as $id => $tags) {
            foreach ($tags as $attributes) {
                $definition->addMethodCall('addLogger', [
                    new Reference($id),
                    $attributes['alias']
                ]);
            }
        }
    }
}