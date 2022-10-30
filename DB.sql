CREATE DATABASE crudappdb;

CREATE TABLE policy_details (
  id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  first_name varchar(255) DEFAULT NULL,
  last_name varchar(255) NOT NULL,
  policy_number INT NOT NULL,
  start_date date NOT NULL,
  end_date date NOT NULL NOT NULL,
  premium double,
  added_date datetime DEFAULT CURRENT_TIMESTAMP
);