Feature: cancelOrder
  In order to cancel an order
  As a "Seller"
  I need to have a "Seller" account, a profile and click "Sales" to cancel an order

  Scenario: try cancelOrder as a "Seller" with a profile
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click "Sales"
    Then I am on "http://localhost/Sales/mySales"
    And I see "My Sales List"
    When I click "Cancel" next to the order I want to cancel
    Then I see confirmation prompt
    When I click "Confirm"
    Then I am on "http://localhost/Sales/mySales"
    And I see message "Order Cancelled"

  Scenario: try cancelOrder as a "Seller" with a profile and without sales
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click "Sales"
    Then I see message "You don't have any Orders yet"

  Scenario: try cancelOrder as a "Seller" without a profile created
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I don't have profile
    When I click "Sales"
    Then I am on "http://localhost/Profile/settings"
    And I see message "Let's Create your Profile first"

