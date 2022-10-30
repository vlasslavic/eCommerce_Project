Feature: cancelAppointment
  In order to cancel a service appointment
  As a "Customer"
  I need to have a "Customer" account and click "My Appointments" to cancel a service appointment

  Scenario: try cancelAppointment as a "Customer"
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "Appointments"
    And I click "My Appointments"
    Then I am on "http://localhost/Appointments/myAppointments"
    And I see "My Appointments List"
    When I click "Cancel" next to the appointment I want to cancel
    Then I see confirmation prompt
    When I click "Confirm"
    Then I am on "http://localhost/"
    And I see message "Appointment Cancelled"

  Scenario: try cancelAppointment as a "Customer" without appointments
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "Appointments"
    Then I am on "http://localhost/Appointments/scheduleAppointment"
    And I see message "Let's Schedule an Appointment first"

Scenario: try cancelAppointment as a "Customer" without cars
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "Appointments"
    Then I am on "http://localhost/Garage/addCar"
    And I see message "Let's Add a Car first"

  Scenario: try cancel cancelAppointment as a "Customer"
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "Appointments"
    And I click "My Appointments"
    Then I am on "http://localhost/Appointments/myAppointments"
    And I see "My Appointments List"
    When I click "Cancel" next to the appointment I want to cancel
    Then I see confirmation prompt
    When I click "Cancel"
    Then I am on "http://localhost/Appointments/myAppointments"


    