
## About Shopping Cart
This application provides an endpoint for order pricing calculation.

### Features Overview
- Dockerized and isolated app
- Error handling
- Test (unit and feature) developed with AAA pattern for making test.
- API documentation prepared by postman and is placed in `/documentionAPI` folder in root of project

### Challenge
The most import part of project is calculation of order for different rules and different special prices. 
The goal is calculating minimum total price for an order according to active rules of goods. Because of existence of different combination of rules for every order, it is needed to fetch all possible combinations.
It is challenge of this problem.

### Solution
The coin changing problem is a well-known problem to the computer scientists. The problem is a good example of the
recursive nature of many problem-solving techniques. In this problem, we want to find all combinations of a finite set of
monetary value coins for making change. 
Finally, after fetching combinations with coin change algorithm, we calculate total price for every combination and minimum value is the calculated total price.

## Installation guide
Follow these steps to simply run the project.

### Clone the project
Clone this repository to your local machine using the following command:

``git clone git@github.com:mghddev/shoppingCart.git``


### Environment variables
There is a `.env.example` file in the project root directory containing OS level environment variables that are used for deploying the whole application.
Every single variable inside the file has a default value, so you do not need to change them; But you can also override your own variables. First copy the example file to the `.env` file:

``cd /path-to-project``

``cp .env.example .env``


Then open your favorite text editor like `vim` or `nano` and change the variables. All variables have comments which describe them.


### Start Docker
You should build the project docker containers at first. Run below command at path of project:

``docker-compose up -d --build``

This command would create containers that are needed in this project and run ``composer install`` inside of the php container and install project libraries.

It would be run all containers besides building them. 
This project has 4 different containers are created as below:
- php:8.0.0rc1-fpm with shopping_php name
- nginx:1.17.7 with shopping_web name
- mysql:8.0.22 with shopping_mysql name
- phpmyadmin/phpmyadmin:5.0.1 with shopping_phpmyadmin name

### Database
After preparing the application, the below command should be run to create tables of database.

``docker-compose exec shopping_php php artisan migrate``

Database is ready, now you should run seeder to and store some random and fake data if you need it.

``docker-compose exec shopping_php php artisan``

## Test

There are Unit test of calculation coin change besides the feature test of calculating price api. There are placed in `/tests` folder of project and would be run with below command:

``docker-compose exec shopping_php php artisan test``


## Author
Mohammad Ghaderi Darebaghi 
  - [Linkedin](https://www.linkedin.com/in/mohammad-ghaderi-69b8569b/)
  - [Github](https://github.com/mghddev)
