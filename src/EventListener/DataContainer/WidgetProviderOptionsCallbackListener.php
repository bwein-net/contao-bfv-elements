<?php

declare(strict_types=1);

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\EventListener\DataContainer;

use Bwein\BfvElements\Renderer\Widget\WidgetFactory;
use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\DataContainer;

#[AsCallback(table: 'tl_content', target: 'fields.bfvWidgetProvider.options')]
class WidgetProviderOptionsCallbackListener
{
    public function __construct(private readonly WidgetFactory $widgetFactory)
    {
    }

    public function __invoke(DataContainer $dc): array
    {
        return $this->widgetFactory->getWidgetProviderOptions();
    }
}
