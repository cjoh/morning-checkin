# MorningCheckin
MorningCheckin is a light-weight, mostly plaintext, day to day management application for small teams of great developers and service oriented managers. This helps developers focus on what's important, and managers learn what's going on and who needs help. The system is designed around the concept of a quick check-in with the following components:

###Get Done
Small, achievable goals that you plan on getting done today.

###Got Done
The small achievable goals that you got done yesterday

###Flags
Flags can be coded R, Y, or G for Red, Yellow, and Green respectively. Red flags are flags that are stopping you from getting things done. Yellow flags are flags that might cause trouble, and green flags are causes for celebration, and/or unblocked obstacles.

Each member of a team submits a daily checkin with these components.

The application is built on top of the laravel framework, uses github OAuth for authentication, and is distributed with a GNU Public License. See LICENSE for details.

This app is not intended for lots of users -- instead, it's intent is that you will run it on your own server to manage a small team.

## Easy Installation

1. [Download](https://github.com/cjoh/morning-checkin/zipball/master) the application
2. Edit application/config/database.php to suit your needs, and create a database if you need to
3. Run the necessary migrations:

```shell
php artisan migrate:install
php artisan migrate
```

4. Edit config/morningcheckin.php to set the root etherpad instance, and the github users you'd like to have as part of your system
5. Create a new github application, and get a secret key and id. Add those variables to your auth.php file:

```php
  'github_id' => 'your_github_id',
  'github_secret' => 'your_github_secret'
```


5. Point your webserver's root directory to the morningcheckin/public directory
6. Hit it with your browser.

## 