CREATE DATABASE IF NOT EXISTS contab;

USE contab;

CREATE TABLE IF NOT EXISTS expenses (
  id INT(11) NOT NUll,
  category VARCHAR(30) COLLATE utf8mb4_spanish2_ci, 
  amount DECIMAL(10, 2) NOT NULL,
  expensesDate DATE,
  details TEXT COLLATE  utf8mb4_spanish2_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

ALTER TABLE expenses ADD PRIMARY KEY (id);

ALTER TABLE expenses 
  MODIFY id INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;