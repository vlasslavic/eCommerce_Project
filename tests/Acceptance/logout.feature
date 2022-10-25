Feature: logout
  In order to logout
  As a user
  I need to click "Logout", to logout from my account

  Scenario: try logout from account
    Given I am on "http://localhost/User/profile"
    When I hover over "Profile Pic"
    And I click "Logout"
    Then I am on "http://localhost/User/index"

