<?php

namespace spec\FSi\Bundle\AdminGalleryBundle\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FSiAdminGalleryPhotoSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('FSi\FixturesBundle\Entity\Photo');
    }

    function it_is_form_type()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractType');
    }

    function it_has_name()
    {
        $this->getName()->shouldReturn('fsi_admin_gallery_photo');
    }

    function it_build_itself(FormBuilder $builder)
    {
        $builder->add('photo', 'fsi_file', array(
            'label' => false,
        ))->shouldBeCalled();

        $this->buildForm($builder, array());
    }

    function it_set_default_options(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setDefaults(array(
            'data_class' => 'FSi\FixturesBundle\Entity\Photo'
        ))->shouldBeCalled();

        $this->setDefaultOptions($optionsResolver);
    }
}
