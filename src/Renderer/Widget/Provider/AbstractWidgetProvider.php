<?php

declare(strict_types=1);

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\Renderer\Widget\Provider;

use Bwein\BfvElements\Helper\CookiebarHelper;
use Bwein\BfvElements\Model\BfvElementsSettingModel;
use Contao\FrontendTemplate;
use Oveleon\ContaoCookiebar\CookieHandler;

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

    protected $templateScripts = '';

    protected $templateInit = '';

    private $cookiebarHelper;

    /**
     * AbstractBfvWidgetProvider constructor.
     */
    public function __construct(CookiebarHelper $cookiebarHelper)
    {
        $this->cookiebarHelper = $cookiebarHelper;
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
        $this->backgroundNav = $backgroundNav;
    }

    public function setColorClubName(string $colorClubName): void
    {
        $this->colorClubName = $colorClubName;
    }

    public function setTemplateScripts(string $templateScripts): void
    {
        $this->templateScripts = $templateScripts;
    }

    public function setTemplateInit(string $templateInit): void
    {
        $this->templateInit = $templateInit;
    }

    public function validate(): bool
    {
        if (empty($this->widgetId)) {
            return false;
        }

        return true;
    }

    protected function addWidgetAssets(CookieHandler|null $cookieHandler): void
    {
        if (null !== $cookieHandler) {
            $GLOBALS['TL_JAVASCRIPT']['bwein_bfv_widget'] = 'bundles/bweinbfvelements/js/bfv-widget.js';
        } else {
            $template = new FrontendTemplate($this->templateScripts ?: 'bfv_widget_scripts');
            $template->scriptSrc = BfvElementsSettingModel::BFV_SCRIPT_SRC_URL;
            $GLOBALS['TL_HEAD']['bwein_bfv_widget'] = $template->parse();
        }
    }

    protected function generateWidgetInit(string $widgetMethod, string $widgetParams): string
    {
        $cookiebarConfig = $this->cookiebarHelper->getCookiebarConfig();
        $cookieHandler = $this->cookiebarHelper->getCookieHandler($cookiebarConfig);

        $this->addWidgetAssets($cookieHandler);

        $templateDefaultName = null !== $cookieHandler ? 'bfv_widget_init_cookiebar' : 'bfv_widget_init';
        $template = new FrontendTemplate($this->templateInit ?: $templateDefaultName);
        $template->widgetId = $this->widgetId;
        $template->widgetMethod = $widgetMethod;
        $template->widgetParams = $widgetParams;

        $template->widgetProvider = $this->supports;
        $template->clubId = $this->clubId;
        $template->teamId = $this->teamId;
        $template->seasonId = $this->seasonId;
        $template->width = $this->width;
        $template->height = $this->height;

        $template->cookieHandler = $cookieHandler;

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
