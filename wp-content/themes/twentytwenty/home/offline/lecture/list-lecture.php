<?php

?>
<script>
	window.onload = function(){
		setFetchingLecture(true);
		requestToSever(
		sunQRequestType.get,
		getURLAllLecture(),
		null,
		getData(dictionary.MSEC),
		function(res){
			setFetchingLecture(false);
			if(res.code === networkCode.success){
				if (res.data == null || res.data.length == 0){
					setGetLectureFromServerSuccess(false);
				} else {
					//setGetLectureFromServerSuccess(true);
					emptyTableListLecture();
					createListLEcture(res.data);
				}
			} else if (res.code === networkCode.sessionTimeOut){
					makeAlertRedirect();
			}
		},
		function(err){
			setFetchingLecture(false);
			console.log(dictionaryKey.ERR_INFO,err);
			setIsGetLectureFromServerSuccess(false);

		}
		);
	}
	
</script>
<div class="manage-list-lecture">
	<div class="manage-list-lecture-title">
		<span><?php echo $GLOBALS["LECTURE_LIST_TITLE"]; ?></span>
	</div>
	
	<div class="manage-list-lecture-table">
		<div class="sunq-process-contain" id="fetchListLectureProgress">
			<div class="sunq-process-contain-running">
				
			</div>
		</div>
		<table class="manage-list-lecture-table-detail" id="tableListLecture">
			
		</table>
		<div class="manage-list-lecture-table-detail-no-list" id="listLectureEmpty">
			<img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
			<span><?php echo $GLOBALS["LECTURE_NO_LIST"]; ?></span>
		</div>
		
		<div class="manage-list-lecture-table-detail-no-list" id="listLectureError">
			<img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
			<span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
		</div>
	</div>
	
	<div class="manage-list-lecture-add-new">
		<a href="?mode=offline&page=lecture&action=add">
			<button>
				<span><?php echo $GLOBALS["LECTURE_LIST_BUTTON_ADD_LECTURE"]; ?></span>
			</button>
		</a>
	</div>
</div>