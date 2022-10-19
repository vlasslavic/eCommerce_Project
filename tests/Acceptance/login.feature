Feature: login
  In order to login
  As a user
  I need to click "Login", input my credentials and click "Login" to access my account

  Scenario: try logging-in to a "Customer" account with proper credentials
    Given I am on the website
    And I am not logged-in yet
    And I have a "Customer" account
    When I click on “Login”
    Then the login page is displayed
    When I enter the correct credentials
    And I click “Login”
    Then I am logged into a "Customer" acount

  Scenario: try logging-in to a "Seller" account with proper credentials
    Given I am on the website
    And I am not logged-in yet
    And I have a "Seller" account
    When I click on “Login”
    Then the login page is displayed
    When I enter the correct credentials
    And I click “Login”
    Then I am logged into a "Seller" acount

  Scenario: verify that any user cannot log in with wrong credentials
    Given I am on the website
    And I have a "Customer" or "Seller" account
    And I am not logged-in yet
    When I click on “Login”
    Then the login page is displayed
    When I enter the wrong credentials
    And I click “Login”
    Then an error message is displayed
