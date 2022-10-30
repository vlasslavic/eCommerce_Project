Feature: disableProfile
  In order to disable a profile
  As a "Seller"
  I need to have a "Seller" account and a profile

 Scenario: try disableProfile as 'Seller'
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click "Profile Pic"
    And I click "Settings"
    Then I see "Disable Profile"
    When I click "Disable Profile"
    Then I am on "http://localhost/"
    And I see message "Account Disabled"

  Scenario: verify that a "Seller" can re-enable a profile after disabling it
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click "Profile Pic"
    And I click "Settings"
    Then I see "Enable Profile"
    When I click "Enable Profile"
    Then I am on "http://localhost/Profile/index"
    And I see message "Account Enabled"