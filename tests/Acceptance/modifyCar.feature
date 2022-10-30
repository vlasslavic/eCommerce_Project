Feature: modifyCar
  In order to modify a car
  As a "Customer"
  I need to have a "Customer" account and click "Modify Car" to modify a car

  Scenario: try modifyCar as a "Customer"
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "My Garage"
    And I click "My Cars"
    Then I am on "http://localhost/Garage/myGarage"
    And I see "My Cars List"
    When I click "Modify" next to the car I want to modify
    Then I am on "http://localhost/Garage/modifyCar"
    And I see "Modify Form"
    When I fill car information
    And I click "Modify Car"
    Then I am on "http://localhost/Garage/myGarage"
    And I see message "Car Modified"

  Scenario: try modifyCar as a "Customer" without cars
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "My Garage"
    Then I am on "http://localhost/Garage/addCar"
    And I see message "Let's Add a Car first"

  Scenario: try cancel modifyCar as a "Customer"
    Given I am on "http://localhost/"
    And I am logged-in "Customer"
    When I click "My Garage"
    And I click "My Cars"
    Then I am on "http://localhost/Garage/myGarage"
    And I see "My Cars List"
    When I click "Modify" next to the car I want to modify
    Then I am on "http://localhost/Garage/modifyCar"
    And I see "Modify Form"
    When I fill car information
    And I click "Cancel"
    Then I am on "http://localhost/Garage/myGarage"

