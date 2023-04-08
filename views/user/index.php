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
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'user_id',
                    'username',
                    'password',
                    'bidang_id',
                    'auth_key',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, User $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'user_id' => $model->user_id]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
