<?php
require_once('../lib/infos.php');

session_destroy();
header("location: ../index.php");
