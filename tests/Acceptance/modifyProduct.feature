Feature: modifyProduct
  In order to modify a product
  As a "Seller"
  I need to have a "Seller" account, a profile and click "Modify Product" to modify a product

  Scenario: try modifyProduct as a "Seller" with a profile
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click "Products"
    And I click "Modify Product"
    Then I see "My Products List"
    When I click "Modify" next to the product I want to update
    Then I am on "http://localhost/Product/modify"
    And I see "Modify Form"
    When I fill product information
    And I click “Modify Product”
    Then I am on "http://localhost/Product/myProducts"
    And I see message "Product Modified"

  Scenario: try modifyProduct as a "Seller" with a profile and without products
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click "Products"
    Then I don't see "Modify Product"

  Scenario: try modifyProduct as a "Seller" without a profile created
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I don't have profile
    When I click "Products"
    Then I am on "http://localhost/Profile/settings"
    And I see message "Let's Create your Profile first"
