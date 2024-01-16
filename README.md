
#Steps to create a  laravel task mgt system
-Create task (info to save: task name, priority, timestamps)
-Edit task
-Delete task
-Reorder tasks with drag and drop in the browser. Priority should automatically be updated based on this. #1 priority goes at top, #2 next down and so on.
-Tasks should be saved to a mysql table.
============================================

Deployment Instructions below:
------------------------

Deploying a Laravel web application on Heroku involves a few specific steps. Here's a simplified guide:

Prepare Your Laravel Application:

Make sure your Laravel application is set up and works locally.

Ensure you have a Procfile in your project root. If not, create one:

Procfile
Copy code
web: vendor/bin/heroku-php-apache2 public/
Initialize Git Repository:

If your project is not already a Git repository, initialize one:

bash
Copy code
git init
Add and commit your files:

bash
Copy code
git add .
git commit -m "Initial commit"
Create a Heroku App:

If you don't have a Heroku account, sign up at Heroku.

Install the Heroku CLI if you haven't already.

Log in to your Heroku account:

bash
Copy code
heroku login
Create a new Heroku app:

bash
Copy code
heroku create your-app-name
Configure Environment Variables:

Set the necessary environment variables on Heroku. You can use the Heroku CLI or set them through the Heroku dashboard.

bash
Copy code
heroku config:set APP_KEY=$(php artisan key:generate --show --no-ansi)
heroku config:set APP_ENV=production
heroku config:set APP_DEBUG=false
Make sure to set other environment variables as needed for your application.

Configure Database:

For MySQL, add the ClearDB add-on (free plan):

bash
Copy code
heroku addons:create cleardb:ignite
Retrieve your database connection details from the Heroku dashboard and update your .env file:

env
Copy code
DB_CONNECTION=mysql
DB_HOST=your-cleardb-host
DB_PORT=your-cleardb-port
DB_DATABASE=your-cleardb-database
DB_USERNAME=your-cleardb-username
DB_PASSWORD=your-cleardb-password
Push to Heroku:

Push your code to the Heroku remote:

bash
Copy code
git push heroku master
Run Migrations:

Run your database migrations on Heroku:

bash
Copy code
heroku run php artisan migrate
Open the App:

Open your Laravel application in the browser:

bash
Copy code
heroku open
That's it! Your Laravel application should now be deployed on Heroku