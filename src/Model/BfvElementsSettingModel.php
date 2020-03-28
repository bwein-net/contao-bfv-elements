<?php

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
 */
class BfvElementsSettingModel extends Model
{
    protected static $strTable = 'tl_bwein_bfv_elements_setting';

    public static function generateColorValue($colorValue)
    {
        if (empty($colorValue)) {
            return 'undefined';
        }

        return '#'.$colorValue;
    }
}
