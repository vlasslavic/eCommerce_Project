Feature: modify product
  In order to modify a product
  As a "Seller"
  I need to have a "Seller" account and a profile and click "Modify Product" to modify a product

  Scenario: try modifying a Product as a "Seller" with a profile created
    Given I am on the website
    And I am logged-in my "Seller" account
    And I have a profile
    And I have products on my page
    When I hover on “Product”
    And I click on “Modify Product”
    Then all my products are displayed
    When I click "Modify" next to the product I want to update
    Then a filled form is displayed
    When I modify the form
    And I click “Modify Product”
    Then I am being redirected to my profile page
    And a success message is displayed

  Scenario: try modifying a Product as a "Seller" with a profile created and without any products
    Given I am on the website
    And I am logged-in my "Seller" account
    And I have a profile
    And I don't have products on my page
    When I hover on “Product”
    Then I have only "Add Product" available
    When I click on “Add Product”
    Then I am being redirected to add a product

  Scenario: try modifying a Product as a "Seller" without a profile created
    Given I am on the website
    And I am logged-in my "Seller" account
    And I don't have a profile
    When I hover on “Product”
    Then I have only "Add Product" available
    When I click on “Add Product”
    Then I am being redirected to create a profile
    And an error message is displayed