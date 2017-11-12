<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/11/2017
 * Time: 18:42
 */
session_start();
session_destroy();
header("location: ../index.php");