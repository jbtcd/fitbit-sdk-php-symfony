<?php declare(strict_types = 1);

/**
 * (c) Jonah Böther <mail@jbtcd.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FitbitBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * Class FitbitExtension
 *
 * @author Jonah Böther <mail@jbtcd.me>
 */
class FitbitExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $xmlFileLoader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $xmlFileLoader->load('services.xml');

        $definition = $container->getDefinition('jbtcd.fitbit');
        $definition->setArgument('$clientId', $config['clientId']);
        $definition->setArgument('$responseType', $config['responseType']);
        $definition->setArgument('$clientSecret', $config['clientSecret']);
        $definition->setArgument('$scopes', $config['scopes']);

        $definition->addMethodCall('setRedirectUrl', [$config['redirectUrl']]);
        $definition->addMethodCall('setExpiresIn', [$config['expiresIn']]);
        $definition->addMethodCall('setPrompt', [$config['prompt']]);
        $definition->addMethodCall('setState', [$config['state']]);
        $definition->addMethodCall('setCodeChallenge', [$config['codeChallenge']]);
        $definition->addMethodCall('setCodeChallengeMethod', [$config['codeChallengeMethod']]);
    }
}
