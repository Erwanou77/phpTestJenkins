<?php
    include "./../connect.php";
    
    $res1=connect("<?= echo 'test' ?>","passwordislongeno34ug/h");
    $res2=connect("username1","105 OR 1=1");
    $res3=connect("username252725","paEEwordislongen564h@@/");

    if($res1==9 && $res2==9 && $res3==0):
        printf("true");
    else:
        printf("false");
    endif;