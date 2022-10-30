Feature: viewRecords
  In order to view past records of service appointments related to my car
  As a "Customer"
  I need to have a "Customer" account and click "Past Records" to view past records of service appointments related to my car

  Scenario: try viewRecords as a "Customer"
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "My Garage"
    And I click "My Cars"
    Then I am on "http://localhost/Garage/myGarage"
    And I see "My Cars List"
    When I click "Past Records" next to the car I want
    Then I am on "http://localhost/Garage/pastRecords"
    And I see "Past Appointments List"

   Scenario: try viewRecords as a "Customer" without records
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "My Garage"
    And I click "My Cars"
    Then I am on "http://localhost/Garage/myGarage"
    And I see "My Cars List"
    When I click "Past Records" next to the car I want
    Then I see message "Sorry: We don't have any previous history of this car."

  Scenario: try viewRecords as a "Customer" without cars
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "My Garage"
    Then I am on "http://localhost/Garage/addCar"
    And I see message "Let's Add a Car first"

