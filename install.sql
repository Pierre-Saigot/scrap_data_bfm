DROP DATABASE IF EXISTS portfolio;

CREATE DATABASE portfolio DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

use portfolio;

CREATE TABLE projects (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(100),
    content TEXT,
    published_at DATETIME NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
                        
INSERT INTO projects (title, content, published_at)
VALUES
('php7', 'blabla', NOW()),
('VueJS', 'blabla', NOW()),
('algo', 'blabla', NOW()),
('AngularJS', 'blabla', NOW()),
('JS', 'blabla', NOW()),
('Async', 'blabla', NOW())
; 
                        