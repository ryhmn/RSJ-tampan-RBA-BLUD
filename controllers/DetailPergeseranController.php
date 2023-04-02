<?php

namespace app\controllers;

use app\models\DetailPergeseran;
use app\models\DetailPergeseranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetailPergeseranController implements the CRUD actions for DetailPergeseran model.
 */
class DetailPergeseranController extends Controller
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
     * Lists all DetailPergeseran models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DetailPergeseranSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DetailPergeseran model.
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
     * Creates a new DetailPergeseran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new DetailPergeseran();

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
     * Updates an existing DetailPergeseran model.
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
     * Deletes an existing DetailPergeseran model.
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
     * Finds the DetailPergeseran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $detail_pergeseran_id Detail Pergeseran ID
     * @return DetailPergeseran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($detail_pergeseran_id)
    {
        if (($model = DetailPergeseran::findOne(['detail_pergeseran_id' => $detail_pergeseran_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
