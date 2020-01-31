# Executive Digital

* This mini project is a response to the task.

## Criteria

* For the backend part You must not use any frameworks for this test,
although you can install libraries via composer
* For the frontend part you can use any desired framework/library
* All the stuff you do, needs to be tracked on a git repository with
multiple commits
* Database engine used must be MySQL.
* All validations must be on both, backend and frontend
* Installation instructions should be included
* Candidate is expected to be able to develop this test within 24 hours

Considered as a plus (but not mandatory):
* Use SEO friendly URLs
* Use Vue framework for the frontend
* Generate database structure using migrations

## Details

#### TASKS MANAGEMENT SYSTEM
#### You have to design a system that is responsible for managing todo tasks.

Project should have 6 pages:
* Register page
* Login page
* Tasks page
* Create task page
* Task page
* Task edit page

Additionally user should be able to:
* Delete task
* Move task from three predefined columns (Backlog, In Progress,
Done)

Pages
* Register page
    * On this page user should be able to register account
* Login page
    * On this page user should be able to log in into the system
* Tasks page:
    * On this page tasks should be listed in one of three predefined columns
* Create task page
    * On this page user should be able to create a new task which is described
by:
        * Title
        * Description
        * Due date
        * Conditionally flagged as ‘Blocked’
        * Column (default is ‘Backlog’)
* Task page
    * On this page user should be able to to see every detail of the task

# Instruction to install

* Clone repo
* To install dependencies please run "composer install"
* To create database and tables please run sql script (db.sql).
* For testing mail sending, in "app/Helpers/Mail.php" change email address, at line 31, where an email should be sent.

Enjoy :)