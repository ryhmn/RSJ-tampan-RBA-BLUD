<?php
namespace app\controllers;

use app\models\DetailBelanja;
use app\models\DetailBelanjaSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * DetailBelanjaController implements the CRUD actions for DetailBelanja model.
 */
class DetailBelanjaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all DetailBelanja models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DetailBelanjaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DetailBelanja model.
     * @param int $detail_belanja_id Detail Belanja ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($detail_belanja_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($detail_belanja_id),
        ]);
    }

    /**
     * Creates a new DetailBelanja model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new DetailBelanja();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'detail_belanja_id' => $model->detail_belanja_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DetailBelanja model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $detail_belanja_id Detail Belanja ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($detail_belanja_id)
    {
        $model = $this->findModel($detail_belanja_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'detail_belanja_id' => $model->detail_belanja_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DetailBelanja model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $detail_belanja_id Detail Belanja ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($detail_belanja_id)
    {
        $this->findModel($detail_belanja_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DetailBelanja model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $detail_belanja_id Detail Belanja ID
     * @return DetailBelanja the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($detail_belanja_id)
    {
        if (($model = DetailBelanja::findOne(['detail_belanja_id' => $detail_belanja_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // Used in pergeseran _form to get harga_satuan and jumlah_belanja
    public function actionDetailBelanjaList($id)
    {
        $d_belanja = DetailBelanja::getDetailBelanjaList($id);
        echo Json::encode($d_belanja);
    }

    // Used in detail_belanja to filter detail belanja based on rba_tahun
    public function actionDpdDetailBelanja() 
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = DetailBelanja::getDpdDetailBelanja($cat_id);
                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

    // To get satuan automatically after selected the first item field
    public function actionDpdDetailBelanjaSatuan() 
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = DetailBelanja::getDetailBelanjaSatuan($cat_id);
                return ['output' => $out, 'selected' => $out];
            }
        }
        return ['output' => '', 'selected' => ''];
    }
}
