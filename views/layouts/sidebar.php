<aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar position-fixed">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-capitalize">
                    <?php echo Yii::$app->user->identity->username ?>
                </a>
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
                    ['label' => 'Dashboard', 'icon' => 'home', 'url' => ['site/index']],

                    // ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    // do this to filter which menu will display to user

                    ['label' => 'Developer Mode', 'header' => true],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    
                    ['label' => 'Perencanaan', 'header' => true],
                    [
                        'label' => 'Perencanaan',
                        'icon' => 'tasks',
                        'items' => [
                            ['label' => 'Pergeseran', 'icon' => 'chevron-circle-right'],
                            ['label' => 'Detail Pergeseran', 'icon' => 'chevron-circle-right'],
                            ['label' => 'Pagu Indikatif', 'icon' => 'chevron-circle-right'],
                            ['label' => 'Belanja', 'icon' => 'chevron-circle-right']
                        ]
                    ],

                    ['label' => 'Keuangan', 'header' => true],
                    [
                        'label' => 'Keuangan',
                        'icon' => 'hand-holding-usd',
                        'items' => [
                            ['label' => 'Pendapatan', 'icon' => 'chevron-circle-right'],
                            ['label' => 'Belanja', 'icon' => 'chevron-circle-right']
                        ]
                    ],
                    
                    ['label' => 'Bidang', 'header' => true],
                    [
                        'label' => 'Bidang',
                        'icon' => 'sitemap',
                        'items' => [
                            ['label' => 'Belanja', 'icon' => 'chevron-circle-right']
                        ]
                    ],

                    ['label' => 'Admin', 'header' => true],
                    ['label' => 'Data User', 'url' => ['/user/index'], 'icon' => 'users'],
                    ['label' => 'Data Bidang', 'url' => ['/bidang/index'], 'icon' => 'sitemap'],
                    ['label' => 'Data Satuan', 'url' => ['/satuan/index'],'icon' => 'weight'],
                    ['label' => 'RBA', 'url' => ['/rba/index'], 'icon' => 'archive'],
                    ['label' => 'Data Item', 'url' => ['/item/index'], 'icon' => 'pills'],
                    ['label' => 'Data Jenis Belanja', 'url' => ['/jenis-belanja/index'], 'icon' => 'tags']
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>