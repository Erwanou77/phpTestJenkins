<?php
    include("../register.php");

    $randomUsername="username".rand(0, 1000000);

    $res1 = registerUser($randomUsername, "");
    $res2 = registerUser("","");
    $res3 = registerUser("", "passwordeisWER@longen4355ough");
    $res4 = registerUser($randomUsername, "passwordeisWER@longen4355ough");

    if($res1 == 1 && $res2 == 1 && $res3 == 1 && $res4 == 0):
        printf("true");
    else:
        printf("false");
    endif;