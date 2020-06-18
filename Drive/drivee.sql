USE drivee;

#############################
######### ADMIN REGISTRATION#
#############################
CREATE TABLE admin(
admin_id int auto_increment,
admin_fullname varchar(255),
admin_email varchar(255),
admin_password varchar(255),
security_code int,
register_date timestamp,
login_date timestamp,
phone_details text,
admin_address varchar(255),
admin_image text,
primary key(admin_id)
);


#############################
###### CUSTOMER REGISTRATION#
#############################

CREATE TABLE customer(
customer_id int auto_increment,
customer_fullname varchar(255),
customer_email varchar(255),
customer_password varchar(255),
customer_gender varchar(40),
customer_country varchar(33),
customer_city varchar(30),
register_date timestamp,
login_date datetime,
phone_details text,
address varchar(255),
primary key(customer_id)
);

#############################
######### BRAND TABLE ####
#############################

CREATE TABLE brands(
brand_id int not null auto_increment,
brand_name varchar(255),
brand_image text,
primary key(brand_id)
);

#############################
######### CATEGORY TABLE ####
#############################

CREATE TABLE category(
category_id int not null auto_increment,
category_name varchar(255),
category_image text,
primary key(category_id)
);

#############################
######### SUB CATEGORY TABLE ####
#############################
CREATE TABLE subcategory(
subcategory_id int not null auto_increment,
subcategory_name varchar(255),
subcategory_image text,
primary key(subcategory_id)
);


#############################
######### PRODUCT TABLE ####
#############################
CREATE TABLE products(
product_id int not null auto_increment,
product_shop int,
product_category int,
product_subcategory int,
product_title varchar(100),
product_price int,
product_qty int,
product_color varchar(20),
product_descripton text,
product_mainimg text,
product_subimga text,
product_subimgb text,
product_subimgc text,
product_tags text,
post_time datetime,
primary key(product_id),
foreign key (product_shop) references shop(shop_id),
foreign key (product_category) references category(category_id),
foreign key (product_subcategory) references subcategory(subcategory_id)
);




