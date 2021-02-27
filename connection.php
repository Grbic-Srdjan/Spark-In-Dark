<?php

// Created by Srdjan Grbic

define ("SERVER","127.0.0.1");
define ("USER","root");
define("DATABASE","sparkindark");
define ("PASSWORD","");

$Link = mysqli_connect(SERVER, USER, PASSWORD, DATABASE)
			or die(mysqli_connect_error() );


 ?>
