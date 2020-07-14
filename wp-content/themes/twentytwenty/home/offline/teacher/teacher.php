<?php
?>
<div class="manage-teacher-contain">
	<div class="manage-contain-teacher-loading" id="teacher-page-loading">
		<span id="teacher-page-loading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
		<div class="login-input-loading" id="teacher-page-loading-progress">
			
		</div>
		<div class="manage-contain-teacher-loading-err" id="teacher-page-loading-progress-error">
			<img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
			<span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
		</div>
	</div>
	<div  class="manage-teacher-contain-data">
		<div class="manage-teacher-contain-left">
			<label class="manage-teacher-contain-left-upload" for="uploadAvatarTeacher">
				<span>
					<?php echo $GLOBALS["TEACHER_AVATAR"]; ?>
				</span>
				<img id="teacherAvatar" class="manage-teacher-contain-left-img" src='<?php echo $GLOBALS["URI_ADD_NEW"]; ?>'>
				<input type="file" id="uploadAvatarTeacher" name="uploadAvatarTeacher"/>
			</label>
		</div>
		<div class="manage-teacher-contain-right">
			<div class="manage-teacher-contain-right-upper">
				<span><?php echo $GLOBALS["TEACHER_INPUT_NAME"]; ?></span>
				<input id="inputTeacherName" type="text" placeholder='<?php echo $GLOBALS["TEACHER_INPUT_NAME_PLACEHOLDER"]; ?>'>
				<span><?php echo $GLOBALS["TEACHER_INPUT_MAJOR"]; ?></span>
				<input id="inputTeacherMajor" type="text" placeholder='<?php echo $GLOBALS["TEACHER_INPUT_MAJOR_PLACEHOLDER"]; ?>'>
				<span><?php echo $GLOBALS["TEACHER_INPUT_EXP"]; ?></span>
				<input id="inputTeacherEXPReal" type="hidden" placeholder='<?php echo $GLOBALS["TEACHER_INPUT_EXP_PLACEHOLDER"]; ?>'>
				<input id="inputTeacherEXP" type="text" placeholder='<?php echo $GLOBALS["TEACHER_INPUT_EXP_PLACEHOLDER"]; ?>'>
			</div>
			<hr class="manage-teacher-hr-between">
			<div class="manage-teacher-contain-right-below">
				<span><?php echo $GLOBALS["TEACHER_INPUT_DETAIL"]; ?></span>
				<textarea id="teacherDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["TEACHER_INPUT_DETAIL_PLACEHOLDER"]; ?>'></textarea>
			</div>
		</div>
	</div>
	<div class="manage-teacher-bottom-action">
		<button id="lectureSubmit">
			<?php echo $GLOBALS["LECTURE_SUBMIT"] ; ?>
		</button>
	</div>
