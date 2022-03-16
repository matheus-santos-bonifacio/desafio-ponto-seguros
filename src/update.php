<?php

require __DIR__ . '/Pages/userPage.php';
require __DIR__ . '/Services/UserService.php';
require __DIR__ . '/Database/db.php';
require __DIR__ . '/Repositories/UserRepository.php';
require __DIR__ . '/Pages/layout.php';

(new UserService())->updateUser();
