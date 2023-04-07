<?php
include("../../User.php");

$res1 = (new User('username868087'))->updateUser("mdpErwan19@", "dF@3");
$res2 = (new User('username868087'))->updateUser("mdpErwan19@", "mdpErwan18@");

if ($res1 == 2 && $res2 == 0) :
    printf("true");
else :
    printf("false");
endif;
