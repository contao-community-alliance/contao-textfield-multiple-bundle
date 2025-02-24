<?php

/**
 * This file is part of contao-community-alliance/contao-textfield-multiple-bundle.
 *
 * (c) 2021 - 2025 Contao Community Alliance.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    contao-community-alliance/contao-textfield-multiple-bundle
 * @author     Ingolf Steinhardt <info@e-spin.de>
 * @copyright  2021 - 2025 Contao Community Alliance.
 * @license    https://github.com/contao-community-alliance/contao-community-alliance/contao-textfield-multiple-bundle/blob/master/LICENSE
 *             LGPL-3.0-or-later
 * @filesource
 */

namespace ContaoCommunityAlliance\FormTextFieldMultipleBundle\ContaoManager;

use ContaoCommunityAlliance\DcGeneral\ContaoFrontend\CcaDcGeneralContaoFrontendBundle;
use ContaoCommunityAlliance\FormTextFieldMultipleBundle\FormTextFieldMultipleBundle;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

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
                        ContaoCoreBundle::class,
                        CcaDcGeneralContaoFrontendBundle::class
                    ]
                ),
        ];
    }
}
