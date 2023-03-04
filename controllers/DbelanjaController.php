<?php

namespace app\controllers;

use app\models\Dbelanja;
use app\models\DbelanjaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DbelanjaController implements the CRUD actions for Dbelanja model.
 */
class DbelanjaController extends Controller
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
     * Lists all Dbelanja models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DbelanjaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dbelanja model.
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
     * Creates a new Dbelanja model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Dbelanja();

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
     * Updates an existing Dbelanja model.
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
     * Deletes an existing Dbelanja model.
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
     * Finds the Dbelanja model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $detail_belanja_id Detail Belanja ID
     * @return Dbelanja the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($detail_belanja_id)
    {
        if (($model = Dbelanja::findOne(['detail_belanja_id' => $detail_belanja_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
