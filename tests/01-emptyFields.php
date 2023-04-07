<?php
include("../User.php");

$randomUsername = "username" . rand(0, 1000000);

$res1 = (new User($randomUsername))->createUser("");
$res2 = (new User(""))->createUser("");
$res3 = (new User(""))->createUser("passwordeisWER@longen4355ough");
$res4 = (new User($randomUsername))->createUser("passwordeisWER@longen4355ough");

var_dump($res4);
if ($res1 == 1 && $res2 == 1 && $res3 == 1 && $res4 == 0) :
    printf("true");
else :
    printf("false");
endif;
