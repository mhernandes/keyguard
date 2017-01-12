USE keyguard;

CREATE TABLE users (
	mk INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL,
	username VARCHAR(25) NOT NULL,
	email VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL
);

CREATE TABLE accounts (
	mk_user INT NOT NULL,
	mk INT PRIMARY KEY AUTO_INCREMENT,
	title VARCHAR(255) NOT NULL,
	slug VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT accounts_fk FOREIGN KEY (mk_user)  REFERENCES users(mk) ON DELETE RESTRICT ON UPDATE RESTRICT
)ENGINE = InnoDB;

INSERT INTO users(name, username, email, password) 
VALUES('Matheus', 'matheus', 'midia.matheus@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

INSERT INTO accounts(mk_user, title, slug, email, password) 
VALUES(1, 'Facebook', 'facebook', 'midia.matheus@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

INSERT INTO accounts(mk_user, title, slug, email, password) 
VALUES(1, 'Snapchat', 'snapchat', 'midia.matheus@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

INSERT INTO accounts(mk_user, title, slug, email, password) 
VALUES(1, 'Instagram', 'instagram', 'midia.matheus@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');