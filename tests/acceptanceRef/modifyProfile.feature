Feature: modify profile
  In order to modify my profile
  As a "Seller"
  I need to have a "Seller" account and profile

 Scenario: try modifying a profile as a "Seller" with a profile created 
    Given I am on the website
    And I am logged-in my "Seller" account
    And I have a profile created
    When I click on “Settings” under the Profile picture dropdown
    Then I am being redirected to modify my profile
    Then a filled form with my information will be displayed on the screen
    When I modify my information
    And I click "Save"
    Then I am being redirected to my profile with the updated information

  Scenario: try modifying a profile as a "Seller" without a profile created 
    Given I am on the website
    And I am logged-in my "Seller" account
    And I don't have a profile created
    When I click on “Settings” under the Profile picture dropdown
    Then I am being redirected to create a profile
    And an error message is displayed
