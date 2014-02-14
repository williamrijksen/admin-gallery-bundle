<?php

namespace FSi\Bundle\AdminGalleryBundle\Behat\Context;

use Behat\Behat\Context\BehatContext;

class FeatureContext extends BehatContext
{
    public function __construct()
    {
        $this->useContext('admin', new AdminContext());
    }
}