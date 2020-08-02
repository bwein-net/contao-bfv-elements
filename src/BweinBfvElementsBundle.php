<?php

declare(strict_types=1);

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements;

use Bwein\BfvElements\DependencyInjection\Compiler\WidgetProviderCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class BweinBfvElementsBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $container->addCompilerPass(new WidgetProviderCompilerPass());
    }

    public function getPath()
    {
        return \dirname(__DIR__);
    }
}
