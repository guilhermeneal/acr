DROP DATABASE IF EXISTS  acr05;
CREATE DATABASE acr05;

USE acr05;

DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users 
(
	ID int(11) NOT NULL AUTO_INCREMENT
    ,Username varchar(100)
	,Name varchar(100)
	,Address varchar(100)
    ,Email varchar(100)
	,PRIMARY KEY (`ID`)
);

DROP PROCEDURE IF EXISTS create_new_user;
DROP PROCEDURE IF EXISTS get_all_users;
DELIMITER //
CREATE PROCEDURE create_new_user
(
    IN pUsername VARCHAR(100),
    IN pName VARCHAR(100),
    IN pAddress VARCHAR(100),
    IN pEmail VARCHAR(100)
)
BEGIN
    INSERT INTO users (Username, Name, Address, Email)
    VALUES (pUsername, pName, pAddress, pEmail);
END//

CREATE PROCEDURE get_all_users()
BEGIN
    SELECT ID, Username, Name, Address, Email FROM users;
END//
DELIMITER ;
