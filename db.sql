CREATE DATABASE gymcompanionv0;
USE gymcompanionv0;

CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_login VARCHAR(32) NOT NULL,
    user_password VARCHAR(60) NOT NULL
);

CREATE TABLE exercises (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(64) NOT NULL,
    user_id INT NOT NULL,
    weight_in_kg FLOAT NOT NULL,
    set_count INT NOT NULL,
    repeat_count INT NOT NULL,
    difficulty INT NOT NULL
);