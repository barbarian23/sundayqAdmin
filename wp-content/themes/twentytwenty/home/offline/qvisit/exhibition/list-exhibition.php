<?php 
	include ("home/offline/qvisit/exhibition/exhibition-status.php");
	include ("home/offline/qvisit/exhibition/exhibition-interact-ui.php" ); 
?>

<script>
var listVisitedExhibition = [];

</script>
<div class="manage-list-lecture">
	<div class="manage-list-lecture-title-list-contain">
		<div class="manage-list-lecture-title">
			<span><?php echo $GLOBALS["EXHIBITON_LIST_TITLE"]; ?></span>
		</div>

		<div class="manage-list-lecture-table">
			<div class="sunq-process-contain" id="fetchListExhibitionProgress">
				<div class="sunq-process-contain-running">

				</div>
			</div>
			<table class="manage-list-lecture-table-detail" id="tableListExhibitiont">

			</table>
			<div class="manage-list-lecture-table-detail-no-list" id="listExhibitionEmpty">
				<img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
				<span><?php echo $GLOBALS["EXHIBITON_NO_LIST"]; ?></span>
			</div>

			<div class="manage-list-lecture-table-detail-no-list" id="listExhibitionError">
				<img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
				<span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
			</div>
		</div>

		<!-- paging -->
		<span class="manage-list-lecture-list-register-paging-span-title" id="span-title-exhibition"><?php echo $GLOBALS["LECTURE_LIST_REGISTER_NUMBER_TITLE"]; ?></span>
		<div class="manage-list-lecture-list-register-paging" id="pagingListExhibition">
			
		</div>
		
		<div class="manage-list-lecture-add-new">
			<a href="?mode=offline&page=exhibition&action=add">
				<button>
					<span><?php echo $GLOBALS["EXHIBITON_LIST_BUTTON_ADD_ACCOUNT"]; ?></span>
				</button>
			</a>
		</div>
	</div>
</div>