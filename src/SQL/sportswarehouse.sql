# ---------------------------------------------------------------------- #
# Target DBMS:           MySQL 5                                         #
# Project name:          Sports Warehouse                                #
# Author:                Shan ali hassan                                        #
# Created on:            2021-01-21 00:00                                # 
# ---------------------------------------------------------------------- #

DROP DATABASE IF EXISTS sportswarehouse;

CREATE DATABASE sportswarehouse;

USE sportswarehouse;

# ---------------------------------------------------------------------- #
# Tables                                                                 #
# ---------------------------------------------------------------------- #
# ---------------------------------------------------------------------- #
# Add table "Category"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE IF NOT EXISTS category(
category_id         INT(11) NOT NULL AUTO_INCREMENT,
category_name       VARCHAR(512),
PRIMARY KEY (category_id)
);

# ---------------------------------------------------------------------- #
# Add table "Brands"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE IF NOT EXISTS brand(
brand_id         INT(11) NOT NULL AUTO_INCREMENT,
brand_name       VARCHAR(512),
brand_photo      VARCHAR(512),
PRIMARY KEY (brand_id)
);

# ---------------------------------------------------------------------- #
# Add table "Item"                                                       #
# ---------------------------------------------------------------------- #

CREATE TABLE IF NOT EXISTS item(
item_id             INT(11) NOT NULL AUTO_INCREMENT,
item_name           VARCHAR(512) NOT NULL,
item_photo          VARCHAR(512),
item_price          DECIMAL(9,2),
item_saleprice      DECIMAL(9,2) NOT NULL,
item_description    TEXT,
item_featured       BOOLEAN,
item_categoryid     INT(11) NOT NULL,
item_brandid        INT(11),
PRIMARY KEY (item_id));

# ---------------------------------------------------------------------- #
# Add table "User"                                                       #
# ---------------------------------------------------------------------- #

CREATE TABLE IF NOT EXISTS user(
user_id             INT(11) NOT NULL AUTO_INCREMENT,
username            VARCHAR(50) NOT NULL,
password            VARCHAR(255) NOT NULL,
PRIMARY KEY (user_id));

# ---------------------------------------------------------------------- #
# Add table "Order Item"                                                 #
# ---------------------------------------------------------------------- #
CREATE TABLE IF NOT EXISTS orderitem(
item_id             INT(11) NOT NULL,
shoppingOrderId     INT(11) NOT NULL AUTO_INCREMENT,
quantity            INT(11),
price               DECIMAL(10, 2) NOT NULL,
user_id             INT(11),
PRIMARY KEY (shoppingOrderId, item_id));

# ---------------------------------------------------------------------- #
# Add table "Shopping Order"                                             #
# ---------------------------------------------------------------------- #
CREATE TABLE IF NOT EXISTS shoppingorder(
shoppingOrderId     INT(11) NOT NULL AUTO_INCREMENT,
orderDate           DATETIME NOT NULL,
firstName           varchar(50) NOT NULL,
lastName            varchar(50) NOT NULL,
address             varchar(200) NOT NULL,
contactNumber       varchar(20) NOT NULL,
email               varchar(255) NOT NULL,
creditCardNumber    varchar(20) NOT NULL,
expiryDate          varchar(4) NOT NULL,
nameOnCard          varchar(50) NOT NULL,
csv                 varchar(3) NOT NULL,
PRIMARY KEY (shoppingOrderId));

# ---------------------------------------------------------------------- #
# Add table "Admin user"                                                 #
# ---------------------------------------------------------------------- #

CREATE TABLE IF NOT EXISTS adminuser(
user_id             INT(11) NOT NULL AUTO_INCREMENT,
username            VARCHAR(50) NOT NULL,
password            VARCHAR(255) NOT NULL,
PRIMARY KEY (user_id));

ALTER TABLE item ADD CONSTRAINT item_cate_fk FOREIGN KEY (item_categoryid) REFERENCES category(category_id);
ALTER TABLE item ADD CONSTRAINT item_brand_fk FOREIGN KEY (item_brandid) REFERENCES brand(brand_id);
ALTER TABLE orderitem ADD CONSTRAINT orderitem_shoppingorder_fk FOREIGN KEY (shoppingOrderId) REFERENCES shoppingorder(shoppingOrderId);
ALTER TABLE orderitem ADD CONSTRAINT orderitem_ibfk_1 FOREIGN KEY (item_id) REFERENCES item (item_id);
ALTER TABLE orderitem ADD CONSTRAINT orderitem_user_fk FOREIGN KEY (user_id) REFERENCES user(user_id);


# ---------------------------------------------------------------------- #
# Info                                                                   #
# ---------------------------------------------------------------------- #
USE sportswarehouse;
# ---------------------------------------------------------------------- #
# Add info into "Category"                                               #
# ---------------------------------------------------------------------- #

