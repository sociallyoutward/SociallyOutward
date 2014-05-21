1-	Edit the include.php file
2-	Create the Database users table, this is the initial strucute:
	CREATE TABLE `db_name`.`users` (
		`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
		`fb_id` VARCHAR(25) NOT NULL,
		`name` VARCHAR(500) NOT NULL,
		`email` VARCHAR(150) NOT NULL,
		`gender` ENUM('male','female') NOT NULL,
		`birthday` DATE NOT NULL,
		`location` VARCHAR(500) NOT NULL,
		PRIMARY KEY (`id`), UNIQUE (`fb_id`)
	) ENGINE = InnoDB;

You may want to try this locally following this tutorial:
http://www.masteringapi.com/tutorials/how-to-develop-your-facebook-application-locally/6/