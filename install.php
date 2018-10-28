<?php
/**** Утилита для создания таблиц в БД ****/

require 'bootstrap.php';

try {
    $sql = "
        CREATE TABLE IF NOT EXISTS posts (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            text TEXT NOT NULL, 
            image VARCHAR(255) NULL,
            updated_at timestamp NOT NULL
        )";

    $db->exec($sql);

    echo "Posts table successfully created!\n";

} catch(PDOException $e) {

    echo $e->getMessage();
}



