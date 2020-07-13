<?php 

?>
<script>
window.onload = function(){
	setFetchingTeacher(true);
	requestToSever(
		sunQRequestType.get,
		getURLAllTeacher(),
		null,
		getData(dictionary.MSEC),
		function(res){
			//console.log(res);
			setFetchingTeacher(false);
			if(res.code === networkCode.success){
				if (res.data == null || res.data.length == 0){
					setGetTeacherFromServerSuccess(false);
				} else {
					emptyTableListTeacher();
					createListTeacher(res.data);
				}
			} else if (res.code === networkCode.sessionTimeOut){
					makeAlertRedirect();
			}
		},
		function(err){
			setFetchingTeacher(false);
			setIsGetTeacherFromServerSuccess(false);
			console.log(dictionaryKey.ERR_INFO,err);
// 			if(res != undefined){
// 			if (res.code === networkCode.sessionTimeOut){
// 				makeAlertRedirect();
// 			}
// 			}
		}
		);
}
</script>
<div class="manage-list-teacher">
	<div class="manage-list-teacher-title">
		<span><?php echo $GLOBALS["TEACHER_LIST_TITLE"]; ?></span>
	</div>
	
	<div class="manage-list-teacher-table">
		<div class="sunq-process-contain" id="fetchListTeacherProgress">
			<div class="sunq-process-contain-running">
				
			</div>
		</div>
		<table class="manage-list-teacher-table-detail" id="tableListTeacher">
			
		</table>
		<div class="manage-list-teacher-table-no-list" id="listTeacherEmpty">
			<img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
			<span><?php echo $GLOBALS["TEACHER_NO_LIST"]; ?></span>
		</div>
		
		<div class="manage-list-teacher-table-no-list" id="listTeacherError">
			<img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
			<span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
		</div>
	</div>
	
	<div class="manage-list-teacher-add-new">
		<a href="?mode=offline&page=teacher&action=add">
			<button>
				<span><?php echo $GLOBALS["TEACHER_LIST_BUTTON_ADD_TEACHER"]; ?></span>
			</button>
		</a>
	</div>
</div>