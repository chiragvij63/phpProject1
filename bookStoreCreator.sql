                                 
CREATE DATABASE IF NOT EXISTS `bookStore`;

CREATE TABLE `BookInventory` ( 
    bookID int(10) AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    book_name varchar(50) NOT NULL, 
    quantity int(10) NOT NULL);
    
CREATE TABLE `orders` (
  orderID int(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  firstname varchar(50) NOT NULL,
  lastname varchar(50) NOT NULL,
  payment varchar(50) NOT NULL,
  bookID int(10) NOT NULL
) 