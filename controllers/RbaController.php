<?php

namespace app\controllers;

use app\models\Rba;
use app\models\RbaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RbaController implements the CRUD actions for Rba model.
 */
class RbaController extends Controller
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
     * Lists all Rba models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RbaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rba model.
     * @param int $rba_id Rba ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($rba_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($rba_id),
        ]);
    }

    /**
     * Creates a new Rba model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Rba();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'rba_id' => $model->rba_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Rba model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $rba_id Rba ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($rba_id)
    {
        $model = $this->findModel($rba_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'rba_id' => $model->rba_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Rba model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $rba_id Rba ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($rba_id)
    {
        $this->findModel($rba_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Rba model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $rba_id Rba ID
     * @return Rba the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($rba_id)
    {
        if (($model = Rba::findOne(['rba_id' => $rba_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
