CREATE TABLE options (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    option_name VARCHAR(256) NOT NULL,
    option_value VARCHAR(256) NOT NULL
);

INSERT INTO options (option_name, option_value) VALUES ('Permalink', 'http://localhost/tricont/');

CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(256) NOT NULL,
    email VARCHAR(256) NOT NULL,
    username VARCHAR(256) NOT NULL,
    password VARCHAR(256) NOT NULL
);

CREATE TABLE events (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(256) NOT NULL,
    event_items VARCHAR(256) NOT NULL,
    event_participants VARCHAR(256) NOT NULL,
    event_leader INT(11) NOT NULL
);

INSERT INTO events (event_name, event_items, event_participants, event_leader) VALUES ('Udhetimi ne Shqiperi', ' ', '2, 3', '2');

CREATE TABLE cek (
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    event_id INT(11) NOT NULL,
    cek_name VARCHAR(256) NOT NULL,
    cek_price VARCHAR(256) NOT NULL,
    paid_by INT(11) NOT NULL
)

INSERT INTO cek (event_id, cek_name, cek_price, paid_by) VALUES (1, 'Dark me 02/03/2024', '115.5', '2');

CREATE TABLE expenses (
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cek_id INT(11) NOT NULL,
    title VARCHAR(256) NOT NULL,
    amount VARCHAR(256) NOT NULL,
    date VARCHAR(256) NOT NULL,
    paid_by INT(11) NOT NULL,
    for_whom VARCHAR(256) NOT NULL
);

INSERT INTO expenses (cek_id, title, amount, date, paid_by, for_whom) VALUES (1, 'Picnic', '14.5', '05/03/2024', 2, '2, 4, 5');
INSERT INTO expenses (cek_id, title, amount, date, paid_by, for_whom) VALUES (1, 'Gas', '50', '06/03/2024', 2, '2, 4, 5');