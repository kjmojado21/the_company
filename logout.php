<?php 

session_start();
session_destroy();

header('views/sign-in.php');