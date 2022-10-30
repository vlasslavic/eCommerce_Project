Feature: scheduleAppointment
  In order to schedule a service appointment
  As a "Customer"
  I need to have a "Customer" account and click "Schedule Appointment" to schedule an appointment

  Scenario: try scheduleAppointment as a "Customer"
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click  "Appointments"
    And I click "Schedule Appointments"
    Then I am on "http://localhost/Appointments/scheduleAppointment"
    And I see "Appointments Form"
    When I fill appointment information
    And I click “Schedule Appointment”
    Then I am on "http://localhost/Appointments/myAppointments"
    And I see message "Appointment Scheduled"

  Scenario: try scheduleAppointment as a "Customer" whithout cars
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "Appointments"
    Then I am on "http://localhost/Customer/addCar"
    And I see message "Let's Add a Car first"


  Scenario: try scheduleAppointment as a "User" without an account created
    Given I am on "http://localhost/"
    And I am not logged-in "Customer"
    When I click "Schedule Appointment"
    Then I am on "http://localhost/User/registerCustomer"
    And I see message "Let's Create a Customer Account first"


  
