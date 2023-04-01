<?php

namespace app\controllers;

use app\models\Bidang;
use app\models\BidangSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BidangController implements the CRUD actions for Bidang model.
 */
class BidangController extends Controller
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
     * Lists all Bidang models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BidangSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bidang model.
     * @param int $bidang_id Bidang ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($bidang_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($bidang_id),
        ]);
    }

    /**
     * Creates a new Bidang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Bidang();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'bidang_id' => $model->bidang_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Bidang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $bidang_id Bidang ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($bidang_id)
    {
        $model = $this->findModel($bidang_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'bidang_id' => $model->bidang_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Bidang model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $bidang_id Bidang ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($bidang_id)
    {
        $this->findModel($bidang_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bidang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $bidang_id Bidang ID
     * @return Bidang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($bidang_id)
    {
        if (($model = Bidang::findOne(['bidang_id' => $bidang_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
