Feature: 404 Handler
  Every API should have a 404 handler

  Scenario: 404 Handler
    When I go to "/404"
    Then I should see "Not Found"
