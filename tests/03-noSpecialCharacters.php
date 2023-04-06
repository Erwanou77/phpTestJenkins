<?php
    include("../register.php");

    $randomUsername="username".rand(0, 1000000);

    $res1 = registerUser("username2 r", "passwordeisWER@longen4355ough?");
    $res2 = registerUser("username4.php", "sdgs.pass>passwordeisWER@longen4355ough");
    $res3 = registerUser("-username5", "@passwordeisWER@longen4355ough");
    $res4 = registerUser("-username6-", "passwordeisWER@longen4355ough");
    $res5 = registerUser("usErName6*", "passwordeisWER@longen4355ough");
    $res6 = registerUser($randomUsername, "passwordeisWER@longen4355ough/h");


    

    if($res1 == 3 && $res2 == 3 && $res3 == 3 && $res4 == 3 && $res5 == 3 && $res6 == 0):
        printf("true");
    else:
        printf("false");
    endif;