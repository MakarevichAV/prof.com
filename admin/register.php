<?php
    $title = 'Регистрация';
    
    include($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
    include($_SERVER['DOCUMENT_ROOT'].'/modules/head.php');
    if ( empty($_SESSION['user']) ) {  // если не выполнен вход
        header("location:/index.php"); // то перенаправить на главную страницу
    } else {
        if ( $_SESSION['user']['login'] != 'admin' ) { // если вход выполнен но не админ
            header("location:/index.php");             // перенаправить на гланую
        }
    }
    include($_SERVER['DOCUMENT_ROOT'].'/modules/menu.php');
    if (empty($_SESSION['user'])) {

    }

    if ( !empty( $_GET ) ) {
        $fio = $_GET['fio'];
        $position = $_GET['position'];
        $unit = $_GET['unit'];
        $tel = $_GET['tel'];
        $email = $_GET['email'];       
    } else {
        $fio = '';
        $position = '';
        $unit = '';
        $tel = '';
        $email = '';
    }
    d($_GET);
?>

<div class="content">
    <h2 class="margin-bottom50 margin-top50">Регистрация члена профсоюза</h2>
    <div class="content-text margin-bottom20">
        <form class="form user-form" action="/handlers/regUser.php" method="post">
            
            <input class="user-input margin-bottom10" type="text" name="fio" placeholder="ФИО" value="<?=$fio?>">
            <input class="user-input margin-bottom10" type="text" name="position" placeholder="Должность" value="<?=$position?>">
            <input class="user-input margin-bottom10" type="text" name="unit" placeholder="Структурное подразделение" value="<?=$unit?>">
            <input class="user-input margin-bottom10" type="text" name="tel" placeholder="Телефон без пробелов с 8" value="<?=$tel?>">
            <input class="user-input margin-bottom10" type="text" name="email" placeholder="e-mail" value="<?=$email?>">
            <input class="user-input margin-bottom10" type="text" name="login" placeholder="Логин">
            <div class="password-reg flex">
                <input class="user-input width100 margin-bottom10" type="password" name="password1" id="password1" placeholder="Пароль">
            </div>
            <div class="password-reg flex">
                <input class="user-input width100 margin-bottom10" type="password" name="password2" id="password2" placeholder="Повторите пароль">
            </div>
            <input class="user-input margin-bottom10 submit disabled-button" type="submit" id="submit" value="Зарегистрировать" disabled>
            
        </form>
    </div>
</div>

<?php
    include($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?>