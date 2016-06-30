<?php
if ($_SERVER['SERVER_NAME'] == "frozen-fjord-31334.herokuapp.com") {
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $dbname = substr($url["path"], 1);
    $config = array(
        'connectionString' => "mysql:host={$url["host"]};dbname={$dbname}",
        'emulatePrepare' => true,
        'username' =>  $url["user"],
        'password' =>  $url["pass"],
        'charset' =>'utf8',
    );
} else {
// This is the database connection configuration.
    $config = array(
        'connectionString' => 'mysql:host=localhost;dbname=news',
        'emulatePrepare' => true,
        'username' => 'root',
        'password' => '123',
        'charset' => 'utf8',
    );
}
return $config;