.mode columns
.headers on

PRAGMA foreign_keys=OFF;

DROP TABLE IF EXISTS Restaurant;
DROP TABLE IF EXISTS Menu;
DROP TABLE IF EXISTS Category;
DROP TABLE IF EXISTS Dishes;
DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Customer;
DROP TABLE IF EXISTS DishCategories;
DROP TABLE IF EXISTS MenuDish;
DROP TABLE IF EXISTS MenuOrder;
DROP TABLE IF EXISTS DishOrder;
DROP TABLE IF EXISTS RestaurantOrder;
DROP TABLE IF EXISTS RestaurantOwner;
DROP TABLE IF EXISTS Review;
DROP TABLE IF EXISTS UserFavRest;
DROP TABLE IF EXISTS UserFavDish;

PRAGMA foreign_keys=ON;

CREATE TABLE User (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    name TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    address TEXT,
    phone INTEGER,
    photoPath TEXT DEFAULT '/../images/user.jpg'
);

CREATE TABLE Customer (
    id INTEGER PRIMARY KEY,
    CONSTRAINT CUSTOMER_USER_FK FOREIGN KEY (id) REFERENCES User(id)
);

CREATE TABLE RestaurantOwner (
    id INTEGER PRIMARY KEY,
    CONSTRAINT OWNER_USER_FK FOREIGN KEY (id) REFERENCES User(id)
);

CREATE TABLE Restaurant (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(255) NOT NULL UNIQUE,
    address VARCHAR(255) NOT NULL,
    categoryID INT NOT NULL,
    ownerID INT NOT NULL,
    photoPath TEXT DEFAULT "/../images/noimage.jpg",
    phone INTEGER,
    CONSTRAINT RESTAURANT_OWNER_FK FOREIGN KEY (ownerID) REFERENCES RestaurantOwner(id),
    CONSTRAINT CATEGORY_FK FOREIGN KEY (categoryID) REFERENCES Category(id)
);

CREATE TABLE RestaurantOrder(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    customerID INTEGER NOT NULL,
    photoPath TEXT DEFAULT "/../images/noimage.jpg",
    CONSTRAINT ORDER_CUSTOMER_FK FOREIGN KEY (customerID) REFERENCES Customer(id) 
);

CREATE TABLE MenuOrder(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    orderID INTEGER NOT NULL,
    menuID INTEGER NOT NULL,
    restaurantID INTEGER NOT NULL,
    CONSTRAINT ORDER_FK FOREIGN KEY (orderID) REFERENCES RestaurantOrder(id) ON DELETE CASCADE,
    CONSTRAINT MENU_FK FOREIGN KEY (menuID) REFERENCES Menu(id) 
);

CREATE TABLE DishOrder(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    orderID INTEGER NOT NULL,
    dishID INTEGER NOT NULL,
    restaurantID INTEGER NOT NULL,
    CONSTRAINT ORDER_FK FOREIGN KEY (orderID) REFERENCES RestaurantOrder(id) ON DELETE CASCADE,
    CONSTRAINT DISH_FK FOREIGN KEY (dishID) REFERENCES Dishes(id)
);


CREATE TABLE Dishes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    price INTEGER NOT NULL,
    idRestaurant INTEGER NOT NULL,
    photoPath TEXT DEFAULT "/../images/noimage.jpg",
    CONSTRAINT DISH_RESTAURANT_FK FOREIGN KEY (idRestaurant) REFERENCES Restaurant(id) ON DELETE CASCADE,
    CONSTRAINT PRICE_CHECK CHECK (price > 0)
);

CREATE TABLE MenuDish (
    idMenu INTEGER NOT NULL,
    idDish INTEGER NOT NULL,
    CONSTRAINT MENUDISH_PK PRIMARY KEY (idMenu, idDish),
    CONSTRAINT MENU_MENUDISH_FK FOREIGN KEY (idMenu) REFERENCES Menu(id) ON DELETE CASCADE,
    CONSTRAINT DISH_MENUDISH_FK FOREIGN KEY (idDish) REFERENCES Dishes(id) ON DELETE CASCADE
);

