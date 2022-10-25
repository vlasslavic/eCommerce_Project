Feature: login
  In order to login
  As a user
  I need to click "Login", input my credentials and click "Login" to access my account

  Scenario: try login "Customer"
    Given I am on "http://localhost/"
    When I click "Sign In"
    Then I am on "http://localhost/User/index"
    When I input correct credentials
    And I click "Sign In"
    Then I am logged to "Customer" account

  Scenario: try login "Seller"
    Given I am on "http://localhost/"
    When I click "Sign In"
    Then I am on "http://localhost/User/index"
    When I input correct credentials
    And I click "Sign In"
    Then I am logged to "Seller" account

  Scenario: verify that any user cannot log in with wrong credentials
    Given I am on "http://localhost/"
    When I click "Sign In"
    Then I am on "http://localhost/User/index"
    When I input wrong credentials
    And I click "Sign In"
    Then I am on "http://localhost/User/index"
