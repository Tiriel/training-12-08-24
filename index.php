<?php

use Auth\Exception\AuthException;
use Auth\Interface\AuthInterface;
use User\Admin;
use User\Enum\AdminLevel;
use User\Member;
use User\User;

require __DIR__.'/Auth/Exception/AuthException.php';
require __DIR__.'/Auth/Interface/AuthInterface.php';
require __DIR__.'/Trait/TimestampableTrait.php';
require __DIR__.'/User/User.php';
require __DIR__.'/User/Member.php';
require __DIR__.'/User/Enum/AdminLevel.php';
require __DIR__.'/User/Admin.php';

$m1 = new Member('Ben', 'abcd1234', 37, 'Ben');
$m2 = new Member('Tom', 'abcd1234', 35, 'Tom');

$a1 = new Admin('Admin', 'admin1234', 25, 'John', AdminLevel::Admin);

echo 'Members : '.Member::count().\PHP_EOL;
echo 'Admins : '.Admin::count().\PHP_EOL;

unset($m2);
echo 'Members : '.Member::count().\PHP_EOL;

function displayUser(User $user): void
{
    echo $user.\PHP_EOL;
}

function auth(AuthInterface $user, array $argv) {
    try {
        $user->auth($argv[1], $argv[2]);

        echo 'Authenticated!'.\PHP_EOL;
        if ($user instanceof Admin) {
            echo 'Admin level: '. $user->showLevel().\PHP_EOL;
        }
        echo 'Creation date :'.$user->getCreatedAt()->format('d M Y H:i:s').\PHP_EOL;
    } catch (AuthException $e) {
        echo $e->getMessage().\PHP_EOL;
    }
}

displayUser($a1);
auth($a1, $argv);
