<?php

use app\models\Pendapatan;
use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


/** @var yii\web\View $this */
/** @var app\models\PendapatanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pendapatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendapatan-index px-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-2">
                <h4 class="text-uppercase text-muted font-weight-bold rounded py-2 px-3 my-auto" style="border-left: 4px solid #28a745">
                    <i class="nav-icon fas fa-tasks pr-2"></i>
                    <?= Html::encode($this->title); ?>
                </h4>
                <div class="ml-auto">
                    <?php
                    echo Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'options' => [
                            'class' => 'breadcrumb my-auto'
                        ]
                    ]);
                    ?>
                </div>
            </div>

            <hr class="mb-4 mt-0">

            <div class="row d-flex">
                <div class="col-6">
                    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <div class="col-6">
                    <p class="text-right my-3">
                        <?= Html::a('<i class="fas fa-plus mr-1"></i> Tambah Pendapatan', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>
                </div>
            </div>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => '{items} {pager}',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'header' => 'Sumber Pendapatan',
                        'value' => 'sumber_pendapatan',
                        'headerOptions' => ['style' => 'text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center;']
                    ],
                    [
                        'header' => 'Jumlah Pendapatan',
                        'value' => 'jumlah_pendapatan',
                        'headerOptions' => ['style' => 'text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center;']
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'template' => '{view} {delete}',
                        'contentOptions' => ['style' => 'text-transform: capitalize; text-align: center;'],
                        'buttons' => [
                            'view' => function ($url, $model) {
                                $url = Url::to(['view', 'pendapatan_id' => $model->pendapatan_id]);
                                return Html::a('<i class="fas fa-eye"></i>', $url, [
                                    'title' => "View",
                                    'class' => 'btn btn-primary'
                                ]);
                            },
                            'delete' => function ($url, $model) {
                                $url = Url::to(['delete', 'pendapatan_id' => $model->pendapatan_id]);
                                return Html::a('<i class="fas fa-trash-alt"></i>', $url, [
                                    'title' => "Delete",
                                    'data-confirm' => Yii::t('yii', 'Ingin menghapus data?'),
                                    'data-method' => 'post',
                                    'class' => 'btn btn-danger ml-1'
                                ]);
                            }
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>