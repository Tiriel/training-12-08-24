<?php

require 'Member.php';
require 'AdminLevel.php';
require 'Admin.php';

$m1 = new Member('Ben', 'abcd1234', 37);
$m2 = new Member('Tom', 'abcd1234', 35);

$a1 = new Admin('Admin', 'admin1234', 25, AdminLevel::SuperAdmin);

if ($a1->auth($argv[1], $argv[2])) {
    echo 'Authenticated!'.\PHP_EOL.'Admin level: '. $a1->showLevel().\PHP_EOL;
} else {
    echo 'Wrong credentials'.\PHP_EOL;
}

echo 'Members : '.Member::count().\PHP_EOL;
echo 'Admins : '.Admin::count().\PHP_EOL;

unset($m2);
echo 'Members : '.Member::count().\PHP_EOL;

