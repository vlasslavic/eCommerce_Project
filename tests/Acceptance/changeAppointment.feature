Feature: changeAppointment
  In order to modify a service appointment
  As a "Customer"
  I need to have a "Customer" account and click "My Appointments" to modify a service appointment

  Scenario: try changeAppointment as a "Customer"
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "Appointments"
    And I click "My Appointments"
    Then I am on "http://localhost/Appointments/myAppointments"
    And I see "My Appointments List"
    When I click "Modify" next to the appointment I want to modify
    Then I am on "http://localhost/Appointments/modifyAppointment"
    And I see "Modify Form"
    When I fill appointment information
    And I click "Modify Appointment"
    Then I am on "http://localhost/Appointments/myAppointments"
    And I see message "Appointment Modified"

  Scenario: try changeAppointment as a "Customer" without appointments
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "Appointments"
    Then I am on "http://localhost/Appointments/scheduleAppointment"
    And I see message "Let's Schedule an Appointment first"

  Scenario: try changeAppointment as a "Customer" without cars
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "Appointments"
    Then I am on "http://localhost/Garage/addCar"
    And I see message "Let's Add a Car first"

  Scenario: try cancel changeAppointment as a "Customer"
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "Appointments"
    And I click "My Appointments"
    Then I am on "http://localhost/Appointments/myAppointments"
    And I see "My Appointments List"
    When I click "Modify" next to the appointment I want to modify
    Then I am on "http://localhost/Appointments/modifyAppointment"
    And I see "Modify Form"
    When I fill appointment information
    And I click "Cancel"
    Then I am on "http://localhost/Customer/myGarage"
