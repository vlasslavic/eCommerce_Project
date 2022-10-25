Feature: view sales
  In order to all my sales
  As a "Seller"
  I need to have a "Seller" account and a profile and click "Sales" to display all sales made

  Scenario: try displaying all Sales as a "Seller" with a profile created
    Given I am on the website
    And I am logged-in my "Seller" account
    And I have a profile
    When I click on "Sales"
    Then all my sales are displayed
    


  Scenario: try displaying a Sales as a "Seller" without a profile created
    Given I am on the website
    And I am logged-in my "Seller" account
    And I don't have a profile
    When I click on "Sales"
    Then I am being redirected to create a profile
    And an error message is displayed