<?php

namespace FSi\Bundle\AdminGalleryBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FSiAdminGallery extends AbstractType
{
    /**
     * @var string
     */
    private $galleryClass;

    /**
     * @param string $galleryClass
     */
    function __construct($galleryClass)
    {
        $this->galleryClass = $galleryClass;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'fsi_admin_gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->galleryClass,
            'cascade_validation' => true
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array(
            'label' => 'admin.gallery.form.name.label'
        ));

        $builder->add('visible', 'choice', array(
            'label' => 'admin.gallery.form.visibility.label',
            'choices' => array(
                1 => 'admin.gallery.form.visibility.visible',
                0 => 'admin.gallery.form.visibility.invisible',
            )
        ));

        $builder->add('description', 'fsi_ckeditor', array(
            'label' => 'admin.gallery.form.description.label'
        ));

        $builder->add('photos', 'collection', array(
            'label' => 'admin.gallery.form.photos.label',
            'type' => 'fsi_admin_gallery_photo',
            'allow_add' => true,
            'allow_delete' => true,
            'by_reference' => false,
        ));
    }
}