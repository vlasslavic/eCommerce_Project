Feature: modifyService
  In order to modify a service
  As a "Seller"
  I need to have a "Seller" account, a profile and click "Modify Service" to modify a service

  Scenario: try modifyService as a "Seller" with a profile
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click "Appointments"
    And I click "Modify Service"
    Then I see "My Service List"
    When I click "Modify" next to the service I want to update
    Then I am on "http://localhost/Appointment/modifyService"
    And I see "Modify Form"
    When I fill service information
    And I click "Modify Service"
    Then I am on "http://localhost/Appointment/myServices"
    And I see message "Service Modified"

  Scenario: try modifyService as a "Seller" with a profile and without service
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click "Appointments"
    Then I don't see "Modify Service"

  Scenario: try modifyService as a "Seller" without a profile created
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I don't have profile
    When I click "Appointments"
    Then I am on "http://localhost/Profile/settings"
    And I see message "Let's Create your Profile first"

