<?php declare(strict_types = 1);

/**
 * (c) Jonah Böther <mail@jbtcd.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FitbitBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @author Jonah Böther <mail@jbtcd.me>
 */
class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('fitbit');

        $treeBuilder->getRootNode()->children()
            ->scalarNode('clientId')->defaultValue('')->end()
            ->scalarNode('clientSecret')->defaultValue('')->end()
            ->arrayNode('scopes')->enumPrototype()->values([
                'activity',
                'heartrate',
                'location',
                'nutrition',
                'profile',
                'settings',
                'sleep',
                'social',
                'weight',
            ])->defaultValue([])->end()->end()
            ->scalarNode('expiresIn')->defaultValue(86400)->end()
            ->scalarNode('redirectUrl')->defaultValue('')->end()
        ->end();

        return $treeBuilder;
    }
}
