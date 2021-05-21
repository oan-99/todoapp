create database todoapp;


CREATE TABLE `todoapp`.`users` ( 
`userid` INT UNSIGNED auto_increment NOT NULL primary key,
`email` VARCHAR(100) NOT NULL unique, 
`pass` VARCHAR(255) NOT NULL,
`username` CHAR(10) NOT NULL unique) 
  ENGINE = InnoDB;

CREATE TABLE `todoapp`.`tasks` ( 
    `taskid` INT UNSIGNED auto_increment NOT NULL primary key, 
    `title` VARCHAR(255) NOT NULL , 
    `priority` TINYINT UNSIGNED NOT NULL check (priority in (0, 1, 2)) , 
    `description` TEXT NOT NULL , 
    `labels` TINYTEXT, 
    `userid` INT UNSIGNED NOT NULL, 
    foreign key (userid) references todoapp.users(userid)) 
    ENGINE = InnoDB;


-- Sample Data

insert into todoapp.users (email, pass, username) values
("jacob@abc.com", MD5("abc"), "jacob"),
("numan@asd.com", MD5("asd"), "numan"),
("butt@qwe.com", MD5("qwe"), "butt");

insert into todoapp.tasks (title, priority, description, labels, userid) values
("Wash dishes", 0, "Go home and wash them!", "chores", 1), -- user one
("Mend shoes", 2, "Go to cobbler and have them mended!", NULL, 1), -- user one
("Buy grocery", 1, "Fetch the list and buy them!", "shopping, grocery, budgeting, list", 1), -- user one
("Wash dishes", 0, "Go home and wash them!", "chores", 2), -- user two
("Mend shoes", 2, "Go to cobbler and have them mended!", NULL, 2), -- user two
("Buy grocery", 1, "Fetch the list and buy them!", "shopping, grocery, budgeting, list", 2), -- user two
("Wash dishes", 0, "Go home and wash them!", "chores", 3), -- user three
("Mend shoes", 2, "Go to cobbler and have them mended!", NULL, 3), -- user three
("Buy grocery", 1, "Fetch the list and buy them!", "shopping, grocery, budgeting, list", 3); -- user three