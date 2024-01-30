<?php

session_start();
session_unset();
session_destroy();

header("location: ../identify_page.php");
exit();