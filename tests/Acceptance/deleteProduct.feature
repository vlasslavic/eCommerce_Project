Feature: deleteProduct
  In order to delete a product
  As a "Seller"
  I need to have a "Seller" account, a profile and click "Modify Product" to delete a product

  Scenario: try deleteProduct as a "Seller" with a profile created
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click "Products"
    And I click "Modify Product"
    Then I see "My Products List"
    When I click "Delete" next to the product I want to delete
    Then I see confirmation prompt
    When I click "Confirm"
    Then am on "http://localhost/Product/myProducts"
    And I see message "Product Deleted"

  Scenario: try deleteProduct as a "Seller" with a profile created and without products
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click "Products"
    Then I don't see "Modify Product"

  Scenario: try deleteProduct as a "Seller" without a profile created
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I don't have profile
    When I click "Products"
    Then I am on "http://localhost/Profile/settings"
    And I see message "Let's Create your Profile first"

  Scenario: try cancel deletingProduct as a "Seller" with a profile created
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click "Products"
    And I click "Modify Product"
    Then I see "My Products List"
    When I click "Delete" next to the product I want to delete
    Then I see confirmation prompt
    When I click "Cancel"
    Then am on "http://localhost/Product/myProducts"
    And I see "My Products List"
