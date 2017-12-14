<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
    'Trilobit',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
    // Classes
    'Trilobit\DC_Folder' => 'system/modules/trilobit_dcfolder/drivers/DC_Folder.php',
));
