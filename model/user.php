<?php

class user {
    private ?int $id_user=null;
    private ?string $name_user=null;
    private ?string $last_name_user=null;
    private ?string $password_user=null;
    private ?string $email_user=null;
    private ?string $phonenbr_user=null;
    private ?string $date_of_birth_user=null;
    private ?string $role_user=null;

      
public function __construct(
    ?int $id_user = null ,
    string $name_user,
    string $last_name_user,
    string $password_user,
    string $email_user,
    string $phonenbr_user,
    string $date_of_birth_user,
    ?string $role_user = null
) {
    $this->id_user = $id_user;
    $this->name_user = $name_user;
    $this->last_name_user = $last_name_user;
    $this->password_user = $password_user;
    $this->email_user = $email_user;
    $this->phonenbr_user = $phonenbr_user;
    $this->date_of_birth_user = $date_of_birth_user;
    $this->role_user = $role_user;
}

    public function getIdUser() {
        return $this->id_user;
    }

    public function getNameUser() {
        return $this->name_user;
    }

    public function setNameUser($name_user) {
        $this->name_user = $name_user;
    }

    public function getLastNameUser() {
        return $this->last_name_user;
    }

    public function setLastNameUser($last_name_user) {
        $this->last_name_user = $last_name_user;
    }

    public function getPasswordUser() {
        return $this->password_user;
    }

    public function setPasswordUser($password_user) {
        $this->password_user = $password_user;
    }

    public function getEmailUser() {
        return $this->email_user;
    }

    public function setEmailUser($email_user) {
        $this->email_user = $email_user;
    }

    public function getPhoneNumberUser() {
        return $this->phonenbr_user;
    }

    public function setPhoneNumberUser($phonenbr_user) {
        $this->phonenbr_user = $phonenbr_user;
    }

    public function getDateOfBirthUser() {
        return $this->date_of_birth_user;
    }

    public function setDateOfBirthUser($date_of_birth_user) {
        $this->date_of_birth_user = $date_of_birth_user;
    }

    public function getRoleUser() {
        return $this->role_user;
    }

    public function setRoleUser($role_user) {
        $this->role_user = $role_user;
    }
}