<?php

declare(strict_types=1);

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\Renderer\Widget;

use Bwein\BfvElements\Renderer\Widget\Provider\WidgetProviderInterface;
use Doctrine\Common\Collections\ArrayCollection;

class WidgetFactory
{
    /**
     * @var ArrayCollection<WidgetProviderInterface>
     */
    private $provider;

    /**
     * BfvWidgetFactory constructor.
     */
    public function __construct()
    {
        $this->provider = new ArrayCollection();
    }

    /**
     * @return $this
     */
    public function addProvider(WidgetProviderInterface $provider): self
    {
        $this->provider->add($provider);

        return $this;
    }

    public function getWidgetProviderOptions(): array
    {
        $return = [];

        foreach ($this->provider as $provider) {
            /** @var WidgetProviderInterface $provider */
            $return[$provider->getSupports()] = $provider->getLabel();
        }

        asort($return);

        return $return;
    }

    public function getWidgetProvider(string $widgetProvider): ?WidgetProviderInterface
    {
        foreach ($this->provider as $provider) {
            /** @var WidgetProviderInterface $provider */
            if ($provider->supports($widgetProvider)) {
                return $provider;
            }
        }

        return null;
    }
}
