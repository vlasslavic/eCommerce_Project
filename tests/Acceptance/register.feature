Feature: register
  In order to create an account
  As a user
  I need to click sign up, select the user type, fill form and click "Register" to create account

  Scenario: try creating a "Customer" account
    Given the customer does not have an account yet
    When I click on “Sign Up”
    Then 2 options will be displayed
    When I select "Customer"
    Then an empty form will be displayed on the screen
    When I enter my information
    And I click "Sign Up"
    Then I will have a Customer account

  Scenario: try creating a "Seller" account
    Given the seller does not have an account yet
    When I click on “Sign Up”
    Then 2 options will be displayed
    When I select “Seller”
    Then an empty form will be displayed on the screen
    When I enter my information
    And I click "Sign Up"
    Then I will have a seller account

  Scenario: verify that I may cancel the account creation
    Given the seller does not have an account yet
    When I click on “Sign Up”
    Then 2 options will be displayed
    When I click “Cancel”
    Then I will not have an account
