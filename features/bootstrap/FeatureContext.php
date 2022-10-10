<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Drupal\DrupalExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }


    /**
     * @When /^I click on \'([^\']*)\' icon$/
     */
    public function iClickOnIcon($arg1)
    {
        $page = $this->getSession()->getPage();
        $page->find('css',"i[class='fab fa-facebook-f']")->click();
    }

    /**
     * @Then /^I switch to windows$/
     */
    public function iSwitchToWindows()
    {
        $windowNames = $this->getSession()->getWindowNames();

        if($windowNames > 1)
        {
            $this->getSession()->switchToWindow($windowNames[0]);
            echo $this->getSession()->getCurrentUrl();

        }

    }

    /**
     * @Then /^I read tag name and attribute name$/
     */
    public function iReadTagNameAndAttributeName()
    {
        $page = $this->getSession()->getPage();

        $tag1 = $page->find('css', '.tp-loop-wrap');
        $tag2 = $page->find('css', "i[class='fas fa-user']");

        echo "Tag1 attribute's tag name is: ", $tag1->getTagName();
        echo "\n Tag2 attribute value is: ", $tag2->getTagName();

        echo "\n Tag1 class attribute value is: ", $tag1->getAttribute('class');
        echo "\n Tag2 style attribute value is: ", $tag1->getAttribute('style');

    }

    /**
     * @Then /^I read css property of any element$/
     */
    public function iReadCssPropertyOfAnyElement()
    {
        $selector = "i[class='fas fa-user']";

        $this->getCSSValue($selector, 'background');
    }

    public function getCSSValue($cssSelector, $propertyName)
    {
        $function = <<<JS
    (
        function()
        {
            var ele = document.querySelector("$cssSelector"); 
            var myvalue = document.defaultView.getComputedStyle(ele, null).getPropertyValue("$propertyName");
            return myvalue;
        })() 
JS;

        return $this->getSession()->evaluateScript($function);
    }
}
