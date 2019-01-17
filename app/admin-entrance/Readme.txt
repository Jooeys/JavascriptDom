How to run project:
1) Create a database called multi_login
2) create a table users with the following fields:
	- id - int(11)
	-username - varchar(100)
	-email - varchar(100)
	-user_type - varchar(20)
	-password - varchar(100)
3) Start apache and mysql and launch site on browser
4) In order to create an admin, use a client like phpmyadmin and manually create a user with user_type admin. Use this user to login and be able to create other users.


CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
