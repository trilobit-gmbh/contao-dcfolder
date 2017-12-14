<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2017 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace Trilobit;

/**
 * Class DC_Folder
 * @package Trilobit
 *
 * @author trilobit GmbH <https://github.com/trilobit-gmbh>
 */
class DC_Folder extends \Contao\DC_Folder
{

    /**
     * DC_Folder constructor.
     * @param string $strTable
     */
    public function __construct($strTable='')
    {
        if (   $strTable == ''
            && \Input::get('do') === 'files'
        )
        {
            $strTable = 'tl_files';
        }

        parent::__construct($strTable);
    }


    /**
     * @param bool $blnIsAjax
     * @return string
     */
    public function move($blnIsAjax=false)
    {
        if (\Input::get('source') && \Input::get('source') !== '')
        {
            $strMessage = '';

            // HOOK: add custom logic
            if (isset($GLOBALS['TL_HOOKS']['DC_Folder_moveSource']) && is_array($GLOBALS['TL_HOOKS']['DC_Folder_moveSource']))
            {
                foreach ($GLOBALS['TL_HOOKS']['DC_Folder_moveSource'] as $callback)
                {
                    $this->import($callback[0]);
                    $strMessage = $this->{$callback[0]}->{$callback[1]}($strMessage, \Input::get('source'), $blnIsAjax);
                }
            }

            return $strMessage;
        }

        return parent::move($blnIsAjax);
    }
}
