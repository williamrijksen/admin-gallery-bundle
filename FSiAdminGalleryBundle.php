<?php

namespace FSi\Bundle\AdminGalleryBundle;

use FSi\Bundle\AdminGalleryBundle\DependencyInjection\Compiler\TwigFormPass;
use FSi\Bundle\AdminGalleryBundle\DependencyInjection\FSIAdminGalleryExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class FSiAdminGalleryBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new TwigFormPass());
    }

    /**
     * @return FSIAdminGalleryExtension
     */
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new FSIAdminGalleryExtension();
        }

        return $this->extension;
    }
}
