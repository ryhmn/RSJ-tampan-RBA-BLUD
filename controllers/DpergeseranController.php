<?php

namespace app\controllers;

use app\models\Dpergeseran;
use app\models\DpergeseranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DpergeseranController implements the CRUD actions for Dpergeseran model.
 */
class DpergeseranController extends Controller
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
     * Lists all Dpergeseran models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DpergeseranSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dpergeseran model.
     * @param int $detail_pergeseran_id Detail Pergeseran ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($detail_pergeseran_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($detail_pergeseran_id),
        ]);
    }

    /**
     * Creates a new Dpergeseran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Dpergeseran();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'detail_pergeseran_id' => $model->detail_pergeseran_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Dpergeseran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $detail_pergeseran_id Detail Pergeseran ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($detail_pergeseran_id)
    {
        $model = $this->findModel($detail_pergeseran_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'detail_pergeseran_id' => $model->detail_pergeseran_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Dpergeseran model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $detail_pergeseran_id Detail Pergeseran ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($detail_pergeseran_id)
    {
        $this->findModel($detail_pergeseran_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dpergeseran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $detail_pergeseran_id Detail Pergeseran ID
     * @return Dpergeseran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($detail_pergeseran_id)
    {
        if (($model = Dpergeseran::findOne(['detail_pergeseran_id' => $detail_pergeseran_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
