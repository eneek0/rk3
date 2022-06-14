<?php
namespace MyProject\Controllers;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\Models\Comments\Comment;
use MyProject\View\View;

class CommentController {
    private $view;
    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__.'/../../../templates');
    }

    public function edit(int $commentId): void
    {
        $comment = Comment::getById($commentId);

        if (!empty($_POST)) {
            if ($comment === null){
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }
            $comment->setText($_POST['text']);
            $comment->save();

            header('Location: /www/rk3/www/article/' . $comment->getArticleId(), true, 301);
            return;
        }
        $this->view->renderHtml('comments/edit.php', ['comment' => $comment], 301);
    }

    public function add(): void{
        if (!empty($_POST)) {
            $author = User::getById(1);
            $comment = new Comment();
            $comment->setAuthorId($author);
            $comment->setArticleId($_POST['article_id']);
            $comment->setText($_POST['text']);
            $comment->save();
        }
        header('Location: /www/rk3/www/article/' . $comment->getArticleId(), true, 301);
    }

    public function delete(int $articleId):void{
        $article = Article::getById($articleId);
        if ($article === null){
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        $article->delete();
    }
}
?>