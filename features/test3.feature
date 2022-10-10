#language:en
@sw
Feature: Test Switch Multiple Window Functionality
  Background:
    Given I am on homepage
#      base_url: https://www.programsbuzz.com

  Scenario: Work with multiple window
    When I click on 'Facebook' icon
    And I wait 10 seconds
    Then I switch to windows
    And I wait 10 seconds
