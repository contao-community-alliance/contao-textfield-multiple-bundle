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

namespace ContaoCommunityAlliance\FormTextFieldMultipleBundle\Contao\Widget;

use Contao\FormTextField;

class FormTextFieldMultiple extends FormTextField
{
    /**
     * Template
     *
     * @var string
     */
    protected $strTemplate = 'form_textfield_multiple';

    /**
     * Parse the template file and return it as string
     *
     * @param array $attributes An optional attributes array
     *
     * @return string The template markup
     */
    public function parse($attributes = null)
    {
        if (!$this->multiple) {
            $this->strTemplate = 'form_textfield';
        }

        return parent::parse($attributes);
    }

    /**
     * Generate the widget and return it as string
     *
     * @return string
     */
    public function generate()
    {
        if (!$this->multiple) {
            return parent::generate();
        }

        $return = '';

        $originalName  = $this->strName;
        $originalId    = $this->strId;
        $this->strName = $originalName . '[]';

        for ($i = 0; $i < $this->size; $i++) {
            $this->strId = $originalId . '_' . $i;

            $return .= parent::generate();
        }

        $this->strName = $originalName;
        $this->strId   = $originalId;

        return $return;
    }
}
