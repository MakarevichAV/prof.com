<?php
    $title = 'Заявки';
    $main = '/index.php/';
    include($_SERVER['DOCUMENT_ROOT'].'/php/connect.php');

    $template = [];
    $qr = "SELECT * FROM `wishing_users`";
    $result = mysqli_query( $connect, $qr );
    while ( $row = mysqli_fetch_assoc($result) ) {
        $template[] = $row;
    }
    
    include($_SERVER['DOCUMENT_ROOT'].'/modules/head.php');
    if ( empty($_SESSION['user']) ) {  // если не выполнен вход
        header("location:/index.php"); // то перенаправить на главную страницу
    } else {
        if ( $_SESSION['user']['login'] != 'admin' ) { // если вход выполнен но не админ
            header("location:/index.php");             // перенаправить на гланую
        }
    }
    include($_SERVER['DOCUMENT_ROOT'].'/modules/menu.php');
    // d($template);
?>
    <div class="content">
        <h2 class="margin-bottom40 margin-top50">Список заявок</h2>
        <?php if ( !empty( $template ) ): ?> 
            <?php foreach( $template as $key => $value ):?>
                <div class="card margin-bottom30">
                    <p class="margin-bottom10"><span class="bold">Имя:</span> <?=$value['fio']?></p>
                    <p class="margin-bottom10"><span class="bold">Должность:</span> <?=$value['position']?></p>
                    <p class="margin-bottom10"><span class="bold">Подразделение:</span> <?=$value['unit']?></p>
                    <p class="margin-bottom10"><span class="bold">Телефон:</span> <?=$value['tel']?></p>
                    <p class="margin-bottom10"><span class="bold">Email:</span> <?=$value['email']?></p>
                    <p class="margin-bottom10"><span class="bold">Дата:</span> <?=$value['date']?></p>
                    <a href="/admin/register.php?fio=<?=$value['fio'].'&position='.$value['position'].'&unit='.$value['unit'].'&tel='.$value['tel'].'&email='.$value['email'] ?>" class="button reg decor-none">Зарегистрировать</a>
                </div>    
            <?php endforeach; ?>
        <?php else: ?>
            <p class="margin-bottom10">Заявок не найдено</p>
        <?php endif; ?>
    </div>
<?php
    include($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?>