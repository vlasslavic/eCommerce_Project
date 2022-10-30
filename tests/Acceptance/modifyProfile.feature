Feature: modifyProfile
  In order to modify my profile
  As a "Seller"
  I need to have a "Seller" account and profile

 Scenario: try modifyProfile as a "Seller" with a profile
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click "Profile Pic"
    And I click "Settings"
    Then I see "Profile Form"
    When I fill profile information
    And I click "Save Profile"
    Then I am on "http://localhost/"
    And I see message "Account Modified"

  Scenario: try modifyProfile as a "Seller" without a profile
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I don't have profile
    When I click "Profile Pic"
    And I click "Settings"
    Then I am on "http://localhost/Profile/settings"
    And I see message "Let's Create your Profile first"

