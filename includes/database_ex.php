<?php

$database = new medoo(["database_type"=>"mysql",
    "database_name"=>"sbp_clone",
    "server"=>"localhost",
    "username"=>"root",
    "password"=>"",
    "charset"=>"utf8",
    "port"=>3306,
    "encryption_key"=>"01c8fca6844a0cefcb3fff1488cf7c77d30c0a38f83f42f1d21c220aad919096"]);

$sbp_db = '(DESCRIPTION =
(ADDRESS_LIST =
  (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.2.229)(PORT = 1521))
)
(CONNECT_DATA =
  (SERVER = DEDICATED)
  (SERVICE_NAME = finance.NEW)
)
)';

$sbp_pdo = new PDOOCI\PDO("oci:dbname=$sbp_db", 'SBPAR', 'SBPAR', [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => false,
]);