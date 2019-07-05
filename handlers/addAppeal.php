<?php
    $title = 'Обработка обращения';
    $main = '/index.php/';
    include($_SERVER['DOCUMENT_ROOT'].'/modules/head.php');
    include($_SERVER['DOCUMENT_ROOT'].'/modules/menu.php');
    // d($_SESSION);
    if ( !empty( $_SESSION['user'] ) && !empty( $_POST ) ) {
        $name = $_SESSION['user']['fio'];
        $position = $_SESSION['user']['position'];
        $unit = $_SESSION['user']['unit'];
        $tel = $_SESSION['user']['tel'];
        $email = $_SESSION['user']['email'];
        $userID = $_SESSION['user']['id'];
        // $_POST['appeal'] = '';
        if ( !empty( $_POST['appeal'] ) ) {
            
            $msg = $_POST['appeal'];

            // отправка сообщения в БАЗУ ДАННЫХ
            $qr = "INSERT INTO `appeals` ( 
                                            `fio`, 
                                            `position`, 
                                            `unit`, 
                                            `tel`, 
                                            `email`, 
                                            `msg`, 
                                            `date`,
                                            `userID`
                                            ) 
                                    VALUES (
                                            '${'name'}', 
                                            '${'position'}', 
                                            '${'unit'}', 
                                            '${'tel'}', 
                                            '${'email'}', 
                                            '${'msg'}', 
                                            NOW(),
                                            '${'userID'}'
                                            );";
            $result = mysqli_query( $connect, $qr );  // записываем сообщение и данные пользователя в таблицу обращений
            if ($result) {
                $textFotUser = "
                    <h2 class='margin-bottom50 margin-top50'>$name</h2>
                    <div class='content-text margin-bottom20'>
                        <p class='bold margin-bottom20'>Ваше обращение отправлено</p>
                        <p class='margin-bottom50'>Мы обязательно рассмотрим его и свяжемся с Вами 
                        по телефону <span>$tel</span> или по электронной почте <span>$email</span></p>
                    </div>
                ";
            } else {
                $textFotUser = "
                    <h2 class='margin-bottom50 margin-top50'>Произошла ошибка!</h2>
                ";
            }

        } else {
            $textFotUser = "
                <h2 class='margin-bottom50 margin-top50'>$name</h2>
                <div class='content-text margin-bottom20'>
                    <p class='bold margin-bottom20'>Вы отправили пустое сообщение</p>
                    <p class='margin-bottom20'>Вы можете вернуться и попытаться отправить сообщение еще раз.</p>
                    <p class='margin-bottom50'>
                        Если у Вас возникли трудности с отправкой обращения, просто позвоните и напишите нам. 
                        Наши <a href='$main#contact'>контакты</a>
                    </p>
                </div>
            ";
        } 
    } else {
        $textFotUser = "
            <h2 class='margin-bottom50 margin-top50'>Произошла ошибка!</h2>
        ";
    }
?>

<div class="content">
    <?=$textFotUser?>
</div>

<?php
    include($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?> 