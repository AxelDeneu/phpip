A port of phpIP from Zend Framework 1 to Laravel has begun here. It includes login functionality, the matter list page, and the matter detail page. It's lighting fast!

To use it, you need to apply the database update script in `/doc/scripts` to an existing `phpip` schema (the original or a copy - the changes are minor).

Logins are based on the `email` and `password` fields in the `actor` table. Authorizations will be implemented through the `default_role` field of the users - set this field to "DBA" to get full permissions in the future.

The passwords are hashed with _bcrypt_ instead of _md5_, and don't use salt. So you need to change all the md5+salt passwords to _bcrypt_ ones. You can use the password reset functionality.

The back-end for operating v2 is identical to that for v1 (Apache, PHP, MySQL, and a virtual host setup pointing to the `public` sub-folder...). See the [v1 instructions](https://github.com/jjdejong/phpip/wiki/Installing). 

## To get going
* Install [composer](https://getcomposer.org/), then run `composer update` in the root folder.
* Create an `.env` file with your database credentials (copy and tailor the provided `.env.example` file).
* Run `php artisan key:generate`; `php artisan config:clear` (a command-line php is required).

To fire a quick test, run `php artisan serve`, and point your browser to http://localhost:8000.
