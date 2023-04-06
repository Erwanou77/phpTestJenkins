<?php
    function connect(string $login, string $password) : ?int  {
        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $login)):
            return 9;
        endif;
        if(preg_match('/[\'()}{?><>,|=+]/', $password)):
            return 9;
        endif;
        if(!file_exists("./../passwords/".$login.".txt")):
            return 7;
        endif;
        $stream = fopen("./../passwords/".$login.".txt", "r");
        $passwordFile = fread($stream, filesize("./../passwords/".$login.".txt"));
        fclose($stream);
        if($passwordFile !== $password):
            return 8;
        endif;
        return 0; 
    }