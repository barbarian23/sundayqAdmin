<?php 
	include get_theme_file_path("home/offline/qvisit/contact/contact-status.php");
	include get_theme_file_path("home/offline/qvisit/contact/contatc-interact-ui.php" ); 
?>
<script>
var listContact = [], listVisitedContact = [];
	
	window.onload = function() {
		//alert("yea onload");
		//get list ticket
		listVisitedContact.push(0);
		setCurrentContact(0);
			
		
    }
	
	
</script>
<div class="manage-list-lecture">
	
	<div class="manage-list-lecture-list-register">
		
		<div class="manage-section-helpdesk-title-table">
				<span id="tableContactTitle"><?php echo $GLOBALS["CONTACT_NEED_SUPPORT"]; ?></span>
		</div>
		
		<div class="sunq-process-contain" id="fetchListContactProgress">
            <span id="fetchListContactProgressText"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
            <div class="sunq-process-contain-running">

            </div>
        </div>
		<div class="manage-list-teacher-table-no-list" id="listContactEmpty">
            <img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
            <span><?php echo $GLOBALS["CONTACT_NEED_SUPPORT_EMPTY"]; ?></span>
        </div>
        <div class="manage-list-lecture-table-detail-no-list" id="listContactError">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
		
		<div class="manage-section-helpdesk" id="tableListContact">
			
			<div class="manage-section-helpdesk-table">
				<table class="manage-section-helpdesk-real-table" id="tableContact">

				</table>
			</div>
    	</div> 
		<!-- paging -->
		<span class="manage-list-lecture-list-register-paging-span-title" id="span-title-contact"><?php echo $GLOBALS["LECTURE_LIST_REGISTER_NUMBER_TITLE"]; ?></span>
		<div class="manage-list-lecture-list-register-paging" id="pagingListContact">
			
		</div>
	</div>
</div>