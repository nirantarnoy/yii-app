<?php

namespace backend\modules\Reports\controllers;

use Yii;
use common\models\Journal;
use backend\modules\Reports\models\IssuereportSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use kartik\mpdf\Pdf;

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
    public function actionShowreport(){
        $from_date = '';
        $to_date = '';

        $from_date = date('d-m-Y',strtotime(Yii::$app->request->get('from_date')));
        $to_date = date('d-m-Y',strtotime(Yii::$app->request->get('to_date')));
         
       // $sql = "SELECT * FROM view_issue where created_at >=".$from_date." and created_at <=".$to_date;
       $sql = "SELECT * FROM view_issue";
        $qury = Yii::$app->db->createCommand($sql);
        $modellist = $qury->queryAll();

        $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
                'format' => Pdf::FORMAT_A4, 
                'orientation' => Pdf::ORIENT_LANDSCAPE,
                'destination' => Pdf::DEST_BROWSER, 
                'content' => $this->renderPartial('_report',[
                    'list'=>$modellist,  
                    'from_date'=> $from_date,
                    'to_date' => $to_date,
                    ]),
                //'content' => "nira",
                'cssFile' => '@backend/web/css/pdf.css',
                'options' => [
                    'title' => 'รายงานใบเบิกเคมี',
                    'subject' => ''
                ],
                'methods' => [
                   // 'SetHeader' => ['Generated By: Krajee Pdf Component||Generated On: ' . date("r")],
                   // 'SetFooter' => ['|Page {PAGENO}|'],
                ]
            ]);
             return $pdf->render();
    }

}
