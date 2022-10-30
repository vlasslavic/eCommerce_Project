Feature: createProfile
  In order to create a profile
  As a "Seller"
  I need to have a "Seller" account

 Scenario: try createProfile as 'Seller'
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    When I click on "My Store" 
    Then I see "Profile Form"
    And I see message "Let's Create your Profile"
    When I fill profile information
    And I click "Create Profile"
    Then I am on "http://localhost/Profile/index"
    And I see "My Profile"

  Scenario: try createProfile as 'Seller' with profile
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click on "My Store" 
    Then I see "My Profile"