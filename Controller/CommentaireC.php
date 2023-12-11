<?php

    class CommentaireC{
        public function addCommentaire(Commentaire $commentaire){
            $conn = config::getConnexion();
            $sql = "INSERT INTO commentaire (user_id, blog_id, comment_text, created_at, likes) VALUES (?, ?, ?, ?, ?)"; 
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                $commentaire->getUserId(), 
                $commentaire->getBlogId(), 
                $commentaire->getCommentText(), 
                $commentaire->getCreatedAt(),
                $commentaire->getLikes()
            ]);
        }


        public function listCommentaire(){
            $x = config::getConnexion();
            $query = $x->prepare('SELECT * FROM commentaire');
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        }

        public function listCommentaireByIdBlog($blog_id){

            $x = config::getConnexion();
            $query = $x->prepare('SELECT * FROM commentaire WHERE blog_id = ?');
            $query->execute([$blog_id]);
            $result = $query->fetchAll();
            return $result;
        }

        public function deleteCommentaire($id){
            $sql="DELETE FROM commentaire WHERE ID=:ID";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':ID', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
		}

        public function updateCommentaire(Commentaire $commentaire, $ID){
			$sql="UPDATE commentaire SET comment_text = ?, likes = ?, created_at = ? WHERE id = ?";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    $commentaire->getCommentText(), 
                    $commentaire->getLikes(),
                    $commentaire->getCreatedAt(),
                    $ID
                ]);
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}	
		}

        public function getCommentaire($ID){
			$sql="SELECT * FROM commentaire where ID=$ID";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$commentaire=$query->fetch();
				return $commentaire;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

        public function countLikes(){
            $CountLike = [];
            $db = config::getConnexion();
			try{
                for ($i=0; $i < 6; $i++) { 
                    $countLikeZeroQuery = "SELECT COUNT(*) AS count FROM commentaire where likes = ?";
                    $queryCountZero=$db->prepare($countLikeZeroQuery);
                    $queryCountZero->execute([$i]);
                    $CurrentCountLike = $queryCountZero->fetch();
                    array_push($CountLike,$CurrentCountLike['count']);
                }
				return $CountLike;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}

        }
    }

?>