</div>
<script>
			var myCurrentTeacher = {
			
		};
	window.onload = function(){
		

		

		
		mobiscroll.datetime('#inputTeacherEXP',{
			max:new Date(),
		 dateFormat: 'd/mm/yy',
		timeFormat:'H:ii' ,
		});
		
		//nếu là edit thì load dữ liệu về
			if(getCurrentACtion() == dictionaryKey.editStatus){
			
			//fetch từ server
			setLoadingDataTeacher(true);
			requestToSever(
				sunQRequestType.get,
				getURLTeacher()+"/"+getCurrentEdit(),
				null,
				getLocalStorage(dictionary.MSEC),
				function(res){
					setLoadingDataTeacher(false);
					if(res.code === networkCode.success){
						myCurrentTeacher = res.data;
console.log(res.data);
						document.getElementById("inputTeacherName").value = myCurrentTeacher.degree +" "+ myCurrentTeacher.name;
						document.getElementById("inputTeacherMajor").value = myCurrentTeacher.specialist;
						let dateEXPTEAcher = new Date(myCurrentTeacher.practiceAt);
						let yearEXP = new Date().getYear() - dateEXPTEAcher.getYear();
						document.getElementById("inputTeacherEXP").value = yearEXP+'<?php echo $GLOBALS["TEACHER_EXP_TEACHER_DETAIL"];?>';
						document.getElementById("teacherAvatar").src = getHomeURL()+myCurrentTeacher.imgUrl;
						document.getElementById("teacherDetailTextArea").value = myCurrentTeacher.description;
					} else if (res.code === networkCode.sessionTimeOut){
							makeAlertRedirect();
					}
				},
				function(err){
					setLoadingDataTeacher(dictionaryKey.ERR);
					console.log(dictionaryKey.ERR_INFO,err);
					SunQAlert()
							.position('center')
							.title("Tải dữ liệu không thành công")
							.type('error')
							.confirmButtonColor("#3B4EDC")
							.confirmButtonText(dictionaryKey.TRY_AGAIN)
							.callback((result) => {
									webpageRedirect(window.location.href);
							   })
							 .show();
				}
			);
			
		}
	}
	
	function downloadImage(name,id){
// 		//setLoadingDataTeacher(true);
// 		console.log();
// 		requestToSever(
// 				sunQRequestType.get,
// 				"http://server.sundayq.com/resource/download/image/9551af98e7fa66e998ed0945bacde55e-1594540738366.png",
// 				null,
// 				getLocalStorage(dictionary.MSEC),
// 				function(res){
// 					//setLoadingDataTeacher(false);
// 					console.log("res",res);
// 					if(res.code === networkCode.success){
// 						window.URL.createObjectURL(blob);
// 						document.getElementById("teacherAvatar").src = res.data;
// 					} else if (res.code === networkCode.sessionTimeOut){
// 							makeAlertRedirect();
// 					}
// 				},
// 				function(err){
// 					//setLoadingDataTeacher(dictionaryKey.ERR);
// 					console.log(dictionaryKey.ERR_INFO,err);
// 				}
// 			);
	}
	
	function upLoadImage(file){
		let dataLectureImgage = new FormData();
		dataLectureImgage.append('file', file);
		
		setLoadingDataTeacher(true);
		requestToSever(
				sunQRequestType.post,
				getURLUploadImage(),
				dataLectureImgage,
				getLocalStorage(dictionary.MSEC),
				function(res){
					setLoadingDataTeacher(false);
					if(res.code === networkCode.success){
						console.log("success",res);
						myCurrentTeacher.imgUrl = res.data.urls[0];
						//myCurrentTeacher.imgUrl
					} else if (res.code === networkCode.sessionTimeOut){
							makeAlertRedirect();
					}
				},
				function(err){
					setLoadingDataTeacher(dictionaryKey.ERR);
					let sunqalertfailed= getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.UPLOAD_IMAGE_FAILED : dictionaryKey.UPLOAD_IMAGE_FAILED ;
					SunQAlert()
							.position('center')
							.title(sunqalertfailed)
							.type('error')
							.confirmButtonColor("#3B4EDC")
							.confirmButtonText(dictionaryKey.TRY_AGAIN)
							.callback((result) => {
									webpageRedirect(window.location.href);
							   })
							 .show();
					console.log(dictionaryKey.ERR_INFO,err);
				},
				true,
			);
	}
	
	document.getElementById("inputTeacherName").addEventListener("keydown",function(e){
		myCurrentTeacher.name = e.target.value;
	});
	
	document.getElementById("inputTeacherMajor").addEventListener("keydown",function(e){
		myCurrentTeacher.specialist = e.target.value;
	});
	
	document.getElementById("teacherDetailTextArea").addEventListener("keydown",function(e){
		myCurrentTeacher.description = e.target.value;
	});
	
	document.getElementById("inputTeacherEXP").addEventListener("change",function(e){
		let dateChoosingEXPD = e.target.value.split(" ")[0];
		
		let newEXPDate = new Date(dateChoosingEXPD.split("/")[1] + "/" + dateChoosingEXPD.split("/")[0]  + "/" + dateChoosingEXPD.split("/")[2] );
		console.log(e.target.value);
		let newEXP = new Date().getYear() - newEXPDate.getYear();
		document.getElementById("inputTeacherEXP").value = newEXP+'<?php echo $GLOBALS["TEACHER_EXP_TEACHER_DETAIL"]; ?>';
		
		document.getElementById("inputTeacherEXPReal").value=dateChoosingEXPD.split("/")[2] + "/" + dateChoosingEXPD.split("/")[1]  + "/" + dateChoosingEXPD.split("/")[0] +"T0:0:0" ;
		myCurrentTeacher.practiceAt = dateChoosingEXPD.split("/")[2] + "/" + dateChoosingEXPD.split("/")[1]  + "/" + dateChoosingEXPD.split("/")[0] +"T0:0:0" ;
	});
	
	document.getElementById('uploadAvatarTeacher').addEventListener("change",(evt) => {
		var tgt = evt.target || window.event.srcElement,
			files = tgt.files;
		//upLoadImage(tgt.files[0]);
		// FileReader support
		if (FileReader && files && files.length) {
			var fr = new FileReader();
			fr.onload = function () {
				document.getElementById("teacherAvatar").src = fr.result;
				upLoadImage(files[0]);
			}
			fr.readAsDataURL(files[0]);
		}

		// Not supported
		else {
			// fallback -- perhaps submit the input to an iframe and temporarily store
			// them on the server until the user's session ends.
		}
	});
	
	//submit form
	document.getElementById("lectureSubmit").addEventListener("click",function(){
		let tempmyCurrentTeacher = myCurrentTeacher;
if(getCurrentACtion() == dictionaryKey.editStatus){
delete tempmyCurrentTeacher.email;
tempmyCurrentTeacher.phone = "0123456789";
}else{
  tempmyCurrentTeacher.email = "year@sundayq.com";
  tempmyCurrentTeacher.phone = "123";
}
		delete tempmyCurrentTeacher.createAt;
		delete tempmyCurrentTeacher.updateAt;
		delete tempmyCurrentTeacher.id;
//delete tempmyCurrentTeacher.email;
//tempmyCurrentTeacher.phone = "123";	
		setLoadingDataTeacher(true);
			requestToSever(
				getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
				getCurrentACtion() == dictionaryKey.editStatus ? getURLTeacher()+"/"+getCurrentEdit() : getURLTeacher(),
				tempmyCurrentTeacher,
				getLocalStorage(dictionary.MSEC),
				function(res){
					setLoadingDataTeacher(false);
					let sunqalertsuccess = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.TEACHER_EDIT_SUCCESS : dictionaryKey.TEACHER_ADD_SUCCESS ;
					if(res.code === networkCode.success){
						//myCurrentTeacher = res.data;
							SunQAlert()
							.position('center')
							.title(sunqalertsuccess)
							.type('success')
							.confirmButtonColor("#3B4EDC")
							.confirmButtonText(dictionaryKey.AGREE)
							.callback((result) => {
									webpageRedirect("http://103.146.22.168/admin?mode=offline&page=list-teacher");
							   })
							 .show();
					} else if (res.code === networkCode.sessionTimeOut){
							makeAlertRedirect();
					}
				},
				function(err){
					setLoadingDataTeacher(dictionaryKey.ERR);
					let sunqalertfailed= getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.TEACHER_EDIT_FAILED : dictionaryKey.TEACHER_ADD_FAILED ;
					SunQAlert()
							.position('center')
							.title(sunqalertfailed)
							.type('error')
							.confirmButtonColor("#3B4EDC")
							.confirmButtonText(dictionaryKey.TRY_AGAIN)
							.callback((result) => {
									webpageRedirect(window.location.href);
							   })
							 .show();
					console.log(dictionaryKey.ERR_INFO,err);
				}
			);
	});
	
</script>
