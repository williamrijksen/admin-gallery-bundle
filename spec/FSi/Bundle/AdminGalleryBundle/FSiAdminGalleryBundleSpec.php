<?php

namespace spec\FSi\Bundle\AdminGalleryBundle;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FSiAdminGalleryBundleSpec extends ObjectBehavior
{
    function it_is_bundle()
    {
        $this->shouldHaveType('Symfony\Component\HttpKernel\Bundle\Bundle');
    }

    function it_has_custom_extension()
    {
        $this->getContainerExtension()
            ->shouldReturnAnInstanceOf('FSi\Bundle\AdminGalleryBundle\DependencyInjection\FSIAdminGalleryExtension');
    }
}
