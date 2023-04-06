<?php
    include "./../connect.php";

    $res1 = connect("username1", "teste"); 
    $res2 = connect("username1", "passwordislongeno34ug/h");

    if($res1 == 8 && $res2 == 0):
        printf("true");
    else:
        printf("false");
    endif;
