<?php
include($_SERVER['DOCUMENT_ROOT'].'/modules/head.php');
include($_SERVER['DOCUMENT_ROOT'].'/modules/menu.php');

if ( !empty($_POST['yes']) && !empty($_GET['id']) ) {

    $id = $_GET['id'];
    
    $qr = "DELETE FROM `news` WHERE `news`.`id` = '${'id'}'";
    $result = mysqli_query($connect, $qr);

    $qrDelFiles = "DELETE FROM `news_files` WHERE `new_id` = '${'id'}'";
    $resultDelFiles = mysqli_query($connect, $qr);

    if ( $result ) {
        echo 'Новость удачно удалена';
    } else {
        echo 'Не удалось удалить новость';
    }

} else {
    echo 'Не удалось удалить новость';
}

?>

<?php
    include($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?> 