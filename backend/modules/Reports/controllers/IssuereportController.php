<?php

namespace backend\modules\Reports\controllers;

use Yii;
use common\models\Journal;
use backend\modules\Reports\models\IssuereportSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * JournalController implements the CRUD actions for Journal model.
 */
class IssuereportController extends Controller
{
	public $enableCsrfValidation = false;
    /**
     * @inheritdoc
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

    /**
     * Lists all Journal models.
     * @return mixed
     */
    public function actionIndex()
    {
    	$from_date = '';
    	$to_date = '';

        $from_date = date('d-m-Y',strtotime(Yii::$app->request->post('from_date')));
        $to_date = date('d-m-Y',strtotime(Yii::$app->request->post('to_date')));
    
        $searchModel = new IssuereportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if($from_date != ''){
        	$dataProvider->query->where(['>=','created_at',$from_date])->andFilterWhere(['<=','created_at',$to_date]);
        }
        //$dataProvider->query->where(['journal_type'=>1]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'from_date' => $from_date,
            'to_date' => $to_date,
        ]);
    }

}
