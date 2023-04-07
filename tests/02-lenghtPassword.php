<?php
include("../User.php");

$randomUsername = "username" . rand(0, 1000000);

$res1 = (new User($randomUsername))->createUser("dF@3");
$res2 = (new User($randomUsername))->createUser("passwordeisWER@longen4355ough");

if ($res1 == 2 && $res2 == 0) :
    printf("true");
else :
    printf("false");
endif;
