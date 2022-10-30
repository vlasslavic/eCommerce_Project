Feature: checkout
    In order to checkout
    As a "Customer"
    I need to have a "Customer" account and click "Checkout" from the Cart page

    Scenario: try checkout
      Given I am on "http://localhost/Catalog/viewCart"
      And I am logged-in "Customer"
      Then I see "My Cart List"
      When I click "Checkout" 
      Then I see "Products to Buy"
      And I see "Taxes and Total"
      When I click “Pay with Paypal"
      Then I see "Checkout Form"
      When I fill checkout information
      And I click "Continue"
      Then I am on "https://www.paypal.com/ca/home"
      When I complete paypall checkout
      Then I am on "http://localhost/Catalog/viewCart"
      And I see message "Thank You!"

    Scenario: try cancel checkout
      Given I am on "http://localhost/Catalog/viewCart"
      And I am logged-in "Customer"
      Then I see "My Cart List"
      When I click "Checkout" 
      Then I see "Products to Buy"
      And I see "Taxes and Total"
      When I click “Pay with Paypal"
      Then I see "Checkout Form"
      When I click "Cancel"
      Then I am on "http://localhost/Catalog/viewCart"
      And I see "My Cart List"
