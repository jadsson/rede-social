CREATE DATABASE xgram;
USE xgram;
CREATE TABLE users (
    id_user 	int not null AUTO_INCREMENT PRIMARY KEY,
    username 	varchar(30) UNIQUE,
    usermail 	varchar(50) UNIQUE,
    userimg     varchar(255),
    pass		varchar(255),
    date_user   timestamp
);

CREATE TABLE posts (
    id_post     int not null AUTO_INCREMENT PRIMARY KEY,
    picture     varchar(255),
    text_post   varchar(255),
    fk_userPost int,
    FOREIGN KEY (fk_userPost) REFERENCES users(id_user) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE comments (
    id_comment      int not null AUTO_INCREMENT PRIMARY KEY,
    text_comment    varchar(255),
    fk_userComment  int,
    fk_postComment  int,
    date_comment    timestamp,
    FOREIGN KEY (fk_userComment) REFERENCES users(id_user) ON DELETE CASCADE ON UPDATE CASCADE
    FOREIGN KEY (fk_postComment) REFERENCES posts(id_post) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE like_post (
    id_likePost     int not null AUTO_INCREMENT PRIMARY KEY,
    count_likePost  int,
    fk_userLike     int,
    fk_post         int,
    date_like       timestamp,
    FOREIGN KEY (fk_userLike) REFERENCES users(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (fk_post) REFERENCES posts(id_post) ON DELETE CASCADE ON UPDATE CASCADE,
);

CREATE TABLE like_comment (
    id_likeComment      int not null AUTO_INCREMENT PRIMARY KEY,
    count_likeComment   int,
    fk_comment          int,
    fk_user             int,
    date_likeComment    timestamp,
    FOREIGN KEY (fk_comment) REFERENCES comments(id_comment) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (fk_user) REFERENCES users(id_user)  ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE block_user (
    id_block        int not null AUTO_INCREMENT PRIMARY KEY,
    blocked_user    int, 
    who_blocked     int,
    date_block      timestamp,
    FOREIGN KEY (blocked_user) REFERENCES users(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (who_blocked) REFERENCES users(id_user) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE save_posts (
    id_save     int not null AUTO_INCREMENT PRIMARY KEY,
    fk_userSave int,
    fk_postSave int,
    FOREIGN KEY (fk_userSave) REFERENCES users(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (fk_postSave) REFERENCES posts(id_post) ON DELETE CASCADE ON UPDATE CASCADE
);