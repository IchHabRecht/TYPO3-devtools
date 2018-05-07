<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2018 Sven Friese <sven@widerheim.de>, familie redlich digital GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

namespace IchHabRecht\Devtools\Command;

use IchHabRecht\Devtools\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\CommandController;

class ExtensionConfigurationCommandController extends CommandController
{
    const LANGUAGE_FILE = 'LLL:EXT:devtools/Resources/Private/Language/locallang.xlf';

    /**
     * @param string $extensionKey
     * @return string
     * @throws \InvalidArgumentException
     * @throws \TYPO3\CMS\Core\Exception
     */
    public function updateCommand($extensionKey)
    {
        $extensionUtility = GeneralUtility::makeInstance(ExtensionUtility::class);
        $updated = $extensionUtility->updateConfiguration($extensionKey);

        if ($updated) {
            $output = $GLOBALS['LANG']->sL(static::LANGUAGE_FILE .
                ':slot.extensionmanager.process_actions.update_configuration.message');
        } else {
            $output = $GLOBALS['LANG']->sL(static::LANGUAGE_FILE .
                ':slot.error.message');
        }

        return $output;
    }
}