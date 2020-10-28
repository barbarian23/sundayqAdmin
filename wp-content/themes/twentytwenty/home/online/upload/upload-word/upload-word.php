<?php
	include get_theme_file_path("home/online/upload/upload-word/status-upload-word.php");
	include get_theme_file_path("home/online/upload/upload-word/interact-ui-upload-word.php" );
	$currentAction = "add";
    /**
	 * <ul>
	 * 	<li> title là đang ở trạng thái mới tạo xong video, chưa đẩy video lên </li>
	 *  <li> add là trạng thái đã hoàn thiện video </li>
	 * </ul>
	 */
	if (isset($_GET["action"])) {
		$currentAction = $_GET["action"];
	} 
?>
<form class="manage-contain">
	 <div class="manage-contain-loading" id="UploadWord-page-loading">
        <span id="UploadWord-page-loading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="UploadWord-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="UploadWord-page-loading-progress-error">
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
            <input id="idTitleUploadWord" name="UploadWord_name" type="text" placeholder='<?php echo $GLOBALS["VIDEO_TITLE_PLACEHOLDER"]; ?>' required>
        </div>
        <hr class="manage-teacher-hr-between">
        <!-- mô tả -->
		<div class="manage-section-common-detail-midlle">
			<div class="manage-section-detail-midlle-span">
				<span id="UploadWordSubDetailTextAreaTitle"><?php echo $GLOBALS["VIDEO_DESCRIPTION"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
			</div>
			<div class="manage-section-detail-midlle-item">
				<!--  <textarea id="teacherDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["VIDEO_DESCRIPTION_PLACEHOLDER"]; ?>' required></textarea>-->
<textarea id="UploadWordDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["VIDEO_DESCRIPTION_PLACEHOLDER"]; ?>' required></textarea>
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
<!--             <input id="idTitleUploadWord" name="UploadWord_name" type="text" placeholder='<?php echo $GLOBALS["VIDEO_UPLOAD_VIDEO"]; ?>' required> -->
			  <label for="idTitleUploadWord" class="manage-section-road-map-label-for-upload">
                <i class="fa fa-cloud-upload"></i> T?i video
            </label>
			 <input id="idTitleUploadWord" type=file name="files[]" onclick="this.value=null;" required>
        </div>
        <hr class="manage-teacher-hr-between">
		<div class="manage-section-common-detail-midlle">
			<div class="manage-section-detail-midlle-span">
				<span id="UploadWordReview"><?php echo $GLOBALS["VIDEO_WATCH_VIDEO"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
			</div>
			<div class="manage-section-detail-midlle-item">

			</div>
		</div>
	<?php
	}
	?>
	</div>
	<div class="manage-teacher-bottom-action">
        <input type="submit" name='UploadWordSubmit' value='<?php echo $GLOBALS["VIDEO_SUBMIT_INIT"]; ?>' id="UploadWordSubmit">
    </div>
</form>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/hls.js@canary"></script>
<script>
    var UploadWordDescription = "";
    window.onload = function() {
        myCurrentUploadWord = {};
		UploadWordDescription = "";
       

        if (getCurrentACtion() == dictionaryKey.addStatus) {
             document.getElementById("UploadWordSubmit").value = '<?php echo $GLOBALS["VIDEO_SUBMIT_ADD"] ?>';
        }
        if (getCurrentACtion() == dictionaryKey.editStatus || getCurrentACtion() == dictionaryKey.titleStatus) {
			if(getCurrentACtion() == dictionaryKey.titleStatus){
			   document.getElementById("UploadWordSubmit").value = '<?php echo $GLOBALS["VIDEO_SUBMIT_INIT"] ?>';
			   } else if(getCurrentACtion() == dictionaryKey.editStatus){
			    document.getElementById("UploadWordSubmit").value = '<?php echo $GLOBALS["VIDEO_SUBMIT_EDIT"] ?>';
			   }
           

            //fetch từ server
            setLoadingDataUploadWord(true);
            requestToSever(
                sunQRequestType.get,
                getUploadWord(getCurrentEdit()),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDataUploadWord(false);
                    if (res.code === networkCode.success) {
                        myCurrentUploadWord = res.data;
                        console.log(res.data);
						
						if (getCurrentACtion() == dictionaryKey.titleStatus){
                        document.getElementById("idTitleUploadWord").value = myCurrentUploadWord.title == null ? "" : myCurrentUploadWord.title;
						
						document.getElementById("UploadWordDetailTextArea").value = myCurrentUploadWord.minTargetAge == null ? "" : myCurrentUploadWord.minTargetAge;
						}
						
						if(getCurrentACtion() == dictionaryKey.editStatus){
						
					}
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
					//alert(err);
                    setLoadingDataUploadWord(dictionaryKey.ERR);
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
	 document.getElementById("idTitleUploadWord").addEventListener("input", function(e) {
		let tttValue = e.target.value;
        myCurrentUploadWord.title = tttValue.escape();
    });

	document.getElementById("UploadWordDetailTextArea").addEventListener("input", function(e) {
		   let tttValue = e.target.value;
        myCurrentUploadWord.shortDescription = tttValue.escape();
    });
	
document.getElementById('idTitleUploadWord').addEventListener('change', UploadWord);
function UploadWord(evt) {
        let files = evt.target.files;
		let dataVideo = new FormData();
        dataVideo.append('video', files[0]);
        axios.put(putUploadWord(getCurrentEdit()t), dataVideo, {
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
    document.getElementById("UploadWordSubmit").addEventListener("click", function(e) {
        e.preventDefault();
        /*
        if (myCurrentUploadWord.descriptionImgUrl == "" || myCurrentUploadWord.descriptionImgUrl == null) {
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
        if (getCurrentACtion() == dictionaryKey.titleStatus && (myCurrentUploadWord.title == "" || myCurrentUploadWord.title == null)) {
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
        if (myCurrentUploadWord.description == "" || myCurrentUploadWord.description == null) {
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
            let titlleRequestUploadWord = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.REQUEST_EDIT : getCurrentACtion() == dictionaryKey.titleStatus ?  REQUEST_TITLE : dictionaryKey.REQUEST_ADD + dictionaryKey.VIDEO_NAME;
            console.log("data lên " + JSON.stringify(myCurrentUploadWord));
            //alert("data lên " + JSON.stringify(myCurrentUploadWord));
            SunQAlert()
                .position('center')
                .title(titlleRequestUploadWord)
                .type('success')
                .confirmButtonColor("#3B4EDC")
                .cancelButtonColor("#a8b1f5")
                .confirmButtonText(dictionaryKey.AGREE)
                .cancelButtonText(dictionaryKey.CANCEL)
                .callback((result) => {
                    if (result.value) {
                        window.scrollTo(0, 0);
                        let tempmyCurrentUploadWord = myCurrentUploadWord;
                        if (getCurrentACtion() == dictionaryKey.editStatus) {

                        }

                        delete tempmyCurrentUploadWord.createAt;
                        delete tempmyCurrentUploadWord.updateAt;
                        delete tempmyCurrentUploadWord.id;
						
                        setLoadingDataUploadWord(true);
                        requestToSever(
                            getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                            getCurrentACtion() == dictionaryKey.editStatus ? getUploadWord(getCurrentEdit()) : postUploadWord(),
                            tempmyCurrentUploadWord,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDataUploadWord(false);
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
                                            webpageRedirect(getAdminHomeURL() + "?mode=offline&page=list-UploadWord");
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
                                setLoadingDataUploadWord(dictionaryKey.ERR);
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
<!--
<script>
        console.log("abc abc");
        if (Hls.isSupported()) {
            console.log("Hls support");
            var video = document.getElementById('video');
            // var hls = new Hls({
            //     xhrSetup: xhr => {
            //         xhr.setRequestHeader('Authorization', "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6Ijc3MjYzMDNhNzlkMGRiMjdjYmJhOTZlNzI3YmVhMjFiMTU5NjQ0MDU2NDg5NCIsInR5cGUiOiJhZG1pbiIsImlhdCI6MTYwMDE1NDIxOCwiZXhwIjoxNjAwMTk3NDE4fQ.1aJDfoajKhDQAbrsUwzzdjNNLXd0dm2UWu7TA6kvA0w")
            //     }
            // });
            var hls = new Hls();
            hls.loadSource('http://107.113.194.132:3000/resource/video/506b3d40b137f2447d86a99ddd019f86-1602668717027_720.m3u8');
            hls.attachMedia(video);
            hls.on(Hls.Events.MANIFEST_PARSED, function () {
                video.play();
            });
        }
        // hls.js is not supported on platforms that do not have Media Source Extensions (MSE) enabled.
        // When the browser has built-in HLS support (check using `canPlayType`), we can provide an HLS manifest (i.e. .m3u8 URL) directly to the video element throught the `src` property.
        // This is using the built-in support of the plain video element, without using hls.js.
        else {
            console.log("Hls is not support");
        }
    </script>
-->