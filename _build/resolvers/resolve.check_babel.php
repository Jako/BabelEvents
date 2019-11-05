<?php
/**
 * Check for babel.
 *
 * @package babelevents
 * @subpackage build
 */

$success = true;
if ($object->xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            /** @var modX $modx */
            $modx =& $object->xpdo;

            $babelNamespace = $modx->getObject('modNamespace', 'babel');
            if (!$babelNamespace) {
                $modx->log(xPDO::LOG_LEVEL_ERROR, 'Babel has to be installed before BabelEvents.');
                $success = false;
            }
            break;
    }
}

return $success;