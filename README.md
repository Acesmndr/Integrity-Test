Integrity-Test
==============
* Instructions for share url :
1. Open js/social.js
2. Replace share_url's value with the url of the index page of the website!

* Manual Instructions for setup :

1. Download the package from the link: https://github.com/Acesmndr/Integrity-Test.git
2. Copy the whole folder Integrity-Test in your local host/server.
3. Go to the user configuration file for your server(eg: apache2 has “httpd.conf” file in “/etc/apache2” folder )
4. Your server must include the code available in the “httpd.conf” file from the package.
5. Edit the path for where you want to keep the password file for the package.You must edit the “httpd.conf” file in your local server and in the “ .htaccess “ file from the package.The path specified is the absolute path up to the “.htpasswd” file.
6. Go to the desired path where you have set the path for the  “ .htpasswd” file.

Enter the command:   htpasswd -bc  .htpasswd  username password
 	
	It is for the valid username and password.
NOTE: Delete the “httpd.conf” file from the package.


* Manual Instruction for database setup :	
 	
1. Create new database “Integrity”.
2. Import "Integrity.sql" from the package from "database/" folder.
3.  Change the password in the package files in “database.init.php” and “lib/database.init.php”  
         to your localhost password.
4.   Change the required mode of the package to executable.



	
 	
	



