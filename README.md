# Trip4Life - Your Sailing Adventure

Trip4Life is a web-based application that allows users to plan and book sailing trips to various destinations.
The application features a user-friendly interface and a comprehensive backend system for managing the trips, destinations, boats, and bookings.

### Features
* User-friendly interface for browsing and booking trips
* Detailed information about destinations, boats and available trips
* Secure user login and registration system
* User can view, edit and delete their own bookings
* Admin panel for managing destinations, boats, trips and bookings
* Responsive design for optimal viewing on different devices
* The application uses prepared statements to prevent SQL injection attacks

## Overview of the project
The Trip4Life project has a user side and an admin side, allowing users to browse and book trips while also providing a backend system for managing the trips,
destinations, boats, and bookings.

On the user side, the user can view all the destinations available, see the boats and can book a trip to a destination. They can also view, edit and delete their own bookings.

On the admin side, the admin can add, edit and delete destinations, boats, trips and bookings. They can also view all the bookings and approve or decline them.

The project uses a MySQL database to store all the data. The database consists of tables for destinations, boats, trips, bookings and users. The destinations table stores information about each destination
such as its name, description and image. The boats table stores information about each boat such as its name, description and image.
The trips table stores information about each trip such as its name, destination, boat, date and price. The bookings table stores information
about each booking such as its user, trip, date and status. The users table stores information about each user such as their username, password, 
first name, last name, email, and image.
## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites
To run this project, you will need:
* A local server environment such as XAMPP or WAMP
* PHP 7 or higher
* MySQL

### Installation
Follow these steps to install and run the CMS on your local machine:

1. Clone the repository to your local machine: `git clone https://github.com/190ibrahim/Trip4Life.git`
2. Import the cms.sql file into your MySQL database
3. Update the database connection details in `includes/dbcon.php` to match your MySQL setup
4. Start your local server and visit http://localhost/boat/ to access the CMS

### Usage
To use the Trip4Life, To use the application, you will need to first create an account. You can do this by clicking the "register" button on the navigation of the page and filling out the form. Once you have created an account and logged in,
you will be able to see all the destinations and boats, then you will be able to book a trip.

### Note
The application is not handling the payment process, it's just a demonstration of how to book a trip.

### Built With
* **PHP** - Server-side scripting language
* **MySQL** - Database management system
* **HTML/CSS/JS** - Front-end development
* **Bootstrap** - Front-end framework for responsive design

### Authors
* **ME** - Initial work - **190ibrahim**

### Contributing
If you would like to contribute to this project, please fork the repository and create a pull request with your changes.

### License
This project is licensed under the MIT License - see the LICENSE file for details.

### Acknowledgments
* **Font Awesome** for the icon library


