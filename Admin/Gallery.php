<?php

namespace FSi\Bundle\AdminGalleryBundle\Admin;

use FSi\Bundle\AdminBundle\Admin\Doctrine\CRUDElement;
use FSi\Component\DataGrid\DataGridFactoryInterface;
use FSi\Component\DataSource\DataSourceFactoryInterface;
use Symfony\Component\Form\FormFactoryInterface;

class Gallery extends CRUDElement
{
    /**
     * @var string
     */
    private $galleryClass;

    /**
     * @param array $options
     * @param $galleryClass
     */
    public function __construct($options = array(), $galleryClass)
    {
        parent::__construct($options);
        $this->galleryClass = $galleryClass;
    }

    /**
     * {@inheritdoc}
     */
    public function getClassName()
    {
        return $this->galleryClass;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return 'gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'admin.gallery.menu';
    }

    /**
     * {@inheritdoc}
     */
    protected function initDataGrid(DataGridFactoryInterface $factory)
    {
        return $factory->createDataGrid('admin_gallery');
    }

    /**
     * {@inheritdoc}
     */
    protected function initDataSource(DataSourceFactoryInterface $factory)
    {
        $datasource = $factory->createDataSource(
            'doctrine-orm',
            array('entity' => $this->getClassName()),
            'admin_gallery'
        );
        $datasource->setMaxResults(10);

        return $datasource;
    }

    /**
     * {@inheritdoc}
     */
    protected function initForm(FormFactoryInterface $factory, $data = null)
    {
        $form = $factory->create('fsi_admin_gallery', $data, array());

        return $form;
    }
}
