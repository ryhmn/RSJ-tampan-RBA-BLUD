<?php

namespace app\controllers;

use app\models\DetailPergeseran;
use app\models\Model;
use app\models\Pergeseran;
use app\models\PergeseranSearch;
use Exception;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PergeseranController implements the CRUD actions for Pergeseran model.
 */
class PergeseranController extends Controller
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
     * Lists all Pergeseran models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PergeseranSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pergeseran model.
     * @param int $pergeseran_id Pergeseran ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($pergeseran_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($pergeseran_id),
        ]);
    }

    /**
     * Creates a new Pergeseran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pergeseran();
        $modelsDetailPergeseran = [new DetailPergeseran()];

        if ($model->load($this->request->post()) && $model->save()) {
            $modelsDetailPergeseran = Model::createMultiple(DetailPergeseran::classname());
            Model::loadMultiple($modelsDetailPergeseran, Yii::$app->request->post());

        // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsDetailPergeseran) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsDetailPergeseran as $modelDetailPergeseran) {
                            $modelDetailPergeseran->pergeseran_id = $model->pergeseran_id;
                            if (! ($flag = $modelDetailPergeseran->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['pergeseran/index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        
        return $this->render('create', [
            'model' => $model,
            'modelsDetailPergeseran' => (empty($modelsDetailPergeseran)) ? [new DetailPergeseran()] : $modelsDetailPergeseran
        ]);
    }

    /**
     * Updates an existing Pergeseran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $pergeseran_id Pergeseran ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($pergeseran_id)
    {
        $model = $this->findModel($pergeseran_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pergeseran_id' => $model->pergeseran_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pergeseran model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $pergeseran_id Pergeseran ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($pergeseran_id)
    {
        $this->findModel($pergeseran_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pergeseran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $pergeseran_id Pergeseran ID
     * @return Pergeseran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pergeseran_id)
    {
        if (($model = Pergeseran::findOne(['pergeseran_id' => $pergeseran_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
