<?php
/**
 * BabelEvents
 *
 * Copyright 2016 by Thomas Jakobi <thomas.jakobi@partout.info>
 *
 * @package babelevents
 * @subpackage plugin
 *
 * @var modX $modx
 */

/** @var Babel $babel */
$babel = $modx->getService('babel', 'Babel', $modx->getOption('babel.core_path', null, $modx->getOption('core_path') . 'components/babel/') . 'model/babel/');

// Make sure that Babel is installed and babel TV is available
if (!($babel instanceof Babel) || !$babel->babelTv) return;

switch ($modx->event->name) {
    case 'OnBabelDuplicate':
        $contextKey = $modx->event->params['context_key'];
        $originalId = $modx->event->params['original_id'];
        /** @var modResource $originalResource */
        $originalResource = &$modx->event->params['original_resource'];
        $duplicateId = $modx->event->params['duplicate_id'];
        /** @var modResource $duplicateResource */
        $duplicateResource = &$modx->event->params['duplicate_resource'];

        // Example Code
        $duplicateResource->set('pagetitle', str_replace($originalResource->get('context_key'), $contextKey, $duplicateResource->get('pagetitle')));
        $duplicateResource->set('content', str_replace($originalResource->get('context_key'), $contextKey, $duplicateResource->get('content')));
        $duplicateResource->save();

        break;
    case
    'OnBabelLink':
        $contextKey = $modx->event->params['context_key'];
        $originalId = $modx->event->params['original_id'];
        /** @var modResource $originalResource */
        $originalResource = &$modx->event->params['original_resource'];
        $targetId = $modx->event->params['duplicate_id'];
        /** @var modResource $targetResource */
        $targetResource = &$modx->event->params['duplicate_resource'];

        // Example Code
        $targetResource->set('pagetitle', str_replace($originalResource->get('context_key'), $contextKey, $targetResource->get('pagetitle')));
        $targetResource->set('content', str_replace($originalResource->get('context_key'), $contextKey, $targetResource->get('content')));
        $targetResource->save();

        break;
    case 'OnBabelUnlink':
        $contextKey = $modx->event->params['context_key'];
        $originalId = $modx->event->params['original_id'];
        /** @var modResource $originalResource */
        $originalResource = &$modx->event->params['original_resource'];
        $targetId = $modx->event->params['duplicate_id'];
        /** @var modResource $targetResource */
        $targetResource = &$modx->event->params['duplicate_resource'];

        // Example Code
        $targetResource->set('pagetitle', str_replace($originalResource->get('context_key'), $contextKey, $targetResource->get('pagetitle')));
        $targetResource->set('content', str_replace($originalResource->get('context_key'), $contextKey, $targetResource->get('content')));
        $targetResource->save();

        break;
}
return;