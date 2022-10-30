Feature: viewSales
  In order to view my sales
  As a "Seller"
  I need to have a "Seller" account, a profile and click "Sales" to view my sales

  Scenario: try viewSales as a "Seller" with a profile
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click "Sales"
    Then I am on "http://localhost/Sales/mySales"
    And I see "My Sales List"


  Scenario: try viewSales as a "Seller" with a profile and without sales
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click "Sales"
    Then I see message "You don't have any Orders yet"

  Scenario: try viewSales as a "Seller" without a profile created
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I don't have profile
    When I click "Sales"
    Then I am on "http://localhost/Profile/settings"
    And I see message "Let's Create your Profile first"
