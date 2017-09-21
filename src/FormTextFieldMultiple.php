<?php

/**
 * This file is part of richardhj/contao-textfield-multiple.
 *
 * Copyright (c) 2017 Richard Henkenjohann
 *
 * @package   richardhj/contao-textfield-multiple
 * @author    Richard Henkenjohann <richardhenkenjohann@googlemail.com>
 * @copyright 2017 Richard Henkenjohann
 * @license   https://github.com/richardhj/contao-textfield-multiple/blob/master/LICENSE LGPL-3.0
 */

namespace Richardhj\Contao;

use Contao\FormTextField;


/**
 * Class FormTextFieldMultiple
 *
 * @package Richardhj\Contao
 */
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
