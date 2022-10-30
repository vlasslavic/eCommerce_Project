<?php

declare(strict_types=1);

namespace Tests\Support;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause($vars = [])
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * Define custom actions here
     */

    /**
     * @Given I am on :arg1
     */
     public function iAmOn($url)
     {
         $this->amOnPage($url);
     }

    /**
     * @When I input :arg1
     */
     public function iInput($arg1)
     {
         $this->fillField('q',$arg1);
     }

    /**
     * @When I click Search
     */
     public function iClickSearch()
     {
         $this->click('Google Search');
     }

    /**
     * @Then I see :arg1
     */
     public function iSee($arg1)
     {
         $this->see($arg1);
     }


    /**
     * @Then I won't have an account
     */
     public function iWontHaveAnAccount()
     {
         throw new \PHPUnit\Framework\IncompleteTestError("Step `I won't have an account` is not defined");
     }

     /**
     * @When I click :arg1
     */
    public function iClick($arg1)
    {
        $this->click(['name' => $arg1]);
    }

    
     /**
     * @Given I am logged-in :arg1
     */
    public function loggedIn($arg1)
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I am logged-in :arg1` is not defined");
    }


   /**
    * @Then I see Success
    */
    public function iSeeSuccess()
    {
        $this->see('Sign In'); 
    }

    /**
    * @Then I see Error
    */
    public function iSeeError()
    {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I see success` is not defined");
    }

   /**
    * @Then I see Home Page
    */
    public function iSeeHomePage()
    {
        $this->amOnPage('/');
    }

      /**
     * @When I fill customer information
     */
    public function iFillCustomerInformation()
    {
        $this->fillField('email', 'testAC');
        $this->fillField('password', '121212');
        $this->fillField('password_confirmation', '121212');
        $this->fillField('first_name', 'John');
        $this->fillField('last_name', 'Doe');
        $this->fillField('address', '12 Rue Mine');
    }

   /**
    * @When I fill seller information
    */
    public function iFillSellerInformation()
    {
        $this->fillField('email', 'testDC');
        $this->fillField('password', '121212');
        $this->fillField('password_confirmation', '121212');
    }


   /**
    * @When I input correct credentials
    */
    public function iInputCorrectCredentials()
    {
        $this->fillField('email', 'test@gmail.com');
        $this->fillField('password', '121212');
    }

   /**
    * @Then I am logged to :arg1 account
    */
    public function iAmLoggedToAccount($arg1)
    {
        $this->amOnPage('/Main');
    }

   /**
    * @When I input wrong credentials
    */
    public function iInputWrongCredentials()
    {
        $this->fillField('email', '1232Wrong');
        $this->fillField('password', '121212');
    }
    

}
