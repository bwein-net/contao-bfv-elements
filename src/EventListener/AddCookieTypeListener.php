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
use Oveleon\ContaoCookiebar\Cookie;

/**
 * @Hook("addCookieType")
 */
class AddCookieTypeListener
{
    private $cookiebarHelper;

    public function __construct(CookiebarHelper $cookiebarHelper)
    {
        $this->cookiebarHelper = $cookiebarHelper;
    }

    public function __invoke(string $type, Cookie $cookie): void
    {
        if ($type === $this->cookiebarHelper::COOKIEBAR_SETTING_TYPE_NAME) {
            $GLOBALS['TL_JAVASCRIPT']['bwein_bfv_widget'] = 'bundles/bweinbfvelements/js/bfv-widget.js';
            $cookie->addScript(
                'bwein_bfv_widget.initBlocker('.$cookie->id.', [\''.BfvElementsSettingModel::BFV_SCRIPT_SRC_URL.'\'])',
                Cookie::LOAD_UNCONFIRMED,
                Cookie::POS_BELOW,
            );
            $cookie->addScript(
                'bwein_bfv_widget.initWidgetScripts([\''.BfvElementsSettingModel::BFV_SCRIPT_SRC_URL.'\'])',
                Cookie::LOAD_CONFIRMED,
                Cookie::POS_BELOW,
            );
        }
    }
}
