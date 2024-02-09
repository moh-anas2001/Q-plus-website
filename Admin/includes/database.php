<?php

$connect = mysqli_connect('localhost', 'cms', 'secret', 'cms');//dacenj4b_dacentric ---- Dacentric@db

if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL :' . mysqli_connect_errno());
}
?>