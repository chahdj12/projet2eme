<?php

    class BlogC{
        public function checkBlog($title){
            $conn = config::getConnexion();
            $sql = "SELECT title FROM blog WHERE title = ?";
            $query = $conn->prepare($sql);
            $query->bindValue(1, $title );
            $query->execute();
            return $query;
        }

        public function searchBlog($title){
            $conn = config::getConnexion();
            $sql = "SELECT * FROM blog WHERE title = ?";
            $query = $conn->prepare($sql);
            $query->bindValue(1, $title );
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        }

        public function addBlog(Blog $blog){
            $conn = config::getConnexion();
            $sql = "INSERT INTO blog (title, mail, date, contenue) VALUES (?, ?, ?, ?)"; 
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                $blog->getTitle(), 
                $blog->getMail(), 
                $blog->getDate(), 
                $blog->getContenue()
            ]);
        }

        public function listBlogs(){
            $x = config::getConnexion();
            $query = $x->prepare('SELECT * FROM blog');
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        }

        public function deleteBlog($id){
            $sql="DELETE FROM blog WHERE ID=:ID";
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

        public function updateBlog(Blog $blog, $ID){
			$sql="UPDATE blog SET title = ?, mail = ?, date = ?, contenue = ? WHERE id = ?";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    $blog->getTitle(), 
                    $blog->getMail(), 
                    $blog->getDate(), 
                    $blog->getContenue(),
                    $ID
                ]);
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}	
		}

        public function getBlog($ID){
			$sql="SELECT * FROM blog where ID=$ID";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$blog=$query->fetch();
				return $blog;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
        public function countCommentedBlogs(){
            $commentedBlogs = 0;
            $nonCommentedBlogs = 0;
            $commentedBlogsQuery = "SELECT COUNT(DISTINCT blog_id) AS count FROM commentaire";
            $allBlogsQuery = "SELECT COUNT(*) AS count FROM blog";
            $db = config::getConnexion();
			try{
				$query=$db->prepare($commentedBlogsQuery);
				$query->execute();
                $commentedBlogs = $query->fetch();

				$queryAllBlogs=$db->prepare($allBlogsQuery);
				$queryAllBlogs->execute();
				$totalBlogsCount = $queryAllBlogs->fetch();
                $nonCommentedBlogs = $totalBlogsCount['count'] - $commentedBlogs['count'];
				return [
                    'commentedBlogs' => $commentedBlogs['count'],
                    'nonCommentedBlogs' => $nonCommentedBlogs,
                ];
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}

        }
    }

?>