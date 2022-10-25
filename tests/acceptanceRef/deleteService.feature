Feature: delete service
  In order to delete a service
  As a "Seller"
  I need to have a "Seller" account and a profile and click "My Services" to delete a service

  Scenario: try deleting a Service as a "Seller" with a profile created
    Given I am on the website
    And I am logged-in my "Seller" account
    And I have a profile
    And I have services on my page
    When I hover over “Appointments”
    And I click on “My Services”
    Then all my services are displayed
    When I click "Delete" next to the service I want to delete
    Then a confirmation prompt is being displayed
    When I click "Confirm"
    Then a success message is being displayed 
    And the service is no longer visible in my services list

  Scenario: try deleting a Service as a "Seller" with a profile created and without any services
    Given I am on the website
    And I am logged-in my "Seller" account
    And I have a profile
    And I don't have services on my page
    When I hover over “Appointments”
    Then I have only "Add Service" available
    When I click on “Add Service"
    Then I am being redirected to add a service

  Scenario: try deleting a Service as a "Seller" without a profile created
    Given I am on the website
    And I am logged-in my "Seller" account
    And I don't have a profile
    When I hover over “Appointments”
    Then I have only "Add Service" available
    When I click on “Add Service"
    Then I am being redirected to create a profile
    And an error message is displayed

  Scenario: verify that I can abort deleting a Service as a "Seller" with a profile created
    Given I am on the website
    And I am logged-in my "Seller" account
    And I have a profile
    And I have services on my page
    When I hover over “Appointments”
    And I click on “My Services"
    Then all my services are displayed
    When I click "Delete" next to the service I want to delete
    Then a confirmation prompt is being displayed
    When I click "Abort"
    Then I can see my services list