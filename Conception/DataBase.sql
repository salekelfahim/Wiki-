CREATE DATABASE wiki;

CREATE TABLE utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Fname VARCHAR(255) NOT NULL,
    Lname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    pwd VARCHAR(100) NOT NULL,
    id_role INT NOT NULL
)ENGINE=INNODB;

CREATE TABLE role (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role VARCHAR(255) NOT NULL
)ENGINE=INNODB;

CREATE TABLE wiki(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    id_utilisateur INT NOT NULL,
    id_category INT NOT NULL,
    status boolean not null default 0
)ENGINE=INNODB;

CREATE TABLE category(
    id INT AUTO_INCREMENT PRIMARY KEY,
    categoryName VARCHAR(255)
)ENGINE=INNODB;

CREATE TABLE tag(
    id INT AUTO_INCREMENT PRIMARY KEY,
    tagName VARCHAR(255)
)ENGINE=INNODB;

CREATE TABLE tag_wiki(
    id_tag INT,
    id_wiki INT,
    PRIMARY KEY(id_tag,id_wiki)
)ENGINE=INNODB;
ALTER TABLE wiki ADD CONSTRAINT FK_wiki_user
FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id);

ALTER TABLE wiki ADD CONSTRAINT FK_wiki_category
FOREIGN KEY (id_category) REFERENCES category(id);

ALTER TABLE tag_wiki ADD CONSTRAINT FK_wiki_tag
FOREIGN KEY (id_tag) REFERENCES tag(id);

ALTER TABLE tag_wiki ADD CONSTRAINT FK_tag_wiki
FOREIGN KEY (id_wiki) REFERENCES wiki(id);

ALTER TABLE utilisateur ADD CONSTRAINT FK_user_role
FOREIGN KEY (id_role) REFERENCES role(id);