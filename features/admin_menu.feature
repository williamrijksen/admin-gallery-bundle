Feature: Admin panel menu view
  In order to display galleries administration in admin panel menu
  As a developer
  I need to use fsi/admin-gallery-bundle in my application

  Scenario: Display "Galleries" element in admin panel menu
    When I open "Admin Panel" page
    Then I should see "Galleries" element in menu