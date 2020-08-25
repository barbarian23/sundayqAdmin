<?php 
	include get_theme_file_path("home/offline/qvisit/ticket/ticket-status.php");
	include get_theme_file_path("home/offline/qvisit/ticket/ticket-interact-ui.php" ); 
?>

<script>
var listTicket = [], listVisitedTicket  = [];

	window.onload = function() {
		
		//get list ticket
		listVisitedTicket.push(0);
		setCurrentTicket(0);

		
    }
	
</script>
<div class="manage-list-lecture">
	
	<div class="manage-list-lecture-list-register">
		
		<div class="manage-section-helpdesk-title-table">
				<span id="tableTicketTitle"><?php echo $GLOBALS["TICKET_NEED_SUPPORT"]; ?></span>
		</div>
		
		<div class="sunq-process-contain" id="fetchListTicketProgress">
            <span id="fetchListTicketProgressText"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
            <div class="sunq-process-contain-running">

            </div>
        </div>
	<div class="manage-list-teacher-table-no-list" id="listTicketEmpty">
            <img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
            <span><?php echo $GLOBALS["TICKET_NEED_SUPPORT_EMPTY"]; ?></span>
        </div>
        <div class="manage-list-lecture-table-detail-no-list" id="listTicketError">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
		
		<div class="manage-section-helpdesk" id="tableTicket">
			
			<div class="manage-section-helpdesk-table">
				<table class="manage-section-helpdesk-real-table" id="tableTicketInside">

				</table>
			</div>
    	</div> 
		<!-- paging -->
		<span class="manage-list-lecture-list-register-paging-span-title" id="span-title-ticket"><?php echo $GLOBALS["LECTURE_LIST_REGISTER_NUMBER_TITLE"]; ?></span>
		<div class="manage-list-lecture-list-register-paging" id="pagingListTicket">
			
		</div>
	</div>
</div>