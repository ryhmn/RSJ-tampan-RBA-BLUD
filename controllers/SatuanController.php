<?php

namespace app\controllers;

use app\models\Satuan;
use app\models\SatuanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SatuanController implements the CRUD actions for Satuan model.
 */
class SatuanController extends Controller
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
     * Lists all Satuan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SatuanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Satuan model.
     * @param int $satuan_id Satuan ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($satuan_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($satuan_id),
        ]);
    }

    /**
     * Creates a new Satuan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Satuan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'satuan_id' => $model->satuan_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Satuan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $satuan_id Satuan ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($satuan_id)
    {
        $model = $this->findModel($satuan_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'satuan_id' => $model->satuan_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Satuan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $satuan_id Satuan ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($satuan_id)
    {
        $this->findModel($satuan_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Satuan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $satuan_id Satuan ID
     * @return Satuan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($satuan_id)
    {
        if (($model = Satuan::findOne(['satuan_id' => $satuan_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
