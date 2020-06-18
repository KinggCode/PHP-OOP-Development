CREATE DATABASE  skates;
USE skates;

#Users Table 
CREATE TABLE users(
timestamp timestamp,
user_id int not null auto_increment,
user_firstname varchar(255),
user_lastname varchar(255),
user_age int,
user_gender varchar(255),
username varchar(200),
user_address varchar(255),
email varchar(255),
password varchar(255),
user_profile varchar(255),
primary key(user_id)
);

#Admin Table 
CREATE TABLE admin(
timestamp timestamp,
admin_id int not null auto_increment,
admin_firstname varchar(255),
admin_lastname varchar(255),
admin_age int,
admin_profession varchar(255),
admin_gender varchar(255),
admin_address varchar(255),
admin_email varchar(255),
admin_password varchar(8),
security_code int,
primary key(admin_id)
);


#Brands Table 
CREATE TABLE brands(
timestamp timestamp,
brand_id int not null auto_increment,
brand_name varchar(255),
brand_description varchar(255),
brand_logo varchar(255),
primary key(brand_id)
);

#Category Table 
CREATE TABLE category(
timestamp timestamp,
category_id int not null auto_increment,
category_name varchar(255),
category_description varchar(255),
category_image varchar(255),
primary key(category_Id)
);

#Relationship Table : {"Brand Table" & "Category Table"}
CREATE TABLE brandCategory(
timestamp timestamp,
brandCat int not null auto_increment,
admin_id int,
brand_id int,
category_id int,
primary key(brandCat),
foreign key (admin_id) references admin(admin_id),
foreign key (brand_id) references brands(brand_id),
foreign key (category_id) references category(category_id)
);

#Products Table 
CREATE TABLE Products(
timestamp timestamp,
product_id int not null auto_increment,
product_name varchar(255),
product_description varchar(255),
product_color varchar(255),
product_qty int,
product_state varchar(255),
primary key(product_id)
);


