<form class="manage-contain">
    <div class="manage-contain-loading" id="event-page-loading">
        <span id="event-page-loading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="event-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="event-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>
	
	<div class="manage-teacher-contain-right">
            <div class="manage-teacher-contain-right-upper">
				<!-- title -->
                 <span><?php echo $GLOBALS["EVENT_NAME_INPUT"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="idTitleEvent" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["EVENT_NAME_INPUT_PLACEHOLDER"]; ?>' required>
            </div>
            <hr class="manage-teacher-hr-between">
            <div class="manage-teacher-contain-right-below">
				<span><?php echo $GLOBALS["EVENT_DETAIL"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
              <!--  <textarea id="teacherDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["EVENT_DETAIL_PLACEHOLDER"]; ?>' required></textarea>-->
				<div id="eventDetailTextArea-toolbar-container"></div>
				<div id="eventDetailTextArea" ><?php echo $GLOBALS["EVENT_DETAIL_PLACEHOLDER"]; ?></div>
				
				<span id="eventSubDetailTextAreaTitle"><?php echo $GLOBALS["EVENT_SUB_DETAIL"]; ?></span>
			<textarea id="eventSubDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["EVENT_SUB_DETAIL_PLACEHOLDER"]; ?>' required></textarea>
            </div>
        </div>
	  <div class="manage-teacher-bottom-action">
        <input type="submit" name='eventSubmit' value='<?php echo $GLOBALS["EVENT_SUBMIT_ADD"]; ?>' id="eventSubmit">
    </div>
</form>
<script>
var listExhibition = [];

	 window.onload = function() {
		myCurrentEventn =  {};
		
		 
		  if (getCurrentACtion() == dictionaryKey.editStatus) {
			document.getElementById("eventSubmit").value = '<?php echo $GLOBALS["EVENT_SUBMIT_EDIT"] ?>';
		  }
	 }
</script>