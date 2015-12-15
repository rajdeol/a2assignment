#How to use the solution :#
1. The solution is build on Laravel 4.2 PHP framework with MYSQL database
2. To run the application unzip the code in webroot of your webserver
3. Assuming the webroot url is http://localhost to run the application write http://localhost/public in the browser navigation bar
4. The landing page has button “contact us” click the button and it will open contact us form
5. Fill in the information and if all the validation checks are passed the data will be submitted to the backend
6. The data is saved in the database and a mail is send to the email address configured in the code
7. All the submitted data can be retrieved from database.
8. Data is saved in table “contact_us”

#How to install and configure the solution :#
1. This solution requires a database and a table in the database to work.
2. If you have access to command line tool and can run commands then this can easily be done by using Laravel Migration. Database migration for the table is already placed in app/database/migrations/ 
3. If you do not want to use command line tool then you have to create the required table in database following is the SQL command to use: 
```
CREATE TABLE `contact_us` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `contact_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enquiry_info` text COLLATE utf8_unicode_ci NOT NULL,
  `invoice_number` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
```
4. Once the table is created configure the database details in app/config/database.php starting from line- 56
5. As this application is developed using Laravel Please ensure the steps mentioned on the following link are done : http://laravel.com/docs/4.2

#How to configure SMTP to receive emails:#
1. To receive enquiry form data via emails you need to configure SMTP details in the config file
2. Update app/config/mail.php with SMTP server details. 
3. If you want to use gmail to send mails then update the details in the code below (your_gmail_username, your_gmail_password) and replace the content of the file with it:
```
	return array(
    	'driver' => 'smtp',
	 'host' => 'smtp.gmail.com', 
	'port' => 587,  
	'from' => array('address' => 'test@a2assignment.com', 'name' => 'A2 assignment'), 
    	'encryption' => 'tls', 
	'username' => 'your_gmail_username', 
	'password' => 'your_gmail_password', 
	'sendmail' => '/usr/sbin/sendmail -bs', 
	'pretend' => false, 
);
```
4. After the above steps open file app/controllers/HomeController.php and uncomment the code from line 45 till line 50
The recipient email address is defined in file : app/config/contact.php you can update the recipient email address from there.

#Security Considerations:#
1. CSRF tokens are used to prevent cross-site request forgeries
2. Laravel Eloquent ORM is used to prevent SQL-injections
3. Form submissions are only accepted via POST method on server
4. Data validations are applied on front end form for data sanity
5. HTML entities are stripped

