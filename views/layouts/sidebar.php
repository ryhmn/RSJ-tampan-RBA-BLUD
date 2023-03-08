<?php

use yii\helpers\Html;

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed" style="overflow-y: none; bottom: 0; top: 0;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link text-center">
        <?= Html::img('@web/images/rsj_logo.png', ['alt' => "Rumah Sakit Jiwa Tampan", 'style' => 'width: 15%; height: 2.5rem;'])?>
        <span class="brand-text font-weight-bolder">APLIKASI RBA BLUD</span>
        <!-- <br>
        <span class="brand-text font-weight-light font-size-small">RSJ Tampan</span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $assetDir ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-capitalize"><?php echo Yii::$app->user->identity->username ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2 mb-5">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [

                    ['label' => 'Dashboard', 'icon' => 'fas fa-home', 'url' => ['site/index']],
                    ['label' => 'Perencanaan', 'header' => true],
                    [
                        'label' => 'Perencanaan',
                        'icon' => 'fad fa-asterisk',
                        'items' => [
                            ['label' => 'Pergeseran', 'url' => ['pergeseran/index']],
                            ['label' => 'Detail Pergeseran', 'url' => ['dpergeseran/index']],
                            ['label' => 'Pagu Indikatif', 'url' => ['belanja/index']],
                            ['label' => 'Belanja', 'url' => ['dbelanja/index']],
                        ]
                    ],
                    ['label' => 'Keuangan', 'header' => true],
                    [
                        'label' => 'Keuangan',
                        'icon' => 'fas fa-dollar-sign',
                        'items' => [
                            ['label' => 'Pendapatan', 'url' => ['pendapatan/index']],
                            // ['label' => 'Belanja', 'url' => ['dbelanja/index']],
                            ['label' => 'Belanja'],
                        ]

                    ],
                    ['label' => 'Bidang', 'header' => true],
                    [
                        'label' => 'Bidang',
                        'icon' => 'fad fa-book-open',
                        'items' => [
                            // ['label' => 'Belanja', 'url' => ['dbelanja/index']],
                            ['label' => 'Belanja'],
                        ]

                    ],
                    ['label' => 'Admin', 'header' => true],
                    ['label' => 'Data User',  'icon' => 'fas fa-user-plus', 'url' => ['user/index']],
                    ['label' => 'Data Bidang',  'icon' => 'fad fa-address-card', 'url' => ['bidang/index']],
                    ['label' => 'Data Satuan',  'icon' => 'fas fa-list-alt', 'url' => ['satuan/index']],
                    ['label' => 'RBA',  'icon' => 'fas fa-archive', 'url' => ['rba/index']],
                    ['label' => 'Data item',  'icon' => 'fas fa-tablets', 'url' => ['item/index']],
                    ['label' => 'Data Jenis Belanja',  'icon' => 'fas fa-tag', 'url' => ['jbelanja/index']],
                    // ['label' => 'Yii2 PROVIDED', 'header' => true],
                    // ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    // ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    // ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                    // ['label' => 'MULTI LEVEL EXAMPLE', 'header' => true],
                    // ['label' => 'Level1'],
                    // [
                    //     'label' => 'Level1',
                    //     'items' => [
                    //         ['label' => 'Level2', 'iconStyle' => 'far'],
                    //         [
                    //             'label' => 'Level2',
                    //             'iconStyle' => 'far',
                    //             'items' => [
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                    //                 ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
                    //             ]
                    //         ],
                    //         ['label' => 'Level2', 'iconStyle' => 'far']
                    //     ]
                    // ],
                    // ['label' => 'Level1'],
                    // ['label' => 'LABELS', 'header' => true],
                    // ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
                    // ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
                    // ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>