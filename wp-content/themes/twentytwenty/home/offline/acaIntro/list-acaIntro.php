<?php 
	include get_theme_file_path("home/offline/acaIntro/acaIntro-status.php");
	include get_theme_file_path("home/offline/acaIntro/acaIntro-interact-ui.php" ); 
?>

<script>
var listVisitedacaIntro = [],listacaIntro = [];
window.onload = function() {
		//get list ticket
		listacaIntro.push(0);
		setCurrentacaIntro(0);
    }
</script>
<div class="manage-list-lecture">
	<div class="manage-list-lecture-title-list-contain">		
		<div class="manage-list-lecture-title">
			<span><?php echo $GLOBALS["QVISIT_ARTICLE_LIST_TITLE"]; ?></span>
		</div>

		<div class="manage-list-lecture-table">
			<div class="sunq-process-contain" id="fetchListacaIntroProgress">
				<div class="sunq-process-contain-running">

				</div>
			</div>
			<table class="manage-list-lecture-table-detail" id="tableListacaIntro">

			</table>
			<div class="manage-list-lecture-table-detail-no-list" id="listacaIntroEmpty">
				<img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
				<span><?php echo $GLOBALS["QVISIT_ARTICLE_NO_LIST"]; ?></span>
			</div>

			<div class="manage-list-lecture-table-detail-no-list" id="listacaIntroError">
				<img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
				<span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
			</div>
		</div>

		
		
		<!-- paging -->
<!-- 		<span class="manage-list-lecture-list-register-paging-span-title" id="span-title-acaIntro"><?php echo $GLOBALS["LECTURE_LIST_REGISTER_NUMBER_TITLE"]; ?></span>
		<div class="manage-list-lecture-list-register-paging" id="pagingListacaIntro">
			
		</div> -->
	</div>
</div>