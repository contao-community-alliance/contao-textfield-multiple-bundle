<?php

/**
 * This file is part of contao-community-alliance/contao-textfield-multiple-bundle.
 *
 * (c) 2021 - 2022 Contao Community Alliance.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    contao-community-alliance/contao-textfield-multiple-bundle
 * @author     Ingolf Steinhardt <info@e-spin.de>
 * @copyright  2021 - 2022 Contao Community Alliance.
 * @license    https://github.com/contao-community-alliance/contao-community-alliance/contao-textfield-multiple-bundle/blob/master/LICENSE
 *             LGPL-3.0-or-later
 * @filesource
 */

namespace ContaoCommunityAlliance\FormTextFieldMultipleBundle\ContaoManager;

use Contao\ManagerBundle\ContaoManagerBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use ContaoCommunityAlliance\DcGeneral\ContaoFrontend\CcaDcGeneralContaoFrontendBundle;
use ContaoCommunityAlliance\FormTextFieldMultipleBundle\FormTextFieldMultipleBundle;

/**
 * Class Plugin
 */
class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(FormTextFieldMultipleBundle::class)
                ->setLoadAfter(
                    [
                        ContaoManagerBundle::class,
                        CcaDcGeneralContaoFrontendBundle::class
                    ]
                ),
        ];
    }
}