INSERT INTO category VALUES (01,'Shoes');
INSERT INTO category VALUES (02,'Helmets');
INSERT INTO category VALUES (03,'Pants');
INSERT INTO category VALUES (04,'Tops');
INSERT INTO category VALUES (05,'Balls');
INSERT INTO category VALUES (06,'Equipment');
INSERT INTO category VALUES (07,'Training gear');

# ---------------------------------------------------------------------- #
# Add info into "Brand"                                               #
# ---------------------------------------------------------------------- #

INSERT INTO brand VALUES (01,'Adidas','Adidas.png');
INSERT INTO brand VALUES (02,'asics','asics.png');
INSERT INTO brand VALUES (03,'Brooks','Brooks.png');
INSERT INTO brand VALUES (04,'Clarks','Clarks.png');
INSERT INTO brand VALUES (05,'Converse','Converse.png');
INSERT INTO brand VALUES (06,'Garmin','Garmin.png');
INSERT INTO brand VALUES (07,'Mizuno','Mizuno.png');
INSERT INTO brand VALUES (08,'NB','NB.png');
INSERT INTO brand VALUES (09,'Nike','Nike.png');
INSERT INTO brand VALUES (10,'Puma','Puma.png');
INSERT INTO brand VALUES (11,'Skins','Skins.png');
INSERT INTO brand VALUES (12,'Speedo','Speedo.png');
INSERT INTO brand VALUES (13,'Suunto','Suunto.png');
INSERT INTO brand VALUES (14,'Wilson','Wilson.png');

# ---------------------------------------------------------------------- #
# Add info into "Item"                                                   #
# ---------------------------------------------------------------------- #

