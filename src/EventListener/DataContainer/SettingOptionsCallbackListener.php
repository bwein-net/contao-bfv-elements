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

use Bwein\BfvElements\Model\BfvElementsSettingModel;
use Contao\CoreBundle\ServiceAnnotation\Callback;
use Contao\DataContainer;
use Terminal42\ServiceAnnotationBundle\ServiceAnnotationInterface;

/**
 * @Callback(table="tl_content", target="fields.bfvSetting.options")
 */
class SettingOptionsCallbackListener implements ServiceAnnotationInterface
{
    public function __invoke(DataContainer $dc): array
    {
        $settings = BfvElementsSettingModel::findAll();

        if (null === $settings) {
            return [];
        }

        return $settings->fetchEach('name');
    }
}
