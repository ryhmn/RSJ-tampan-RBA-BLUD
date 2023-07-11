<?php

use yii\helpers\Html;

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item mb-1">
            <a href="<?=\yii\helpers\Url::home()?>" class="nav-link">
                <?= Html::img('@web/images/rsj_text_logo.png', ['alt' => "Logo RSJ Tampan", 'style' => 'height: 140%;']) ?>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
                <?php
                    setlocale(LC_TIME, 'id_ID', 'id', 'idn');
                    $date = date('Y-m-d');
                    $indonesian_date = strftime('%A, %d %B %Y', strtotime($date));
                    
                    echo $indonesian_date;
                    ?>
            </a>
        </li>
        <li class="nav-item my-2 bg-danger px-2 rounded py-1">
            <?php echo Html::a('<i class="fas fa-sign-out-alt"></i>', ['site/logout'], ['data-method' => 'post']);?>
        </li>
    </ul>
</nav>
<!-- /.navbar -->