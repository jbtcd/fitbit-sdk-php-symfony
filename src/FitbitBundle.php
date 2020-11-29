<?php declare(strict_types = 1);

/**
 * (c) Jonah Böther <mail@jbtcd.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FitbitBundle;

use FitbitBundle\DependencyInjection\FitbitExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class FitbitBundle
 *
 * @author Jonah Böther <mail@jbtcd.me>
 */
class FitbitBundle extends Bundle
{
    protected function getContainerExtensionClass(): string
    {
        return FitbitExtension::class;
    }
}