CREATE TABLE Category (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(255) NOT NULL UNIQUE,
    photoPath TEXT DEFAULT "/../images/noimage.jpg"
);

CREATE TABLE Review (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT DEFAULT "Private User",
    comment TEXT NOT NULL,
    photoPath TEXT DEFAULT "/../images/noimage.jpg"
);

CREATE TABLE Menu (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(255),
    restaurantID INTEGER NOT NULL ,
    photoPath TEXT DEFAULT "/../images/noimage.jpg",
    CONSTRAINT RESTAURANT_FK FOREIGN KEY (restaurantID) REFERENCES Restaurant(id) ON DELETE CASCADE
);

CREATE TABLE UserFavRest(
    userID INTEGER NOT NULL,
    restID INTEGER NOT NULL,
    CONSTRAINT USERFAVREST_PK PRIMARY KEY (userID, restID),
    CONSTRAINT USERFAV_FK FOREIGN KEY (userID) REFERENCES User(id) ON DELETE CASCADE,
    CONSTRAINT RESTFAV_FK FOREIGN KEY (restID) REFERENCES Restaurant(id) 
);

CREATE TABLE UserFavDish(
    userID INTEGER NOT NULL,
    dishID INTEGER NOT NULL,
    CONSTRAINT USERFAVDISH_PK PRIMARY KEY (userID, dishID),
    CONSTRAINT USERFAVD_FK FOREIGN KEY (userID) REFERENCES User(id) ON DELETE CASCADE,
    CONSTRAINT DISHFAV_FK FOREIGN KEY (dishID) REFERENCES Dishes(id) 
);

INSERT INTO User(username,name,email,password,address,phone,photoPath) VALUES("admin","The Real Admin","admin@tasca.pt","$2y$10$XNdnt3SzfjCmNVtjExzY6O5vnjY/aWkLbxCzrjIdqanvfsiqx1kkC","Rua do Admin", "911111311","/../images/ruipinto.jpg");
INSERT INTO User(username,name,email,password,address,phone) VALUES("owner","Mr Sandman","owner@tasca.pt","$2y$10$XNdnt3SzfjCmNVtjExzY6O5vnjY/aWkLbxCzrjIdqanvfsiqx1kkC","Rua de Owner", "929292929");
INSERT INTO User(username,name,email,password,address,phone) VALUES("customer","John Doe","johndoe@mail.com","$2y$10$XNdnt3SzfjCmNVtjExzY6O5vnjY/aWkLbxCzrjIdqanvfsiqx1kkC","Rua de Teste 9", "911114111");

INSERT INTO Customer(id) VALUES(3);

INSERT INTO RestaurantOwner(id) VALUES(2);
INSERT INTO RestaurantOwner(id) VALUES(1);

INSERT INTO Category(name, photoPath) VALUES("italiano", "/../images/italy.jpg");
INSERT INTO Category(name, photoPath) VALUES("mexicana", "/../images/mexico.jpg");
INSERT INTO Category(name, photoPath) VALUES("portuguesa", "/../images/portugal.jpg");
INSERT INTO Category(name, photoPath) VALUES("francesa", "/../images/france.jpg");
INSERT INTO Category(name, photoPath) VALUES("espanhola", "/../images/spain.jpg");
INSERT INTO Category(name, photoPath) VALUES("japonêsa", "/../images/japan.jpg");     
INSERT INTO Category(name, photoPath) VALUES("chinesa", "/../images/china.jpg");

