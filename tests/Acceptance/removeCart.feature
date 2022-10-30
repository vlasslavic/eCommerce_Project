Feature: removeCart
    In order to remove products from cart
    As a "Customer"
    I need to have a "Customer" account and click "Remove" next to the product to remove

    Scenario: try removeCart
        Given I am on "http://localhost/Catalog/viewCart"
        And I am logged-in "Customer"
        Then I see "My Cart List"
        When I click "Remove" next to the product to remove
        Then I see the product disappear
        And I see "Subtotal" change

    Scenario: try removeCart with empty cart
        Given I am on "http://localhost/Catalog/viewCart"
        And I am logged-in "Customer"
        And cart is empty
        Then I see message "Your cart is empty"
        And I see "Continue Shopping"
        When I click "Continue Shopping"
        Given I am on "http://localhost/Catalog/index"
        And I see "Products Gird"
        

