<?php

?>
<script>
	requestToSever(
	sunQRequestType.get,
	getURLAllLecture(),
	null,
"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6Ijg4MDIxZTE5MTM0ZWEwMTcwN2MxZTFjMDI3M2I5ZmJhMTU5NDMyMDY5NDAwMSIsInR5cGUiOiJhZG1pbiIsImlhdCI6MTU5NDUxMjI4MCwiZXhwIjoxNTk0NTU1NDgwfQ.QSFvnWddJs9zTkI0OUT2XZUlHRzqQrI9KHUhAFawS6o"	,
	function(res){
		console.log(res);
	},
	function(err){
		console.log(dictionaryKey.ERR_INFO,err);
	}
	);
</script>
<div class="manage-list-lecture">
	<div class="manage-list-lecture-title">
		<span><?php echo $GLOBALS["LECTURE_LIST_TITLE"]; ?></span>
	</div>
	
	<div class="manage-list-lecture-table">
		<table class="manage-list-lecture-table-detail" id="tableListLecture">
			<tr>
				<th><?php echo $GLOBALS["LECTURE_LIST_COL_1"]; ?></th>
				<th><?php echo $GLOBALS["LECTURE_LIST_COL_2"]; ?></th>
				<th><?php echo $GLOBALS["LECTURE_LIST_COL_3"]; ?></th>
				<th><?php echo $GLOBALS["LECTURE_LIST_COL_4"]; ?></th>
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
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
		<div class="manage-list-lecture-table-detail-no-list" id="listLectureEmpty">
			<img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
			<span><?php echo $GLOBALS["LECTURE_NO_LIST"]; ?></span>
		</div>
	</div>
	
	<div class="manage-list-lecture-add-new">
		<a href="?mode=offline&page=lecture">
			<button>
				<span><?php echo $GLOBALS["LECTURE_LIST_BUTTON_ADD_LECTURE"]; ?></span>
			</button>
		</a>
	</div>
</div>