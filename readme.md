# What is this?
This is a set of classes and helpers to offer a standard API for some of the most common functionality I use in my Laravel applications.

It includes some helper api responses, unified date/time formats controlled globally and base repository/services to enforce and support the common repoistory and service patterns.

Also it ships with a basic user groups and permissions with the necessary User class and the middleware to make everything just work out of the box.

# Why is this a thing?
Because I found myself mostly repeating some of the functionality in most of my APIs. It's about time to unify all of that repeated code into an updateable manageable composer package yeah?

# Included features:
1. Out-of-the-box login, registration with basic necessary required data
2. A simple user group/permissions system.
3. `scaffold:entity` artisan command which generates a new Scaffold Entity (Controller, Model, Migration, Resource, Service, Repository, Create and Update Requests).
4. Helpful middlewares that do common functionality like setting application language, checking if user has specific required permissions and checking an object in request belongs to the user trying to perform the action.
5. Other cool stuff, just check the code.
