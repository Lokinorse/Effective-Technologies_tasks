CREATE TABLE `books` (
  	`id` INT(5) unsigned NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(1000),
PRIMARY KEY(`id`)
) DEFAULT CHARSET=utf8mb4;


INSERT INTO `books` (`id`, `title`) VALUES
(1, 'I, Robot'),
(2, 'Pebble in the Sky'),
(3, 'The Bicentennial Man'),
(4, 'Asimov’s Guide to Science'),
(5, 'Asimov’s Guide to the Bible'),
(6, 'The End of Eternity'),
(7, 'Foundation'),

(8, 'Surely You are Joking, Mr. Feynman!'),
(9, 'The Feynman Lectures on Physics'),

(10, 'Animal Farm'),
(11, 'Burmese Days'),
(12, 'Nineteen Eighty-Four');


CREATE TABLE `authors` (
  	`id` INT(4) unsigned NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(1000),
PRIMARY KEY(`id`)
) DEFAULT CHARSET=utf8mb4;


INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'Isaac Asimov'),
(2, 'George Orwell'),
(3, 'Richard Phillips Feynman');


CREATE TABLE `autorship` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`authorId` INT(4),
	`bookId` INT(5),
PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8mb4;


INSERT INTO `autorship` (`id`, `authorId`, `bookId` ) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 3, 8),
(9, 3, 9),
(10, 2, 10),
(11, 2, 11),
(12, 2, 12);

--
-- запрос, выдающий авторов, написавших не более 6 книг:
--
SELECT name
FROM authors 
WHERE  id IN (
	SELECT authorId 
	FROM autorship 
	GROUP BY authorId
	HAVING COUNT(*)<6      
)



