<?php
    include "../register.php";

    $randomUsername="username".rand(0, 1000000);
    
    $res1 = registerUser($randomUsername, "passwordislongenough");
    $res2 = registerUser($randomUsername, "1234354325436");
    $res3 = registerUser($randomUsername, "PASSWORDISLONGENOUGH");
    $res4 = registerUser($randomUsername, "paEEwordislongen564h@@/");

    if($res1 == 5 && $res2 == 5 && $res3 == 5 && $res4 == 0):
        printf("true");
    else:
        printf("false");
    endif;