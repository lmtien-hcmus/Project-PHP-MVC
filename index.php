<?php
session_start();
require 'application/libs/Init.php';
require 'application/libs/Database.php';
require 'application/libs/Controller.php';
require 'application/config/config.php';
require 'application/libs/Library.php';
$c = new Config();
$c ->Init();
