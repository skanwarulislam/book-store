DROP DATABASE IF EXISTS bookstore;
CREATE database bookstore;
use bookstore;
CREATE TABLE Books(
`id` int(11) NOT NULL,
`isbn` VARCHAR (250) NOT NUll UNIQUE,
`title` varchar(250) NOT NULL,
`addedon` DATE NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE Books CHANGE id id INT(11)AUTO_INCREMENT PRIMARY KEY;

CREATE TABLE Labels(
`id` INT (11) NOT NULL,
`name` VARCHAR (255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE Labels CHANGE id id INT(11)AUTO_INCREMENT PRIMARY KEY;

CREATE TABLE book_label(
`book_id` INT(11) NOT NULL,
`label_id` INT(11) NOT NULL
)