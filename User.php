<?php
class User
{
    private const FOLDERS = "../../passwords";

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
        $hashPass = password_hash($password, PASSWORD_DEFAULT);

        if (file_exists(self::FOLDERS . "/" . $this->username . ".txt") && filesize(self::FOLDERS . "/" . $this->username . ".txt") > 0) return 4;
        file_put_contents(self::FOLDERS . "/" . $this->username . ".txt", $hashPass);
        return 0;
    }

    public function updateUser($oldPassword, $newPassword)
    {
        $patternPassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
        if ($oldPassword == "" || $newPassword == "") return 1;
        if (!file_exists(self::FOLDERS . "/" . $this->username . ".txt")) return 4;

        $password = file_get_contents(self::FOLDERS . "/" . $this->username . ".txt");
        if (!password_verify($oldPassword, $password)) return 6;
        if (strlen($newPassword) < 8 || strlen($newPassword) > 60) return 2;
        if (!preg_match($patternPassword, $newPassword)) return 5;
        $hashPass = password_hash($newPassword, PASSWORD_DEFAULT);
        file_put_contents(self::FOLDERS . "/" . $this->username . ".txt", $hashPass);
        return 0;
    }

    public function deleteUser()
    {
        if (!file_exists(self::FOLDERS . "/" . $this->username . ".txt")) return 4;
        unlink(self::FOLDERS . "/" . $this->username . ".txt");
        return 0;
    }

    public function connect($password)
    {
        if ($this->username == "" || $password == "") return 1;
        if (!file_exists(self::FOLDERS . "/" . $this->username . ".txt")) return 4;
        $passwordHash = file_get_contents(self::FOLDERS . "/" . $this->username . ".txt");
        if (!password_verify($password, $passwordHash)) return 6;
        session_start();
        $_SESSION['username'] = $this->username;
        return 0;
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        return 0;
    }
}
