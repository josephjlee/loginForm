<?php

/**
 * @author mohamed hussein
 * @copyright 2017
 */

//used for include check
define("DBCONFIG",1);

//ob_start();

//start session 
//session_start();

//database credentials

define("DBHOST","localhost:3306");
define("DBUSER","root");
define("DBPASSWORD","");
define("DBNAME","test");

//connect to mysql
$con =mysql_connect(DBHOST,DBUSER,DBPASSWORD);
//select database to work on 
$con=mysql_select_db(DBNAME,$con) or die("connection to database failed ".Mysql_error());

$sql='CREATE TABLE IF NOT EXISTS users (
id int(11) NOT NULL AUTO_INCREMENT,
name varchar(255) NOT NULL,
email varchar(255) NOT NULL,
password varchar(255) NOT NULL,
PRIMARY KEY (id)
) ';

$result=mysql_query($sql) or die("query failed ".mysql_error());
echo "tables created successfully";

 
?>