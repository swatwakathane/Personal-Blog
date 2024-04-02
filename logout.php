<?php
require 'config/constants.php';
// destroying all sessions
session_destroy();
header('location: ' . 'index.php' );
die();
