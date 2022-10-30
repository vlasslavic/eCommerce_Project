Feature: viewAppointment
  In order to view the status of a service appointment
  As a "Customer"
  I need to have a "Customer" account and click "My Appointment" to view the status of a service appointment

  Scenario: try viewAppointment as a "Seller" with a profile
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "Appointments"
    And I click "My Appointments"
    Then I am on "http://localhost/Appointments/myAppointments"
    And I see "My Appointments List"
    And I see "Status" next to the appointment I want

  Scenario: try viewAppointment as a "Customer" without appointments
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "Appointments"
    Then I am on "http://localhost/Appointments/scheduleAppointment"
    And I see message "Let's Schedule an Appointment first"

  Scenario: try viewAppointment as a "Customer" without cars
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "Appointments"
    Then I am on "http://localhost/Garage/addCar"
    And I see message "Let's Add a Car first"
