CREATE TABLE `todo`
(
    `todo_id`       INT(11)      NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `text` VARCHAR(255) NOT NULL
) ENGINE = InnoDB
  CHARSET = utf8;

INSERT INTO `todo` (`todo_id`, `text`)
VALUES (1, 'Atomic habits');
#        (2, 'Ultralearning', 'koko', 100, '2013',  true, false, 'něco o knize', '2000-01-01 01:03:38', 1),
#        (3, 'The answer', 'koko', 100, '2013',  true, false, 'něco o knize', '2000-01-01 01:03:38', 1),
#        (4, 'Scattered minds', 'koko', 100, '2013',  true, false, 'něco o knize', '2000-01-01 01:03:38', 1),
#        (5, 'Hledání knih', 'koko', 342, '1992', true, false, 'něco o knize', '2000-01-01 01:03:38', 1);

CREATE TABLE IF NOT EXISTS page (
                                      page_id INT(11) NOT NULL AUTO_INCREMENT,
                                      title VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
                                      content TEXT CHARACTER SET utf8 COLLATE utf8_czech_ci NULL DEFAULT NULL,
                                      url VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
                                      description VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
                                      controller VARCHAR(255) NULL DEFAULT NULL,
                                      PRIMARY KEY (page_id),
                                      UNIQUE(`url`)
);

INSERT INTO `page` (`title`, `content`, `url`, `description`, `controller`) VALUES
#                                                                                    ('Úvod', '<p>Vítejte na našem webu!</p>\r\n\r\n<p>Tento web je postaven na <strong>jednoduchém MVC frameworku v PHP</strong>. Toto je úvodní článek, načtený z databáze.</p>', 'uvod', 'Úvodní článek na webu v MVC v PHP', NULL),
                                                                                   ('Přihlášení', NULL, 'prihlaseni', 'Přihlášení do uživatelského účtu.', 'Authenticator\\Controllers\\Login'),
                                                                                   ('Stránka nebyla nalezena', '<p>Litujeme, ale požadovaná stránka nebyla nalezena. Zkontrolujte prosím URL adresu.</p>', 'chyba', 'Stránka nebyla nalezena.', 'Controllers\\ErrorController'),
                                                                                   ('Kontaktní formulář', NULL, 'kontakt', 'Kontaktní formulář', 'Controllers\\ContactController'),
                                                                                   ('Služby', '<p>Tvorba webů převážně backend v PHP.</p>', 'sluzby', 'Služby', 'Controllers\\ServiceController'),
                                                                                   ('Tvorba', '<a href="https://github.com/mckillem" target="_blank">Odkaz na můj GitHub profil</a>', 'tvorba', 'Tvorba', 'Controllers\\CreationController'),
                                                                                   ('Administrace webu', NULL, 'administrace', 'Administrace webu', 'Authenticator\\Controllers\\Authenticator');
