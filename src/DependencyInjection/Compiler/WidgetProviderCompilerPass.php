<?php

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\DependencyInjection\Compiler;

use Bwein\BfvElements\Renderer\Widget\WidgetFactory;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class WidgetProviderCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition(WidgetFactory::class)) {
            return;
        }
        $definition = $container->getDefinition(WidgetFactory::class);
        $taggedServices = $container->findTaggedServiceIds(
            'bwein.bfv_elements.widget.provider'
        );
        foreach ($taggedServices as $id => $attributes) {
            $definition->addMethodCall('addProvider', [new Reference($id)]);
        }
    }
}
