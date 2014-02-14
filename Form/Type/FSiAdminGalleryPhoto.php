<?php

namespace FSi\Bundle\AdminGalleryBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FSiAdminGalleryPhoto extends AbstractType
{
    /**
     * @var string
     */
    private $photoClass;

    /**
     * @param string $photoClass
     */
    function __construct($photoClass)
    {
        $this->photoClass = $photoClass;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'fsi_admin_gallery_photo';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('photo', 'fsi_file', array(
            'label' => false,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->photoClass
        ));
    }
}