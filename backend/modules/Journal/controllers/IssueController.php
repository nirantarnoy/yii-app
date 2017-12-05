<?php

namespace backend\modules\Journal\controllers;

use Yii;
use common\models\Journal;
use common\models\JournalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * JournalController implements the CRUD actions for Journal model.
 */
class IssueController extends Controller
{
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
        $searchModel = new JournalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['journal_type'=>1]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Journal model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Journal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Journal();
        $expendlist = \common\models\Chemical::find()->all();

        if ($model->load(Yii::$app->request->post())) {
            $che_id = Yii::$app->request->post('chemical_id');
            $issue_type = Yii::$app->request->post('issue_type');
            $qty = Yii::$app->request->post('qty');
            $model->created_at = time();
            $model->created_by = Yii::$app->user->identity->id;
            $model->journal_type = 1;
            if($model->save()){
                if(count($che_id)>0){
                    for($i=0;$i<=count($che_id)-1;$i++){
                        $modelline = new \common\models\JournalLine();
                        $modelline->journal_id = $model->id;
                        $modelline->chemical_id = $che_id[$i];
                        $modelline->issue_type = $issue_type[$i];
                        $modelline->qty = $qty[$i];
                        $modelline->save(false);

                        Journal::updatestock($che_id[$i],$qty[$i],0); // issue
                    }
                   
                }
                 $session = Yii::$app->session;
                $session->setFlash('success','บันทึกรายการเรียบรอ้ย');
                return $this->redirect(['update', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'runno' => $model->getLastNo(),
                'expendlist' => Json::encode($expendlist),
            ]);
        }
    }

    /**
     * Updates an existing Journal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelline = \common\models\JournalLine::find()->where(['journal_id'=>$id])->all();
        $expendlist = \common\models\Chemical::find()->all();
        if ($model->load(Yii::$app->request->post())) {
            $che_id = Yii::$app->request->post('chemical_id');
            $issue_type = Yii::$app->request->post('issue_type');
            $qty = Yii::$app->request->post('qty');
            $model->updated_at = time();
            $model->updated_by = Yii::$app->user->identity->id;
            if($model->save()){
                if(count($che_id)>0){
                       \common\models\JournalLine::deleteAll(['journal_id'=>$id]);
                    for($i=0;$i<=count($che_id)-1;$i++){
                        $modelline = new \common\models\JournalLine();
                        $modelline->journal_id = $model->id;
                        $modelline->chemical_id = $che_id[$i];
                        $modelline->issue_type = $issue_type[$i];
                        $modelline->qty = $qty[$i];
                        $modelline->save(false);
                    }
                   
                }
                $session = Yii::$app->session;
                $session->setFlash('success','บันทึกรายการเรียบรอ้ย');
                return $this->redirect(['update', 'id' => $model->id]);    
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                 'expendlist' => Json::encode($expendlist),
                 'modelline' => $modelline,
            ]);
        }
    }

    /**
     * Deletes an existing Journal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Journal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Journal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Journal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionAddline(){
        if(Yii::$app->request->isAjax){
           return $this->renderPartial('_addline');
        }
    }
}
