<?php

namespace app\controllers;

use app\models\Pendapatan;
use app\models\PendapatanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PendapatanController implements the CRUD actions for Pendapatan model.
 */
class PendapatanController extends Controller
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
     * Lists all Pendapatan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PendapatanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pendapatan model.
     * @param int $pendapatan_id Pendapatan ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($pendapatan_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($pendapatan_id),
        ]);
    }

    /**
     * Creates a new Pendapatan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pendapatan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'pendapatan_id' => $model->pendapatan_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pendapatan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $pendapatan_id Pendapatan ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($pendapatan_id)
    {
        $model = $this->findModel($pendapatan_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pendapatan_id' => $model->pendapatan_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pendapatan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $pendapatan_id Pendapatan ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($pendapatan_id)
    {
        $this->findModel($pendapatan_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pendapatan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $pendapatan_id Pendapatan ID
     * @return Pendapatan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pendapatan_id)
    {
        if (($model = Pendapatan::findOne(['pendapatan_id' => $pendapatan_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
