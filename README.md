# Image-Uploader
A very basic application designe to upload images. A sort of a DIY attempt to understand web application development.

## Getting Started

### Working of the app

MYSQL database is used to store the images which are uploaded and the corresponding text in a table called “images” in the database called “photos”.
The table “images” stores the location of the images uploaded in the folder where the code resides.
In that folder the actual images that are uploaded also get stored.

### Requirements

* MYSQL Installed.
* PHP 5.5 > enabled.
* Chrome, Safari , Firefox, Internet Explorer.

### These instructions will deploy the project on your computer.
* Save the folder ”Assignment_1” in the “Sites” folder in MACBOOK so as to grant access to the browser.
* In the “login.php” file change the following variables according to the username and password you have have set to access MYSQL.
*	$dbuser = “enter_your_username”
*	$pass = “enter_your_password”
* Save this “login.php” file.
* Make sure you have all the 3 files i.e “login.php” , “index.php” , “style.css” in the same folder and that folder has Read and Write permissions.
* Also the folder from which you are uploading the files also has read and write permissions.
* In your browser , Use the following URL by making required changes regarding your directory.
   “http://127.0.0.1/~”Enter_the_path”/assignment_1/index.php”.

## License
 
 This project is licensed under the MIT license- see the [LICENSE.md](LICENSE.md) file for more details.

    
