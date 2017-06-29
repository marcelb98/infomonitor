<?php
/*
 * This software is licensed under the MIT License.
 * Copyright (c) 2017 Marcel Beyer
*/

session_start();
session_destroy();
header("Location: index.php");