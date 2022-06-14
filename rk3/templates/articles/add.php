<?php include __DIR__.'/../header.html';?>
    <div class="edit">
        <h3>Новая статья</h3>
        <form action="" method="post" class="edit-form">
            <input type="text" required name="name" placeholder="Заголовок статьи">
            <br>
            <textarea type="text" required name="text" placeholder="Содержание статьи"></textarea>
            <button>Сохранить</button>
        </form>
    </div>
<?php include __DIR__.'/../footer.html';

