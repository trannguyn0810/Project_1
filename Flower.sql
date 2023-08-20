CREATE database flower;
CREATE TABLE categories(
id INT PRIMARY KEY AUTO_INCREMENT,
category_name VARCHAR (255) UNIQUE NOT NULL
);
INSERT INTO categories(id, category_name) VALUE 
('1','hoa sáp'),
('2','hoa giấy');

CREATE TABLE types(
id INT PRIMARY KEY AUTO_INCREMENT,
type_name VARCHAR (255)
);
INSERT INTO types(id, type_name) VALUE 
('1','hoa hồng'),
('2','hoa tulip');

CREATE TABLE admins(
id INT PRIMARY KEY AUTO_INCREMENT,
admin_name VARCHAR (255),
email VARCHAR (255),
password VARCHAR (255),
phone VARCHAR (20),
address VARCHAR(255),
gender VARCHAR(255)
);
INSERT INTO admins(id, admin_name, email, password, phone,address,gender) VALUE 
('1','Trang','trang12@gmail.com','123','0947826472','BN','female'),
('2','Dương','dương45@gmail.com','245','0938058558','HN','male');

CREATE TABLE customers(
id INT PRIMARY KEY AUTO_INCREMENT,
customer_name VARCHAR (255),
phone VARCHAR (20),
email VARCHAR (255),
password VARCHAR (255),
re_password VARCHAR (255),
address VARCHAR(255),
gender VARCHAR(255)
);
INSERT INTO customers(id, customer_name,phone,email, password,re_password,address,gender) VALUE 
('1','Thảo','0947826472','thảo12@gmail.com','123','123','BN','female'),
('2','Du','0938058558','du45@gmail.com','245','245','HN','male');

CREATE TABLE flowers(
id  INT PRIMARY KEY AUTO_INCREMENT,
name VARCHAR (255) UNIQUE NOT NULL,
color TEXT,
price FLOAT UNSIGNED,
price_sale FLOAT UNSIGNED,
quantity_flower INT UNSIGNED,
type_id INT,
category_id INT,
description TEXT,
image VARCHAR(255),
FOREIGN KEY (type_id) REFERENCES types(id),
FOREIGN KEY (category_id) REFERENCES categories(id)
);
INSERT INTO flowers(id, name,color,price, price_sale, quantity_flower,type_id,category_id,description,image) VALUE 
('1','hoa hồng sáp','đỏ','150000','120000','120','1','1','hoa sáp thơm,mịn','hoa sap_2023_05_29_03_42_33.jpg');
SELECT flowers.*,categories.category_name,types.type_name
FROM (flowers INNER JOIN categories 
ON flowers.category_id = categories.id) 
INNER JOIN types ON flowers.type_id = types.id;

CREATE TABLE orders(
id  INT PRIMARY KEY AUTO_INCREMENT,
date_buy DATETIME,
total INT,
status VARCHAR(100),
admin_id INT,
customer_id INT,
/FOREIGN KEY (admin_id) REFERENCES admins(id),
FOREIGN KEY (customer_id) REFERENCES customers(id)
);
INSERT INTO orders(id,date_buy,total,status,admin_id,customer_id) VALUE 
('1','2023-06-12','123000','PENDING','2','1'),
('2','2023-06-11','330000','PENDING','1','2');
SELECT orders.*,admins.admin_name,
customers.customer_name,customers.phone,customers.email,customers.address,customers.gender
FROM (orders INNER JOIN admins ON orders.admin_id = admins.id) 
INNER JOIN customers ON orders.customer_id = customers.id;
/*SELECT orders.*,
customers.customer_name,customers.phone,customers.email,customers.address,customers.gender
FROM orders INNER JOIN customers ON orders.customer_id = customers.id*/


CREATE TABLE order_details(
order_id INT,
flower_id INT,
quantity INT UNSIGNED,
PRIMARY KEY(order_id, flower_id),
FOREIGN KEY (order_id) REFERENCES orders(id),
FOREIGN KEY (flower_id) REFERENCES flowers(id)
);
INSERT INTO order_details(order_id,flower_id,quantity) VALUE 
('1','2','200'),
('2','1','120');
SELECT order_details.*,flowers.*
FROM order_details INNER JOIN flowers ON order_details.flower_id = flowers.id;


SELECT flowers.image, flowers.name, flowers.price 
FROM flowers JOIN order_details
ON order_details.flower_id = flowers.id 
JOIN orders 
ON orders.id = order_details.order_id
GROUP BY order_details.order_id;