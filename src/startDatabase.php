<?php

require __DIR__ . '/Database/db.php';

$sql = file_get_contents(__DIR__ . '/Database/Migrations/InitialMigration_15032022.sql');

$db = new DB();
$db->openConnection()->query($sql);

echo 'Database created';
