<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
    include($_SERVER['DOCUMENT_ROOT'].'/php/functions.php');

    if (!isset($main)) {   // Если на главной странице
        $main = '';
    }

    // Вход в аккаунт, проверка логина и пароля
    if ( !empty($_POST) ) {

        if ( isset($_POST['login']) && isset($_POST['password']) ) {

            $login = $_POST['login'];
            $password = md5(md5($_POST['password']));

            // $login = 'admin';
            // $password = 'admin';

            $qr = "SELECT * FROM `registered` WHERE `login` = '$login' AND `password` = '$password'";
            $result = mysqli_query($connect, $qr);
            if ( isset($result) ) {
                
                if ( mysqli_num_rows($result) == 1 ) {

                    $row = mysqli_fetch_assoc($result);

                    $_SESSION = [
                        'user' => $row
                    ];

                } else {
                    $error = 'Неверный логин или пароль';
                }

            } else {
                $error = 'ошибка';
            }

        } else {
            $error = 'ошибка'; 
        }

    } else {
        // $_SESSION['user'] = [];
    }

    if ( !empty($_SESSION['user']) ) {
        $enterExit = "<a href='/handlers/exit.php' class='enter-exit exit margin-top10'>Выйти</a>";

        $userName = $_SESSION['user']['login'];
        $userFio = $_SESSION['user']['fio'];
        $txtForUser = "
            <p class='text-for-user margin-right30'>
                $userName
            </p>
        ";

        if ( $userName == 'admin' ) {
            $access = "
                <div class='access'>
                    <a class='admin-nav' href='/admin/applications.php'>Заявки</a>
                    <a class='admin-nav' href='/admin/register.php'>Регистрация</a>
                    <a class='admin-nav' href='/admin/news.php'>Новости</a>
                    <a class='admin-nav' href='/admin/appeal.php'>Обращения</a>
                </div>
            ";
        }
        // логика для вывода окна приветствия при входе в аккаунт, чтобы оно вывелось только один раз при входе
        if ( !isset( $_SESSION['i'] ) ) {  // Если не существует элемента массива $_SESSION['i']

            // то присваиваем переменной разметку для popup
            $popupHi = "
                <div class='popupHi'>
                    <div class='window-popup'>
                        <div class='crossHi'></div>
                        <p class='txtHi margin-bottom20'>Добро пожаловать, $userFio!</p>
                        <p class='txtHi margin-bottom20'>
                            Теперь Вам открыты все разделы сайта
                        </p>
                        <div class='button'>Хорошо, спасибо</div>
                    </div>
                </div>
            ";

            $_SESSION['i'] = 0;

        }

    } else {
        $enterExit = "<p class='enter-exit enter margin-top10'>Войти</p>";
        unset( $_SESSION['i'] );
    }

    $_SESSION['url'] = $_SERVER['REQUEST_URI'];
    
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/styles/style.css">
    <title><?=$title?></title>
</head>
<body id="top">

    <?php
        if ( isset($access) ) {
            echo $access;
        }
    ?>

    <div class="wrapper">
        <div class="head">
            
            <?php
                if ( isset($txtForUser) ) {
                    echo $txtForUser;
                }
            ?>
            
            <div class="logo">
                <div class="logo-pic margin-right15"></div>
                <div class="logo-text">
                    Профсоюз<br />ЦИАМ
                </div>
            </div>
            <div class="nav">
                <div class="cross-menu"></div>
                <a href="/index.php" class="menu-item margin-bottom-mob15">Главная</a>
                <a href="<?=$main?>#politics" class="menu-item margin-bottom-mob15">Цели<br />и задачи</a>
                <a href="/pages/news.php" class="menu-item margin-bottom-mob15">Новости</a>
                <a href="<?=$main?>#contact" class="menu-item margin-bottom-mob15">Контакты</a>
                <a href="/pages/appeal.php" class="menu-item margin-bottom-mob15">Обращение</a>
                <a href="<?=$main?>#join" class="menu-item">Вступить<br />в профсоюз</a>
            </div>
            <div class="menu-button">
                <div class="line line1"></div>
                <div class="line line2"></div>
                <div class="line line3"></div>
            </div>
        </div>
        <?=$enterExit?> <!-- Войти/Выйти -->
        <div id="msg"></div>

        <!-- всплывающее окно входа в систему -->
        <div class="popup">
            <div class="window-popup">
                <div class="cross"></div>
                <form class="form-enter" method="post">
                    <p class="enter-text margin-bottom20">Войти могут только зарегистрированные члены профсоюза!</p>
                    <a href="<?=$main?>#join" class="join inline-block margin-bottom20">Вступить в профсоюз</a>
                    <input class="enter-input margin-bottom10" type="text" name="login" placeholder="Логин">
                    <input class="enter-input margin-bottom10" type="password" name="password" placeholder="Пароль">
                    <input class="enter-input margin-bottom10 submit" type="submit" value="Войти">
                </form>
            </div>
        </div>

        <!--
            Окно приветствия   //   Подставится только после входа. 
            После закрытия (jQuery) и дальнейшего серфинга элемент сессии $_SESSION['i'], 
            отвечающий за появление $popupHi, удалится. При выходе появляется  $_SESSION['i'] = 0
        -->
        <?php
            if ( isset( $popupHi ) ) {
                echo $popupHi;
            }
        ?>
        

