Feature: viewAppointments
  In order to view my appointments
  As a "Seller"
  I need to have a "Seller" account, a profile and click "Modify Appointments" to view my appointments

  Scenario: try viewAppointments as a "Seller" with a profile
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click  "Appointments"
    And I click "Modify Appointments"
    Then I am on "http://localhost/Appointments/myAppointments"
    And I see "My Appointments List"


  Scenario: try viewAppointments as a "Seller" with a profile and without appointments
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I have profile
    When I click  "Appointments"
    And I click "Modify Appointments"
    Then I see message "You don't have any Appointments yet"

  Scenario: try viewAppointments as a "Seller" without a profile created
    Given I am on "http://localhost/"
    And I am logged-in "Seller"
    And I don't have profile
    When I click "Appointments"
    Then I am on "http://localhost/Profile/settings"
    And I see message "Let's Create your Profile first"

