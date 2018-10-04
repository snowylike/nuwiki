<?php
namespace repositories;

use \models\Article;
use \PDO;

class ArticleRepository {

    public function findAll() {
        $dbname = 'mysql:host=localhost;dbname=nuwiki';
        $user = 'root';
        $dbcon = new PDO($dbname,$user);
        $user = $dbcon->query('SELECT * from articles;');
        $temp = $user->fetchAll();
        $entries = array();
        foreach($temp as $e) {
            $entries[] = new Article($e);
        }
        $user = null;
        $dbcon = null;
        return $entries;
    }

    public function add(Article $articledata) {
        $dbname = 'mysql:host=localhost;dbname=nuwiki';
        $user = 'root';
        $dbcon = new PDO($dbname,$user);
        $insstatement = $dbcon->prepare("INSERT INTO articles (title) VALUES (:title);");
        $title = $articledata->getTitle();
        $insstatement->bindParam(':title', $title);
        $insstatement->execute();
        file_put_contents('data/'.$articledata->getTitle().'.txt', $articledata->getContent());
        $insstatement = null;
        $dbcon = null;
    }

    public function mod(Article $articledata) {
        $dbname = 'mysql:host=localhost;dbname=nuwiki';
        $user = 'root';
        $dbcon = new PDO($dbname,$user);
        $insstatement = $dbcon->prepare("UPDATE articles SET title = :title WHERE id = :id;");
        $title = $articledata->getTitle();
        $id = $articledata->getId();
        $insstatement->bindParam(':title', $title);
        $insstatement->bindParam(':id', $id);
        $insstatement->execute();
        file_put_contents('data/'.$articledata->getTitle().'.txt', $articledata->getContent());
        $insstatement = null;
        $dbcon = null;
    }

    public function del($id) {
        $dbname = 'mysql:host=localhost;dbname=nuwiki';
        $user = 'root';
        $dbcon = new PDO($dbname,$user);
        $stmt = $dbcon->prepare("DELETE FROM articles WHERE id=:id;");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt = null;
        $dbcon = null;
    }

    public function getByID($id) {
        $dbname = 'mysql:host=localhost;dbname=nuwiki';
        $user = 'root';
        $dbcon = new PDO($dbname,$user);
        $stmt = $dbcon->prepare('SELECT * FROM articles WHERE id = :id;');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $temp = $stmt->fetchAll();
        if($temp) {
            $temp[0]['content'] = file_get_contents('data/'.$temp[0]['title'].'.txt');
            $entry = new Article($temp[0]);
        } else {
            $entry = false;
        }
        $user = null;
        $dbcon = null;
        return $entry;
    }

    public function getByTitle($title) {
        $dbname = 'mysql:host=localhost;dbname=nuwiki';
        $user = 'root';
        $dbcon = new PDO($dbname,$user);
        $stmt = $dbcon->prepare('SELECT * FROM articles WHERE title = :title;');
        $stmt->bindParam(':title', $title);
        $stmt->execute();
        $temp = $stmt->fetchAll();
        if($temp) {
            $temp[0]['content'] = file_get_contents('data/'.$title.'.txt');
            $entry = new Article($temp[0]);
        } else {
            $entry = false;
        }
        $user = null;
        $dbcon = null;
        return $entry;
    }

}
