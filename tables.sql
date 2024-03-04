CREATE TABLE IF NOT EXISTS `products`(
	`product_id` int(11) not null auto_increment,
	`product_name` varchar(100)not null,
	`product_category` varchar(255)not null,
	`product_description` varchar(255)not null,
	`product_image` varchar(255)not null,
	`product_image2` varchar(255)not null,
	`product_image3` varchar(255)not null,
	`product_image4` varchar(255)not null,
	`product_price` decimal (6,2)not null,
	`product_special_offer` varchar(100)not null,
	`product_color` varchar(100)not null,
	primary key(`product_id`)
)engine=InnoDB default charset=latin1;

CREATE TABLE IF NOT EXISTS `orders`(
	`order_id` int(11) not null auto_increment,
	`order_cost` decimal(6,2)not null,
	`order_status` varchar(100)not null default 'on_hold',
	`user_id` int(11)not null,
	`user_phone` int(11)not null,
	`user_city` varchar(255)not null,
	`user_adderss` varchar(255)not null,
	`order_date` DATETIME  not null current_timestamp ,
	primary key(`order_id`)
)engine=InnoDB default charset=latin1

CREATE TABLE IF NOT EXISTS `order_items`(
	`item_id` int(11) not null auto_increment,
	`order_id` int(11)not null,
	`product_id` varchar(255)not null,
	`product_name` varchar(255)not null,
	`product_image` varchar(255)not null,
	`user_id` varchar(255)not null,,
	`order_date` DATETIME  not null current_timestamp ,
	primary key(`item_id`)
)engine=InnoDB default charset=latin1;

CREATE TABLE IF NOT EXISTS `users`(
	`user_id` int(11) not null auto_increment,
	`user_name` varchar(100)not null,
	`user_email` varchar(100)not null default 'on_hold',
	`user_password` varchar(100)not null,
	primary key(`order_id`)
	unique key  'UX_Constraint'(`user_email`)
)engine=InnoDB default charset=latin1;

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`)
VALUES ('12', 'orange_leggin', 'woman', 'Softy Orange Leggin Set',
LOAD_FILE('CC:\\xampp\\htdocs\\FitHorizon\\assets\\images\\p1.png'), 
LOAD_FILE('CC:\\xampp\\htdocs\\FitHorizon\\assets\\images\\p2.png'),
LOAD_FILE('CC:\\xampp\\htdocs\\FitHorizon\\assets\\images\\p3.png'), 
LOAD_FILE('CC:\\xampp\\htdocs\\FitHorizon\\assets\\images\\p4.png'), '$23.00', '30%', 'orange');

INSERT INTO users (user_id , user_name, user_email, user_password) VALUES
('12','paraskevi' 'eva@gmail.com', '12345667')
('13','eva','eva.asprou99@gmail.com', '12345')
;
