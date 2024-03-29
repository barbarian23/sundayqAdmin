<?php
	include get_theme_file_path("home/online/upload/upload-mp3/status-upload-mp3.php");
	include get_theme_file_path("home/online/upload/upload-mp3/interact-ui-upload-mp3.php" );
	$currentAction = "add";
	if (isset($_GET["action"])) {
		$currentAction = $_GET["action"];
	}
?>
<form class="manage-contain">
    <div class="manage-contain-loading" id="UploadMp3-page-loading">
        <span id="UploadMp3-page-loading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="UploadMp3-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="UploadMp3-page-loading-progress-error">
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
            <span><?php echo $GLOBALS["PDF_TITLE"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idTitleUploadMp3" name="UploadMp3_name" type="text" placeholder='<?php echo $GLOBALS["PDF_TITLE_PLACEHOLDER"]; ?>' required>
        </div>
        <hr class="manage-teacher-hr-between">
        <!-- mô tả -->
		<div class="manage-section-common-detail-midlle">
			<div class="manage-section-detail-midlle-span">
				<span id="UploadMp3SubDetailTextAreaTitle"><?php echo $GLOBALS["PDF_DESCRIPTION"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
			</div>
			<div class="manage-section-detail-midlle-item">
				<textarea id="UploadMp3DetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["PDF_DESCRIPTION_PLACEHOLDER"]; ?>' required></textarea>
			</div>
		</div>
		<?php 
			} else {
				?>
		
<!-- 		 <div class="manage-teacher-contain-left">
            <label class="manage-teacher-contain-left-upload" for="uploadShortDescriptionImg">
                <span>
                    <?php echo $GLOBALS["EXHIBITON_SHORT_DESCRIPTION_IMG"]; ?>
                </span>
				<span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <img id="shortDescriptionImg" class="manage-teacher-contain-left-img" src='<?php echo $GLOBALS["URI_ADD_NEW"]; ?>'>
                <input type="file" id="uploadShortDescriptionImg" name="uploadShortDescriptionImg" />
            </label>
     </div> -->
		<div class="manage-teacher-contain-right-upper">
            <!-- upload file -->
			 <div class="uploading-video-progress-container" style="border:1px blue solid;width:100%;height:40px" id="loading-video-content">
<div class="uploading-video-progress-bar" id="uploading-video-progress-bar" style="background:blue;width:0%;height:100%;display:flex;align-items:center;justify-content: center;"><span id="percent-upload"></span></div>
</div>
            <span><?php echo $GLOBALS["PDF_UPLOAD_PDF"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idTitleUploadMp3" name="UploadMp3_name" type="text" placeholder='<?php echo $GLOBALS["PDF_UPLOAD_PDF"]; ?>' required>
        </div>
        <hr class="manage-teacher-hr-between">
		<div class="manage-section-common-detail-midlle">
			<div class="manage-section-detail-midlle-span">
				<span id="UploadVideoReview"><?php echo $GLOBALS["PDF_WATCH_PDF"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
			</div>
			<div class="manage-section-detail-midlle-item">

			</div>
		</div>
		<?php
			}
		?>
        
	</div>
    <div class="manage-teacher-bottom-action">
        <input type="submit" name='UploadMp3Submit' value='<?php echo $GLOBALS["PDF_SUBMIT_ADD"]; ?>' id="UploadMp3Submit">
    </div>
		
</form>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    var UploadMp3Description = "";
    window.onload = function() {
        myCurrentUploadMp3 = {};
		UploadMp3Description = "";
       

        if (getCurrentACtion() == dictionaryKey.addStatus) {
            document.getElementById("UploadMp3Submit").value = '<?php echo $GLOBALS["PDF_SUBMIT_ADD"] ?>';
        }
        if (getCurrentACtion() == dictionaryKey.editStatus || getCurrentACtion() == dictionaryKey.titleStatus) {
			if(getCurrentACtion() == dictionaryKey.titleStatus){
				document.getElementById("UploadMp3Submit").value = '<?php echo $GLOBALS["PDF_SUBMIT_INIT"] ?>';
			} else if(getCurrentACtion() == dictionaryKey.editStatus){
				document.getElementById("UploadMp3Submit").value = '<?php echo $GLOBALS["PDF_SUBMIT_EDIT"] ?>';	  
			}
            

            //fetch từ server
            setLoadingDataUploadMp3(true);
            requestToSever(
                sunQRequestType.get,
                getUploadMp3(getCurrentEdit()),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDataUploadMp3(false);
                    if (res.code === networkCode.success) {
                        myCurrentUploadMp3 = res.data;
                        console.log(res.data);
						
						if (getCurrentACtion() == dictionaryKey.titleStatus){
							document.getElementById("idTitleUploadMp3").value = myCurrentUploadVideo.title == null ? "" : myCurrentUploadVideo.title;
						
						document.getElementById("UploadMp3DetailTextArea").value = myCurrentUploadVideo.minTargetAge == null ? "" : myCurrentUploadVideo.minTargetAge;
						}
						if(getCurrentACtion() == dictionaryKey.editStatus){
							
						}
                        
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
					//alert(err);
                    setLoadingDataUploadMp3(dictionaryKey.ERR);
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

	function UploadMp3(file) {
        let dataUploadMp3Image = new FormData();
        dataUploadMp3Image.append('file', file);
        window.scrollTo(0, 0);
        setLoadingDataUploadMp3(true);
        requestToSever(
            sunQRequestType.post,
            getURLUploadImage(),
            dataUploadMp3Image,
            getLocalStorage(dictionary.MSEC),
            function(res) {
                setLoadingDataUploadMp3(false);
					if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                } else {
					 myCurrentUploadMp3.descriptionImgUrl = res.urls[0];
				}
            },
            function(err) {
				setLoadingDataUploadMp3(false);
                let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.UPLOAD_IMAGE_FAILED : dictionaryKey.UPLOAD_IMAGE_FAILED;
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
            },
            true,
        );
    }
	
	//on input
	 document.getElementById("idTitleUploadMp3").addEventListener("input", function(e) {
		let tttValue = e.target.value;
        myCurrentUploadMp3.title = tttValue.escape();
    });

	document.getElementById("UploadMp3DetailTextArea").addEventListener("input", function(e) {
		   let tttValue = e.target.value;
        myCurrentUploadMp3.shortDescription = tttValue.escape();
    });
	
	document.getElementById('idTitleUploadVideo').addEventListener('change', uploadVideo);
function uploadVideo(evt) {
        let files = evt.target.files;
		let dataFile = new FormData();
        dataFile.append('video', files[0]);
        axios.put('', dataFile, {
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
    document.getElementById("UploadMp3Submit").addEventListener("click", function(e) {
        e.preventDefault();
        /*
        if (myCurrentUploadMp3.descriptionImgUrl == "" || myCurrentUploadMp3.descriptionImgUrl == null) {
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
        if(getCurrentACtion() == dictionaryKey.titleStatus && (myCurrentUploadMp3.title == "" || myCurrentUploadMp3.title == null)) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_PDF_TITLE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        }
        if (myCurrentUploadMp3.description == "" || myCurrentUploadMp3.description == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_PDF_DESCRIPTION)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        } else {
            let titlleRequestUploadMp3 = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.REQUEST_EDIT : dictionaryKey.REQUEST_ADD + dictionaryKey.PDF_NAME;
            console.log("data lên " + JSON.stringify(myCurrentUploadMp3));
            //alert("data lên " + JSON.stringify(myCurrentUploadMp3));
            SunQAlert()
                .position('center')
                .title(titlleRequestUploadMp3)
                .type('success')
                .confirmButtonColor("#3B4EDC")
                .cancelButtonColor("#a8b1f5")
                .confirmButtonText(dictionaryKey.AGREE)
                .cancelButtonText(dictionaryKey.CANCEL)
                .callback((result) => {
                    if (result.value) {
                        window.scrollTo(0, 0);
                        let tempmyCurrentUploadMp3 = myCurrentUploadMp3;
                        if (getCurrentACtion() == dictionaryKey.editStatus) {

                        }

                        delete tempmyCurrentUploadMp3.createAt;
                        delete tempmyCurrentUploadMp3.updateAt;
                        delete tempmyCurrentUploadMp3.id;
						
                        setLoadingDataUploadMp3(true);
                        requestToSever(
                            getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                            getCurrentACtion() == dictionaryKey.editStatus ? getUploadMp3(getCurrentEdit()) : postUploadMp3(),
                            tempmyCurrentUploadMp3,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDataUploadMp3(false);
                                let sunqalertsuccess = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.UPLOAD_PDF_SUCCESS : getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.INIT_PDF_SUCCESS : dictionaryKey.EDIT_PDF_SUCCESS;
                                if (res.code === networkCode.success) {
                                    //myCurrentTeacher = res.data;
                                    SunQAlert()
                                        .position('center')
                                        .title(sunqalertsuccess)
                                        .type('success')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.AGREE)
                                        .callback((result) => {
                                            webpageRedirect(getAdminHomeURL() + "?mode=offline&page=list-UploadMp3");
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
                                setLoadingDataUploadMp3(dictionaryKey.ERR);
                                let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.UPLOAD_PDF_FAILED : getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.INIT_PDF_FAILED : dictionaryKey.EDIT_PDF_FAILED;
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