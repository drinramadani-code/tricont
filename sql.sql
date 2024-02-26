CREATE TABLE options (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    option_name VARCHAR(256) NOT NULL,
    option_value VARCHAR(256) NOT NULL
);

INSERT INTO options (option_name, option_value) VALUES ('Permalink', 'http://localhost:8080/tricont/');

CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(256) NOT NULL,
    email VARCHAR(256) NOT NULL,
    username VARCHAR(256) NOT NULL,
    password VARCHAR(256) NOT NULL
);