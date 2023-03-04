<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= $assetDir ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">RSJ Tampan</span>
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
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [

                    ['label' => 'Dashboard', 'icon' => 'fas fa-home', 'url' => ['site/index']],
                    ['label' => 'Perencanaan', 'header' => true],
                    [
                        'label' => 'Perencanaan',
                        'icon' => 'fad fa-asterisk',
                        'items' => [
                            ['label' => 'Pegeseran',],
                            ['label' => 'Pagu Indikatif',],
                            ['label' => 'Belanja',],
                        ]
                    ],
                    ['label' => 'Keuangan', 'header' => true],
                    [
                        'label' => 'Keuangan',
                        'icon' => 'fas fa-dollar-sign',
                        'items' => [
                            ['label' => 'Pendapatan', 'url' => ['pendapatan/index']],
                            ['label' => 'Belanja',],
                        ]

                    ],
                    ['label' => 'Bidang', 'header' => true],
                    [
                        'label' => 'Bidang',
                        'icon' => 'fad fa-book-open',
                        'items' => [
                            ['label' => 'Belanja',],
                        ]

                    ],
                    ['label' => 'Admin', 'header' => true],
                    ['label' => 'Data User',  'icon' => 'fas fa-user-plus', 'url' => ['user/index']],
                    ['label' => 'Data Bidang',  'icon' => 'fad fa-address-card', 'url' => ['bidang/index']],
                    ['label' => 'Data Satuan',  'icon' => 'fas fa-list-alt', 'url' => ['satuan/index']],
                    ['label' => 'Data item',  'icon' => 'fas fa-tablets', 'url' => ['item/index']],
                    ['label' => 'Data Jenis Belanja',  'icon' => 'fas fa-tag', 'url' => ['jbelanja/index']],
                    ['label' => 'RBA',  'icon' => 'fas fa-tag',],
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