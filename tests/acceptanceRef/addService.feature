Feature: add service
  In order to add a service
  As a "Seller"
  I need to have a "Seller" account and a profile and click "Add Service" to add a new service

  Scenario: try adding a Product as a "Seller" with a profile created
    Given I am on the website
    And I am logged-in my "Seller" account
    And I have a profile
    When I hover over "Appointments"
    And I click on “Add Service"
    Then a form is displayed
    When I input all required fields
    And I click “Add Service”
    Then I am being redirected to My Services page
    And I see my new product added

  Scenario: try adding a Service as a "Seller" without a profile created
    Given I am on the website
    And I am logged-in my "Seller" account
    And I don't have a profile created
    When I hover over "Appointments"
    And I click on “Add Service”
    Then I am being redirected to create a profile
    And an error message is displayed
