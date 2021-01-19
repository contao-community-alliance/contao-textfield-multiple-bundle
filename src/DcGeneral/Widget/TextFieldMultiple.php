<?php

/**
 * This file is part of contao-community-alliance/contao-textfield-multiple-bundle.
 *
 * (c) 2021 Contao Community Alliance.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    contao-community-alliance/contao-textfield-multiple-bundle
 * @author     Richard Henkenjohann <richardhenkenjohann@googlemail.com>
 * @author     Ingolf Steinhardt <info@e-spin.de>
 * @copyright  2021 Contao Community Alliance.
 * @license    https://github.com/contao-community-alliance/contao-community-alliance/contao-textfield-multiple-bundle/blob/master/LICENSE
 *             LGPL-3.0-or-later
 * @filesource
 */

declare(strict_types=1);

namespace ContaoCommunityAlliance\FormTextFieldMultipleBundle\DcGeneral\Widget;

use ContaoCommunityAlliance\DcGeneral\ContaoFrontend\Event\BuildWidgetEvent;

/**
 * This listener adds the form widget.
 */
final class TextFieldMultiple
{
    /**
     * Invoke the event.
     *
     * @param BuildWidgetEvent $event The event.
     *
     * @return void
     */
    public function __invoke(BuildWidgetEvent $event): void
    {
        if (false === $this->wantForInvoke($event)) {
            return;
        }

        $event->getProperty()->setWidgetType('text_multiple');
    }

    /**
     * Determine for invoke the event.
     *
     * @param BuildWidgetEvent $event The event.
     *
     * @return bool
     */
    private function wantForInvoke(BuildWidgetEvent $event): bool
    {
        $property = $event->getProperty();
        $extra    = $property->getExtra();

        return ('text' === $property->getWidgetType())
               && isset($extra['multiple'])
               && (true === $extra['multiple']);
    }
}
