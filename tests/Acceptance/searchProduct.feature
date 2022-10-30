Feature: searchProduct
  In order to search for a product
  As a "User"
  I need to input the name of the product and click "Search"

  Scenario: try searchProduct
    Given I am on "http://localhost/"
    And I input "charger"
    And I click "Search"
    Then I see "charger"

  Scenario: try searchProduct for a nonexistent product
    Given I am on "http://localhost/"
    And I input "charger"
    And I click "Search"
    Then I see message "Sorry, We haven't found the product you are looking for.."
