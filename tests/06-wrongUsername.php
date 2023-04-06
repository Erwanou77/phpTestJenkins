<?php
    include "./../connect.php";

    $res1 = connect("usernEame1", "passwordislongeno34ug/h");
    $res2 = connect("username1", "passwordislongeno34ug/h");

    if($res1 == 7 && $res2 == 0):
        printf("true");
    else:
        printf("false");
    endif;