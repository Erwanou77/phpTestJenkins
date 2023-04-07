<?php

class User
{
    private const FOLDERS = "../passwords";

    public function __construct(private string $username)
    {
    }

    public function createUser($password)
    {
        $patternName = "/^([A-Za-z0-9]){3,20}$/";
        (!file_exists(self::FOLDERS)) && mkdir(self::FOLDERS);
        return ($this->username == "" || $password == "") && 1;
        return (strlen($this->username) < 3 || strlen($this->username) > 20) && 2;
        return (!preg_match($patternName, $this->username)) && 3;

        $this->critereVerif($password);

        try {
            (file_exists(self::FOLDERS . "/" . $this->username . ".txt") && filesize(self::FOLDERS . "/" . $this->username . ".txt") > 0) && 4;
            $stream = fopen(self::FOLDERS . "/" . $this->username . ".txt", "w");
            fwrite($stream, $password);
            fclose($stream);
            return 0;
        } catch (Exception $e) {
            return 6;
        }
    }

    public function updateUser($oldPassword, $newPassword)
    {
        (!file_exists(self::FOLDERS . "/" . $this->username . ".txt")) && 8;

        $password = file_get_contents(self::FOLDERS . "/" . $this->username . ".txt");

        ($password !== $oldPassword) && 7;

        $this->critereVerif($newPassword);

        try {
            (file_exists(self::FOLDERS . "/" . $this->username . ".txt") && filesize(self::FOLDERS . "/" . $this->username . ".txt") > 0) && 4;
            $stream = fopen(self::FOLDERS . "/" . $this->username . ".txt", "w");
            fwrite($stream, $newPassword);
            fclose($stream);
            return 0;
        } catch (Exception $e) {
            return 6;
        }
    }

    public function deleteUser()
    {
        (!file_exists(self::FOLDERS . "/" . $this->username . ".txt")) && 8;
        unlink(self::FOLDERS . "/" . $this->username . ".txt");
        return 0;
    }

    public function connect($password)
    {
    }

    public function logout()
    {
    }

    public function critereVerif($password)
    {
        $patternPassword = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,60}$/";
        return (strlen($password) < 8 || strlen($password) > 60) && 2;
        return (!preg_match($patternPassword, $password)) && 5;
    }
}
