<?php

 $dbName = 'phprest';
 $user = 'root';
 $password = '';

 $dsn = 'mysql:host=127.0.0.1:3307; dbname='.$dbName;

 $db = new PDO($dsn,$user,$password);

 $db -> setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
 $db -> setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
 $db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

 define('APP_NAME','PHP REST API');
?>