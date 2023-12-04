<?php
require '../config.php';

class userC
{
    public function listUsers()
    {
        $sql = "SELECT * FROM users";
        $db = Config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteUser($userId)
    {
        $sql = "DELETE FROM users WHERE id_user = :id";
        $db = Config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $userId);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addUser($user)
    {
        $sql = "INSERT INTO users (name_user, last_name_user, email_user, phonenbr_user, password_user, date_of_birth_user) VALUES (:name_user, :last_name_user, :email_user, :phonenbr_user, :password_user, :date_of_birth_user)";
        $db = Config::getConnexion();
        $query = $db->prepare($sql);

        $query->bindValue(':name_user', $user->getNameUser());
        $query->bindValue(':last_name_user', $user->getLastNameUser());
        $query->bindValue(':email_user', $user->getEmailUser());
        $query->bindValue(':phonenbr_user', $user->getPhoneNumberUser());
        $query->bindValue(':password_user', $user->getPasswordUser());
        $query->bindValue(':date_of_birth_user', $user->getDateOfBirthUser());

        try {
            $query->execute();
            echo "User added successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function showUser($userId)
    {
        $sql = "SELECT * from users where id_user = :id";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $userId);
            $query->execute();
            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    
    
     
    function updateUser($user, $id)
        {
            try {
                $db = Config::getConnexion();
                $query = $db->prepare(
                    'UPDATE users SET
                        name_user = :name,
                        last_name_user = :last_name,
                        email_user = :email,
                        phonenbr_user = :phone_number,
                        password_user = :password,
                        date_of_birth_user = :date_of_birth
                    WHERE id_user = :idUser'
                );
    
                $query->execute([
                    'idUser' => $id,
                    'name' => $user->getNameUser(),
                    'last_name' => $user->getLastNameUser(),
                    'email' => $user->getEmailUser(),
                    'phone_number' => $user->getPhoneNumberUser(),
                    'password' => $user->getPasswordUser(),
                    'date_of_birth' => $user->getDateOfBirthUser()
                ]);
    
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        
}


    

