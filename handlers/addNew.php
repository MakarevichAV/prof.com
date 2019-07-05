<?php
    // Подключение title 
    $title = 'Результат публикации';

    include($_SERVER['DOCUMENT_ROOT'].'/modules/head.php');
    include($_SERVER['DOCUMENT_ROOT'].'/modules/menu.php');
    if ( empty($_SESSION['user']) ) {  // если не выполнен вход
        header("location:/index.php"); // то перенаправить на главную страницу
    } else {
        if ( $_SESSION['user']['login'] != 'admin' ) { // если вход выполнен но не админ
            header("location:/index.php");             // перенаправить на гланую
        }
    }
    $new = '';
    if ( !empty( $_POST ) ) {

        if ( !empty( $_POST['header'] ) ) {

            foreach( $_POST['paragraph'] as $key => $val ) {

                if ( !empty( $val ) ) {
                
                    // Слияние параграфов
                    $new = $new.'<p>'.$val.'</p>';
                    $publish = true; // разрешение публикации
                    
                } else { 
                    $publish = false; // запрет публикации
                    break;
                }

            }

        } else {
            echo 'Заполнены не все поля';
        }

    } else {
        echo 'Не могу добавить пустую новость';
    }
    

//     INSERT INTO `news` (
//         `id`, 
//         `header`, 
//         `text`, 
//         `date`
//         ) 
// VALUES (
//         NULL, 
//         'Заголовок', 
//         'текст', 
//         NOW()
//         );

if ( $publish ) {

    $header = $_POST['header'];

    $qr = "INSERT INTO `news` ( 
                            `header`, 
                            `text`, 
                            `date`
                            ) 
                    VALUES (
                            '${'header'}', 
                            '${'new'}', 
                            NOW()
                            )";
    $result = mysqli_query($connect, $qr);
    if ( $result ) {

        if ( !empty($_FILES) ) {
            $qr = "SELECT * FROM `news` WHERE   `header` = '{$header}'
                                        AND     `text` = '{$new}'";
            $result = mysqli_query($connect, $qr);
            $thisNew = mysqli_fetch_assoc($result);
            foreach ( $_FILES['file']['tmp_name'] as $i => $v ) {
                $fileName = $thisNew['id'] . '-' . $_FILES['file']['name'][$i];
                copy($v, '../images/news/' . $fileName);
                
                // Добавляем файлы в Базу Данных в таблицу файлов news_files
                $qrAddFile = "INSERT INTO `news_files` ( 
                                                `file`, 
                                                `new_id` 
                                                ) 
                                        VALUES (
                                                '{$fileName}', 
                                                '{$thisNew['id']}'
                                                )";
                $resultAddFile = mysqli_query($connect, $qrAddFile);
                if ( $resultAddFile ) {
                    d($_FILES);
                    $msg = 'Новость опубликована, файлы прикрепленны удачно';
                } else {
                    $msg = 'Новость опубликована, но файлы не прикрепились. Произошла Какая то ошибка.';
                    break;
                }
            }
            
            echo $msg;

        } else {
            echo 'Новость опубликована';
        }

    } else {
        echo 'Ошибка публикации';
    }
    
} else {
    echo 'Обнаружен пустой параграф. Новость не опубликована.';
}


?>



<?php
    include($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?> 