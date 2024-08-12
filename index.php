<?php

require 'Member.php';

$m1 = new Member('Ben', 'abcd1234', 37);

if ($m1->auth($argv[1], $argv[2])) {
    echo 'Authenticated!'.\PHP_EOL;
} else {
    echo 'Wrong credentials'.\PHP_EOL;
}
