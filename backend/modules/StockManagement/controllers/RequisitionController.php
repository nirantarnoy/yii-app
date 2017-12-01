<?php

namespace backend\modules\StockManagement\controllers;

use Yii;
use yii\base\Model;
use common\models\Requisition;
use common\models\ItemHasRequisition;
use backend\modules\StockManagement\models\RequisitionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * RequisitionController implements the CRUD actions for requisition model.
 */
class RequisitionController extends Controller
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
     * Lists all requisition models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RequisitionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single requisition model.
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
     * Creates a new requisition model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
       $model = new Requisition();
       $model_item = new ItemHasRequisition();

    if($model->load(Yii::$app->request->post()) &&
       $model_item->load(Yii::$app->request->post()) )
       //&&Model::validateMultiple([$model,$model_item])
    {
    	var_dump(Yii::$app->request->port);
    	var_dump($_POST);
    	//die();
    //	$model2 = new Requisition();
    //	$model3 = new ItemHasRequisition();
    	
        //if($model_item->save()){
          //$model->requisition_id = $model_item->item_ID;
          //$model->save();
        //}
        return $this->redirect(['view', 'id' => $model->requisition_id]);
    } else {
        return $this->render('create', [
            'model' => $model,
            'model_item'=>$model_item
        ]);
    }
}  
        
        
        
        
    /**    $model = new Requisition();
        $model_item = new ItemHasRequisition();

        if ($model->load(Yii::$app->request->post()) &&
            $model_item->load(Yii::$app->request->post()) ){
            //var_dump(Yii::$app->request->post());
            //echo "{".Yii::$app->request->post("volum_apply")."}";
            //die();
            if($model->save()){
                $model_item->requisition_id = $model->requisition_id;
                //$model_item->method = 2;
                $model_item->save();
            }
           /*if($model_item->save()){
                $model->requisition_id = $model_item->item_id;
                $model->save();
            }*/
            //die();
       /*     return $this->redirect(['view', 'id' => $model->requisition_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'model_item' => $model_item,
            ]);
        }
    } **/

    /**
     * Updates an existing requisition model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
     public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model_item = $this->findModel_item($model->requisition_id);
        
      if (
        $model->load(Yii::$app->request->post()) &&
        $model_item->load(Yii::$app->request->post()) &&
        Model::validateMultiple([$model,$model_item])
         ) {
        if($model_item->save()){
           $model->save();
        }
        return $this->redirect(['view', 'id' => $model->requisition_id]);
        } else {
        return $this->render('update', [
          'model' => $model,
          'model_item'=>$model_item
        ]);
    }
}

protected function findModel_item($id)
{
    if (($model = MUser::findOne($id)) !== null) {
        return $model;
    } else {
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}    
        
        
        
        
        
        
        
        /**
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->requisition_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    } **/

    /**
     * Deletes an existing requisition model.
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
     * Finds the requisition model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return requisition the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = requisition::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
