<?php
 ?>
 <?php if(count($modelline)>0):?>
 <?php foreach($modelline as $value):?>
 <tr>
 	<td></td>
	<td>
		<input type="text" class="form-control" name="chemical_code[]" value="<?=\common\models\Chemical::getName($value->chemical_id)?>">
		<input type="hidden" class="line_id" name="line_id[]" value="<?=$value->id;?>">
		<input type="hidden" class="chemical_id" name="chemical_id[]" value="<?=$value->chemical_id?>">
	</td>
	<td>
		<select class="form-control issue-type" readonly name="issue_type[]">
			 <?php
                                                    $select1 = '';
                                                    $select2 = '';
                                                    $select3 = '';
                                                    if($value->issue_type == 1){
                                                        $select1 = 'selected';
                                                    }
                                                     if($value->issue_type == 2){
                                                        $select2 = 'selected';
                                                    }
                                                     if($value->issue_type == 3){
                                                        $select3 = 'selected';
                                                    }
                                                ?>
                                                <option value="1" <?=$select1?>>เบิกทั้งขวด</option>
                                                <option value="2" <?=$select2?>>ยืมทั้งขวด</option>
                                                <option value="3" <?=$select3?>>ระบุจำนวน</option>
		</select>
	</td>
	<td>
		<input type="text" class="form-control qty" readonly name="qty[]" value="<?=$value->qty?>">
	</td>
	 <td>
        <input type="text" class="form-control return_qty" name="return_qty[]" value="<?=$value->return_qty?>">
    </td>
	<td>
		<div class="btn btn-danger btn-remove-line" onclick="removeline($(this))">ลบ</div>
	</td>
 </tr>
<?php endforeach;?>
 <?php endif;?>