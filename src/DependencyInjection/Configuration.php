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
            ->scalarNode('clientId')->end()
            ->scalarNode('responseType')->end()
            ->scalarNode('clientSecret')->end()
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
            ])->end()->end()
            ->scalarNode('redirectUrl')->defaultNull()->end()
            ->scalarNode('expiresIn')->defaultNull()->end()
            ->scalarNode('prompt')->defaultNull()->end()
            ->scalarNode('state')->defaultNull()->end()
            ->scalarNode('codeChallenge')->defaultNull()->end()
            ->scalarNode('codeChallengeMethod')->defaultNull()->end()
        ->end();

        return $treeBuilder;
    }
}
