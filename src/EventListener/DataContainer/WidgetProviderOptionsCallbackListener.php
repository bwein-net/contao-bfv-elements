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
use Contao\CoreBundle\ServiceAnnotation\Callback;
use Contao\DataContainer;

/**
 * @Callback(table="tl_content", target="fields.bfvWidgetProvider.options")
 */
class WidgetProviderOptionsCallbackListener
{
    /**
     * @var WidgetFactory
     */
    private $widgetFactory;

    public function __construct(WidgetFactory $widgetFactory)
    {
        $this->widgetFactory = $widgetFactory;
    }

    public function __invoke(DataContainer $dc): array
    {
        return $this->widgetFactory->getWidgetProviderOptions();
    }
}
