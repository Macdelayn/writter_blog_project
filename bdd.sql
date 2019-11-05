DROP DATABASE IF EXISTS blog;
CREATE DATABASE IF NOT EXISTS blog DEFAULT CHARACTER SET 'utf8' ;
USE Blog;



CREATE TABLE IF NOT EXISTS 'user' (
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	pseudo VARCHAR(50) NOT NULL,
	email VARCHAR(255) NOT NULL,
	pass VARCHAR(255) NOT NULL,
	)

ENGINE = INNODB ;

CREATE TABLE IF NOT EXISTS 'admin' (
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	pseudo VARCHAR(50) NOT NULL,
	email VARCHAR(255) NOT NULL,
	pass VARCHAR(99) NOT NULL
	)

ENGINE = INNODB ;

CREATE TABLE IF NOT EXISTS 'article' (
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	title VARCHAR(80) NOT NULL,
	content LONGTEXT NOT NULL,
	dateArticle DATETIME NOT NULL,
	adminId INT UNSIGNED,
	CONSTRAINT fk_adminId_id
		FOREIGN KEY (adminId),
		REFERENCES admin(id),
	)

ENGINE = INNODB ;

CREATE TABLE IF NOT EXISTS 'comments' (
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	comment LONGTEXT NOT NULL,
	dateComment DATETIME NOT NULL,
	idParent INT NOT NULL DEFAULT 0,
	userId INT UNSIGNED,
	articleId INT UNSIGNED NOT NULL,
	CONSTRAINT fk_userId_id
		FOREIGN KEY (userId),
		REFERENCES user(id),

	CONSTRAINT fk_articleId_id
		FOREIGN KEY (articleId)
		REFERENCES article(id),
	)

ENGINE = INNODB ;

INSERT INTO 'article' ('id','title','content','adminId') VALUES
	(1,'Hello PHP','Bonjour \n ceci est mon premier article',1),
	
INSERT INTO 'comments' ('id','comment','idParent','userId','articleId') VALUES
	(1,'Ceci est le premier commentaire',1,1,1),