<?php
session_start();
unset($_SESSION['ID']);
unset($_SESSION['FULLNAME']);
echo header("Location: index.php");