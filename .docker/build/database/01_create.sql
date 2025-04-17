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

INSERT INTO `page` (`title`, `content`, `url`, `description`, `controller`)
VALUES ('Úvod', '<p>Vítejte na mé stránce.</p>\r\n\r\n<p>Najdete na ní ukázku mé tvorby a nabídku služeb spolu s kontaktem.</p>', 'uvod', 'Úvodní stránka', NULL),
       ('Služby', '<p>Tvorba webů převážně backend v PHP.</p>', 'sluzby', 'Služby', 'Controllers\\Service'),
       ('Tvorba', '<a href="https://github.com/mckillem" target="_blank">Odkaz na můj GitHub profil</a>', 'tvorba', 'Tvorba', 'Controllers\\Creation'),
       ('Kontaktní formulář', NULL, 'kontakt', 'Kontaktní formulář', 'Controllers\\Contact'),
       ('Přihlášení', NULL, 'prihlaseni', 'Přihlášení do uživatelského účtu.', 'Authenticator\\Controllers\\Login'),
       ('Stránka nebyla nalezena', '<p>Litujeme, ale požadovaná stránka nebyla nalezena. Zkontrolujte prosím URL adresu.</p>', 'chyba', 'Stránka nebyla nalezena.', 'Controllers\\Error'),
       ('Editor', NULL, 'editor', 'Editor stránek', 'Pages\\Controllers\\Editor'),
       ('Seznam stránek', NULL, 'seznam-stranek', 'Seznam stránek', 'Pages\\Controllers\\PageList'),
       ('Administrace webu', NULL, 'administrace', 'Administrace webu', 'Authenticator\\Controllers\\Authenticator');
