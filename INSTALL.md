#Getting started with ToolTime

##Suggested Software
* phpMyAdmin (managing MySQL server)
* WAMP (local server host and testing)
* FTP client (transfer files to web domain)
* Git Bash (manage repository)
* Notepad++ (edit files)

##Implementing
1. Obtain domain hosting with MySQL server (we use GoDaddy)
2. Import and customize the provided SQL file to your own database.
3. Drop all files from public_html into your site's root directory
4. Configure the server-connect.php with your database's connection variables.

##Creating the MySQL Database
After establishing the GoDaddy account, log in and navigate to your "WEB HOSTING" tab, and click "MANAGE" in green.
Find and click the "MySQL Databases" icon.
Under "New Database", enter the desired name of your database. Next, click "Create Database". Your MySQL database is now created! 
*Screenshots will be provided soon to help with the set-up process.

##Creating SQL tables
*Tables can be created via SQL, or using PhpMyAdmin interface(recommended)
*Should you decide to create tables via SQL, paste the following SQL statements into the SQL tab of PhpMyAdmin
*Screenshots will be provided soon to help with the set-up process.

CREATE TABLE `employee` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `title` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

CREATE TABLE `rental_log` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `time_out` int(16) NOT NULL,
  `time_in` int(16) NOT NULL,
  `tool_id` int(16) NOT NULL,
  `employee_id` int(16) NOT NULL,
  `job_no` int(16) NOT NULL,
  `costcode` int(16) NOT NULL,
  `time_rented` int(16) NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `out` (`time_out`),
  KEY `in` (`time_in`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE `tools` (
  `toolID` int(16) NOT NULL AUTO_INCREMENT,
  `bayleyID` int(6) NOT NULL,
  `category` varchar(32) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dailyPrice` double(7,2) NOT NULL,
  `weeklyPrice` double(7,2) NOT NULL,
  `monthlyPrice` double(7,2) NOT NULL,
  `toolValue` double(7,2) NOT NULL,
  `status` varchar(16) NOT NULL,
  `location` varchar(16) NOT NULL,
  PRIMARY KEY (`toolID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

CREATE TABLE `trans_log` (
  `trans_no` int(16) NOT NULL AUTO_INCREMENT,
  `type` varchar(3) NOT NULL,
  `tool_id` int(16) NOT NULL,
  `employee_id` int(16) NOT NULL,
  `job_no` int(16) NOT NULL,
  `costcode` int(16) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`trans_no`),
  KEY `tool_id` (`tool_id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

Doing the above will create the SQL tables.

##Entering Data into MySQL Tables
More SQL statements will be provided as the project is closer to development. Once the SQL files are completed, simply download them and go to the "Import" tab in PhpMyAdmin. Now, click the "Choose File" button and upload the SQL files talked about earlier. The data should be included with the table, as well as the table structures. Screenshots will be provided soon to help with the set-up process.

##Uploading the the HTML, CSS, PHP, etc Files
After setting up the database, uploading the website files are necessary. 
To do so, a copy of the current code(HTML, CSS, etc) will be provided.
After receiving the files, log in to GoDaddy.com and go to "My Account" ->"Manage Web Hosting".
With the file provided, click the "Upload" button and select the file to upload the website to GoDaddy.com. Screenshots will be provided soon to help with the set-up process.

##Editing Information in the SQL Tables
Should you need to change something in the MySQL database, such as employee information, PhpMyAdmin is a user-friendly tool that will help with these changes.
For example, if you need to change and employee last name, navigate to phpMyAdmin, click the "employee" table, find the row containing the employee's information, click "Edit", and change the necessary information under "Value". Finally, click "Go" and the information will be saved to the database. 
*Screenshots will be provided soon to help with the set-up process.

Instructions may change as the project is still in development! Pictures will be included in the next release to help guide you! 

