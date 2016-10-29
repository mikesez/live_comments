# live_comments
implementation of comments


send.php - saves data to mysql database
get.php - reads comments from mysql database

index.php contains most of the logic. JQuery with PHP allows user to post and read comments from MySQL database without refreshing webpage, but I have also used some HTML and CSS for basic forms etc.

You need to create database e.g.:

CREATE TABLE comments ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, text VARCHAR(300), date TIMESTAMP )

Working example available at: http://mkuzela.wz.cz/livecom/