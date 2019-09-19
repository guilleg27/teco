<?php

namespace app\controllers;

use Yii;
use app\models\Formulario;
use app\models\FormularioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FormularioController implements the CRUD actions for Formulario model.
 */
class FormularioController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($action) 
    { 
        $this->enableCsrfValidation = false; 
        return parent::beforeAction($action); 
    }

    /**
     * Lists all Formulario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FormularioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Formulario model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Formulario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Formulario();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Formulario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Formulario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Formulario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Formulario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Formulario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPromo()
    {
        $data = Yii::$app->request;
        if ($data->post('phone')) {
            $code = 200;
            $model = new Formulario();
            $model->nombre_completo = $data->post('name');
            $model->email = $data->post('email');
            $model->celular = $data->post('phone');
            $model->ktoken = $data->post('ktoken');
            $model->plan = $data->post('plan');
            $model->date = date('Y-m-d H:i:s');

            if($model->save()){
                //S2S a kickads
                $url    = "http://www.kickadserver.mobi/convLog/?ktoken=".$model->ktoken;
                $curl   = curl_init($url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($curl);
            }
        } else {
            $code = 400;
        }
        return \yii\helpers\Json::encode($code);
    }

    /**
     * Formulario
     * @return mixed
     */
    public function actionGenerica()
    {
        $this->layout = 'vacio';
        $ktoken = $request->get('ktoken');
        return $this->render('generica', [
            'ktoken' => $ktoken
        ]);
    }

    public function actionPromo5gb()
    {
        $this->layout = 'vacio';
        $ktoken = $request->get('ktoken');
        return $this->render('promo5gb', [
            'ktoken' => $ktoken
        ]);
    }

    public function actionPromo8gb()
    {
        $this->layout = 'vacio';
        $ktoken = $request->get('ktoken');
        return $this->render('promo8gb', [
            'ktoken' => $ktoken
        ]);
    }

    public function actionPromo12gb()
    {
        $this->layout = 'vacio';
        $ktoken = $request->get('ktoken');
        return $this->render('promo12gb', [
            'ktoken' => $ktoken
        ]);
    }

    public function actionPromo20gb()
    {
        $this->layout = 'vacio';
        $ktoken = $request->get('ktoken');
        return $this->render('promo20gb', [
            'ktoken' => $ktoken
        ]);
    }
}
