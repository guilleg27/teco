<?php

namespace app\controllers;

use Yii;
use app\models\Formulario;
use app\models\FormularioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use arturoliveira\ExcelView;

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
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'delete', 'view', 'promo', 'generica', 'promo5gb', 'promo8gb', 'promo12gb', 'promo20gb', 'test', 'promotest', 'validar', 'export', 'testlocation'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['promo', 'generica', 'promo5gb', 'promo8gb', 'promo12gb', 'promo20gb', 'test', 'promotest', 'testlocation'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
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
        $params        = [];
        $request       = Yii::$app->request;
        $get           = $request->get();
        $startDate     = $request->get('startDate') ? $request->get('startDate') : date('Y-m-d',strtotime('yesterday'));
        $endDate       = $request->get('endDate') ? $request->get('endDate') : date('Y-m-d',strtotime('NOW'));

        $params['startDate']   = $startDate;
        $params['endDate']     = $endDate;

        $searchModel = new FormularioSearch();
        $dataProvider = $searchModel->search($params);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'startDate'    => $startDate,
            'endDate'      => $endDate,
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
        $data               = Yii::$app->request;
        $gen                = $data->post('gen');
        $url_verify_captcha = "https://www.google.com/recaptcha/api/siteverify";

        switch ($gen) {
            case 'gen1':
                $params = array(
                    'secret'=>'6LfrrsAUAAAAALROkPE1HbgQXCLHRegj_HQ-wQ-i',
                    'response'=>$data->post('captcha5gb') ?: null
                );
                break;
            
            case 'gen2':
                $params = array(
                    'secret'=>'6LdJsMAUAAAAAFP5HXRZp_g77ohXYbnWZ-g84hBH',
                    'response'=>$data->post('captcha8gb') ?: null
                );
                break;

            case 'gen3':
                $params = array(
                    'secret'=>'6LdOsMAUAAAAADi62_7zZJzJZikExL3qeTQoiJNd',
                    'response'=>$data->post('captcha12gb') ?: null
                );
                break;

            case 'gen4':
                $params = array(
                    'secret'=>'6LdRsMAUAAAAAEzgtJuFaar1pFNagLjyTcKrKesj',
                    'response'=>$data->post('captcha20gb') ?: null
                );
                break;
        }

        $options = array(
            CURLOPT_URL            => $url_verify_captcha,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => http_build_query($params),
            CURLOPT_RETURNTRANSFER => true
        );

        $curl   = curl_init();
        curl_setopt_array($curl,$options);
        $result = curl_exec($curl);
        curl_close($curl);
        $gresponse  = json_decode($result);

        if ( $data->post('phone') && ($gresponse->success == true) ) {
            $model = new Formulario();
            $model->nombre_completo = $data->post('name');
            $model->email           = $data->post('email');
            $model->celular         = $data->post('phone');
            $model->ktoken          = $data->post('ktoken');
            $model->plan            = $data->post('plan');
            $model->pubId           = $data->post('pubId');
            $model->providerId      = $data->post('providerId');
            $model->date            = date('Y-m-d H:i:s');
            $model->setIp2Location();

            if($model->save() && $model->inform()){
                //S2S a kickads
                $url    = "http://www.sidekickads.com/convLog/?ktoken=".$model->ktoken;
                $curl   = curl_init($url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($curl);
            }
            $success = 200;
        } else {
            $success = 400;
        }

        return \yii\helpers\Json::encode($success);
    }

    /**
     * Formulario
     * @return mixed
     */
    public function actionGenerica()
    {
        $this->layout = 'vacio';
        $request      = Yii::$app->request;
        $ktoken       = $request->get('ktoken') ?: "empty";
        $pubId        = $request->get('pubId') ?: null;
        $providerId   = $request->get('providerId') ?: null;
        return $this->render('generica', [
            'ktoken'     => $ktoken,
            'pubId'      => $pubId,
            'providerId' => $providerId
        ]);
    }

    public function actionPromo5gb()
    {
        $this->layout = 'vacio';
        $request      = Yii::$app->request;
        $ktoken       = $request->get('ktoken') ?: "empty";
        $pubId        = $request->get('pubId') ?: null;
        $providerId   = $request->get('providerId') ?: null;
        return $this->render('promo5gb', [
            'ktoken'     => $ktoken,
            'pubId'      => $pubId,
            'providerId' => $providerId
        ]);
    }

    public function actionPromo8gb()
    {
        $this->layout = 'vacio';
        $request      = Yii::$app->request;
        $ktoken       = $request->get('ktoken') ?: "empty";
        $pubId        = $request->get('pubId') ?: null;
        $providerId   = $request->get('providerId') ?: null;

        return $this->render('promo8gb', [
            'ktoken'     => $ktoken,
            'pubId'      => $pubId,
            'providerId' => $providerId
        ]);
    }

    public function actionPromo12gb()
    {
        $this->layout = 'vacio';
        $request      = Yii::$app->request;
        $ktoken       = $request->get('ktoken') ?: "empty";
        $pubId        = $request->get('pubId') ?: null;
        $providerId   = $request->get('providerId') ?: null;

        return $this->render('promo12gb', [
            'ktoken'     => $ktoken,
            'pubId'      => $pubId,
            'providerId' => $providerId
        ]);
    }

    public function actionPromo20gb()
    {
        $this->layout = 'vacio';
        $request      = Yii::$app->request;
        $ktoken       = $request->get('ktoken') ?: "empty";
        $pubId        = $request->get('pubId') ?: null;
        $providerId   = $request->get('providerId') ?: null;

        return $this->render('promo20gb', [
            'ktoken'     => $ktoken,
            'pubId'      => $pubId,
            'providerId' => $providerId
        ]);
    }

    public function actionTest()
    {
        $this->layout = 'vacio';
        $request = Yii::$app->request;
        $ktoken = $request->get('ktoken') ?: "empty";
        return $this->render('test', [
            'ktoken' => $ktoken
        ]);
    }

    /* Only for test */
    public function actionPromotest()
    {
        $data    = Yii::$app->request;
        $gen     = $data->post('gen');
        $url_verify_captcha = "https://www.google.com/recaptcha/api/siteverify";

        switch ($gen) {
            case 'gen1':
                $params = array(
                    'secret'=>'6LegpcAUAAAAAO5yP9qjiK24eqptWMp-N2B3jgeG',
                    'response'=>$data->post('5gb-captcha') ?: null
                );
                break;
            
            case 'gen2':
                $params = array(
                    'secret'=>'6Levr8AUAAAAABbNj-AOA3zI7ctHgtVQEi_YTZSw',
                    'response'=>$data->post('8gb-captcha') ?: null
                );
                break;

            case 'gen3':
                $params = array(
                    'secret'=>'6LedAMEUAAAAAGYCEK25glzptngrUtS5IDLhN4jn',
                    'response'=>$data->post('12gb-captcha') ?: null
                );
                break;

            case 'gen4':
                $params = array(
                    'secret'=>'6LdKBsEUAAAAAEwFByEYJP45IhIwd03WaFI1cxd1',
                    'response'=>$data->post('20gb-captcha') ?: null
                );
                break;
        }

        $options = array(
            CURLOPT_URL            => $url_verify_captcha,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => http_build_query($params),
            CURLOPT_RETURNTRANSFER => true
        );

        $curl   = curl_init();
        curl_setopt_array($curl,$options);
        $result = curl_exec($curl);
        curl_close($curl);
        $gresponse  = json_decode($result);
        return \yii\helpers\Json::encode($data->post());

        if ( $data->post('phone') && ($gresponse->success == true) ) {
            $model = new Formulario();
            $model->nombre_completo = $data->post('name');
            $model->email           = $data->post('email');
            $model->celular         = $data->post('phone');
            $model->ktoken          = $data->post('ktoken');
            $model->plan            = $data->post('plan');
            $model->date            = date('Y-m-d H:i:s');
            $model->setIp2Location();
            
            if($model->save() && $model->inform()){
                //S2S a kickads
                $url    = "http://www.sidekickads.com/convLog/?ktoken=".$model->ktoken;
                $curl   = curl_init($url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($curl);
            }
            $success = 200;
        } else {
            $success = 400;
        }

        return \yii\helpers\Json::encode($success);
    }

    public function actionValidar($id){
        $model = $this->findModel($id);
        $model->valido = !$model->valido;
        $response = $model->save() ? ['code' => 200, 'message' => 'ok'] : ['code' => 400, 'message' => 'error'];
        
        Yii::$app->response->statusCode = $response['code'];
        return \yii\helpers\Json::encode($response);
    }

    public function actionExport() {
        $searchModel = new FormularioSearch();
        $request       = Yii::$app->request;
        $startDate     = $request->get('startDate') ? $request->get('startDate') : date('Y-m-d',strtotime('yesterday'));
        $endDate       = $request->get('endDate') ? $request->get('endDate') : date('Y-m-d',strtotime('NOW'));

        $params['startDate']   = $startDate;
        $params['endDate']     = $endDate;
        $dataProvider = $searchModel->search($params);
        $columns = [];
        if (Yii::$app->user->identity->username != 'personal')
            $columns = [
                'id','nombre_completo','email:email','celular','date','ktoken','plan','pais', 'ciudad', 'carrier','providerId','pubId','valido'
              ];
        else{
            $columns = [
                'id','nombre_completo','email:email','celular','date','ktoken','plan','pais', 'ciudad', 'carrier','valido'
              ];
        }
        return ExcelView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'fullExportType'=> 'csv', //can change to html,xls,csv and so on
            'grid_mode' => 'export',
            'columns' => $columns,
        ]);
    }

    public function actionTestlocation(){
        $model = new Formulario();
        $model->setIp2Location();
        var_dump($model->ciudad, $model->pais, $model->carrier);
    }
}
