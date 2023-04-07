<?php
include("../../User.php");

$randomUsername = "username" . rand(0, 1000000);

$res1 = (new User($randomUsername))->deleteUser();
$res2 = (new User("username558826"))->deleteUser();

if ($res1 == 4 && $res2 == 0) :
    printf("true");
else :
    printf("false");
endif;
