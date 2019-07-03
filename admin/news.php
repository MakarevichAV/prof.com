<?php

    // Подключение title 
    $title = 'Создать новость';

    include($_SERVER['DOCUMENT_ROOT'].'/modules/head.php');
    include($_SERVER['DOCUMENT_ROOT'].'/modules/menu.php');
    if ( empty($_SESSION['user']) ) {  // если не выполнен вход
        header("location:/index.php"); // то перенаправить на главную страницу
    } else {
        if ( $_SESSION['user']['login'] != 'admin' ) { // если вход выполнен но не админ
            header("location:/index.php");             // перенаправить на гланую
        }
    }

?>


<div class="content">
    <h1 class="margin-bottom50 align-center">
        Новая статья
    </h1>
    <div class="content-text margin-bottom20">
        <form class="form user-form" action="/handlers/addNew.php" method="post" enctype="multipart/form-data">
            <p class="margin-bottom20">Все поля обязательны для заполнения</p>
            <input class="user-input margin-bottom10" type="text" name="header" placeholder="Заголовок / название статьи">
            <div class="par-arr">
                <textarea class='paragraph' name='paragraph[]' rows='8' placeholder='Параграф'></textarea>
            </div>
            <div class="flex">
                <input class="user-input margin-bottom10 add" type="button" value="Добавить параграф">
                <input class="user-input margin-bottom10 delete" type="button" value="Удалить параграф">
            </div>
            <input type="file" name="file[]" multiple>
            <input class="user-input margin-bottom10 submit" type="submit" value="Опубликовать новость">
        </form>
    </div>
</div>


<?php
    include($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?> 