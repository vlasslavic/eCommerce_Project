Feature: delete product
  In order to delete a product
  As a "Seller"
  I need to have a "Seller" account and a profile and click "Modify Product" to delete a product

  Scenario: try deleting a Product as a "Seller" with a profile created
    Given I am on the website
    And I am logged-in my "Seller" account
    And I have a profile
    And I have products on my page
    When I click on “Product”
    And I click on “Modify Product”
    Then all my products are displayed
    When I click "Delete" next to the product I want to delete
    Then a confirmation prompt is being displayed
    When I click "Confirm"
    Then a success message is being displayed 
    And the product is no longer visible in my products list

  Scenario: try deleting a Product as a "Seller" with a profile created and without any products
    Given I am on the website
    And I am logged-in my "Seller" account
    And I have a profile
    And I don't have products on my page
    When I click on “Product”
    Then I have only "Add Product" available
    When I click on “Add Product”
    Then I am being redirected to add a product

  Scenario: try deleting a Product as a "Seller" without a profile created
    Given I am on the website
    And I am logged-in my "Seller" account
    And I don't have a profile
    When I click on “Product”
    Then I have only "Add Product" available
    When I click on “Add Product”
    Then I am being redirected to create a profile
    And an error message is displayed

  Scenario: verify that I can abort deleting a Product as a "Seller" with a profile created
    Given I am on the website
    And I am logged-in my "Seller" account
    And I have a profile
    And I have products on my page
    When I click on “Product”
    And I click on “Modify Product”
    Then all my products are displayed
    When I click "Delete" next to the product I want to delete
    Then a confirmation prompt is being displayed
    When I click "Abort"
    Then I can see my products list