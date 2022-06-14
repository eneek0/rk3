<?php
    namespace MyProject\Controllers;
    use MyProject\Models\Articles\Article;
    use MyProject\Models\Users\User;
    use MyProject\Models\Comments\Comment;
    use MyProject\View\View;

    class ArticleController {
        private $view;
        private $db;

        public function __construct(){
            $this->view = new View(__DIR__.'/../../../templates');
        }
        public function view(int $articleId){
            $article = Article::getById($articleId);

            if ($article === null){
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }

            $comments = Comment::getByColumn('article_id', $articleId);
            $this->view->renderHtml('articles/view.php', ['article' => $article, 'comments' => $comments]);
        }

        public function edit(int $articleId): void
        {
            $article = Article::getById($articleId);
            if ($article === null){
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }

            if (!empty($_POST)) {
                $article->setName($_POST['name']);
                $article->setText($_POST['text']);
                $article->save();
                header('Location: /www/rk3/www/article/' . $articleId, true, 301);
                exit();
            }

            $this->view->renderHtml('articles/edit.php', ['article' => $article]);
        }
        public function add(): void{
            if (!empty($_POST)) {
                $author = User::getById(1);
                $article = new Article();
                $article->setAuthorId($author);
                $article->setName($_POST['name']);
                $article->setText($_POST['text']);
                $article->save();

                header('Location: /www/rk3/www/article/' . $article->getId(), true, 301);
                exit();
            }

            $this->view->renderHtml('articles/add.php', []);
        }
        public function delete(int $articleId):void{
            $article = Article::getById($articleId);
            if ($article === null){
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }
            $article->delete();

            header('Location: /www/rk3/www', true, 301);
        }
    }
?>