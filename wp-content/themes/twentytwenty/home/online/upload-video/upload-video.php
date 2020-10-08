<?php
	include get_theme_file_path("home/online/upload-video/status-upload-video.php");
	include get_theme_file_path("home/online/upload-video/interact-ui-upload-video.php" );
	$currentAction = "add";
	if (isset($_GET["action"])) {
		$currentAction = $_GET["action"];
	}
?>
<form class="manage-contain">
	 <div class="manage-contain-loading" id="UploadVideo-page-loading">
        <span id="UploadVideo-page-loading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="UploadVideo-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="UploadVideo-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>
	<div class="manage-teacher-contain-right">
	<?php
	
	if($currentAction == "title"){//giai đoạn đổi tên
		?>
        <div class="manage-teacher-contain-right-upper">
            <!-- title -->
            <span><?php echo $GLOBALS["VIDEO_TITLE"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idTitleUploadVideo" name="UploadVideo_name" type="text" placeholder='<?php echo $GLOBALS["VIDEO_TITLE_PLACEHOLDER"]; ?>' required>
        </div>
        <hr class="manage-teacher-hr-between">
        <!-- mô tả -->
		<div class="manage-section-common-detail-midlle">
			<div class="manage-section-detail-midlle-span">
				<span id="UploadVideoSubDetailTextAreaTitle"><?php echo $GLOBALS["VIDEO_DESCRIPTION"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
			</div>
			<div class="manage-section-detail-midlle-item">
				<!--  <textarea id="teacherDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["VIDEO_DESCRIPTION_PLACEHOLDER"]; ?>' required></textarea>-->
<textarea id="UploadVideoDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["VIDEO_DESCRIPTION_PLACEHOLDER"]; ?>' required></textarea>
			</div>
		</div>
	<?php
	} else {//giai đoạn up video
		?>
	<!-- 	 <div class="manage-teacher-contain-left">
            <label class="manage-teacher-contain-left-upload" for="uploadShortDescriptionImg">
                <span>
                    <?php echo $GLOBALS["EXHIBITON_SHORT_DESCRIPTION_IMG"]; ?>
                </span>
				<span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <img id="shortDescriptionImg" class="manage-teacher-contain-left-img" src='<?php echo $GLOBALS["URI_ADD_NEW"]; ?>'>
                <input type="file" id="uploadShortDescriptionImg" name="uploadShortDescriptionImg" />
            </label>
     </div> -->
        <!-- video display -->
		 <div class="manage-teacher-contain-right-upper">
            <!-- upload video -->
			 <div class="uploading-video-progress-container" style="border:1px blue solid;width:100%;height:40px" id="loading-video-content">
<div class="uploading-video-progress-bar" id="uploading-video-progress-bar" style="background:blue;width:0%;height:100%;display:flex;align-items:center;justify-content: center;"><span id="percent-upload"></span></div>
</div>
            <span><?php echo $GLOBALS["VIDEO_UPLOAD_VIDEO"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
<!--             <input id="idTitleUploadVideo" name="UploadVideo_name" type="text" placeholder='<?php echo $GLOBALS["VIDEO_UPLOAD_VIDEO"]; ?>' required> -->
			  <label for="idTitleUploadVideo" class="manage-section-road-map-label-for-upload">
                <i class="fa fa-cloud-upload"></i> T?i video
            </label>
			 <input id="idTitleUploadVideo" type=file name="files[]" onclick="this.value=null;" required>
        </div>
        <hr class="manage-teacher-hr-between">
		<div class="manage-section-common-detail-midlle">
			<div class="manage-section-detail-midlle-span">
				<span id="UploadVideoReview"><?php echo $GLOBALS["VIDEO_WATCH_VIDEO"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
			</div>
			<div class="manage-section-detail-midlle-item">

			</div>
		</div>
	<?php
	}
	?>
	</div>
	<div class="manage-teacher-bottom-action">
        <input type="submit" name='UploadVideoSubmit' value='<?php echo $GLOBALS["VIDEO_SUBMIT_INIT"]; ?>' id="UploadVideoSubmit">
    </div>
</form>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    var UploadVideoDescription = "";
    window.onload = function() {
        myCurrentUploadVideo = {};
		UploadVideoDescription = "";
       

        if (getCurrentACtion() == dictionaryKey.addStatus) {
             document.getElementById("UploadVideoSubmit").value = '<?php echo $GLOBALS["VIDEO_SUBMIT_ADD"] ?>';
        }
        if (getCurrentACtion() == dictionaryKey.editStatus || getCurrentACtion() == dictionaryKey.titleStatus) {
			if(getCurrentACtion() == dictionaryKey.titleStatus){
			   document.getElementById("UploadVideoSubmit").value = '<?php echo $GLOBALS["VIDEO_SUBMIT_INIT"] ?>';
			   } else if(getCurrentACtion() == dictionaryKey.editStatus){
			    document.getElementById("UploadVideoSubmit").value = '<?php echo $GLOBALS["VIDEO_SUBMIT_EDIT"] ?>';
			   }
           

            //fetch từ server
            setLoadingDataUploadVideo(true);
            requestToSever(
                sunQRequestType.get,
                getUploadVideo(getCurrentEdit()),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDataUploadVideo(false);
                    if (res.code === networkCode.success) {
                        myCurrentUploadVideo = res.data;
                        console.log(res.data);
						
						if (getCurrentACtion() == dictionaryKey.titleStatus){
                        document.getElementById("idTitleUploadVideo").value = myCurrentUploadVideo.title == null ? "" : myCurrentUploadVideo.title;
						
						document.getElementById("UploadVideoDetailTextArea").value = myCurrentUploadVideo.minTargetAge == null ? "" : myCurrentUploadVideo.minTargetAge;
						}
						
						if(getCurrentACtion() == dictionaryKey.editStatus){
						
					}
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
					//alert(err);
                    setLoadingDataUploadVideo(dictionaryKey.ERR);
                    console.log(dictionaryKey.ERR_INFO, err);
                    SunQAlert()
                        .position('center')
                        .title(dictionaryKey.ERROR_API_MESSAGE)
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

	//on input
	 document.getElementById("idTitleUploadVideo").addEventListener("input", function(e) {
		let tttValue = e.target.value;
        myCurrentUploadVideo.title = tttValue.escape();
    });

	document.getElementById("UploadVideoDetailTextArea").addEventListener("input", function(e) {
		   let tttValue = e.target.value;
        myCurrentUploadVideo.shortDescription = tttValue.escape();
    });
	
document.getElementById('idTitleUploadVideo').addEventListener('change', uploadVideo);
function uploadVideo(evt) {
        let files = evt.target.files;
		let dataVideo = new FormData();
        dataVideo.append('video', files[0]);
        axios.put(putUploadVideo(getCurrentEdit()t), dataVideo, {
                    headers: {
						'Content-Type': 'multipart/form-data'
                    },
					onUploadProgress: (progressEvent) => {
						const totalLength = progressEvent.lengthComputable ? progressEvent.total : progressEvent.target.getResponseHeader('content-length') || progressEvent.target.getResponseHeader('x-decompressed-content-length');
						console.log("onUploadProgress", totalLength);
						if (totalLength !== null) {
						    let percentUpload = Math.round( (progressEvent.loaded * 100) / totalLength );
						    document.getElementById("uploading-video-progress-bar").style.width = percentUpload+"%";
						    document.getElementById("percent-upload").innerHTML = percentUpload+" %";
							if(percentUpload == 100){
								document.getElementById("percent-upload").innerHTML = "Hoàn thành";
							}
							console.log("",Math.round( (progressEvent.loaded * 100) / totalLength ));
						}
					},
					onDownloadProgress: (progressEvent) => {
						const totalLength = progressEvent.lengthComputable ? progressEvent.total : progressEvent.target.getResponseHeader('content-length') || progressEvent.target.getResponseHeader('x-decompressed-content-length');
						console.log("onDownloadProgress", totalLength);
						if (totalLength !== null) {
							console.log("",Math.round( (progressEvent.loaded * 100) / totalLength ));
						}
					},
                })
                .then(res => {
					console.log("res",res);
                })
                .catch(err => {
                    console.log("error",err);
                });
    }
	
    //submit form
    document.getElementById("UploadVideoSubmit").addEventListener("click", function(e) {
        e.preventDefault();
        /*
        if (myCurrentUploadVideo.descriptionImgUrl == "" || myCurrentUploadVideo.descriptionImgUrl == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_IMG_EVENT)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        }
		*/
        if (getCurrentACtion() == dictionaryKey.titleStatus && (myCurrentUploadVideo.title == "" || myCurrentUploadVideo.title == null)) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_VIDEO_TITLE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        }
        if (myCurrentUploadVideo.description == "" || myCurrentUploadVideo.description == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_VIDEO_DESCRIPTION)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        }
      else {
            let titlleRequestUploadVideo = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.REQUEST_EDIT : getCurrentACtion() == dictionaryKey.titleStatus ?  REQUEST_TITLE : dictionaryKey.REQUEST_ADD + dictionaryKey.VIDEO_NAME;
            console.log("data lên " + JSON.stringify(myCurrentUploadVideo));
            //alert("data lên " + JSON.stringify(myCurrentUploadVideo));
            SunQAlert()
                .position('center')
                .title(titlleRequestUploadVideo)
                .type('success')
                .confirmButtonColor("#3B4EDC")
                .cancelButtonColor("#a8b1f5")
                .confirmButtonText(dictionaryKey.AGREE)
                .cancelButtonText(dictionaryKey.CANCEL)
                .callback((result) => {
                    if (result.value) {
                        window.scrollTo(0, 0);
                        let tempmyCurrentUploadVideo = myCurrentUploadVideo;
                        if (getCurrentACtion() == dictionaryKey.editStatus) {

                        }

                        delete tempmyCurrentUploadVideo.createAt;
                        delete tempmyCurrentUploadVideo.updateAt;
                        delete tempmyCurrentUploadVideo.id;
						
                        setLoadingDataUploadVideo(true);
                        requestToSever(
                            getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                            getCurrentACtion() == dictionaryKey.editStatus ? getUploadVideo(getCurrentEdit()) : postUploadVideo(),
                            tempmyCurrentUploadVideo,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDataUploadVideo(false);
								//edit - title - add
                                let sunqalertsuccess = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.UPLOAD_VIDEO_SUCCESS : getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.INIT_VIDEO_SUCCESS : dictionaryKey.EDIT_VIDEO_SUCCESS;
                                if (res.code === networkCode.success) {
                                    //myCurrentTeacher = res.data;
                                    SunQAlert()
                                        .position('center')
                                        .title(sunqalertsuccess)
                                        .type('success')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.AGREE)
                                        .callback((result) => {
                                            webpageRedirect(getAdminHomeURL() + "?mode=offline&page=list-UploadVideo");
                                        })
                                        .show();
                                } else if (res.code === networkCode.accessDenied) {
                                    makeAlertPermisionDenial();
                                } else if (res.code === networkCode.sessionTimeOut) {
                                    makeAlertRedirect();
                                } else {
                                    //alert("loi"+JSON.stringify(res));
                                    SunQAlert()
                                        .position('center')
                                        .title(dictionaryKey.SERVER_INFO + res.message)
                                        .type('error')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                        .callback((result) => {})
                                        .show();
                                }
                            },
                            function(err) {alert(err);
                                setLoadingDataUploadVideo(dictionaryKey.ERR);
                                let sunqalertfailed =  getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.UPLOAD_VIDEO_FAILED : getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.INIT_VIDEO_FAILED : dictionaryKey.EDIT_VIDEO_FAILED;
                                SunQAlert()
                                    .position('center')
                                    .title(sunqalertfailed)
                                    .type('error')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                    .callback((result) => {
                                        // webpageRedirect(window.location.href);

                                    })
                                    .show();
                                console.log(dictionaryKey.ERR_INFO, err);
                            }
                        );
                    }
                })
                .show();
        }
    });
</script>