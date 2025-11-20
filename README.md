# G2K2

## Group Grading Knowledge Kaffey

Side project to allow students  to grade their group projects.

This is a Laravel project in the process of being developed, consider this a work in progress in alpha version.
I used already it once with my classroom and it worked well, but I'm not sure if it will work for you.

Main problem is that there is absolutely no documentation and that there is no way to identify the students in a particular organization. Basically, that means you need to refresh the database every time you use it!.

I'm not sure if I will continue to develop it, but if you want to use it, you can use it as a starting point.

If you want to contribute, please fork the project and make a pull request.

### Installation

```
composer install
```

Look for .env file and fill it with your own values.

```
php artisan migrate
```

### Usage


```
php artisan serve
```


### todo

- create a better readme
- add school and course in order to assign students to a specific course/school
- create an installation guide
- create a user documentation