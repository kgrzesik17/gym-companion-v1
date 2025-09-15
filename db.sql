CREATE DATABASE gymcompanionv0
USE gymcompanionv0

CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_login VARCHAR(32) NOT NULL,
    user_password VARCHAR(60) NOT NULL
)