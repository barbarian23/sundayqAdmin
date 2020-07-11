<?php 

?>
<div class="manage-list-teacher">
	<div class="manage-list-teacher-title">
		<span><?php echo $GLOBALS["TEACHER_LIST_TITLE"]; ?></span>
	</div>
	
	<div class="manage-list-teacher-table">
		<table class="manage-list-teacher-table-detail" id="tableListTeacher">
			<tr>
				<th><?php echo $GLOBALS["TEACHER_LIST_COL_1"]; ?></th>
				<th><?php echo $GLOBALS["TEACHER_LIST_COL_2"]; ?></th>
				<th><?php echo $GLOBALS["TEACHER_LIST_COL_3"]; ?></th>
				<th><?php echo $GLOBALS["TEACHER_LIST_COL_4"]; ?></th>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
		<div class="manage-list-teacher-table-no-list">
			<img src='<?php echo $GLOBALS["TEACHER_NO_LIST"]; ?>'>
			<span><?php echo $GLOBALS["TEACHER_NO_LIST"]; ?></span>
		</div>
	</div>
	
	<div class="manage-list-teacher-add-new">
		<a href="?mode=offline&page=teacher">
			<button>
				<span><?php echo $GLOBALS["TEACHER_LIST_BUTTON_ADD_TEACHER"]; ?></span>
			</button>
		</a>
	</div>
</div>