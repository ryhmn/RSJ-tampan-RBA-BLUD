<?php
namespace app\controllers;

use app\models\RbaSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\SqlDataProvider;
use yii\db\Query;
use yii\helpers\Url;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return Yii::$app->getResponse()->redirect(array(Url::to(['site/login'])));
        } else {
            $searchModel = new RbaSearch();
            
            return $this->render('index', [
                'searchModel' => $searchModel
            ]);
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'main-login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionLoadGridDataPenganggaran()
    {
        // Handle the Ajax request
        if (Yii::$app->request->isAjax) {
            $cur_year = date('Y');
            // Fetch the data for the GridView
            $queryPenganggaran = new Query();
            $queryPenganggaran->select([
                'r.rba_tahun',
                'it.nama_item',
                'db.harga_satuan',
                'db.jumlah_belanja'
            ])
            ->from('detail_belanja db')
            ->innerJoin('belanja b', 'db.belanja_id = b.belanja_id')
            ->innerJoin('rba r', 'b.rba_id = r.rba_id')
            ->innerJoin('item it', 'db.item_id = it.item_id')
            ->where(['r.rba_tahun' => $cur_year]);

            $dataProviderPenganggaran = new SqlDataProvider([
                'sql' => $queryPenganggaran->createCommand()->getRawSql(),
                'pagination' => [
                    'pageSize' => 2
                ]
            ]);
            
            // Render the GridView content
            return $this->renderAjax('_gridviewpenganggaran', [
                'dataProvider' => $dataProviderPenganggaran,
            ]);
        }
    }

    public function actionLoadGridDataPergeseran()
    {
        // Handle the Ajax request
        if (Yii::$app->request->isAjax) {
            $cur_year = date('Y');
            // Fetch the data for the GridView
            $queryPergeseran = new Query();
            $queryPergeseran->select([
                'r.rba_tahun',
                'it.nama_item',
                'dp.harga_satuan',
                'dp.jumlah_belanja'
            ])
            ->from('detail_pergeseran dp')
            ->innerJoin('pergeseran p', 'dp.pergeseran_id = p.pergeseran_id')
            ->innerJoin('rba r', 'p.rba_id = r.rba_id')
            ->innerJoin('item it', 'dp.item_id = it.item_id')
            ->where(['r.rba_tahun' => $cur_year]);

            $dataProviderPergeseran = new SqlDataProvider([
                'sql' => $queryPergeseran->createCommand()->getRawSql(),
                'pagination' => [
                    'pageSize' => 2
                ]
            ]);
            
            // Render the GridView content
            return $this->renderAjax('_gridviewpergeseran', [
                'dataProvider' => $dataProviderPergeseran,
            ]);
        }
    }
}
