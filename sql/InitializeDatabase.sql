CREATE DATABASE survey;
GRANT USAGE ON *.* TO survey@localhost IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON survey.* TO survey@localhost;
FLUSH PRIVILEGES;

USE survey;

CREATE TABLE survey(
	_id int not null AUTO_INCREMENT,
	firstName VARCHAR(50) NOT NULL,
	lastName VARCHAR(50) NOT NULL,
	emailAddress VARCHAR(100) NOT NULL,
	PRIMARY KEY (_id)
	);

ALTER TABLE survey ADD UNIQUE INDEX duplicateEmail (emailAddress);