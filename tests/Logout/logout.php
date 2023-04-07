<?php

include("../../User.php");

$res1 = (new User('username868087'))->logout();

if ($res1 == 0) :
    printf("true");
else :
    printf("false");
endif;
