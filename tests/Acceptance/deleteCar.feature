Feature: deleteCar
  In order to delete a car
  As a "Customer"
  I need to have a "Customer" account and click "My Cars" to delete a car

  Scenario: try deleteCar as a "Customer"
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "My Garage"
    And I click "My Cars"
    Then I am on "http://localhost/Garage/myGarage"
    And I see "My Cars List"
    When I click "Delete" next to the car I want to delete
    Then I see confirmation prompt
    When I click "Confirm"
    Then I am on "http://localhost/Garage/myGarage"
    And I see message "Car Deleted"

  Scenario: try deleteCar as a "Customer" without cars
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "My Garage"
    Then I am on "http://localhost/Garage/addCar"
    And I see message "Let's Add a Car first"

  Scenario: try cancel deleteCar as a "Customer"
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "My Garage"
    And I click "My Cars"
    Then I am on "http://localhost/Garage/myGarage"
    And I see "My Cars List"
    When I click "Delete" next to the car I want to delete
    Then I see confirmation prompt
    And I click "Cancel"
    Then I am on "http://localhost/Garage/myGarage"


