-- Drop the database if it exists previously
DROP DATABASE IF EXISTS week6demo;

-- Create a new one
CREATE DATABASE week6demo;

-- Make it the active database
USE week6demo;

CREATE TABLE shoe (
	id INT AUTO_INCREMENT PRIMARY KEY,
	brand VARCHAR(64) NOT NULL,
	type VARCHAR(16) NOT NULL,
	size INT NOT NULL,
	smells CHAR(1) NOT NULL,
	color CHAR(7) NOT NULL
);

INSERT INTO shoe (brand, type, size, smells, color)
	VALUES("Nike","sneakers",11,'1',"#FFFFFF"),
	("Addidas","sandals",8,'1',"#0000AA"),
	("Merells","hikers",11,'1',"#FFAA00");


