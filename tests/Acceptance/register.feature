Feature: register
  In order to create an account
  As a user
  I need to click sign up, select the user type, fill form and click "Register" to create an account

  Scenario: try register a "Customer" account
    Given I am on "http://localhost/"
    When I click "Sign Up"
    Then I am on "http://localhost/User/register"
    And I see "Customer"
    And I see "Seller"
    When I click "Customer"
    Then I am on "http://localhost/User/registerCustomer"
    And I see "Let's register your Customer account"
    When I fill customer information
    And I click "Sign Up"
    Then I am on "http://localhost/User/index"
    And I see "Sign In"

  Scenario: try register a "Seller" account
    Given I am on "http://localhost/"
    When I click "Sign Up"
    Then I am on "http://localhost/User/register"
    And I see "Customer"
    And I see "Seller"
    When I click "Seller"
    Then I am on "http://localhost/User/registerSeller"
    And I see "Let's register your Seller account"
    When I fill seller information
    And I click "Sign Up"
    Then I am on "http://localhost/User/index"
    And I see "Sign In"

  Scenario: try cancel creating account 
    Given I am on "http://localhost/"
    When I click "Sign Up"
    Then I am on "http://localhost/User/register"
    And I see "Customer"
    And I see "Seller"
    When I click "Home"    
    Then I am on "http://localhost/Main/index"



