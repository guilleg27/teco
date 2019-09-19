<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=teco_db',
    'username' => 'root',
    'password' => 'k1ck2705',
    'charset' => 'utf8',
    'on afterOpen' => function($event) {
        $event->sender->createCommand("SET SESSION time_zone = '-3:00';")->execute();
    }
    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
