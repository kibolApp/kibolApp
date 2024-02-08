# kibolApp
The kibolApp project was created for the purpose of passing the PSI 2 course.




https://github.com/kibolApp/kibolApp/assets/115737114/43c6502f-ba0a-4343-bebb-4dd637567bba



### club selection

![918773281bb184590521a7f7448b756a](https://github.com/kibolApp/kibolApp/assets/115737114/b9614525-5901-4905-9f55-6211ad09071b)

### map page
Here is your and clubs localization

![18830ddf89e36cca6ad00fd80a01aa82](https://github.com/kibolApp/kibolApp/assets/115737114/ec02792e-b24b-4058-9316-7e3d72903b8e)

### club zones
Red zones are zones of influence of non-friendly clubs to your club, which means that you are at risk there.

![8f12d531a66fa2afa96b9a132785c766](https://github.com/kibolApp/kibolApp/assets/115737114/59d948c9-3101-4c9f-a4c0-fc395a547478)

### club list
Here you can search for club that you're interest in.

![351b06cc8aab06742194d1b93057e7b0](https://github.com/kibolApp/kibolApp/assets/115737114/03cab8da-9f4a-4292-b1c3-7fa0e06ad0e9)

### Club relations

![e015f4bf098a1bca837256cf3eeeee95](https://github.com/kibolApp/kibolApp/assets/115737114/d5401bf1-331a-497c-a5cb-31c939f1f947)

Admin panel, Profile and more...

# Setup instructions via Docker:

1. The first step is to clone the repository from https://github.com/kibolApp/kibolApp.

2. The second step is to enter the command in the development environment to make composer functions work: ```composer install```.

3. The third step is to enter the command in the development environment to run docker properly (In our case it's Visual Studio Code). 

    You have to download the Docker app from their website at first. The command you need in your development environment:
     ```docker-compose up --build```. 
    It's important to enter the command in the "kibolApp" folder, because if you enter it in the "frontend" folder, this command won't work.

4. The fourth step is to enter the command again in the development environment to "kibolApp" folder: ```php artisan migrate```. Without this command you won't have the
    all migrations you need.

5. The fifth step is to enter the command for our seeders, we are still in the "kibolApp" folder:
 ```php artisan db:seed --class=SeederName```. We have our seeders in the ```kibolApp/database/seeders```, so you have to enter all seeders from this folder using this command.

Now if you did those all things, you can enter your docker app and run the containers to open our app.

# Setup instructions locally:

1. You should download and install for your computer a few things from manufacturer's websites:
    - MySQL
    - Node.js
    - PHP 8.1.16

2. The second step is to enter the command in the development environment to make composer functions work: ```composer install```. Also create new .env file using .env.example, and then generated new key "php artisan key:generate"

3. The third step is to enter the command to make react script work correct: ```npm install```.
     It's important to enter the command in the "frontend" folder, because if you enter it in the "kibolApp" folder, this command won't work correct.

4. The fourth step is to configure your database.

    If you want to configure the database via MySQL Workbench app then you need to make sure you got the MySQL downloaded and you have to modify your .env file like this:
    ```
    DB_CONNECTION=mysql
    DB_HOST=localhost
    DB_PORT=3307
    DB_DATABASE=kibolAppDB
    DB_USERNAME=root
    DB_PASSWORD=root
    ```

    Next step is to add a connection in the MySQL Workbench app using data from the .env file. You have to press the plus button and next enter the data given above from the .env file: Connection Name, Hostname, Port and UserName.

5. The fifth step is to enter the next command for our migrations: ```php artisan migrate```. 
     It's important to enter the command in the "kibolApp" folder, because if you enter it in the "frontend" folder, this command won't work correct.

6. The sixth step is to enter another command for our all seeders: ```php artisan db:seed --class=SeederName```, you can find these seeders in the ```kibolApp/database/seeders```.

Now if you did those all things, you can enter your development environment and run commands to start our project:
- ```cd kibolApp``` and ```php artisan serve```.
- ```cd frontend``` and ```npm start```.

# Possible problems:

- If u have problems with the docker command: ```docker-compose up --build```, it usually displays error in the console: ```react-scripts: not found```, you should check your internet connection first, because the problem is most likely on a weak internet connection.

- If nothing works at all with docker, which shouldn't happen, but if it did, you can run the application locally instead of using Docker.

- If you don't have all data in the database, you have to enter the command for our all seeders with clubs, command looks like this:  
```php artisan db:seed --class=SeederName```. The seeders are in the ```kibolApp/database/seeders```.

# Creators 

- Piotr Fedak        
- Andrzej Budzyń
- Dagmara Skulimowska
- Tomek Barczycki
- Kacper Wojdak
