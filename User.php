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
        if ($this->username == "" || $password == "") return 1;
        if (strlen($this->username) < 3 || strlen($this->username) > 20) return 2;
        if (!preg_match($patternName, $this->username)) return 3;

        $patternPassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
        if (strlen($password) < 8 || strlen($password) > 60) return 2;
        if (!preg_match($patternPassword, $password)) return 5;

        try {
            if (file_exists(self::FOLDERS . "/" . $this->username . ".txt") && filesize(self::FOLDERS . "/" . $this->username . ".txt") > 0) return 4;
            file_put_contents(self::FOLDERS . "/" . $this->username . ".txt", $password);
            return 0;
        } catch (Exception $e) {
            return 6;
        }
    }

    public function updateUser($oldPassword, $newPassword)
    {
        if (!file_exists(self::FOLDERS . "/" . $this->username . ".txt")) return 8;

        $password = file_get_contents(self::FOLDERS . "/" . $this->username . ".txt");
        if ($password !== $oldPassword) return 7;

        $patternPassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
        if (strlen($newPassword) < 8 || strlen($newPassword) > 60) return 2;
        if (!preg_match($patternPassword, $newPassword)) return 5;

        try {
            file_put_contents(self::FOLDERS . "/" . $this->username . ".txt", $newPassword);
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
}
