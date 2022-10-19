Feature: add product
  In order to add a product
  As a "Seller"
  I need to have a "Seller" account and a profile and click "Add Product" to add a new product

  Scenario: try adding a Product as a "Seller" with a profile created
    Given I am on the website
    And I am logged-in my "Seller" account
    And I have a profile
    When I hover on “Product”
    And I click on “Add Product”
    Then a form is displayed
    When I input all required fields
    And I click “Add Product”
    Then I am being redirected to my profile page
    And I see my new product added

  Scenario: try adding a Product as a "Seller" without a profile created
    Given I am on the website
    And I am logged-in my "Seller" account
    And I don't have a profile created
    When I hover on “Product”
    And I click on “Add Product”
    Then I am being redirected to create a profile
    And an error message is displayed
