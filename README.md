Integrity-Test
==============
* Instructions for share url :
1. Open js/social.js
2. Replace share_url's value with the url of the index page of the website!

* Manual Instructions for setup :

1. Download the package from the link: https://github.com/Acesmndr/Integrity-Test.git
2. Copy the whole folder Integrity-Test in your local host.
3. Go to the user configuration file for your server(eg: apache2 has “httpd.conf” file in “/etc/apache2” folder )
4. Your server must include the code available in the “httpd.conf” file from the package.
5. Edit the path for where you want to keep the password file for the package.You must edit the “httpd.conf” file in your local server and in the “ .htaccess “ file from the package.The path specified is the absolute path up to the “.htpasswd” file.
6. Go to the desired path where you have set the path for the  “ .htpasswd” file.

Enter the command:   htpasswd -bc  .htpasswd  username password
 	
	It is for the valid username and password.
NOTE: Delete the “httpd.conf” file from the package.


* Manual Instruction for database setup :	
 	
1. Create new database “Integrity”.
2. Create table “Question”.
2.1 Insert attribute:
 (Name: “qid” ,Type: int(11), Attribute: -, Null: no, Default: none,
	Extra: AUTO_INCREMENT)
	2.1 Insert attribute:
(Name: “question” ,Type: tinytext, Attribute: -, Null: no, Default: none,
	Extra: - )
	2.2 Insert attribute:
(Name: “aid” ,Type: int(11), Attribute: -, Null: no, Default: none,
	Extra:- )
	2.3 Insert attribute:
(Name: “correct_answer” ,Type: int(11), Attribute: -, Null: no, Default: none,
	Extra:- )
	2.4 Insert attribute:
(Name: “date” ,Type: text, Attribute: -, Null: no, Default: none,
	Extra:- )
NOTE: Attributes are case sensitive.





3.   Create table “answers”.
	3.1 Insert attribute:
(Name: “paid” ,Type: int(11), Attribute: -, Null: no, Default: none,
	Extra: AUTO_INCREMENT)
	3.2 Insert attribute:
 (Name: “a_id” ,Type: int(11), Attribute: -, Null: no, Default: none,
	Extra:- )
	3.3 Insert attribute:
(Name: “answers” ,Type:tinytext, Attribute: -, Null: no, Default: none,
	Extra:- )
	3.4 Insert attribute:
(Name: “hint” ,Type: tinytext,  Attribute: -, Null: no, Default: none,
	Extra: AUTO_INCREMENT)
	3.5 Insert attribute:
(Name: “qid” ,Type: int(11), Attribute: -, Null: no, Default: none,
	Extra:- )
	
NOTE: Attributes are case sensitive.

4.    Create table “score_table”
	4.1 Insert attribute:
(Name: “id” ,Type: int(11), Attribute: -, Null: no, Default: none,
	Extra: AUTO_INCREMENT)
	4.2 Insert attribute:
(Name: “date” ,Type: text, Attribute: -, Null: no, Default: none,
	Extra:- )
	4.3 Insert attribute:
(Name: “score” ,Type: int(11), Attribute: -, Null: no, Default: none,
	Extra:- )
	4.4 Insert attribute:
(Name: “totalscore” ,Type: int(11), Attribute: -, Null: no, Default: none,
	Extra:- )
	4.5 Insert attribute:
(Name: “total_question” ,Type: int(11), Attribute: -, Null: no, Default: none,
	Extra:- )

NOTE: Attributes are case sensitive.
  
5.  Change the password in the package files in “database.init.php” and “lib/database.init.php”  
         to your localhost password.
6.   Change the required mode of the package to executable.



	
 	
	



