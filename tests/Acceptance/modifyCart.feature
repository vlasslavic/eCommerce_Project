Feature: modifyCart
    In order to modify products from cart
    As a "Customer"
    I need to have a "Customer" account and click "Cart" from the any page

    Scenario: try modifyCart
        Given I am on "http://localhost/Catalog/viewCart"
        And I am logged-in "Customer"
        Then I see "My Cart List"
        When I click "+" 
        Then I see the quantity of the added product increment
        When I click "-" 
        Then I see the quantity of the added product increment

    Scenario: try modifyCart with empty cart
        Given I am on "http://localhost/Catalog/viewCart"
        And I am logged-in "Customer"
        And cart is empty
        Then I see message "Your cart is empty"
        And I see "Continue Shopping"
        When I click "Continue Shopping"
        Given I am on "http://localhost/Catalog/index"
        And I see "Products Gird"
        