INSERT INTO Restaurant(name,address,categoryID,ownerID,photoPath,phone) VALUES("Tasca da feup","Rua de Faculdade 1",3,2,"/../images/tasca.jpg",911222333);
INSERT INTO Restaurant(name,address,categoryID,ownerID,photoPath,phone) VALUES("Tasca do isep","Rua de Faculdade 2",2,1,"/../images/tasca2.jpg",911222334);
INSERT INTO Restaurant(name,address,categoryID,ownerID,photoPath,phone) VALUES("Tasca da fmup","Rua de Faculdade 4",1,2,"/../images/tasca.jpg",911222335);
INSERT INTO Restaurant(name,address,categoryID,ownerID,photoPath,phone) VALUES("Tasca da fep","Rua de Faculdade 5",3,1,"/../images/tasca2.jpg",911222336);
INSERT INTO Restaurant(name,address,categoryID,ownerID,photoPath,phone) VALUES("Tasca da fmdup","Rua de Faculdade 6",1,2,"/../images/tasca.jpg",911222337);
INSERT INTO Restaurant(name,address,categoryID,ownerID,photoPath,phone) VALUES("Tasca da flup","Rua de Faculdade 7",5,2,"/../images/tasca2.jpg",911222326);
INSERT INTO Restaurant(name,address,categoryID,ownerID,photoPath,phone) VALUES("Tasca da fadeup","Rua de Faculdade 7",6,1,"/../images/tasca.jpg",911252337);

INSERT INTO Dishes(name,price,idRestaurant,photoPath) VALUES("pizza",10,1,"/../images/pizza.jpg");
INSERT INTO Dishes(name,price,idRestaurant,photoPath) VALUES("bolonhesa",8,1,"/../images/massabolonhesa.jpg");
INSERT INTO Dishes(name,price,idRestaurant,photoPath) VALUES("massa",7,1,"/../images/massabolonhesa.jpg");
INSERT INTO Dishes(name,price,idRestaurant,photoPath) VALUES("tacos",5,2,"/../images/tacos.jpg");
INSERT INTO Dishes(name,price,idRestaurant,photoPath) VALUES("nachos",4,2,"/../images/nachos.jpg");
INSERT INTO Dishes(name,price,idRestaurant,photoPath) VALUES("fajitas",4,2,"/../images/fajitas.jpg");
INSERT INTO Dishes(name,price,idRestaurant,photoPath) VALUES("lasagna",5,3,"/../images/lasanha.jpg");
INSERT INTO Dishes(name,price,idRestaurant,photoPath) VALUES("gnocci",4,3,"/../images/gnocci.jpg");
INSERT INTO Dishes(name,price,idRestaurant,photoPath) VALUES("canelloni",4,3,"/../images/canelloni.jpg");

INSERT INTO Menu(name, restaurantId,photoPath) VALUES("Menu FEUP",1,"/../images/feup.jpg");
INSERT INTO Menu(name, restaurantId,photoPath) VALUES("Menu ISEP",2,"images/isep.jpg");
INSERT INTO Menu(name, restaurantId,photoPath) VALUES("Menu FMUP",3,"images/fmup.jpg");

INSERT INTO MenuDish(idMenu, idDish) VALUES(1, 1);
INSERT INTO MenuDish(idMenu, idDish) VALUES(1, 2);
INSERT INTO MenuDish(idMenu, idDish) VALUES(1, 3);

INSERT INTO MenuDish(idMenu, idDish) VALUES(2, 4);
INSERT INTO MenuDish(idMenu, idDish) VALUES(2, 5);
INSERT INTO MenuDish(idMenu, idDish) VALUES(2, 6);

INSERT INTO MenuDish(idMenu, idDish) VALUES(3, 7);
INSERT INTO MenuDish(idMenu, idDish) VALUES(3, 8);
INSERT INTO MenuDish(idMenu, idDish) VALUES(3, 9);


/**
CREATE TRIGGER before_restaurant_delete BEFORE DELETE ON Restaurant 
BEGIN 
DELETE FROM RestaurantOwner WHERE id = old.ownerID;
END;**/
