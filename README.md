# School-Sphere
## Overview
The School Sphere is a web application designed to manage student records, including student details, marks, and fee payments. The system is built using PHP and MySQL, featuring a user-friendly interface for administrative tasks such as recording and updating student information, managing marksheets, and handling fee payments.

## Features
Dashboard Overview: Displays total student enrollment, fee collection, and provides quick links to student list and marksheets.
Student Management: Allows adding, editing, and deleting student records with file upload functionality for government ID photos.
Marksheet Management: Provides a table view of student marks with search functionality, and options to view, edit, or delete marks.
Fee Payment Management: Records and updates fee payments, displays total fees collected, and provides options to view or delete payment records.
Modal Functionality: Includes modals for editing and viewing marks details, with AJAX support for updating and viewing records.

## Installation
Clone the Repository:

 git clone https://github.com/Sunaina-Chaurasiya/school-Sphere.git
 cd school-Sphere
Setup the Database:

Import the provided SQL files into your MySQL database.
Create a database named school_management and import the schema and sample data.
Configure Database Connection:

Update the database connection details in db_connect.php to match your local database credentials.
File Permissions:

Ensure the uploads/ directory has the correct permissions to allow file uploads.
Usage
Start the Web Server:

Ensure you have a web server like Apache or Nginx running with PHP support.
Place the project files in your web server’s root directory.
Access the Application:

Open your browser and navigate to http://localhost/School-Sphere/ to access the application.

## File Structure

Dashboard: Access through dashboard.php to view the overview.
Student Management: Add, edit, or delete student records from add_student.php.
Marksheet Management: View and manage marksheets from marksheet_list.php.
Fee Payment Management: Record and manage fee payments from fee_payment.php.
Code Structure
header.php: Contains the navigation header.
footer.php: Contains the footer content.
db_connect.php: Handles the database connection.
dashboard.php: Displays the dashboard overview.
add_student.php: Form for adding new students.
marksheet.php: Form for adding new marksheets.
marksheet_list.php: Displays and manages student marksheets.
fee_payment.php: Manages fee payments and records.
Contributing
Feel free to fork the repository and submit pull requests. Ensure to follow the coding standards and update documentation as needed.

## Acknowledgements
Thanks to the open-source community for the libraries and tools used in this project.
