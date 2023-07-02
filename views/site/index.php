<?php
/** @var app\models\RbaSearch $searchModel */

use app\models\DetailBelanja;
use app\models\DetailPergeseran;
use app\models\Pergeseran;
use hail812\adminlte3\yii\grid\ActionColumn;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\db\Query;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Dashboard';
?>


<div class="container-fluid px-3">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <?php 
                $cur_year = date('Y');

                echo \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Tahun Anggaran',
                'number' => "<h2 class='font-weight-bold text-muted'>".$cur_year."</h2>",
                'icon' => 'fas fa-cog',
                ]) 
            ?>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <?php 
                $countPergeseran = Pergeseran::find()
                                    ->join('inner join',
                                            'rba',
                                            'rba.rba_id = pergeseran.rba_id'
                                        )
                                    ->where(['rba.rba_tahun' => $cur_year])
                                    ->count();

                echo \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Total Pergeseran',
                'number' => "<h2 class='font-weight-bold text-muted'>".$countPergeseran."</h2>",
                'icon' => 'fas fa-cog',
                ]) 
            ?>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
            <?php
                $queryPenganggaran = new Query();
                $queryPenganggaran->select([
                    'r.rba_tahun',
                    'it.nama_item',
                    'db.harga_satuan',
                    'db.jumlah_belanja'
                ])
                ->from('detail_belanja db')
                ->innerJoin('belanja b', 'db.belanja_id = b.belanja_id')
                ->innerJoin('rba r', 'b.rba_id = r.rba_id')
                ->innerJoin('item it', 'db.item_id = it.item_id')
                ->where(['r.rba_tahun' => $cur_year]);

                $dataProviderPenganggaran = new SqlDataProvider([
                    'sql' => $queryPenganggaran->createCommand()->getRawSql(),
                    'pagination' => [
                        'pageSize' => 2
                    ]
                ]);
                
                Pjax::begin(['id' => 'penganggaran-grid-view']);
                echo GridView::widget([
                    'dataProvider' => $dataProviderPenganggaran,
                    'layout' => '{items} {pager}',
                    'pager' => [
                        'class' => 'yii\widgets\LinkPager',
                        'prevPageLabel' => 'Previous',
                        'nextPageLabel' => 'Next',
                        'maxButtonCount' => 5,
                        'options' => [
                            'class' => 'custom-pagination',
                        ],
                    ],
                    'columns' => [
                        [
                            'header' => 'Tahun Anggaran',
                            'value' => 'rba_tahun',
                            'headerOptions' => ['style' => 'text-align: center;'],
                            'contentOptions' => ['style' => 'text-align: center; text-transform: capitalize; width: 15%;']
                        ],
                        [
                            'header' => 'Nama Barang',
                            'value' => 'nama_item',
                            'headerOptions' => ['style' => 'text-align: center;'],
                            'contentOptions' => ['style' => 'text-transform: capitalize;']
                        ],
                        [
                            'header' => 'Harga Satuan',
                            'value' => 'harga_satuan',
                            'headerOptions' => ['style' => 'text-align: center;'],
                            'contentOptions' => ['style' => 'text-align: center; text-transform: capitalize; width: 15%;'],
                            'format' => ['Currency']
                        ],
                        [
                            'header' => 'Jumlah Belanja',
                            'value' => 'jumlah_belanja',
                            'headerOptions' => ['style' => 'text-align: center;'],
                            'contentOptions' => ['style' => 'text-align: center; text-transform: capitalize; width: 15%;']
                        ]
                    ],
                ]); 
                Pjax::end();
            ?>

            <?php
                $pergeseranIds = Pergeseran::find()
                ->join('inner join',
                        'rba',
                        'rba.rba_id = pergeseran.rba_id'
                    )
                // ->select(['pergeseran.pergeseran_id', 'pergeseran.tanggal'])
                ->where(['rba.rba_tahun' => $cur_year])
                ->all();

                // for ($i = 0; $i < $countPergeseran; $i++) {
                foreach ($pergeseranIds as $i => $pergeseranId) {
                    $containerId = 'pergeseran-grid-view-' . $i;
            ?>

            <h1 class="text-center my-5"><i class="fas fa-arrow-down"></i></h1>

            <p class="text-uppercase font-weight-bold mb-1">Pergeseran <?= $i+1 ?></p>
            <p class="mb-0">Tanggal Pergeseran: <?= $pergeseranId->tanggal_pergeseran ?></p>
            <p class="">Status: <span class="text-capitalize"><?= $pergeseranId->status ?></span></p>
            
            <?php
                $queryPergeseran = new Query();
                $queryPergeseran->select([
                    'r.rba_tahun',
                    'it.nama_item',
                    'dp.harga_satuan',
                    'dp.jumlah_belanja'
                ])
                ->from('detail_pergeseran dp')
                ->innerJoin('pergeseran p', 'dp.pergeseran_id = p.pergeseran_id')
                ->innerJoin('rba r', 'p.rba_id = r.rba_id')
                ->innerJoin('item it', 'dp.item_id = it.item_id')
                ->where(['r.rba_tahun' => $cur_year, 'p.pergeseran_id' => $pergeseranId]);

                $dataProviderPergeseran = new SqlDataProvider([
                    'sql' => $queryPergeseran->createCommand()->getRawSql(),
                    'pagination' => [
                        'pageSize' => 2
                    ]
                ]);
            
                Pjax::begin(['id' => $containerId]);
                echo GridView::widget([
                    'dataProvider' => $dataProviderPergeseran,
                    'layout' => '{items} {pager}',
                    'pager' => [
                        'class' => 'yii\widgets\LinkPager',
                        'prevPageLabel' => 'Previous',
                        'nextPageLabel' => 'Next',
                        'maxButtonCount' => 5,
                        'options' => [
                            'class' => 'custom-pagination',
                        ],
                    ],
                    'columns' => [
                        [
                            'header' => 'Tahun Anggaran',
                            'value' => 'rba_tahun',
                            'headerOptions' => ['style' => 'text-align: center;'],
                            'contentOptions' => ['style' => 'text-align: center; text-transform: capitalize; width: 15%;']
                        ],
                        [
                            'header' => 'Nama Barang',
                            'value' => 'nama_item',
                            'headerOptions' => ['style' => 'text-align: center;'],
                            'contentOptions' => ['style' => 'text-transform: capitalize;']
                        ],
                        [
                            'header' => 'Harga Satuan',
                            'value' => 'harga_satuan',
                            'headerOptions' => ['style' => 'text-align: center;'],
                            'contentOptions' => ['style' => 'text-align: center; text-transform: capitalize; width: 15%;'],
                            'format' => ['Currency']
                        ],
                        [
                            'header' => 'Jumlah Belanja',
                            'value' => 'jumlah_belanja',
                            'headerOptions' => ['style' => 'text-align: center;'],
                            'contentOptions' => ['style' => 'text-align: center; text-transform: capitalize; width: 15%;']
                        ]
                    ],
                ]);
                Pjax::end(); 
            ?>
            <?php } ?>
            <!-- <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Nama Barang</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Jumlah Barang</th>
                        <th class="text-center">Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $detail_perg = DetailPergeseran::find()
                                        ->join('inner join',
                                                'pergeseran',
                                                'pergeseran.pergeseran_id = detail_pergeseran.pergeseran_id'
                                            )
                                        ->join('inner join',
                                                'rba',
                                                'rba.rba_id = pergeseran.rba_id'
                                            )
                                        ->where(['rba.rba_tahun' => $cur_year])
                                        ->all();

                        foreach ($detail_perg as $det_perg):
                    ?>
                    <tr>
                        <td class="text-capitalize"><?= $det_perg->item->nama_item; ?></td>
                        <td class="text-center">
                            <?php
                                $harga = $det_perg->harga_satuan;
                                $harga_f = number_format($harga, '2', ',', '.');
                                echo "Rp. ", $harga_f;
                            ?>
                        </td>
                        <td class="text-center">
                            <?php
                                $jumlah = $det_perg->jumlah_belanja;
                                $jumlah_bel = number_format($jumlah, '0', ',', '.');
                                echo $jumlah_bel;
                            ?>
                        </td>
                        <td class="text-uppercase text-center"><?= $det_perg->satuan->nama_satuan; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> -->
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-lg-6">
            <?= \hail812\adminlte\widgets\Alert::widget([
                'type' => 'success',
                'body' => '<h3>Congratulations!</h3>',
            ]) ?>
            <?= \hail812\adminlte\widgets\Callout::widget([
                'type' => 'danger',
                'head' => 'I am a danger callout!',
                'body' => 'There is a problem that we need to fix. A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.'
            ]) ?>
        </div>
    </div> -->


    <!-- <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Messages',
                'number' => '1,410',
                'icon' => 'far fa-envelope',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Bookmarks',
                'number' => '410',
                 'theme' => 'success',
                'icon' => 'far fa-flag',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Uploads',
                'number' => '13,648',
                'theme' => 'gradient-warning',
                'icon' => 'far fa-copy',
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Bookmarks',
                'number' => '41,410',
                'icon' => 'far fa-bookmark',
                'progress' => [
                    'width' => '70%',
                    'description' => '70% Increase in 30 Days'
                ]
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?php $infoBox = \hail812\adminlte\widgets\InfoBox::begin([
                'text' => 'Likes',
                'number' => '41,410',
                'theme' => 'success',
                'icon' => 'far fa-thumbs-up',
                'progress' => [
                    'width' => '70%',
                    'description' => '70% Increase in 30 Days'
                ]
            ]) ?>
            <?= \hail812\adminlte\widgets\Ribbon::widget([
                'id' => $infoBox->id.'-ribbon',
                'text' => 'Ribbon',
            ]) ?>
            <?php \hail812\adminlte\widgets\InfoBox::end() ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Events',
                'number' => '41,410',
                'theme' => 'gradient-warning',
                'icon' => 'far fa-calendar-alt',
                'progress' => [
                    'width' => '70%',
                    'description' => '70% Increase in 30 Days'
                ],
                'loadingStyle' => true
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => '150',
                'text' => 'New Orders',
                'icon' => 'fas fa-shopping-cart',
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?php $smallBox = \hail812\adminlte\widgets\SmallBox::begin([
                'title' => '150',
                'text' => 'New Orders',
                'icon' => 'fas fa-shopping-cart',
                'theme' => 'success'
            ]) ?>
            <?= \hail812\adminlte\widgets\Ribbon::widget([
                'id' => $smallBox->id.'-ribbon',
                'text' => 'Ribbon',
                'theme' => 'warning',
                'size' => 'lg',
                'textSize' => 'lg'
            ]) ?>
            <?php \hail812\adminlte\widgets\SmallBox::end() ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => '44',
                'text' => 'User Registrations',
                'icon' => 'fas fa-user-plus',
                'theme' => 'gradient-success',
                'loadingStyle' => true
            ]) ?>
        </div>
    </div> -->
</div>
<?php
$this->registerJs('
    $(document).on("pjax:end", "#penganggaran-grid-view", function() {
        // Reinitialize any JavaScript functionality related to the GridView, if necessary
    });

    $("body").on("click", ".pagination a", function(e) {
        e.preventDefault();
        $.pjax({container: "#penganggaran-grid-view", url: $(this).attr("href")});
    });
');
?>
