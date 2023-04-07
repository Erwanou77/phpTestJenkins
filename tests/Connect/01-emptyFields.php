<?php
include("../../User.php");

$res1 = (new User("username868087"))->connect("");
$res2 = (new User("username868087"))->connect("Bonjour");
$res3 = (new User("username868087"))->connect("mdpErwan18@");

if ($res1 == 1 && $res2 == 7 && $res3 == 0) :
    printf("true");
else :
    printf("false");
endif;
