# Y76-task
Y76-task

link to firebase project database: https://console.firebase.google.com/u/0/project/y76-task/overview

middleware folder project should be run on port 8000

The laravel project in "main-app" folder will be the main software that will be responsible for sending an api request and communictaing with the Laravel project in "middleware" folder, the Laravel project in "middleware" folder is responsible for communicating with the database in our case "reading" or "writing" data into firestore so our main software doesnt have direct access to the firestore database. 

I used kreait/laravel-firebase and google/cloud-firestore packages in order to integrate firebase with laravel.
I also used Mailtrap to send an email when an order is added.
I used the view folder in the main-app responsible for the interface for testing adding and viewing orders

Ideally there would be another collection in firestore database for products to choose from and each order would have array of productids but due to lack of time remaining I kept it simple with each order requiring a title between "chocolate, vanilla, strawberries and cheese" and quantity

