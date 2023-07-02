<?php
    use yii\widgets\Pjax;
    use yii\grid\GridView;

    Pjax::begin(['id' => 'grid-view-pjax']);
    echo GridView::widget([
        'dataProvider' => $dataProviderPenganggaran,
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