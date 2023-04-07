<?php
include("../../User.php");

$res1 = (new User("username868087"))->updateUser("", "");
$res2 = (new User("username868087"))->updateUser("", "BonjourTest");
$res3 = (new User("username868087"))->updateUser("mdpErwan18@", "");
$res4 = (new User("username868087"))->updateUser("mdpErwan18@", "mdpErwan19@");

if ($res1 == 1 && $res2 == 1 && $res3 == 1 && $res4 == 0) :
    printf("true");
else :
    printf("false");
endif;
