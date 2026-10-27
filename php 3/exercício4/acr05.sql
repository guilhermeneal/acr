-- Executa este script no MySQL do Laragon através do Workbench.
-- Atenção: recria a base de dados acr05 e apaga os dados atuais dessa base.
DROP DATABASE IF EXISTS acr05;
CREATE DATABASE acr05 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE acr05;

CREATE TABLE users (
    ID INT NOT NULL AUTO_INCREMENT,
    Username VARCHAR(100),
    Name VARCHAR(100),
    Address VARCHAR(100),
    Email VARCHAR(100),
    PRIMARY KEY (ID)
);

DELIMITER //
CREATE PROCEDURE create_new_user(
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
