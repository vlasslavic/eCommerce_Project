Feature: deleteService
  In order to delete a service
  As a "Seller"
  I need to have a "Seller" account, a profile and click "Modify Service" to delete a service

  Scenario: try deleteService as a "Seller" with a profile created
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click "Appointments"
    And I click "Modify Service"
    Then I see "My Service List"
    When I click "Delete" next to the service I want to delete
    Then I see confirmation prompt
    When I click "Confirm"
    Then am on "http://localhost/Appointments/myServices"
    And I see message "Service Deleted"

  Scenario: try deleteService as a "Seller" with a profile created and without service
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click "Appointments"
    Then I don't see "Modify Service"

  Scenario: try deleteService as a "Seller" without a profile created
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I don't have profile
    When I click "Appointments"
    Then I am on "http://localhost/Profile/settings"
    And I see message "Let's Create your Profile first"

  Scenario: try cancel deleteService as a "Seller" with a profile created
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click "Appointments"
    And I click "Modify Service"
    Then I see "My Service List"
    When I click "Delete" next to the service I want to delete
    Then I see confirmation prompt
    When I click "Cancel"
    Then am on "http://localhost/Appointments/myServices"
    And I see "My Services List"
