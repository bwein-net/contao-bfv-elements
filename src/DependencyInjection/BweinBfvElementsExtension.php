<?php

declare(strict_types=1);

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\DependencyInjection;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class BweinBackendCustomizerExtension.
 */
class BweinBfvElementsExtension extends Extension
{
    /**
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../../config'));
        $loader->load('services.yml');
    }
}
