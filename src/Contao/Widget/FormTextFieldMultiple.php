<?php

/**
 * This file is part of contao-community-alliance/contao-textfield-multiple-bundle.
 *
 * (c) 2021-2024 Contao Community Alliance.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    contao-community-alliance/contao-textfield-multiple-bundle
 * @author     Richard Henkenjohann <richardhenkenjohann@googlemail.com>
 * @author     Ingolf Steinhardt <info@e-spin.de>
 * @copyright  2021-2024 Contao Community Alliance.
 * @license    https://github.com/contao-community-alliance/contao-community-alliance/contao-textfield-multiple-bundle/blob/master/LICENSE
 *             LGPL-3.0-or-later
 * @filesource
 */

declare(strict_types=1);

namespace ContaoCommunityAlliance\FormTextFieldMultipleBundle\Contao\Widget;

use Contao\FormText;

/**
 * This class is used for the contao frontend view as template.
 *
 * @psalm-suppress PropertyNotSetInConstructor
 * @psalm-suppress UndefinedThisPropertyFetch
 */
class FormTextFieldMultiple extends FormText
{
    /**
     * Template
     *
     * @var string
     */
    protected $strTemplate = 'form_text_multiple';

    /**
     * Parse the template file and return it as string
     *
     * @param array $arrAttributes An optional attributes array
     *
     * @return string The template markup
     */
    public function parse($arrAttributes = null): string
    {
        if (!$this->multiple) {
            $this->strTemplate = 'form_text';
        }

        return parent::parse($arrAttributes);
    }

    /**
     * Generate the widget and return it as string
     *
     * @return string
     */
    public function generate(): string
    {
        if (!$this->multiple) {
            return parent::generate();
        }

        $return = '';

        $originalName  = $this->strName;
        $originalId    = (string) $this->strId;
        $this->strName = $originalName . '[]';

        for ($i = 0; $i < $this->size; $i++) {
            /** @psalm-suppress InvalidPropertyAssignmentValue - incorrect annotation of Contao */
            $this->strId = $originalId . '_' . $i;

            $return .= parent::generate();
        }

        $this->strName = $originalName;
        /** @psalm-suppress InvalidPropertyAssignmentValue - incorrect annotation of Contao */
        $this->strId = $originalId;

        return $return;
    }
}
