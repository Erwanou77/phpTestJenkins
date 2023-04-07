<?php
include("../../User.php");

$randomUsername = "username" . rand(0, 1000000);

$res1 = (new User($randomUsername))->createUser("motdepasseminuscule");
$res2 = (new User($randomUsername))->createUser("1234567890");
$res3 = (new User($randomUsername))->createUser("MOTDEPASSEMAJUSCULE");
$res4 = (new User($randomUsername))->createUser("/:!;.?*$=+");
$res5 = (new User($randomUsername))->createUser("mdpErwan18@");

if ($res1 == 5 && $res2 == 5 && $res3 == 5 && $res4 == 5 && $res5 == 0) :
    printf("true");
else :
    printf("false");
endif;
