<?php
include("../../User.php");

$randomUsername = "username" . rand(0, 1000000);

$res2 = (new User($randomUsername))->connect("mdpErwan18@");
$res1 = (new User("username868087"))->connect("mdpErwan18@");

if ($res1 == 4 && $res2 == 0) :
    printf("true");
else :
    printf("false");
endif;
