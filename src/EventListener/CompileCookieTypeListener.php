<?php

declare(strict_types=1);

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\EventListener;

use Bwein\BfvElements\Helper\CookiebarHelper;
use Bwein\BfvElements\Model\BfvElementsSettingModel;
use Contao\CoreBundle\ServiceAnnotation\Hook;
use Oveleon\ContaoCookiebar\CookieHandler;
use Terminal42\ServiceAnnotationBundle\ServiceAnnotationInterface;

/**
 * @Hook("compileCookieType")
 */
class CompileCookieTypeListener implements ServiceAnnotationInterface
{
    private CookiebarHelper $cookiebarHelper;

    public function __construct(CookiebarHelper $cookiebarHelper)
    {
        $this->cookiebarHelper = $cookiebarHelper;
    }

    public function __invoke(string $type, CookieHandler $cookieHandler): void
    {
        if ($type === $this->cookiebarHelper::COOKIEBAR_SETTING_TYPE_NAME) {
            $GLOBALS['TL_JAVASCRIPT']['bwein_bfv_widget'] = 'bundles/bweinbfvelements/js/bfv-widget.js';
            $cookieHandler->addScript(
                'bwein_bfv_widget.initBlocker('.$cookieHandler->id.', [\''.BfvElementsSettingModel::BFV_SCRIPT_SRC_URL.'\'])',
                false,
                CookieHandler::POS_BELOW
            );
            $cookieHandler->addScript(
                'bwein_bfv_widget.initWidgetScripts([\''.BfvElementsSettingModel::BFV_SCRIPT_SRC_URL.'\'])',
                true,
                CookieHandler::POS_BELOW
            );
        }
    }
}
