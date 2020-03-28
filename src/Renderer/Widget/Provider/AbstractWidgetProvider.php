<?php

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\Renderer\Widget\Provider;

use Contao\FrontendTemplate;

abstract class AbstractWidgetProvider implements WidgetProviderInterface
{
    protected $label = '';
    protected $supports = '';

    protected $widgetId = '';

    protected $clubId = '';
    protected $teamId = '';
    protected $seasonId = '';

    protected $width = '300px';
    protected $height = '300px';

    protected $colorResults = 'undefined';
    protected $colorNav = 'undefined';
    protected $backgroundNav = 'undefined';
    protected $colorClubName = 'undefined';

    /**
     * AbstractBfvWidgetProvider constructor.
     */
    public function __construct()
    {
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getSupports(): string
    {
        return $this->supports;
    }

    public function supports(string $widgetProvider): bool
    {
        return $this->supports === $widgetProvider;
    }

    public function setWidgetId(string $widgetId): void
    {
        $this->widgetId = $widgetId;
    }

    public function setClubId(string $clubId): void
    {
        $this->clubId = $clubId;
    }

    public function setTeamId(string $teamId): void
    {
        $this->teamId = $teamId;
    }

    public function setSeasonId(string $seasonId): void
    {
        $this->seasonId = $seasonId;
    }

    public function setWidth(string $width): void
    {
        $this->width = $width;
    }

    public function setHeight(string $height): void
    {
        $this->height = $height;
    }

    public function setColorResults(string $colorResults): void
    {
        $this->colorResults = $colorResults;
    }

    public function setColorNav(string $colorNav): void
    {
        $this->colorNav = $colorNav;
    }

    public function setBackgroundNav(string $backgroundNav): void
    {
        $this->BackgroundNav = $backgroundNav;
    }

    public function setColorClubName(string $colorClubName): void
    {
        $this->colorClubName = $colorClubName;
    }

    public function validate(): bool
    {
        if (empty($this->widgetId)) {
            return false;
        }

        return true;
    }

    protected function addWidgetAssets(): void
    {
        $GLOBALS['TL_JAVASCRIPT']['bwein_bfv_widget'] = 'https://widget-prod.bfv.de/widget/widgetresource/widgetjs';
    }

    protected function generateWidgetLoader(string $widgetMethod, string $widgetParams): string
    {
        $this->addWidgetAssets();

        $template = new FrontendTemplate('ce_bfv_widgetloader');
        $template->widgetId = $this->widgetId;
        $template->widgetMethod = $widgetMethod;
        $template->widgetParams = $widgetParams;

        return $template->parse();
    }

    protected function getWidgetParams(): array
    {
        return [
            'height' => $this->height,
            'width' => $this->width,
            'colorResults' => $this->colorResults,
            'colorNav' => $this->colorNav,
            'backgroundNav' => $this->backgroundNav,
            'colorClubName' => $this->colorClubName,
        ];
    }
}
