<?php
include get_theme_file_path("home/online/upload/upload-video/status-upload-video.php");
include get_theme_file_path("home/online/upload/upload-video/interact-ui-upload-video.php");
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
    <div class="manage-contain-loading" id="uploadVideo-page-loading">
        <span id="uploadVideo-page-loading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="uploadVideo-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="uploadVideo-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>
	 
        <?php
        //add là thêm mới video, edit là upload video, title là sửa tiêu đề video
        if ($currentAction != "edit") { //giai đoạn title
			
        ?>
					<?php
					   if($currentAction != "title"){
					?>
					      <span class="upload-video-page-title"><?php echo $GLOBALS["VIDEO_TITLE_ADD_NEW"]; ?></span>
					<?php
							} else  if($currentAction == "title"){
					?>
					       <span class="upload-video-page-title"><?php echo $GLOBALS["VIDEO_TITLE_UPLOAD"]; ?></span>
					<?php 
							} 
					?>
	
    <div class="manage-teacher-contain-right" style="padding:0px">
            <div class="manage-teacher-contain-left">
				<div class="manage-teacher-contain-right-upper">
                <label class="manage-teacher-contain-left-upload" for="uploadImageVideo">
                    <span>
                        <?php echo $GLOBALS["VIDEO_AVATAR"]; ?>
                    </span>
                    <span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                    <img id="imageVideo" class="manage-teacher-contain-left-img" src='<?php echo $GLOBALS["URI_ADD_NEW"]; ?>'>
                    <input type="file" id="uploadImageVideo" name="uploadImageVideo" />
                </label>
				</div>
            </div>
            <div class="manage-teacher-contain-right-upper">
                <!-- title -->
                <span><?php echo $GLOBALS["VIDEO_TITLE"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="idTitleUploadVideo" name="UploadVideo_name" type="text" placeholder='<?php echo $GLOBALS["VIDEO_TITLE_PLACEHOLDER"]; ?>' required>
							<?php
			if($currentAction == "title"){	   
		?>	
				<!-- status -->
                <span><?php echo $GLOBALS["VIDEO_STATUS"]; ?></span>
                <input id="idStatusUploadVideo" name="UploadVideo_status" type="text" readonly>
				
				<?php
			}
				?>
            </div>
            <hr class="manage-teacher-hr-between">
            <!-- mô tả -->
            <div class="manage-section-common-detail-midlle">
                <div class="manage-section-detail-midlle-span">
                    <span id="UploadVideoSubDetailTextAreaTitle"><?php echo $GLOBALS["VIDEO_DESCRIPTION"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                </div>
                <div class="manage-section-detail-midlle-item">
                    <!--  <textarea id="teacherDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["VIDEO_DESCRIPTION_PLACEHOLDER"]; ?>' required></textarea>-->

                    <div id="UploadVideoDetailTextArea-toolbar-container"></div>
                    <div id="UploadVideoDetailTextArea"><?php echo $GLOBALS["VIDEO_DESCRIPTION_PLACEHOLDER"]; ?></div>

                </div>
            </div>
            <!-- mô tả ngắn gọn -->
            <div class="manage-section-common-detail-midlle">
                <div class="manage-section-detail-midlle-span">
                    <span id="UploadVideoSubDetailTextAreaTitle"><?php echo $GLOBALS["VIDEO_SHORT_DESCRIPTION"]; ?></span>
                </div>
                <div class="manage-section-detail-midlle-item">
                    <textarea id="UploadVideoSubDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["VIDEO_SHORT_DESCRIPTION_PLACEHOLDER"]; ?>' required></textarea>
                </div>
            </div>
		<?php
			if($currentAction == "title"){	   
		?>
            <div class="manage-section-common-detail-midlle">
                <a id="aRedirectToUploadVideo" href="">
                    <label class="manage-section-road-map-label-for-upload">
                        <?php echo $GLOBALS["VIDEO_SWITCH_TO_UPLOAD"]; ?>
                    </label>
                </a>
            </div>
		<?php 
			}
		 ?>
	</div>
        <?php
        } else { //giai đoạn up video $currentAction == "edit"
        ?>
	<span style="color: #002546;
    font-weight: 600;
    font-size: 28px;"><?php echo $GLOBALS["VIDEO_VIDEO_UPLOAD"]; ?></span>
    <div class="manage-teacher-contain-right" style="padding:0px">
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
            <div class="manage-teacher-contain-left">
                <label class="manage-teacher-contain-left-upload" for="uploadImageVideo">
                    <span>
                        <?php echo $GLOBALS["VIDEO_AVATAR"]; ?>
                    </span>
                    <span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                    <img id="imageVideo" class="manage-teacher-contain-left-img" src='<?php echo $GLOBALS["URI_ADD_NEW"]; ?>'>
                </label>
            </div>
            <div class="manage-teacher-contain-right-upper">
                <!-- title -->
                <span><?php echo $GLOBALS["VIDEO_TITLE"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="idTitleUploadVideo" name="UploadVideo_name" type="text" placeholder='<?php echo $GLOBALS["VIDEO_TITLE_PLACEHOLDER"]; ?>' readonly>
				
				<!-- status -->
                <span><?php echo $GLOBALS["VIDEO_STATUS"]; ?></span>
                <input id="idStatusUploadVideo" name="UploadVideo_status" type="text" readonly>
            </div>
            
            <hr class="manage-teacher-hr-between">
            <!-- video display -->
            <div class="manage-teacher-contain-right-upper">
                <!-- upload video -->
                <div class="uploading-video-progress-container" id="loading-video-content">
                    <div class="uploading-video-progress-bar" id="uploading-video-progress-bar" style="background:blue;width:0%;height:100%;display:flex;align-items:center;justify-content: center;"><span id="percent-upload"></span></div>
                </div>
                <span><?php echo $GLOBALS["VIDEO_UPLOAD_VIDEO"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <!--             <input id="idTitleUploadVideo" name="UploadVideo_name" type="text" placeholder='<?php echo $GLOBALS["VIDEO_UPLOAD_VIDEO"]; ?>' required> -->
                <label for="idUploadVideo" class="manage-section-road-map-label-for-upload label-uploading-video">
                    <i class="fa fa-cloud-upload"></i> <span id="spanStatusUploadVideo"><?php echo $GLOBALS["VIDEO_SUBMIT_ADD"]; ?></span>
                </label>
                <input id="idUploadVideo" type=file name="files[]" onclick="this.value=null;" required>
            </div>
            <hr class="manage-teacher-hr-between">
            <div class="manage-section-common-detail-midlle">
                <div class="manage-section-detail-midlle-span">
                    <span id="UploadVideoReview"><?php echo $GLOBALS["VIDEO_WATCH_VIDEO"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                </div>
                <div class="manage-section-detail-midlle-item">
                    <video width="350" height="350" id="video" controls autoplay muted></video>
                </div>
            </div>
		</div>
        <?php
        }
        ?>
    <div class="manage-teacher-bottom-action">
        <input type="submit" name='UploadVideoSubmit' value='<?php echo $GLOBALS["VIDEO_SUBMIT_INIT"]; ?>' id="UploadVideoSubmit">
    </div>
</form>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/hls.js@canary"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/decoupled-document/ckeditor.js"></script>
<script>
    var uploadVideoDescription = "";
    window.onload = function() {
        myCurrentUploadVideo = {};
        uploadVideoDescription = "";
        if (document.querySelector('#UploadVideoDetailTextArea')) {
            DecoupledEditor
                .create(document.querySelector('#UploadVideoDetailTextArea'), {
                    extraPlugins: [myCustomUploadAdapterPlugin],
                })
                .then(editor => {
                    uploadVideoDescription = editor;
                    let toolbarContainer = document.querySelector('#UploadVideoDetailTextArea-toolbar-container');

                    toolbarContainer.appendChild(editor.ui.view.toolbar.element);
                })
                .catch(error => {
                    console.error(error);
                });
        }
        if (getCurrentACtion() == dictionaryKey.addStatus) {
            document.getElementById("UploadVideoSubmit").value = '<?php echo $GLOBALS["VIDEO_SUBMIT_INIT"] ?>';
        }
        if (getCurrentACtion() == dictionaryKey.editStatus || getCurrentACtion() == dictionaryKey.titleStatus) {
            if (getCurrentACtion() == dictionaryKey.titleStatus) {
                document.getElementById("UploadVideoSubmit").value = '<?php echo $GLOBALS["VIDEO_SUBMIT_EDIT"] ?>';
                if(document.getElementById("aRedirectToUploadVideo")){
					document.getElementById("aRedirectToUploadVideo").href = makeATagRedirect(sunQMode.online, listScreen.online.uploadVideo, dictionaryKey.editStatus, getCurrentEdit());
				}
            } else if (getCurrentACtion() == dictionaryKey.editStatus) {
                document.getElementById("UploadVideoSubmit").value = '<?php echo $GLOBALS["VIDEO_SUBMIT_SWITCH_TO_LIST"] ?>';

            }
            //fetch từ server
            setLoadingDataUploadVideo(true);
            requestToSever(
                sunQRequestType.get,
                getInfoVideo(getCurrentEdit()),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDataUploadVideo(false);
                    if (res.code === networkCode.success) {
                        myCurrentUploadVideo = res.data.video;
                        console.log(res.data.video);

                        document.getElementById("idTitleUploadVideo").value = myCurrentUploadVideo.title == null ? "<?php echo $GLOBALS["URI_ADD_NEW"]; ?>" : myCurrentUploadVideo.title;
                        document.getElementById("imageVideo").src = myCurrentUploadVideo.thumbnailUrl == null ? '<?php echo $GLOBALS["URI_ADD_NEW"]; ?>' : getHomeURL() + myCurrentUploadVideo.thumbnailUrl;

                        if (getCurrentACtion() == dictionaryKey.titleStatus) { //sửa thông tin video
                            document.getElementById("UploadVideoSubDetailTextArea").value = myCurrentUploadVideo.shortDescription == null ? "" : myCurrentUploadVideo.shortDescription;
                            uploadVideoDescription.setData(myCurrentUploadVideo.description != null ? myCurrentUploadVideo.description : "");

                        }

                        //status
if(document.getElementById("idStatusUploadVideo")){
                        document.getElementById("idStatusUploadVideo").value = myCurrentUploadVideo.status == videoStatus.complete ? '<?php echo $GLOBALS["VIDEO_STATUS_COMPLETE"]; ?>' : myCurrentUploadVideo.status == videoStatus.uploading ? '<?php echo $GLOBALS["VIDEO_STATUS_UPLOAD"]; ?>' : '<?php echo $GLOBALS["VIDEO_STATUS_ERROR"]; ?>';
					}

                        if (getCurrentACtion() == dictionaryKey.editStatus) { //tải lên lại video
                            if (myCurrentUploadVideo.status == videoStatus.complete) {
                                document.getElementById("spanStatusUploadVideo").innerHTML = '<?php echo $GLOBALS["VIDEO_SUBMIT_REUP"]; ?>';
                                if (Hls.isSupported()) {
									let watchingURL = watchVideo(myCurrentUploadVideo.fileUrl);
                                    //console.log("Hls support",watchingURL,myCurrentUploadVideo.fileUrl);
                                    var video = document.getElementById('video');
                                    var hls = new Hls({
                                        xhrSetup: xhr => {
                                            xhr.setRequestHeader(getLocalStorage(dictionary.MSEC))
                                        }
                                    });
                                    var hls = new Hls();
                                    hls.loadSource(watchingURL);
                                    hls.attachMedia(video);
                                    hls.on(Hls.Events.MANIFEST_PARSED, function() {
                                        video.play();
                                    });
                                }
                                // hls.js is not supported on platforms that do not have Media Source Extensions (MSE) enabled.
                                // When the browser has built-in HLS support (check using `canPlayType`), we can provide an HLS manifest (i.e. .m3u8 URL) directly to the video element throught the `src` property.
                                // This is using the built-in support of the plain video element, without using hls.js.
                                else {
                                    console.log("Hls is not support");
                                }
                            } else {
                                document.getElementById("spanStatusUploadVideo").innerHTML = '<?php echo $GLOBALS["VIDEO_SUBMIT_ADD"]; ?>';
                            }

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
    getCurrentACtion() != dictionaryKey.editStatus && document.getElementById("idTitleUploadVideo").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentUploadVideo.title = tttValue.escape();
    });

    getCurrentACtion() != dictionaryKey.editStatus && document.getElementById("UploadVideoSubDetailTextArea").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentUploadVideo.shortDescription = tttValue.escape();
    });

    getCurrentACtion() != dictionaryKey.editStatus && document.getElementById('uploadImageVideo').addEventListener("change", (evt) => {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;
        //upLoadImage(tgt.files[0]);
        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function() {
                document.getElementById("imageVideo").src = fr.result;
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

    document.getElementById('idUploadVideo') && document.getElementById('idUploadVideo').addEventListener('change', uploadVideo);

    function uploadVideo(evt) {
		document.getElementById("loading-video-content").style.display = "block";
        let files = evt.target.files;
        let dataVideo = new FormData();
        dataVideo.append('video', files[0]);
        axios.put(putUploadVideo(getCurrentEdit()), dataVideo, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
                onUploadProgress: (progressEvent) => {
                    const totalLength = progressEvent.lengthComputable ? progressEvent.total : progressEvent.target.getResponseHeader('content-length') || progressEvent.target.getResponseHeader('x-decompressed-content-length');
                    console.log("onUploadProgress", totalLength);
                    if (totalLength !== null) {
                        let percentUpload = Math.round((progressEvent.loaded * 100) / totalLength);
                        document.getElementById("uploading-video-progress-bar").style.width = percentUpload + "%";
                        document.getElementById("percent-upload").innerHTML = percentUpload + " %";
                        if (percentUpload == 100) {
                            document.getElementById("percent-upload").innerHTML = "Đang xử lý";
                        }
                        console.log("", Math.round((progressEvent.loaded * 100) / totalLength));
                    }
                },
                onDownloadProgress: (progressEvent) => {
                    const totalLength = progressEvent.lengthComputable ? progressEvent.total : progressEvent.target.getResponseHeader('content-length') || progressEvent.target.getResponseHeader('x-decompressed-content-length');
                    console.log("onDownloadProgress", totalLength);
                    if (totalLength !== null) {
                        console.log("", Math.round((progressEvent.loaded * 100) / totalLength));
                    }
                },
            })
            .then(res => {
                console.log("res", res);
				document.getElementById("loading-video-content").style.display = "none";
                if (res.code === networkCode.success) {
                    //myCurrentUploadVideo = res.data;
                    
                    document.getElementById("percent-upload").innerHTML = "Hoàn thành";
                    SunQAlert()
                        .position('center')
                        .title(dictionaryKey.UPLOAD_VIDEO_SUCCESS)
                        .type('success')
                        .confirmButtonColor("#3B4EDC")
                        .confirmButtonText(dictionaryKey.AGREE)
                        .callback((result) => {
                            //webpageRedirect(getAdminHomeURL() + "?mode=online&page=list-video");
                        })
                        .show();
                    document.getElementById("spanStatusUploadVideo").innerHTML = '<?php echo $GLOBALS["VIDEO_SUBMIT_REUP"]; ?>';
                    if (Hls.isSupported()) {
                        console.log("Hls support");
                        var video = document.getElementById('video');
                        var hls = new Hls({
                            xhrSetup: xhr => {
                                xhr.setRequestHeader(getLocalStorage(dictionary.MSEC))
                            }
                        });
                        var hls = new Hls();
                        hls.loadSource(getHomeURL() + myCurrentUploadVideo.fileUrl);
                        hls.attachMedia(video);
                        hls.on(Hls.Events.MANIFEST_PARSED, function() {
                            video.play();
                        });
                    }
					if(document.getElementById("idStatusUploadVideo")){
                    document.getElementById("idStatusUploadVideo").value = '<?php echo $GLOBALS["VIDEO_STATUS_COMPLETE"]; ?>';
				}
                }
                //show video cho admin

            })
            .catch(err => {
                console.log("error", err);

                    document.getElementById("percent-upload").innerHTML = "Bị lỗi";
					document.getElementById("loading-video-content").style.display = "none";
                document.getElementById("idStatusUploadVideo").value = '<?php echo $GLOBALS["VIDEO_STATUS_ERROR"]; ?>';
                SunQAlert()
                    .position('center')
                    .title(dictionaryKey.UPLOAD_VIDEO_FAILED)
                    .type('error')
                    .confirmButtonColor("#3B4EDC")
                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                    .callback((result) => {
                        // webpageRedirect(window.location.href);

                    })
                    .show();
            });
    }

    function upLoadImage(file) {
        let dataUploadImg = new FormData();
        dataUploadImg.append('file', file);
        window.scrollTo(0, 0);
        setLoadingDataUploadVideo(true);
        //document.getElementById("loading-video-content").display = "none";
        requestToSever(
            sunQRequestType.post,
            getURLUploadImage(),
            dataUploadImg,
            getLocalStorage(dictionary.MSEC),
            function(res) {console.log(res);
                //document.getElementById("loading-video-content").display = "block";
                setLoadingDataUploadVideo(false);
                //                 if (res.code === networkCode.success) {
                //                     console.log("success", res);
                // 					alert("successn");
                //                     myCurrentUploadVideo.imgUrl = res.data.urls[0];
                //                     //myCurrentUploadVideo.imgUrl
                //                 } else 
                if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                } else {
					//console.log(res.url);
                    myCurrentUploadVideo.thumbnailUrl = res.url;
                    //alert("loi cmn 123 " + JSON.stringify(res) +" "+res.code+" "+res.message);
                }
            },
            function(err) {
                //document.getElementById("loading-video-content").display = "block";
                //setLoadingDataUploadVideo(dictionaryKey.ERR);
                setLoadingDataUploadVideo(false);
                let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.UPLOAD_IMAGE_FAILED : dictionaryKey.UPLOAD_IMAGE_FAILED;
                SunQAlert()
                    .position('center')
                    .title(sunqalertfailed)
                    .type('error')
                    .confirmButtonColor("#3B4EDC")
                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                    .callback((result) => {
                        //webpageRedirect(window.location.href);
                    })
                    .show();
                console.log(dictionaryKey.ERR_INFO, err);
            },
            true,
        );
    }
    //submit form
    document.getElementById("UploadVideoSubmit").addEventListener("click", function(e) {
        e.preventDefault();
        if (getCurrentACtion() == dictionaryKey.editStatus) {
            webpageRedirect(getAdminHomeURL() + "?mode=online&page=list-video");
        } else {
            if (getCurrentACtion() != dictionaryKey.editStatus) {
                myCurrentUploadVideo.description = uploadVideoDescription.getData();
            }
            if (getCurrentACtion() != dictionaryKey.editStatus && myCurrentUploadVideo.thumbnailUrl == "" || myCurrentUploadVideo.thumbnailUrl == null) {
                SunQAlert()
                    .position('center')
                    .title(dictionaryKey.WRONG_VIDEO_IMAGE)
                    .type('error')
                    .confirmButtonColor("#3B4EDC")
                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                    .callback((result) => {
                        window.scrollTo(0, 0);
                    })
                    .show();
            }
            if (getCurrentACtion() != dictionaryKey.editStatus && (myCurrentUploadVideo.title == "" || myCurrentUploadVideo.title == null)) {
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
            if (getCurrentACtion() != dictionaryKey.editStatus && (myCurrentUploadVideo.description == "" || myCurrentUploadVideo.description == null)) {
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
            } else {
                let titlleRequestUploadVideo = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.REQUEST_EDIT : getCurrentACtion() == dictionaryKey.titleStatus ? dictionaryKey.REQUEST_TITLE : dictionaryKey.REQUEST_ADD + dictionaryKey.VIDEO_NAME;
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

                            } else if (getCurrentACtion() == dictionaryKey.titleStatus) {
                                delete tempmyCurrentUploadVideo.fileType;
                                delete tempmyCurrentUploadVideo.fileUrl;
                                delete tempmyCurrentUploadVideo.fileName;
                                delete tempmyCurrentUploadVideo.id;
                                delete tempmyCurrentUploadVideo.status;
                                delete tempmyCurrentUploadVideo.thumbnail;
                                delete tempmyCurrentUploadVideo.lessonId;
                            }

                            setLoadingDataUploadVideo(true);
                            requestToSever(
                                getCurrentACtion() != dictionaryKey.addStatus ? sunQRequestType.put : sunQRequestType.post,
                                getCurrentACtion() == dictionaryKey.editStatus ? putUploadVideo(getCurrentEdit()) :
                                getCurrentACtion() == dictionaryKey.addStatus ? postInitVideo() : dictionaryKey.titleStatus ? putTitleDescriptionVideo(getCurrentEdit()) : postInitVideo(),
                                tempmyCurrentUploadVideo,
                                getLocalStorage(dictionary.MSEC),
                                function(res) {
                                    setLoadingDataUploadVideo(false);
                                    //edit - title - add
                                    let sunqalertsuccess = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.UPLOAD_VIDEO_SUCCESS : getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.INIT_VIDEO_SUCCESS : dictionaryKey.EDIT_VIDEO_SUCCESS;
                                    if (res.code === networkCode.success) {
                                        //myCurrentUploadVideo = res.data;
                                        SunQAlert()
                                            .position('center')
                                            .title(sunqalertsuccess)
                                            .type('success')
                                            .confirmButtonColor("#3B4EDC")
                                            .confirmButtonText(dictionaryKey.AGREE)
                                            .callback((result) => {
                                                webpageRedirect(getAdminHomeURL() + "?mode=online&page=list-video");
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
                                function(err) {
                                    alert(err);
                                    setLoadingDataUploadVideo(dictionaryKey.ERR);
                                    let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.UPLOAD_VIDEO_FAILED : getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.INIT_VIDEO_FAILED : dictionaryKey.EDIT_VIDEO_FAILED;
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