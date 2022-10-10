Feature: Testing the region
  @t2
  Scenario: test links in region
    Given I am on the homepage
    When I follow "Article" in the "header" region
    Then I should see "Give it a go and grow your own herbs"
    When I follow "Contact" in the "footer" region
    Then I should see "Website feedback"