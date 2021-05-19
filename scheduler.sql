-- Drop DB if exists
DROP DATABASE IF EXISTS schedulerdb;

-- Create new 
CREATE DATABASE schedulerdb;
USE schedulerdb;

CREATE TABLE animes (
    `id`                INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    `name`              VARCHAR(50) NOT NULL,
    `current_episode`   INTEGER UNSIGNED NOT NULL,
    `episodes`          INTEGER UNSIGNED NOT NULL,
    `url`               VARCHAR(255) NOT NULL,
    `release_date`      DATE NOT NULL,
    `release_type`      VARCHAR(20) NOT NULL,
    `status`            VARCHAR(20) NOT NULL
);

CREATE TABLE manga (
    `id`                INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    `name`              VARCHAR(50) NOT NULL,
    `current_chapter`   INTEGER UNSIGNED NOT NULL,
    `chapters`          INTEGER UNSIGNED NOT NULL,
    `url`               VARCHAR(255) NOT NULL,
    `release_date`      DATE NOT NULL,
    `release_type`      VARCHAR(20) NOT NULL,
    `status`            VARCHAR(20) NOT NULL
);