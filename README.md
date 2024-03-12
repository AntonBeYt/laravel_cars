# laravel_cars

A small laravel app for an inpound lot containing cars

When setting up double check DB_DATABASE in .env_example.
After setup and migration artisan db:seed should work without any need for flags or manual order of seeders.
To log in either find the users table in MySql and use one of the randos (they all have the same password),
or add your own user with something like:
App\Models\User::create(['name' => 'yourName', 'email' => 'yourEmail@yourEmailAdress.se', 'password' => Hash::make('secretPassword')]);
whith tinker.

On the dashboard you should be able to update the fines of impounded cars, remove cars from the impound and add new impounded cars to the database.

Also remember to seed again or create a new user after running the tests, as the tests clear the database.

The scope of the project is small and the styling hideous but it was fun to make
