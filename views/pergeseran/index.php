<?php

use app\models\Pergeseran;
use app\models\Rba;
use kartik\form\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\PergeseranSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pergeseran';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pergeseran-index px-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-2">
                <h4 class="text-uppercase text-muted font-weight-bold rounded py-2 px-3 my-auto" style="border-left: 4px solid #28a745">
                    <i class="nav-icon fas fa-tasks pr-2"></i>
                    <?= Html::encode($this->title); ?>
                </h4>
                <p class="ml-auto my-auto">
                    <?= Html::a('<i class="fas fa-plus mr-1"></i> Tambah Pergeseran', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>

            <hr class="mb-5 mt-0">
            
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => '{items} {pager}',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'header' => 'Tahun RBA',
                        'value' => 'rba.rba_tahun'
                    ],
                    [
                        'header' => 'Tanggal Pergeseran',
                        'value' => 'tanggal_pergeseran'
                    ],
                    [
                        'header' => 'Keterangan',
                        'value' => 'keterangan'
                    ],
                    [
                        'header' => 'Status',
                        'value' => 'status'
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Pergeseran $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'pergeseran_id' => $model->pergeseran_id]);
                        }
                    ],
                ],
            ]); ?>
            
        </div>
    </div>
</div>
