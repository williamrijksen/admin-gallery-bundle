<?php

namespace spec\FSi\Bundle\AdminGalleryBundle\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FSiAdminGallerySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('FSi\FixturesBundle\Entity\Gallery');
    }

    function it_is_form_type()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractType');
    }

    function it_has_name()
    {
        $this->getName()->shouldReturn('fsi_admin_gallery');
    }

    function it_build_itself(FormBuilder $builder)
    {
        $builder->add('name', 'text', array(
            'label' => 'admin.gallery.form.name.label'
        ))->shouldBeCalled();

        $builder->add('visible', 'choice', array(
            'label' => 'admin.gallery.form.visibility.label',
            'choices' => array(
                1 => 'admin.gallery.form.visibility.visible',
                0 => 'admin.gallery.form.visibility.invisible',
            )
        ))->shouldBeCalled();

        $builder->add('description', 'fsi_ckeditor', array(
            'label' => 'admin.gallery.form.description.label'
        ))->shouldBeCalled();

        $builder->add('photos', 'collection', array(
            'label' => 'admin.gallery.form.photos.label',
            'type' => 'fsi_admin_gallery_photo',
            'allow_add' => true,
            'allow_delete' => true,
            'by_reference' => false,
        ))->shouldBeCalled();

        $this->buildForm($builder, array());
    }

    function it_set_default_options(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setDefaults(array(
            'data_class' => 'FSi\FixturesBundle\Entity\Gallery',
            'cascade_validation' => true
        ))->shouldBeCalled();

        $this->setDefaultOptions($optionsResolver);
    }
}

