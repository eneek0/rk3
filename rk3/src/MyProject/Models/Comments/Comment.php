<?php
namespace MyProject\Models\Comments;
use MyProject\Models\Users\User;
use MyProject\Models\ActiveRecordEntity;

class Comment extends ActiveRecordEntity {
    protected $text;
    protected $authorId;
    protected $articleId;
    protected $createdAt;

    public function getText() {
        return $this->text;
    }

    public function setArticleId(int $id) {
        $this->articleId = $id;
    }

    public function getArticleId() {
        return $this->articleId;
    }

    public function setText(string $text){
        $this->text = $text;
    }

    public function getAuthor() {
        return User::getById($this->authorId);
    }

    public function setAuthorId(User $author) {
        $this->authorId = $author->id;
    }

    public static function getTableName(): string {
        return 'comments';
    }
}
?>