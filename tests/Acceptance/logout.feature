Feature: logout
  In order to logout
  As a user
  I need to click "Logout", to logout from my account

  Scenario: try logging-out with a "Customer" account
    Given I am on the website
    And I have a "Customer" account
    And I am already logged-in
    When I click on “Logout”
    Then I am logged-out from my account
    And I am being redirected to the main page

  Scenario: try logging-out with a "Seller" account
    Given I am on the website
    And I have a "Seller" account
    And I am already logged-in
    When I click on “Logout”
    Then I am logged-out from my account
    And I am being redirected to the main page
