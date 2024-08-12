<?php

require 'AuthInterface.php';
require 'TimestampableTrait.php';
require 'User.php';
require 'Member.php';
require 'AdminLevel.php';
require 'Admin.php';

$m1 = new Member('Ben', 'abcd1234', 37, 'Ben');
$m2 = new Member('Tom', 'abcd1234', 35, 'Tom');

$a1 = new Admin('Admin', 'admin1234', 25, 'John', AdminLevel::SuperAdmin);

if ($a1->auth($argv[1], $argv[2])) {
    echo 'Authenticated!'.\PHP_EOL.'Admin level: '. $a1->showLevel().\PHP_EOL;
    echo 'Creation date :'.$a1->getCreatedAt()->format('d M Y H:i:s').\PHP_EOL;
} else {
    echo 'Wrong credentials'.\PHP_EOL;
}

echo 'Members : '.Member::count().\PHP_EOL;
echo 'Admins : '.Admin::count().\PHP_EOL;

unset($m2);
echo 'Members : '.Member::count().\PHP_EOL;

