Feature: addToCart
  In order to add products to cart
  As a "Customer"
  I need to have a "Customer" account and click "Add To Cart" from the product page

  Scenario: try addToCart
    Given I am on "http://localhost/Catalog/product"
    And I am logged-in "Customer"
    When I click "Add To Cart"
    Then I am on "http://localhost/Catalog/viewCart"
    And I see the added product

