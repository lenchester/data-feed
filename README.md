## Data feed
Command line tool based on Laravel that processes given XML file feed.xml and pushes the data of that XML file to DB

First of all
```bash
  composer install
```

Database connection should be properly configured in .env file.

Run migrations to create table, where we will store data from XML file.

```bash
  php artisan migrate
```

Start Data Feed

```bash
  php artisan import:xml 
```
Then enter filename, stored in /storage/data_import

If error is occurred you would see it in console. Also, errors are written to logs/laravel.log.

Program is easily extendable, so different data storage could be configured.
Interface Injection:

In this form, an interface is used to inject dependencies into a class.
The key aspect here is dependency injection, specifically, interface injection. The class depends on an interface rather than a concrete implementation. This promotes loose coupling and makes the code more flexible and testable.

To replace the data storage, implement the DataStorageInterface and bind the new class in the AppServiceProvider.
This pattern reduce efforts needed to code refactoring in case of replacing data storage.


To run tests
```bash
  php artisan test 
```
