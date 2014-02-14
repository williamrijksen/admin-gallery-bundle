<?php

namespace spec\FSi\Bundle\AdminGalleryBundle\Admin;

use FSi\Component\DataGrid\DataGrid;
use FSi\Component\DataGrid\DataGridFactory;
use FSi\Component\DataSource\DataSource;
use FSi\Component\DataSource\DataSourceFactory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormFactory;

class GallerySpec extends ObjectBehavior
{
    function let(
        DataGridFactory $dataGridFactory,
        DataSourceFactory $dataSourceFactory,
        FormFactory $formFactory
    ) {
        $this->beConstructedWith(array(), 'FSi\FixturesBundle\Entity\Gallery');
        $this->setDataGridFactory($dataGridFactory);
        $this->setDataSourceFactory($dataSourceFactory);
        $this->setFormFactory($formFactory);
    }

    function it_is_admin_crud_element()
    {
        $this->shouldHaveType('FSi\Bundle\AdminBundle\Doctrine\Admin\CRUDElement');
    }

    function it_has_gallery_class()
    {
        $this->getClassName()->shouldReturn('FSi\FixturesBundle\Entity\Gallery');
    }

    function it_has_id()
    {
        $this->getId()->shouldReturn('gallery');
    }

    function it_create_datagrid(DataGridFactory $dataGridFactory, DataGrid $dataGrid)
    {
        $dataGridFactory->createDataGrid('admin_gallery')->willReturn($dataGrid);
        $dataGrid->hasColumnType('batch')->willReturn(true);

        $this->createDataGrid()->shouldReturn($dataGrid);
    }

    function it_create_datasource(DataSourceFactory $dataSourceFactory, DataSource $dataSource)
    {
        $dataSourceFactory->createDataSource(
            'doctrine-orm',
            array('entity' => 'FSi\FixturesBundle\Entity\Gallery'),
            'admin_gallery'
        )->willReturn($dataSource);

        $dataSource->setMaxResults(10)->shouldBeCalled();

        $this->createDataSource()->shouldReturn($dataSource);
    }

    function it_create_form(FormFactory $formFactory, Form $form)
    {
        $formFactory->create('fsi_admin_gallery', null, array())->willReturn($form);

        $this->createForm(null)->shouldReturn($form);
    }
}
