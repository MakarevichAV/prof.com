<?php
    $title = 'Статус регистрации';
    include($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');

    if ( !empty($_POST) ) {

        if ( !empty( $_POST['fio'] ) && 
             !empty( $_POST['position'] ) &&
             !empty( $_POST['unit'] ) && 
             !empty( $_POST['tel'] ) && 
             !empty( $_POST['email'] ) && 
             !empty( $_POST['login'] ) &&
             !empty( $_POST['password1'] ) &&
             !empty( $_POST['password2'] ) ) {

                $fio = trim(strip_tags($_POST['fio']));
                $position = trim(strip_tags($_POST['position'])); 
                $unit = trim(strip_tags($_POST['unit']));
                $tel = trim(strip_tags($_POST['tel'])); 
                $email = trim(strip_tags($_POST['email']));
                $login = trim(strip_tags($_POST['login']));
                $password1 = trim(strip_tags($_POST['password1']));
                $password2 = trim(strip_tags($_POST['password2']));

                $password = md5(md5($password2));

                if ( $_POST['password1'] === $_POST['password2'] ) {

                    $qr = "SELECT * FROM `registered` WHERE `login` = '${'login'}'";
                    $result = mysqli_query($connect, $qr);

                    if ( mysqli_num_rows($result) == 0 ) {

                        $qr = "INSERT INTO `registered` ( 
                                                        `fio`, 
                                                        `position`, 
                                                        `unit`, 
                                                        `tel`, 
                                                        `email`, 
                                                        `login`, 
                                                        `password`, 
                                                        `date`
                                                        ) 
                                                VALUES (
                                                        '${'fio'}', 
                                                        '${'position'}', 
                                                        '${'unit'}', 
                                                        '${'tel'}', 
                                                        '${'email'}', 
                                                        '${'login'}', 
                                                        '${'password'}', 
                                                        NOW()
                                                        )";
                        $result = mysqli_query($connect, $qr);

                        if ($result) {
                            $msg = "Член профсоюза успешно зарегистрирован";
                            $classIcon = 'mark';
                        } else {
                            $msg = "Произошла ошибка регистрации";
                            $classIcon = 'cross-inp';
                        }

                    } else {
                        $msg = "Пользователь с таким логином уже существует. Придумайте другой логин";
                        $classIcon = 'cross-inp';
                    }

                } else {
                    $msg = "Ошибка пароля";
                    $classIcon = 'cross-inp';
                }

        } else {
            $msg = "Заполнены не все поля";
            $classIcon = 'cross-inp';
        }

    } else {
        $msg = "Заполнены не все поля";
        $classIcon = 'cross-inp';
    }


    include($_SERVER['DOCUMENT_ROOT'].'/modules/head.php');
    include($_SERVER['DOCUMENT_ROOT'].'/modules/menu.php');
?>

<div class="content">
<h2 id="politics" class="margin-bottom20 margin-top50 flex text-left"><span class="icon <?=$classIcon?> margin-right15"></span><?=$msg?></h2>
</div>

<?php
    include($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?>  