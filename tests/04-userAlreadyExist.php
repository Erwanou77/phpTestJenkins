<?php

    include("../register.php");

    $randomUsername="username".rand(0, 1000000);

    $res1 = registerUser("username1", "passwordeisWER@longen4355ough");
    $res2 = registerUser("$randomUsername", "passwordeisWER@longen4355ough");
    
    if($res1 == 4 && $res2 == 0):
        printf("true");
    else:
        printf("false");
    endif;