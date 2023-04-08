<?php
use yii\helpers\Html;
?>

<div class="card" style="box-shadow: none;">
    <div class="card-body login-card-body">
        <div class="login-logo text-left mb-0">
            <a href="javascript:void(0)" class="font-weight-bold">RBA BLUD</a>
        </div>
        <p class="login-box-msg text-left pl-0 mb-4">Selamat datang di aplikasi <b>Rencana Belanja Anggaran RSJ Tampan</b>, silakan login ke dalam akun anda.</p>

        <?php $form = \yii\bootstrap4\ActiveForm::begin(['id' => 'login-form']) ?>

        <?= $form->field($model, 'username', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text rounded-right"><span class="fas fa-user"></span></div></div>',
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form->field($model,'password', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text rounded-right"><span class="fas fa-lock"></span></div></div>',
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <!-- <div class="col-8">
                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => '<div class="icheck-primary">{input}{label}</div>',
                    'labelOptions' => [
                        'class' => ''
                    ],
                    'uncheck' => null
                ]) ?>
            </div> -->
            <!-- <div class="col-4 mx-auto"> -->
                <?= Html::submitButton('Login', ['class' => 'btn btn-success btn-block mx-2 mt-4']) ?>
            <!-- </div> -->
        </div>

        <?php \yii\bootstrap4\ActiveForm::end(); ?>

        <!-- <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
            </a>
        </div> -->
        <!-- /.social-auth-links -->

        <!-- <p class="mb-1">
            <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
            <a href="register.html" class="text-center">Register a new membership</a>
        </p> -->
    </div>
    <!-- /.login-card-body -->
</div>