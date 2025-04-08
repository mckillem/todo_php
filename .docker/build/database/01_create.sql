CREATE TABLE `todo`
(
    `todo_id`       INT(11)      NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `text` VARCHAR(255) NOT NULL
) ENGINE = InnoDB
  CHARSET = utf8;

# INSERT INTO `message` (`message_id`, `text`, `isbn`, `pages`, `date`, `read`, `own`, `description`, `createdAt`, `createdBy`)
# VALUES (1, 'Atomic habits', 'koko', 100, '2013',  true, false, 'něco o knize', '2000-01-01 01:03:38', 1),
#        (2, 'Ultralearning', 'koko', 100, '2013',  true, false, 'něco o knize', '2000-01-01 01:03:38', 1),
#        (3, 'The answer', 'koko', 100, '2013',  true, false, 'něco o knize', '2000-01-01 01:03:38', 1),
#        (4, 'Scattered minds', 'koko', 100, '2013',  true, false, 'něco o knize', '2000-01-01 01:03:38', 1),
#        (5, 'Hledání knih', 'koko', 342, '1992', true, false, 'něco o knize', '2000-01-01 01:03:38', 1);

