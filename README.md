# INSTALLATION GUIDE

## Initial Steps
* Make sure MAMP is running!

* Make sure to install Composer globally. If it is not installed globally check out the guide at https://getcomposer.org/doc/00-intro.md
* Once the comment-task repository is the pwd in the terminal, run the command `composer install` 

* After the initial composer installation, run the command `npm install`

* Next, set up the .env file via the terminal by running the command `touch .env` and copy & pase the .env.example content into the newly created .env file

* Once that is done, in MAMP's PHPMyAdmin, create a new database called 'comment-task'

* In the .env file, set the DB_DATABASE=comment-task and accordingly change the DB_USERNAME && DB_PASSWORD to personal settings

* In the terminal, run the command `php artisan key:generate`

* In the terminal, run the command `npm run dev`

* In the terminal, run the command `php artisan serve` to launch the site on the local Server

## User Guide
* Register an account with a name, email, and password

* Once logged in, click leave a comment to create a comment to appear on the dashboard

* Users can create multiple accounts and to see different users account comments

* Enjoy!