#language: en
@login
Feature: Test get tag, attribute name and css value

  Background:
    Given I am on homepage
  @P1
  Scenario: Test get tag and attribute name
    Then I read tag name and attribute name

  @P2
  Scenario: Test get css value
    Then I read css property of any element