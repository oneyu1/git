create table user_t(userID int unsigned not null Auto_increment,name varchar(255),password varchar(255),mail varchar(255),address text,total int,newDate Datetime,deleteFlg int = 0,PRIMARY KEY(userID));

create table buy_t(buyID int Auto_increment,primarykey(buyID),userID int,FOREIGN KEY(userID)REFERENCES user_t(userID),itemCode varchar(255),type int,buyDate Datetime);

 create table buy_t(buyID int unsigned not null Auto_increment,userID int,FOREIGN KEY(userID) REFERENCES user_t(userID),itemCode varchar(255),type int,buyDate Datetime,PRIMARY KEY(buyID));