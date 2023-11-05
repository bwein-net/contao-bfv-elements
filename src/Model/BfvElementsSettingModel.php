<?php

declare(strict_types=1);

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\Model;

use Contao\Model;

/**
 * Class BfvElementsSettingModel.
 *
 * @property int    $id
 * @property int    $pid
 * @property int    $sorting
 * @property int    $tstamp
 * @property string $name
 * @property string $clubId
 * @property string $teamId
 * @property string $seasonId
 * @property string $colorResults
 * @property string $colorNav
 * @property string $backgroundNav
 * @property string $colorClubName
 * @property string $templateScripts
 * @property string $templateInit
 */
class BfvElementsSettingModel extends Model
{
    public const BFV_SCRIPT_SRC_URL = 'https://widget-prod.bfv.de/widget/widgetresource/widgetjs';

    protected static $strTable = 'tl_bwein_bfv_elements_setting';

    public static function generateColorValue($colorValue): string
    {
        if (empty($colorValue)) {
            return 'undefined';
        }

        return '#'.$colorValue;
    }
}
