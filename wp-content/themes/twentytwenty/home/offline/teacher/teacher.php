<?php
?>
<div class="manage-teacher-contain">
	<div class="manage-teacher-contain-left">
		<span>
			<?php echo $GLOBALS["TEACHER_AVATAR"]; ?>
		</span>
		<div class="manage-teacher-contain-left-img">
		
		</div>
	</div>
	<div class="manage-teacher-contain-right">
		<div class="manage-teacher-contain-right-upper">
			<span><?php echo $GLOBALS["TEACHER_INPUT_NAME"]; ?></span>
			<input id="" type="text" placeholder='<?php echo $GLOBALS["TEACHER_INPUT_NAME_PLACEHOLDER"]; ?>'>
			<span><?php echo $GLOBALS["TEACHER_INPUT_MAJOR"]; ?></span>
			<input id="" type="text" placeholder='<?php echo $GLOBALS["TEACHER_INPUT_MAJOR_PLACEHOLDER"]; ?>'>
			<span><?php echo $GLOBALS["TEACHER_INPUT_EXP"]; ?></span>
			<input id="" type="text" placeholder='<?php echo $GLOBALS["TEACHER_INPUT_EXP_PLACEHOLDER"]; ?>'>
		</div>
		<hr class="manage-teacher-hr-between">
		<div class="manage-teacher-contain-right-below">
			<span><?php echo $GLOBALS["TEACHER_INPUT_DETAIL"]; ?></span>
			<textarea id="teacherDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["TEACHER_INPUT_DETAIL_PLACEHOLDER"]; ?>'></textarea>
		</div>
	</div>
</div>