<?php
 ?>
 <tr>
 	<td></td>
	<td>
		<input type="text" class="form-control" name="chemical_code[]" value="">
		<input type="hidden" class="line_id" name="line_id" value="">
		<input type="hidden" class="chemical_id" name="chemical_id[]" value="">
	</td>
	<td>
		<select class="form-control issue-type" name="issue_type[]">
			<option value="1">เบิกทั้งขวด</option>
			<option value="2">ยืมทั้งขวด</option>
			<option value="3">ระบุจำนวน</option>
		</select>
	</td>
	<td>
		<input type="text" class="form-control qty" name="qty[]" value="">
	</td>
	<td>
		<input type="text" class="form-control unit" readonly name="unit[]" value="">
	</td>
	<td>
		<div class="btn btn-danger btn-remove-line" onclick="removeline($(this))">ลบ</div>
	</td>
 </tr>