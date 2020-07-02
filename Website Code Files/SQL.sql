CREATE TABLE Users (
    ID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Username varchar(30) NOT NULL,
    Email varchar(30) NOT NULL UNIQUE,
    Region varchar(4),
    Division varchar(12),
    Lvl varchar(9),
	ProfilePic varchar(255) DEFAULT 'Lil_Sprout',
    Pwd longtext NOT NULL
);
CREATE TABLE Guides (
    ID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	AuthorID int NOT NULL,
	DateUploaded DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    GuideTitle varchar(50) NOT NULL,
    Champion varchar(20) NOT NULL,
    Role varchar(7) NOT NULL,
	Patch varchar(5) NOT NULL,
	CoreBuild longtext NOT NULL,
	Description longtext,
	Situations longtext,

    FOREIGN KEY (AuthorID) REFERENCES Users(ID)
);