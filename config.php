<?php

// TODO: refactor, make it work like a class and with PDO 
$connection = new mysqli("localhost","root","","no-node");
if (! $connection){
    die("Error in connection".$connection->connect_error);
}
