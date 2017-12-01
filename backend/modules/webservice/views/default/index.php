

<div class="webservice-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    
   
</div>
<?php
use common\models\item;
$model = Item::find()->all();

/*$resultArray = array();  
     while($row = mysqli_fetch_array($result)){
         $resultArray[] = array("item_id"=>$row['item_id'], "chemical_id"=>$row['chemical_id'], "marker_id"=>$row['marker_id'], 
          "location"=>$row['location'],"opendate"=>$row['opendate'],"status"=>$row['status'],"size"=>$row['size'],"Remaining_volume"=>$row['Remaining_volume'],
          "worningdate"=>$row['worningdate'],"expireddate"=>$row['expireddate'],"room_id"=>$row['room_id'],"grade_id"=>$row['grade_id'], 
          "grade_id"=>$row['grade_id'],    );
     }
     $resultJSON = json_encode($resultArray); */

     
?>