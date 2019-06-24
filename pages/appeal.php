<?php
    // Подключение title 
    $title = 'Обращение';
    $main = '/index.php/';

    include($_SERVER['DOCUMENT_ROOT'].'/modules/head.php');
    include($_SERVER['DOCUMENT_ROOT'].'/modules/menu.php');

    if ( !empty( $_SESSION['user'] ) ) {

        $userName = $_SESSION['user']['fio'];
        $textForUser = "
            <p class='margin-bottom20'> 
                Вы можете отправить нам жалобу в случае несправедливого отношения к Вам со стороны руководства. Или, может быть, Вас заставляют выполнять работу не вашей квалификации.
                Или вы просто хотите написать обращение с пожеланиями или предложениями. 
            </p>
            <p class='margin-bottom20'>
                Пишите нам по интересующим и волнующим Вас вопросам.
            </p>
        ";
        $form = "
            <div class='content-text margin-bottom20'>
                <form class='form appeal-form' action='/handlers/addAppeal.php' method='post'>
                    <textarea class='appeal margin-bottom10' name='appeal' rows='8' placeholder='Напишите здесь Ваш вопрос или опишите проблему'></textarea>
                    <input class='user-input margin-bottom10 submit' type='submit' value='Отправить сообщение'>
                </form>
            </div>
        ";
    } else {
        $userName = 'Пользователь';
        $textForUser = "
            <p class='margin-bottom20'> 
                Чтобы отправлять свои обращения, нужно войти в свой аккаунт
            </p>
            <p class='margin-bottom20'>
            Чтобы получить логин и пароль для входа, необходимо вступить в профсоюз
            </p>
            <a href='$main#join' class='join inline-block margin-bottom50'>Вступить в профсоюз</a>
        ";
        $form = '';
    }

?>

<div class="content">
    <h2 class="margin-bottom50 margin-top50">Обращение в профсоюз</h2>
    <div class="content-text margin-bottom20">
        <p class="bold margin-bottom20">Уважаемый <?=$userName?>!</p>
        <?=$textForUser?>
        <!-- <p class="margin-bottom20"> 
            Вы можете отправить нам жалобу в случае несправедливого отношения к Вам со стороны руководства. Или, может быть, Вас заставляют выполнять работу не вашей квалификации.
            Или вы просто хотите написать обращение с пожеланиями или предложениями. 
        </p>
        <p class="margin-bottom20">
            Пишите нам по интересующим и волнующим Вас вопросам.
        </p> -->
    </div>
    <?=$form?>
    <!-- <div class="content-text margin-bottom20">
        <form class="form appeal-form" action="/handlers/addAppeal.php" method="post">
            <input class="user-input margin-bottom10" type="text" name="fio" placeholder="ФИО">
            <input class="user-input margin-bottom10" type="text" name="tel" placeholder="Телефон без пробелов с 8">
            <input class="user-input margin-bottom10" type="text" name="email" placeholder="e-mail">
            <textarea class="appeal margin-bottom10" name="appeal" rows="8" placeholder="Напишите здесь Ваш вопрос или опишите проблему"></textarea>
            <input class="user-input margin-bottom10 submit" type="submit" value="Отправить сообщение">
        </form>
    </div> -->
</div>

<?php
    include($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?> 