INSERT INTO item VALUES (1001,'Adidas Finale 17 Cap Soccer Ball','1001.jpg',46.00,34.95,"Styled After The Official Match Ball Of Europe's Premier Tournament, This Quality Ball Is Decorated With An Eye-Catching Print Of The Iconic Star-Panel Design. Machine Stitched For A Long Life.",TRUE,05,01);
INSERT INTO item VALUES (1002,'Harsh Pro EPS Skate Helmet','1002.jpg',70.00,70.00,'Harsh PRO A super EPS tested helmet from Harsh, This HX1 Black model is very lightweight and durable, perfect for boys and girls. This great helmet from Harsh is EPS tested to comply with the safety industry standard certificates. With their new "overmold" technology the helmet shell and EPS foam that is injected into the mold, gives no gaps, no deterioration and a phenomenal weight.',FALSE,02,NULL);
INSERT INTO item VALUES (1003,'Nike Sport 600ml Water Bottle','1003.jpg',17.50,15.00,'Nike Sport Water Bottle - Brt Crimson',FALSE,06,09);
INSERT INTO item VALUES (1004,'Red Corner Womens Bout Boxing Glove','1004.jpg',79.95,79.95,'Red Corner Womens Bout Boxing Glove-Black. Tapered glove shape is designed for women to reduce movement and minimise hand fatigue. Outside layer is soft embossed polyurethane. The protective padding has 3 layers of closed cell and air cell foam.',TRUE,07,NULL);
INSERT INTO item VALUES (1005,'Asics Gel Lethal Tigreor 10 IT Football Boots','1005.jpg',160.00,160.00,'The GEL-Lethal Tigreor 10 IT is premium football boot/shoe designed for players wanting the best. Not only does it carry over all the excellent shoe tech from the previous model, such HG10mm (raising the heel by 10mm to minimise injury). Dual Density Outsole (for excellent durability).',FALSE,01,02);
INSERT INTO item VALUES (1006,'Adidas Predator 18.1 FG Football Boot','1006.jpg',299.95,249.95,"It's your ball. Your move. Your chance to prove it. Create what opponents can only imagine. Control what they think they own. It's your pitch. Your crowd. With Predator, you master control. These football boots have a knit upper that provides superior ball control and a stretchy adidas Primeknit collar for ease of entry. The outsole is designed for firm ground.",TRUE,01,01);
INSERT INTO item VALUES (1007,'Classic Brumbies Adult Home Jersey 2018','1007.jpg',94.95,94.95,'Classic Brumbies Adult Home Jersey 2018',TRUE,04,NULL);
INSERT INTO item VALUES (1008,'ISC Brisbane Broncos 2018 Home Jersey','1008.jpg',94.95,94.95,'ISC Brisbane Broncos Adults 2018 Home Jersey',FALSE,04,NULL);
INSERT INTO item VALUES (1009,'ISC Brisbane Broncos 2018 Training Singlet','1009.jpg',94.95,94.95,'ISC Brisbane Broncos Adults 2018 Training Singlet',FALSE,04,NULL);
INSERT INTO item VALUES (1010,'ISC Canberra Raiders 2018 Training Singlet','1010.jpg',94.95,74.95,'ISC Canberra Raiders Adults 2018 Training Singlet',FALSE,04,NULL);
INSERT INTO item VALUES (1011,'ISC Queensland State Of Origin Jersey 2018','1011.jpg',94.95,74.95,'ISC Queensland State Of Origin Adults Jersey 2018',TRUE,04,NULL);
INSERT INTO item VALUES (1012,'Nike Air Max Infuriate Mens Basketball Shoe','1012.jpg',114.95,114.95,"Designed for stability and containment with a cushioned feel, the Men's Nike Air Max Infuriate Low Basketball Shoe locks your foot down using full-length Flywire cables. A 180-degree Max Air unit in the heel helps cushion impact while a phylon midsole provides a comfortable ride.",FALSE,01,09);
INSERT INTO item VALUES (1013,'Nike Alpha Medium Training Duffel Bag','1013.jpg',64.95,64.95,"Men's Nike Alpha (Medium) Training Duffel Bag has an adjustable side clip that allows you to turn it into a convenient cross-body shoulder bag for easy, out-of-the-way carrying like a backpack.",TRUE,06,09);
INSERT INTO item VALUES (1014,'Nike Mens Sportswear Futura HBR 1 Tee','1014.jpg',34.95,34.95,'Nike Mens Sportswear Futura HBR 1 Tee',TRUE,04,09);
INSERT INTO item VALUES (1015,'Nike Mesh Daybreak Running Cap','1015.jpg',34.95,34.95,'Nike Mesh Daybreak Running Cap',FALSE,06,09);
INSERT INTO item VALUES (1016,'Nike Team Hustle D 8 GS Basketball Shoe','1016.jpg',34.95,34.95,"Boys' Nike Team Hustle D 8 (GS) Basketball Shoe is built with a leather upper integrated with foam-backed mesh for comfort. A midfoot strap locks your foot down, while a lightweight, flexible foam midsole provides toe-to-heel cushioning.",FALSE,01,09);
INSERT INTO item VALUES (1017,'Nike Zoom Assersion Mens Basketball Shoe','1017.jpg',34.95,34.95,"Men's Nike Zoom Assersion Basketball Shoe allows you to engage every part of your foot with a micro traction pattern that wraps up the sides. An engineered mesh forefoot band integrates with Flywire technology to keep you locked in during multidirectional movement.",FALSE,01,09);
INSERT INTO item VALUES (1018,'Skins A400 Compression Long Tights','1018.jpg',239.95,199.95,'Our SKINS A400 Men’s Long Tights are constructed using five different technical fabrics and 24 individual panels. These panels follow the natural lines of your muscles and tendons with the seams placed to act as anchor points, offering focused support and stability to major muscle groups.',FALSE,03,11);
INSERT INTO item VALUES (1019,'Spalding WNBL Game Ball Indoor Basketball','1019.jpg',134.95,134.95,'The Spalding WNBL Official Game Ball features a new and improved design with exclusive ZK cover material for advanced moisture management and improved dry and wet grip. The soft carcass and channel design allows for improved grip and control.',FALSE,05,NULL);
INSERT INTO item VALUES (1020,'Sydney City Roosters Adults Home Jersey','1020.jpg',94.95,94.95,'Sydney City Roosters Adults Home Jersey',TRUE,04,NULL);
INSERT INTO item VALUES (1021,'Red Corner Silver Label Focus Kit-Feathers','1021.jpg',149.95,149.95,'Focus kits combine the punch mitt and focus pads together so you can train with a partner. Good focus pads will fit well and feel like an extension of your arm and hand. A well crafted focus pad will have a small ball in the palm which feels snug and means the user doesn’t have to worry about the pad flying off when struck. Adjustable straps at the back of the pad help keep it also in place.',FALSE,07,NULL);

# ---------------------------------------------------------------------- #
# Add info into "admin user"                                             #
# ---------------------------------------------------------------------- #
INSERT INTO adminuser VALUES (1,'admin','$2y$10$J9XLOTFISnMVZZV22/X8u.Lt8ENKaIH4QgOkXwu527OHDhBSooFvq');
INSERT INTO adminuser VALUES (2,'charles','$2y$10$J9XLOTFISnMVZZV22/X8u.Lt8ENKaIH4QgOkXwu527OHDhBSooFvq');

# ---------------------------------------------------------------------- #
# Add info into "user"                                                   #
# ---------------------------------------------------------------------- #
INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
(1, 'customer', '$2y$10$Bek6JmH4pMD2Diql1RC.mOvQqQrKOv16OYZX44h7Q/1ZSTjdmbtzm');
