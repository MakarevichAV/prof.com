<?php
    $main = '/index.php/';
    // Подключение коннекта с базой данных и функции для вывода массиввов
    include($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');
    // include($_SERVER['DOCUMENT_ROOT'].'/php/functions.php');

    // Подключение title 
    $title = 'Заявка на регистрацию';
    
    // Данные из массива $_POST
    $fio = $_POST['fio'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $unit = $_POST['unit'];
    // d($_POST);

    $message = ''; // сюда будет записываться сообщение для пользователя
    // Проверка на пустоту массива $_POST
    if (!empty($_POST)) {

        // Проверяем на заполнение всех инпутов через цикл
        $resultEmpty = true;
        foreach ( $_POST as $ind => $val ) {
            // в каждой иттерации проверяем на пустоту элемент массива
            if ( empty($_POST[$ind]) ) {
                $resultEmpty = false;
                break;
            }

        }

        if ($resultEmpty == true) {   // если все инпуты заполнены (не пусты)
            // отправка данных пользователя в базу (в таблицу wishing_users)

            $qr = "INSERT INTO `wishing_users` ( 
                                                `fio`, 
                                                `position`, 
                                                `unit`, 
                                                `tel`, 
                                                `email`,
                                                `date`
                                                ) 
                                            VALUES (
                                                '${'fio'}', 
                                                '${'position'}', 
                                                '${'unit'}', 
                                                '${'tel'}', 
                                                '${'email'}',
                                                NOW()
                                                )";
            $result = mysqli_query( $connect, $qr );
            
            if ($result) {

                $message = "
                    <div class='content'>
                    <h2 class='margin-top50 margin-bottom10'>Здравствуйте</h2>
                    <p class='content-text margin-bottom20 align-center bold'>$fio</p>
                    <p class='content-text margin-bottom20'>Благодарим Вас за заявку. Мы свяжемся с вами по телефону <span class='bold'>$tel</span> или по электронной почте <span class='bold'>$email</span></p>
                    </div>
                ";

            } else {

                $message = "
                    <div class='content'>
                    <h2 class='margin-top50 margin-bottom10'>Произошла шибка</h2>
                    <p class='content-text margin-bottom20 align-center bold'>Попробуйте еще раз</p>
                    <p class='content-text margin-bottom20'>
                        Или свяжитесь с нами. 
                        Наши <a href='$main#contact'>контакты</a>
                    </p>
                    </div>
                ";

            }

        } else {
            $message = "
                <div class='content'>
                <h2 class='margin-top50 margin-bottom10'>!Вернитесь и заполните все поля формы!</h2>
                </div>
            ";
        }

    } else {
        $message = "
            <div class='content'>
            <h2 class='margin-top50 margin-bottom10'>!Вернитесь и заполните все поля формы!</h2>
            </div>
        ";
    }



    include($_SERVER['DOCUMENT_ROOT'].'/modules/head.php');
    include($_SERVER['DOCUMENT_ROOT'].'/modules/menu.php');

?>
    <!-- Вставляем сообщение для пользователя -->
    <?=$message?>
<?php
    include($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?>  