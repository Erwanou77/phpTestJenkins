<?php
    include("../register.php");

    $randomUsername="username".rand(0, 1000000);

    $res1 = registerUser($randomUsername, "dF@3");
    $res2 = registerUser($randomUsername, "passwordeisWER@longen4355ough");

    if($res1 == 2 && $res2 == 0):
        printf("true");
    else:
        printf("false");
    endif;