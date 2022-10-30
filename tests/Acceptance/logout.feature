Feature: logout
  In order to logout
  As a user
  I need to click "Logout", to logout from my account

Scenario: try logout from "Customer" account
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "Profile Pic"
    And I click "Logout"
    Then I am on "http://localhost/User/index"

Scenario: try logout from "Seller" account
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    When I click "Profile Pic"
    And I click "Logout"
    Then I am on "http://localhost/User/index"