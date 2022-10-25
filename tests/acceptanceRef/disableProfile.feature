Feature: disable profile
  In order to disable a profile
  As a "Seller"
  I need to have a "Seller" account

 Scenario: try disabling a profile as a "Seller" with profile created 
    Given I am on the website
    And I am logged-in my "Seller" account
    And I have a profile created
    When I click on “Settings” under the Profile picture dropdown
    Then I am being redirected to modify my profile
    When I click on "Disable Profile"
    Then the page is being reloded with an information message that the profile is disabled

  Scenario: verify that a "Seller" can re-enable a profile after disabling it
    Given I am on the website
    And I am logged-in my "Seller" account
    And I have a profile created
    And I have disabled my profile
    When I click on “Settings” under the Profile picture dropdown
    Then I am being redirected to modify my profile
    And an information message that the profile is disabled is displayed
    When I click on "Enable Profile"
    Then the page is being reloded with an information message that the profile is re-enabled