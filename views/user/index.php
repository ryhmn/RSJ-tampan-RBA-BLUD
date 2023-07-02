<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data User';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-index px-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <h4 class="text-uppercase text-muted font-weight-bold rounded py-2 px-3 my-auto" style="border-left: 4px solid #28a745">
                    <i class="fas fa-users pr-2"></i>
                    <?= Html::encode($this->title); ?>
                </h4>
                <p class="ml-auto my-auto">
                    <?= Html::a('<i class="fas fa-plus mr-1"></i> Tambah User', ['create'], ['class' => 'btn btn-success']); ?>
                </p>
                <?php echo $this->render('_search', ['model' => $searchModel]); ?>
            </div>

            <hr class="mb-5 mt-0">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => '{items} {pager}',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'header' => 'User ID',
                        'value' => 'user_id',
                        'headerOptions' => ['style' => 'text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center; text-transform: capitalize;']
                    ],
                    [
                        'header' => 'Username',
                        'value' => 'username',
                        'headerOptions' => ['style' => 'text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center;']
                    ],
                    [
                        'header' => 'Nama Bidang',
                        'value' => 'bidang.nama_bidang',
                        'headerOptions' => ['style' => 'text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center; text-transform: capitalize;']
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'template' => '{edit} {delete}',
                        'contentOptions' => ['style' => 'text-align: center;'],
                        'buttons' => [
                            'edit' => function($url, $model) {
                                $url = Url::to(['edit', 'user_id' => $model->user_id]);
                                return Html::a('<i class="fas fa-pencil-alt"></i>', $url, [
                                    'title' => "Edit",
                                    'class' => 'btn btn-primary'
                                ]);
                            },
                            'delete' => function($url, $model) {
                                $url = Url::to(['delete', 'user_id' => $model->user_id]);
                                return Html::a('<i class="fas fa-trash-alt"></i>', $url, [
                                    'title' => "Hapus",
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
