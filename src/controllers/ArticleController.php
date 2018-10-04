<?php
namespace controllers;

use \models\Article;
use \repositories\ArticleRepository as Repo;

class ArticleController extends CommonController {

    public function indexAction() {
        $this->setTemplate('index');
    }

    public function __toString() {
        return 'Article';
    }

    public function listAction() {
        $repo = new Repo();
        $data = $repo->findAll();
        $this->addToContent('articles', $data);

        $this->finalizeContent();
        $this->setTemplate('list');
    }

    public function addAction() {
        if(isset($_POST['addArticle'])) {
            $secured = $_POST;
            $repo = new Repo();
            //add validation here
            $repo->add(new Article($secured));
            $data = $repo->findAll();
            $this->addToContent('articles', $data);

            $this->finalizeContent();
            $this->setTemplate('list');
        } else {
            $this->setTemplate('add');
        }
    }

    public function delAction() {
        if(isset($_GET['id'])) {
            $repo = new Repo();
            $repo->del($_GET['id']);
            $data = $repo->findAll();
            $this->addToContent('articles', $data);

            $this->finalizeContent();
            $this->setTemplate('list');
        } else {
            $this->setTemplate('index');
        }
    }

    public function modAction() {
        if(isset($_POST['modArticle'])) {
            $secured = $_POST;
            $repo = new Repo();
            //add validation here
            $article = new Article($secured);
            $repo->mod($article);
            $data = $repo->findAll();
            $this->addToContent('articles', $data);

            $this->finalizeContent();
            $this->setTemplate('list');
        } else {
            if(isset($_GET['id'])) {
                $repo = new Repo();
                $articletomod = $repo->getByID($_GET['id']);
                $this->addToContent('article', $articletomod);
                $this->addToContent('articles', $repo->findAll());
                $this->finalizeContent();
                $this->setTemplate('mod');
            } else {
                $this->setTemplate('index');
            }
        }
    }

    public function viewAction() {
        $repo = new Repo();
        $article = $repo->getByID($_GET['id']);
        if(file_exists('data/'.$article->getTitle().'.txt')) {
            $cleanedcontent = file_get_contents('data/'.$article->getTitle().'.txt');
        } else {
            $cleanedcontent = 'Existiert nicht';
        }
        $this->addToContent('title', $article->getTitle());
        $this->addToContent('cleanedcontent', $article->getContent());
        $this->finalizeContent();
        $this->setTemplate('view');
    }

}
