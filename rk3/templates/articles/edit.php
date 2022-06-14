<?php include __DIR__.'/../header.html';?>
    <div class="edit">
        <h3>Редактирование статьи</h3>
        <form action="" method="post" class="edit-form">
            <input type="text" required name="name" value="<?=$article->getName()?>">
            <br>
            <textarea type="text" required name="text"><?=$article->getText()?></textarea>
            <button>Сохранить</button>
        </form>
    </div>
<?php include __DIR__.'/../footer.html';

