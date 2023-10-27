<?php

if($_SERVER['DOCUMENT_ROOT'] == 'C:/wamp64/www') {
    define('_MYSQL_HOST','127.0.0.1');
    define('_MYSQL_PORT',3306);
    define('_MYSQL_DBNAME','bd_iMM');
    define('_MYSQL_USER','root');
    define('_MYSQL_PASSWORD','');    
} else {
    define('_MYSQL_HOST','127.0.0.1');
    define('_MYSQL_PORT',8889);
    define('_MYSQL_DBNAME','bd_iMM');
    define('_MYSQL_USER','root');
    define('_MYSQL_PASSWORD','root');    
}

