<?php
    $title = 'Обработка обращения';
    $main = '/index.php/';
    include($_SERVER['DOCUMENT_ROOT'].'/modules/head.php');
    include($_SERVER['DOCUMENT_ROOT'].'/modules/menu.php');

    $qr = "SELECT * FROM `appeals` ORDER BY `id` DESC";
    $result = mysqli_query($connect, $qr);

    $template = [];
    while ( $row = mysqli_fetch_assoc($result) ) {
        $template[] = $row;
    }

?>
    <div class="content">
        <h2 class="margin-bottom40 margin-top50">Обращения</h2>
        <?php if ( !empty($template) ) : ?> 
            <?php foreach($template as $i => $v): ?>
                <div class="card margin-bottom30">
                    <p class="margin-bottom10"><span class="bold">Имя:</span> <?=$v['fio']?></p>
                    <p class="margin-bottom10"><span class="bold">Должность:</span> <?=$v['position']?></p>
                    <p class="margin-bottom10"><span class="bold">Подразделение:</span> <?=$v['unit']?></p>
                    <p class="margin-bottom10"><span class="bold">Телефон:</span> <?=$v['tel']?></p>
                    <p class="margin-bottom10"><span class="bold">Email:</span> <?=$v['email']?></p>
                    <p class="margin-bottom10"><span class="bold">Дата:</span> <?=$v['date']?></p>
                    <p class="margin-bottom10"><span class="bold">Обращение:</span> <?=$v['msg']?></p>
                </div>
            <?php endforeach; ?>
        <?php else:?>
            <p>Обращений нет</p>
        <?php endif; ?>
    </div>
<?php
    include($_SERVER['DOCUMENT_ROOT'].'/modules/footer.php');
?> 



<!-- Array
(
    [0] => Array
        (
            [id] => 7
            [fio] => admin
            [position] => admin
            [unit] => profcom
            [tel] => 89774625877
            [email] => profcom.ciam@gmail.com
            [msg] => vnhnxfym
            [date] => 2019-07-05
            [userID] => 10
        )

    [1] => Array
        (
            [id] => 6
            [fio] => admin
            [position] => admin
            [unit] => profcom
            [tel] => 89774625877
            [email] => profcom.ciam@gmail.com
            [msg] => Здравствуйте! Меня обижают
            [date] => 2019-07-03
            [userID] => 10
        )

) -->