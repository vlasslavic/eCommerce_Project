Feature: create profile
  In order to create a profile
  As a "Seller"
  I need to have a "Seller" account

 Scenario: try creating a profile as a "Seller" without a previous profile created 
    Given I am on the website
    And I am logged-in my "Seller" account
    And I don't have a profile created
    When I click on “My Store” 
    Then I am being redirected to create a profile
    And an information message is displayed

