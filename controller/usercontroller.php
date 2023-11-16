<?php 
    class Usercontroller{
        //**affichage */
        public function afficherUser ($user): void {
            echo("<br>");
            $tab = array (
                "name"=>$user->getFirstName() , 
                "last name"=>$user->getLastName() , 
                "gendre"=>$user->getgender (),
                "date of birth"=>$user->getdateofbirth(),
                "password"=>$user->getPassword (), 
                "code"=>$user->getcode (),
                "email"=>$user->getEmail(),
                "phonenbr"=>$user->getphonenbr (),
                "role"=>$user->getrole (),
                "status"=>$user->getstatus(),
                
            );
            //**tefsakh */
        function deleteuser($ide)
    {
        $sql = "DELETE FROM juser WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
        //** tzid user */
    }
    function adduser($user)
    {
        $sql = "INSERT INTO user
        VALUES (NULL, :name,:lastname, :email,:phonenbr :password, :code,:role,:status,:dateofbirth,:gendre,)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'name' => $user->getname(),
                'lastnamme' => $user->getPrenom(),
                'email' => $user->getEmail(),
                'phonenbr' => $user->getphonenbr(),
                'role' => $user->getrole(),
                'gendre' => $user->getgendre(),
                'password' => $user->getpassword(),
                'dateofbirth' => $user->getdateofbrith(),
                'status' => $user->getstatus(),
                'code' => $user->getcode (),
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    } 
    //**update user  */
    function updateUser(User $user, $id)
{   
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE utilisateur SET 
                nom = :nom, 
                prenom = :prenom, 
                email = :email, 
                dateofbirth = :dateofbirth,
                code = :code,
                role = :role,
                status = :status,
                gender = :gender,
                tel = :tel
            WHERE id= :idUtilisateur'
        );
        
         $query->execute([
            'idUtilisateur' => $id,
            'nom' => $user->getLastName(),
            'prenom' => $user->getFirstName(),
            'email' => $user->getEmail(),
            'dateofbirth' => $user->getdateofbirth(),
            'code' => $user->getcode(),
            'role' => $user->getrole(),
            'status' => $user->getstatus(),
            'gender' => $user->getgender(),
            'tel' => $user->getphonenbr(),
        ]);
        
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

            echo("<table border='1' align='center'><tr>");
            foreach ($tab as $key=>$value)
                echo ("<th>$key</th>");
            echo "</tr><tr>";
            foreach ($tab as $key=>$value)
                echo ("<td>$value</td>");
            echo("</tr></table>");
        }
    }