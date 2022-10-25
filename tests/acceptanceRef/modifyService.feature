Feature: modify service
  In order to modify a service
  As a "Seller"
  I need to have a "Seller" account and a profile and click "My Services" to modify a service

  Scenario: try modifying a Service as a "Seller" with a profile created
    Given I am on the website
    And I am logged-in my "Seller" account
    And I have a profile
    And I have services on my page
    When I hover over "Appointments"
    And I click on “My Services"
    Then all my services are displayed
    When I click "Modify" next to the service I want to update
    Then a filled form is displayed
    When I modify the form
    And I click “Modify Service”
    Then I am being redirected to My Services page
    And a success message is displayed

  Scenario: try modifying a Service as a "Seller" with a profile created and without any services
    Given I am on the website
    And I am logged-in my "Seller" account
    And I have a profile
    And I don't have services on my page
    When I hover on "Appointments"
    Then I have only "Add Service" available
    When I click on “Add Service”
    Then I am being redirected to add a service

  Scenario: try modifying a Service as a "Seller" without a profile created
    Given I am on the website
    And I am logged-in my "Seller" account
    And I don't have a profile
    When I hover on "Appointments"
    Then I have only "Add Service" available
    When I click on “Add Service"
    Then I am being redirected to create a profile
    And an error message is displayed