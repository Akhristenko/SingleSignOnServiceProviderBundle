<?php

namespace Krtv\Bundle\SingleSignOnServiceProviderBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\DefinitionDecorator;

/**
 * Class AddUriSignerSecretPass
 * @package Krtv\Bundle\SingleSignOnServiceProviderBundle\DependencyInjection\Compiler
 */
class AddUriSignerSecretPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('krtv_single_sign_on_service_provider.uri_signer')) {
            return;
        }

        $parameter = $container->getParameter('krtv_single_sign_on_service_provider.secret_parameter');

        $container->getDefinition('krtv_single_sign_on_service_provider.uri_signer')
            ->replaceArgument(0, $container->getParameter($parameter));
    }
}