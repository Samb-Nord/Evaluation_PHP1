CREATE DATABASE wf3_php_intermediaire_samira;

USE wf3_php_intermediaire_samira;

CREATE TABLE advert (
id INT AUTO_INCREMENT,
title VARCHAR(50) NOT NULL,
description_annonce TEXT NOT NULL,
postal_code VARCHAR(30) NOT NULL,
city VARCHAR(50) NOT NULL,
type_annonce VARCHAR(50) NOT NULL,
price DECIMAL(10,2) NOT NULL,
reservation_message TEXT NULL,
PRIMARY KEY(id)
) ENGINE = INNODB;