<?php

namespace app\controllers;

use app\models\Belanja;
use app\models\BelanjaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BelanjaController implements the CRUD actions for Belanja model.
 */
class BelanjaController extends Controller
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
     * Lists all Belanja models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BelanjaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Belanja model.
     * @param int $belanja_id Belanja ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($belanja_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($belanja_id),
        ]);
    }

    /**
     * Creates a new Belanja model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Belanja();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'belanja_id' => $model->belanja_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Belanja model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $belanja_id Belanja ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($belanja_id)
    {
        $model = $this->findModel($belanja_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'belanja_id' => $model->belanja_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Belanja model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $belanja_id Belanja ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($belanja_id)
    {
        $this->findModel($belanja_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Belanja model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $belanja_id Belanja ID
     * @return Belanja the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($belanja_id)
    {
        if (($model = Belanja::findOne(['belanja_id' => $belanja_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
