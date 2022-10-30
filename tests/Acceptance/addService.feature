Feature: addService
  In order to add a service
  As a "Seller"
  I need to have a "Seller" account and a profile and click "Add Service" to add a new service

  Scenario: try addService as a "Seller" with a profile
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click "Appointments"
    And I click “Add Service"
    Then I see "Service Form"
    And I fill service information
    When I click “Add Service"
    Then I am on "http://localhost/Appointment/myServices"
    And I see message "Service Added"

  Scenario: try addService as a "Seller" without a profile
     Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click "Appointments"
    Then I am on "http://localhost/Profile/settings"
    And I see message "Let's Create your Profile first"
