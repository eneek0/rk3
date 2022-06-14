<?php include __DIR__.'/../header.html';?>
    <div class="edit">
        <h3>Редактирование комментария</h3>
        <form action="" method="post" class="edit-form">
            <textarea type="text" required name="text"><?=$comment->getText()?></textarea>
            <button>Сохранить</button>
        </form>
    </div>
<?php include __DIR__.'/../footer.html';

       