Feature: removeAppointment
  In order to cancel a client appointment
  As a "Seller"
  I need to have a "Seller" account, a profile and click "Sales" to cancel an appointment

  Scenario: try removeAppointment as a "Seller" with a profile
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click  "Appointments"
    And I click "Modify Appointments"
    Then I am on "http://localhost/Appointments/myAppointments"
    And I see "My Appointments List"
    When I click "Cancel" next to the appointment I want to cancel
    Then I see confirmation prompt
    When I click "Confirm"
    Then I am on "http://localhost/Sales/mySales"
    And I see message "Order Cancelled"

  Scenario: try removeAppointment as a "Seller" with a profile and without appointments
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click  "Appointments"
    Then I see message "You don't have any Appointments yet"

  Scenario: try removeAppointment as a "Seller" without a profile created
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I don't have profile
    When I click "Appointments"
    Then I am on "http://localhost/Profile/settings"
    And I see message "Let's Create your Profile first"

  Scenario: try cancel removeAppointment as a "Seller" with a profile created
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click  "Appointments"
    And I click "Modify Appointments"
    Then I am on "http://localhost/Appointments/myAppointments"
    And I see "My Appointments List"
    When I click "Cancel" next to the appointment I want to cancel
    Then I see confirmation prompt
    When I click "Abort"
    Then I am on "http://localhost/Appointments/myAppointments"

  
