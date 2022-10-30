Feature: viewProduct
  In order to view a product's details
  As a "User"
  I need to click on the product card from the catalog

  Scenario: try viewProduct
    Given I am on "http://localhost/Catalog/index"
    And I am not logged-in
    When I click "Details"
    Then I am on "http://localhost/Catalog/product"
    And I see the product details


