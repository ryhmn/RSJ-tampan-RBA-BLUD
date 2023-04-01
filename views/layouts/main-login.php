<?php

/* @var $this \yii\web\View */
/* @var $content string */

\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700');
$this->registerCssFile('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
\hail812\adminlte3\assets\PluginAsset::register($this)->add(['fontawesome', 'icheck-bootstrap']);

use Symfony\Component\Console\Style\StyleInterface;
use yii\helpers\Html;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>

<body class="hold-transition">
    <?php $this->beginBody() ?>
    <div class="row mx-auto" style="height: 100vh">
        <div class="col-7 p-3 d-flex">
            <?= Html::img('@web/images/rsj_tampan.jpg', ['alt' => "Rumah Sakit Jiwa Tampan", 'class' => 'mw-100 rounded justify-content-center'])?>
        </div>
        <div class="col-5 p-3 d-flex">
            <?= Html::img('@web/images/rsj_text_logo.png', ['alt' => 'Logo RSJ Tampan', 'class' => 'position-absolute m-2', 'style' => 'height: 4.5%;'])?>
            <div class="login-box mx-auto justify-content-center align-self-center">
                <div class="login-logo mb-3">
                    <a href="javascript:void(0)"><b>RBA </b>BLUD</a>
                </div>
                <!-- /.login-logo -->

                <?= $content ?>
            </div>
            <p class="login-box-msg position-absolute mx-auto text-muted" style="bottom: 0; left: 0; right: 0;">&copy; Copyright 2023</p>
            <!-- /.login-box -->
        </div>
    </div>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>