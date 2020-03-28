<?php

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
use Terminal42\ServiceAnnotationBundle\ServiceAnnotationInterface;

/**
 * @Callback(table="tl_content", target="fields.bfvWidgetProvider.options")
 */
class WidgetProviderOptionsCallbackListener implements ServiceAnnotationInterface
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
