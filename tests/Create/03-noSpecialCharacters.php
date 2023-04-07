<?php

include("../../User.php");

$randomUsername = "username" . rand(0, 1000000);

$res1 = (new User("user2 vf t"))->createUser("vbajcjfjvjfbgb./!");
$res2 = (new User("user.php"))->createUser("hfhvhgfhcPassword0000!!!");
$res3 = (new User($randomUsername))->createUser("mdpErwanTest18!");

if ($res1 == 3 && $res2 == 3 && $res3 == 0) :
    printf("true");
else :
    printf("false");
endif;
