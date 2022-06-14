<?php include __DIR__.'/../header.html';?>
    <h2><?= $article->getName();?></h2>
    <p><?= $article->getText();?></p>
    <hr>
    <div class="article-actions">
        <a href="/www/rk3/www/article/<?=$article->getId()?>/edit" class="comment-button">Редактировать</a>
        <a href="/www/rk3/www/article/<?=$article->getId()?>/delete" class="comment-button">Удалить</a>
    </div>
    <h3>Оставить комментарий</h3>
    <form class="form" action="/www/rk3/www/article/<?=$article->getId()?>/comments" method="post">
        <input type="text" name="article_id" value="<?=$article->getId()?>" class="hidden">
        <textarea name="text" cols="30" rows="10"></textarea>
        <button>Отправить</button>
    </form>
    <?php if (count($comments)) { ?>
    <h3>Комментарии</h3>
    <ul>
        <?php foreach($comments as $comment): ?>
            <li class="comment" id="comment<?=$comment->getId()?>">
                <p class="comment-text"><?=$comment->getText()?></p>
                <p class="comment-author">Автор: <?=$comment->getAuthor()->getName()?></p>
                <div class="comment-actions">
                    <a href="/www/rk3/www/comments/<?=$comment->getId()?>/edit" class="comment-button">Редактировать</a>
                </div>
            </li>
            <hr>
        <?php endforeach; ?>
    </ul>
    <?php } ?>
<?php include __DIR__.'/../footer.html';

       