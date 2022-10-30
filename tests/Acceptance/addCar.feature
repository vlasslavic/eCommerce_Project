Feature: addCar
  In order to add a car
  As a "Customer"
  I need to have a "Customer" account and click "Add Car" to add a car to my garage

  Scenario: try addCar as a "Customer"
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "My Garage"
    And I click “Add Car"
    Then I am on "http://localhost/Garage/addCar"
    Then I see "Car Form"
    And I fill car information
    When I click “Add Car"
    Then I am on "http://localhost/Garage/myGarage"
    And I see message "Car Added"

   Scenario: try cancel addCar as a "Customer"
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "My Garage"
    And I click "Add Car"
    Then I am on "http://localhost/Garage/addCar"
    Then I see "Car Form"
    And I fill car information
    When I click "Cancel"
    Then I am on "http://localhost/"


