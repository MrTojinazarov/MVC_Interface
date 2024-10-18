CREATE DATABASE mvcdata;

USE mvcdata;

CREATE TABLE books (
  id int AUTO_INCREMENT PRIMARY KEY,
  name varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  author varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  title text COLLATE utf8mb4_general_ci NOT NULL,
  photo varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  genre varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO books (id, name, author, title, photo, genre) VALUES
('Sirojiddin', 'Abdulla Qodiriy', "Inson tug'ilibtiki vafot etadi, uni hayotiy yollari tasvirlangan", 'public/img/15. Облака.jpg', 'Drama'),
('Xamsa', 'Alisher Navoiy', 'Turkiy va Fors tillarida yozilgan judayam katta kitob', 'public/img/10. Цветы.jpg', 'Asar');

CREATE TABLE users (
  id int AUTO_INCREMENT PRIMARY KEY,
  login varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  password varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  name varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO users (id, login, password, name) VALUES
('qwert@gmail.com', '202cb962ac59075b964b07152d234b70', 'Sirojiddin');
