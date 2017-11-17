Car Rental System
A web service Portal for renting cars as part of DBMS LAB(CSE-302) project
Implemented using MySQL,PHP,JavaSceipt,W3 framework, HTML and CSS.

Installation :
Windows :

	1. Download and Install WampServer
	2. Download source code and Move the sourcecode to "C:\wamp64\www\"
	3. Launch "localhost/phpmyadmin" in browser with username :"root" and password : ""  (Default)
	4. Import car_rental_sys.sql to phpmyadmin 
	5. Launch localhost/bloodbank

Ubuntu :

    Download and Install LAMP (https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-16-04)


2.After installing LAMP and phpMyAdmin in Ubuntu, do the following:

2.1. To put files in /var/www/html you need root permission. For that set the root password(if already not set):
	sudo passwd root

	Now login as root:
	su root

	Give permission to the folder:>
	<code>sudo chmod 755 -R /var/www/html </code>
           		or 
	<code>sudo chmod 755 /var/www/html  </code>


2.2 	su root
	cd /etc/apache2
	nano apache2.conf
	
	Change the below code:
	
	<Directory /var/www/>
 		Options Indexes FollowSymLinks
 		AllowOverride None
 		Require all granted
	</Directory>
	
          	as:<br>
	
	<Directory /var/www/>
 		Options Indexes FollowSymLinks
 		AllowOverride All
 		Require all granted
	</Directory>
	


2.3 	Enable rewrite mode: <br>
	sudo a2enmod rewrite

2.4 	Restart apache server:<br>
	sudo service apache2 restart

3 Download the sourcecode and move it to "/var/www/html/"
4. Launch "localhost/phpmyadmin" in browser import car_rental_sys.sql from extracted sourcecode to phpmyadmin
5. Launch "localhost/project" in broswer 
