<?php
session_start();
include('include/DBconnect.php');
session_destroy();
header('Location: ../index.php');