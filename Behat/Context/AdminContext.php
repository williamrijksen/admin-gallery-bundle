<?php

namespace FSi\Bundle\AdminGalleryBundle\Behat\Context;

use SensioLabs\Behat\PageObjectExtension\Context\PageObjectContext;

class AdminContext extends PageObjectContext
{
    /**
     * @When /^I open "([^"]*)" page$/
     */
    public function iOpenPage($pageName)
    {
        $this->getPage($pageName)->open();
    }

    /**
     * @Then /^I should see "([^"]*)" element in menu$/
     */
    public function iShouldSeeElementInMenu($elementName)
    {
        $this->getPage('Admin Panel')->hasMenuElement($elementName);
    }
}