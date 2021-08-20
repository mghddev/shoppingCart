
## About Shopping Cart

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 32"><title>shopping-cart@1x</title><g id="Layer_2" data-name="Layer 2"><g id="E-Commerce"><g id="Shopping_Cart_2x.png" data-name="Shopping Cart@2x.png"><path d="M40,25.24h0l4-18h0A1,1,0,0,0,44,7a1,1,0,0,0-1-1H10.94L9.52.71h0A1,1,0,0,0,8.56,0H1A1,1,0,0,0,1,2H7.8L14,25.29h0a1,1,0,0,0,.56.63A4,4,0,0,0,14,28a4,4,0,0,0,8,0,4,4,0,0,0-.55-2H32.55A4,4,0,0,0,32,28a4,4,0,0,0,8,0,4,4,0,0,0-.6-2.09A1,1,0,0,0,40,25.24ZM35.89,8h5.86l-.89,4H35.45ZM11.47,8h6.63l.44,4h-6Zm2.68,10-1.07-4h5.69l.45,4Zm.54,2h4.75l.44,4H15.77ZM18,30a2,2,0,1,1,2-2A2,2,0,0,1,18,30Zm8-6H21.89l-.44-4H26Zm0-6H21.23l-.45-4H26Zm0-6H20.56l-.44-4H26Zm6.11,12H28V20h4.55Zm.67-6H28V14h5.22Zm.67-6H28V8h5.88ZM36,30a2,2,0,1,1,2-2A2,2,0,0,1,36,30Zm2.2-6H34.12l.44-4h4.53Zm-3.41-6,.45-4h5.19l-.89,4Z"/></g></g></g></svg>

## How to start:
Before every thing it is necessary to create and complete the .env file according to .env.example file.
Copy .env.example file and save it with .env name and customize it according to your environment.

For starting the project and building its containers should be run below command:

``docker-compose up -d --build``

This command would create containers that are needed in this project and run ``composer install`` inside of the php container and install project libraries.

After preparing the application, the below command should be run to create tables of database.

Database is ready, now you should run seeder to and store some random and fake data if you need it

``docker-compose exec shopping_php php artisan``

- 
