Selenium IDE Automated Tests
-All automated tests were done in Selenium IDE via Firefox and the IDE extension
-To open test cases, open Selenium IDE from Firefox->File->Open->"name of file"
-To run the test case, hit the play button in Selenium IDE

Summary of Test Cases:
*All test cases will login and logout as brandonl@bayley.net with a certain password

checkinCheckoutMicrowave
-This test case will login -> checkin a microwave -> checkout that microwave ->logout

checkoutCheckinBitset
-This test case will login->checkout the bitset -> checkin the bitset -> logout

checkoutValidationTest
-This test case will login->choose a tool to checkout->enter improper data into the requested fields and check if the webpage will allow the input -> logout 

navigateAdminPanel
-This test case will login->click through all of the admin pages except reporting -> logout

checkoutCheckin4ftLadder
-This test case will login->Checkout the 4ft ladder->Checkin the 4ft ladder -> logout

checkoutCheckin16ClawHammer
-This test case will login -> checkout the 16oz clawhammer -> checkin the 16oz clawhammer -> logout

checkoutCheckinLift
-This test case will login-> checkout the diaper lift -> checkin the lift -> logout

loginCredentialCheck
-This test will attempt to login using incorrect information

loginLogout
-This test will simply login->logout with the brandonl@bayley.net e-mail and accompanying password

passWordCheck
-This test will attempt to login with the brandonl@bayley.net e-mail and multiple incorrect passwords

