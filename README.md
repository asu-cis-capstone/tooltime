#Its ToolTime!

##Overview
<img src="https://cloud.githubusercontent.com/assets/10656205/5954551/18c3b36e-a756-11e4-935a-142740884fa6.jpg" height=150 align="left"> **Tool Time** will be a mobile tool used by construction professionals to manage and track internal tool rental. It will consist of a mobile app (initially iOS) that will be used by Bayley Construction employees to rent and return tools from the company's warehouse. Additionally, a webpage will be accessible to the project manager to view the status of tools, individual rental histories of employees, add tools, remove tools, etc. 

##Bayley Construction
<img src="https://cloud.githubusercontent.com/assets/10656205/5953845/77b862d4-a74c-11e4-8401-9cfba243d58b.png" align="right">
[Bayley Construction](http://www.bayley.net/) was established in Mercer Island, Washington in 1963. Since then, their work in commerical construction has expanded throughout the west coast and across the US. They currently have offices in Arizona, California and Washington. Bayley is constantly seeking to improve their internal business practices and has sought our team to develop an efficient, user-friendly way to manage their existing tool rental system. Internally, Bayley rents tools to employees from their warehouses and currently has no way of managing these rentals. They would like our team to develop a system that will allow employees to rent and return tools by scanning barcodes, create reports based on rental history, and manage tool inventory. 

##Collaborators
<img src="https://cloud.githubusercontent.com/assets/10656205/5954367/a5317e24-a753-11e4-96c4-29c001a64856.png" height=206 align="right">
* Brandon Lacquement: Lead Development | @brlacquement
* Ling Ling: Database Management | @conduongxua
* Jin Lim: Database Management | @jlim22
* Taylor Reigel: Design Vision | @treigel
* Derrick Kearney: Styling | @dtkearney

##Getting Started/Installation [![Stack Share](http://img.shields.io/badge/tech-stack-0690fa.svg?style=flat)](http://stackshare.io/brlacquement/tooltime)
**Rent a tool:** Check out the [mobile site](http://www.bayleytools.net)!   
**Administators:** visit [this site](http://www.bayleytools.net/admin.htm) and log in.   
**Implementation:** Start [here](https://github.com/asu-cis-capstone/tooltime/blob/master/INSTALL.md).

ToolTime is hosted throgh GoDaddy on a web domain paired with a MySQL server (version 5.5.4-cll-lve GPL). We are developing on PHP version 5.5.12 and run our local testing through WAMPSERVER 2.5 with Apache 2.4.9. In addition to this, we are utilizing CakePHP 2.6.1 for a PHP script library and Bootstrap 3.3.2 for mobile-first web styling. We plan to utilize the jQuery, jQuery UI, and jQuery Mobile script libraries to implement some functionality in the future - these versions will be listed once implemented. Our GoDaddy server is hosted via a UNIX socket in a 64-bit environment. 

Generally, during development, our team work on local WAMP servers to test new features. We then use FTP to move updated files to our website's root directory. We then perform further testing in the server environment. Finally, we notify the team of our work and push changes to the git repo.

##Backlog [![Stories in Ready](https://badge.waffle.io/asu-cis-capstone/tooltime.svg?label=ready&title=Ready)](http://waffle.io/asu-cis-capstone/tooltime)
- Develop rental web app
- Clone login database
- Clone tool database
- Develop admin functionality

##Release Notes
**V0.1**:   
* Initial repository 
* waffle.io integration 
* Visual mockups

**V0.2**:
* Design revisions - shift to mobile web development
* Basic navigation bar and header
* Basic site structure and flow
* Obtained web hosting (GoDaddy)
* Established temp database (to change)
* Basic database connectivity to web page (time stamp)
* Updated INSTALL.md
