Feature: updateAppointment
  In order to update the status of a client appointment
  As a "Seller"
  I need to have a "Seller" account, a profile and click "Modify Appointment" to update the status of a client appointment

  Scenario: try updateAppointment as a "Seller" with a profile
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click  "Appointments"
    And I click "Modify Appointments"
    Then I am on "http://localhost/Appointments/myAppointments"
    And I see "My Appointments List"
    When I click "Update Status" next to the appointment I want to update
    Then I am on "http://localhost/Appointments/updateAppointment"
    And I see "Update Form"
    When I fill appointment status information
    And I click "Update Status"
    Then I am on "http://localhost/Appointments/myAppointments"
    And I see message "Appointment Status Updated"

  Scenario: try updateAppointment as a "Seller" with a profile and without appointments
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click "Appointments"
    Then I don't see "Modify Appointments"
    And I see message "You don't have any Appointmets yet."

  Scenario: try updateAppointment as a "Seller" without a profile created
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I don't have profile
    When I click "Appointments"
    Then I am on "http://localhost/Profile/settings"
    And I see message "Let's Create your Profile first"

  Scenario: try cancel updateAppointment as a "Seller" with a profile
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click  "Appointments"
    And I click "Modify Appointments"
    Then I am on "http://localhost/Appointments/myAppointments"
    And I see "My Appointments List"
    When I click "Update Status" next to the appointment I want to update
    Then I am on "http://localhost/Appointments/updateAppointment"
    And I see "Update Form"
    When I fill appointment status information
    And I click "Cancel"
    Then I am on "http://localhost/Appointments/myAppointments"