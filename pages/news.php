<?php
    // Подключение title 
    $title = 'Новости';
    $main = '/index.php/';

    include($_SERVER['DOCUMENT_ROOT'].'/modules/head.php');
    include($_SERVER['DOCUMENT_ROOT'].'/modules/menu.php');

    // Отправка комментария в базу данных с привязкой к новости и к пользователю
    if ( !empty( $_POST ) && !empty( $_GET ) && isset( $_POST['coment'] ) ) {

        if ( !empty( $_POST['coment'] ) ) {

            $loginComent = $_GET['login'];
            $fioComent = $_GET['fio'];
            $newIdComent = $_GET['new_id'];

            $coment = $_POST['coment'];


            $qrComent = "INSERT INTO `comments` (
                                            `login`, 
                                            `fio`, 
                                            `text`, 
                                            `new_id`, 
                                            `date`
                                           ) 
                                    VALUES (
                                            '${'loginComent'}', 
                                            '${'fioComent'}', 
                                            '${'coment'}', 
                                            '${'newIdComent'}', 
                                            NOW()
                                            )";
            $resultComent = mysqli_query($connect, $qrComent);

        }

    }

    if ( !empty( $_SESSION['user'] ) ) {

        $userName = $_SESSION['user']['fio'];
        $textForUser = "
            <p class='margin-bottom20'> 
                Вы можете оставлять свои комментарии под новостями и обсуждать различные темы с другими членами профсоюза.
            </p>
        ";
        $form = "
            <div class='content-text margin-bottom20'>
                <form class='form-comment' action='/handlers/news.php' method='post'>
                    <textarea class='appeal margin-bottom10' name='appeal' rows='8' placeholder='Напишите Ваш комментарий'></textarea>
                    <input class='user-input margin-bottom10 submit' type='submit' value='Опубликовать'>
                </form>
            </div>
        ";
        $template = [];
        $qrNews = "SELECT * FROM `news` ORDER BY `id` DESC"; // новости в обратном порядке от большего id к меньшему (от новых к старым)
        
        $resultNews = mysqli_query($connect, $qrNews);
        if ( $resultNews ) {
      
            while ( $row = mysqli_fetch_assoc($resultNews) ) {
                $template['news'][] = $row;
            }

        } else {
            // ошибка 
        }

    } else {
        $userName = 'Пользователь';
        $textForUser = "
            <p class='margin-bottom20'> 
                Чтобы получить доступ к новостям профсоюза, Вам необходимо авторизоваться
            </p>
            <p class='margin-bottom20'>
                Чтобы получить логин и пароль, нужно вcтупить в профсоюз
            </p>
            <a href='$main#join' class='join inline-block margin-bottom50'>Вступить в профсоюз</a>
        ";
        $form = '';
    }

?>

<div class="content">
    <h1 class="margin-bottom50 margin-top50">Новости профсоюза</h1>
    <div class="content-text margin-bottom20">
        <p class="bold margin-bottom20">Уважаемый <?=$userName?>!</p>
        <?=$textForUser?>
    </div>

    <?php if ( !empty( $_SESSION['user'] ) ): ?>  
        <?php
            $login = $_SESSION['user']['login'];
            $fio = $_SESSION['user']['fio'];
        ?>
        
        <?php if ( $resultNews ): ?>

            <?php if ( mysqli_num_rows($resultNews) != 0 ): ?>
                
                <?php foreach( $template['news'] as $key => $val ): ?>

                    <?php
                        $date = $val['date'];
                        $header = $val['header'];
                        $text = $val['text'];
                        $newId = $val['id'];
                    ?>
                    <div class="new-item">
                        <p><?=$date?></p>
                        <h2 class="click-slide"><?=$header?> <span class="up-down">Читать&#9660;</span></h2>
                        <div class="slide">
                            <?=$text?>
                            <!-- <img src="/images/news/01-30-1900-33-10.jpg" width="100%">
                            <img src="/images/news/полиция юмора.png" width="100%"> -->
                            <h2>Комментарии</h2>
                            <div class='content-text margin-bottom20'>
                                <form class='form-comment' action='/pages/news.php?login=<?=$login?>&fio=<?=$fio?>&new_id=<?=$newId?>' method='post'>
                                    <textarea class='appeal margin-bottom10' name='coment' rows='8' placeholder='Напишите Ваш комментарий'></textarea>
                                    <input class='user-input margin-bottom10 submit' type='submit' value='Опубликовать'>
                                </form>
                            </div>
                            <?php
                                $qr = "SELECT * FROM `comments` WHERE `new_id` = '${'newId'}' ORDER BY `id` DESC";
                                $result = mysqli_query($connect, $qr);

                                $template['news'][$key]['coments'] = [];

                                if ( $result ) {
                                    if ( mysqli_num_rows($result) != 0 ) {
                                        while ( $row = mysqli_fetch_assoc($result) ) {
                                            $template['news'][$key]['coments'][] = $row;
                                        }
                                    }
                                }
                    
                            ?>
                            <?php if ( !empty( $template['news'][$key]['coments'] ) ): ?>
                                
                                <?php foreach( $template['news'][$key]['coments'] as $index => $value ): ?>

                                    <div class="comment">
                                        <p class="login"><?=$value['login']?></p>
                                        <p class="user-name">
                                            <?=$value['fio']?><br/>
                                            <span><?=$value['date']?></span> 
                                        </p>
                                        <p class="txt">
                                            <?=$value['text']?>
                                        </p>
                                    </div>

                                <?php endforeach; ?> 

                            <?php endif; ?>
        
                        </div>

                        <?php 
                            if ( $_SESSION['user']['login'] == 'admin' ) {
                                echo 'Здесь будет кнопка удаления новости';
                            }
                        ?>
                        <div class="button-del">Удалить</div>

                    </div>

                <?php endforeach; ?>

                


            <?php else: ?>
                <!-- Нет новостей -->
            <?php endif; ?> 

        <?php else: ?>
            <!-- Ошибка подключения к базе данных -->
        <?php endif; ?>    

    <?php endif; ?> 

    
</div>

<?php
    include($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?> 