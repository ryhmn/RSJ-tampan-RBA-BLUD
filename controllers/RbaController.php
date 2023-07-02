<?php
namespace app\controllers;

use app\models\Belanja;
use app\models\Model;
use app\models\Rba;
use app\models\RbaSearch;
use Exception;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

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

    //  This create function is fitted with dynamic form actionCreate
    public function actionCreate()
    {
        $model = new Rba();
        $modelsBelanja = [new Belanja];

        if ($model->load($this->request->post()) && $model->save()) {
            $modelsBelanja = Model::createMultiple(Belanja::classname());
            Model::loadMultiple($modelsBelanja, Yii::$app->request->post());

            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsBelanja) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsBelanja as $modelBelanja) {
                            $modelBelanja->rba_id = $model->rba_id;
                            if (! ($flag = $modelBelanja->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['rba/index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'modelsBelanja' => (empty($modelsBelanja)) ? [new Belanja] : $modelsBelanja
        ]);
    }

    /**
     * Updates an existing Rba model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $rba_id Rba ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */

    //  This update function is fitted with dynamic form actionUpdate 
    public function actionUpdate($rba_id)
    {
        $model = $this->findModel($rba_id);
        $modelsBelanja = $model->belanjas;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            $oldIDs = ArrayHelper::map($modelsBelanja, 'belanja_id', 'belanja_id');
            $modelsBelanja = Model::createMultiple(Belanja::classname());
            Model::loadMultiple($modelsBelanja, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsBelanja, 'belanja_id', 'belanja_id')));

            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsBelanja) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            Belanja::deleteAll(['belanja_id' => $deletedIDs]);
                        }
                        foreach ($modelsBelanja as $modelBelanja) {
                            $modelBelanja->rba_id = $model->rba_id;
                            if (! ($flag = $modelBelanja->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['rba/index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsBelanja' => (empty($modelsBelanja)) ? [new Belanja] : $modelsBelanja
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
