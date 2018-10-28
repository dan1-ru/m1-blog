<?php
set_include_path(__DIR__);

require 'vendor/autoload.php';
$config = require 'config.php';

$connString = "{$config['db_driver']}:dbname={$config['db_name']};host={$config['db_host']}";
$db = new PDO($connString, $config['db_user'], $config['db_pass']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

define('UPLOAD_PATH', __DIR__ . '/public/uploads/');

Blog\Core\DataMapper::init($db);