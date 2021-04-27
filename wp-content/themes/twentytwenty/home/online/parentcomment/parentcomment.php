<?php
include get_theme_file_path("home/online/parentcomment/status-parentcomment.php");
include get_theme_file_path("home/online/parentcomment/interact-ui-parentcomment.php");
?>
<form class="manage-contain">
    <div class="manage-contain-teacher-loading" id="parentComment-page-loading">
        <span id="parentComment-page-loading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="parentComment-page-loading-progress">

        </div>
        <div class="manage-contain-teacher-loading-err" id="parentComment-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>
	
	<div class="manage-list-lecture-title">
        <span id="currentTitle" style="text-transform:capitalists"><?php echo $GLOBALS["PARENT_COMMENT_TITLE"]; ?></span>
    </div>
	
    <div class="manage-teacher-contain-data">
        <div class="manage-teacher-contain-left">
            <label id="lbparentCommentAvatar" class="manage-teacher-contain-left-upload" for="uploadAvatarparentComment">
                <span>
                    <?php echo $GLOBALS["PARENT_COMMENT_AVATAR"]; ?>
                </span>
				<span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <img id="parentCommentAvatar" class="manage-teacher-contain-left-img" src='<?php echo $GLOBALS["URI_ADD_NEW"]; ?>'>
                <input type="file" id="uploadAvatarparentComment" name="uploadAvatarparentComment" />
            </label>
        </div>
        <div class="manage-teacher-contain-right">
            <div class="manage-teacher-contain-right-upper">
				<!-- name -->
                <span><?php echo $GLOBALS["PARENT_COMMENT_NAME"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="inputparentCommentName" type="text" placeholder='<?php echo $GLOBALS["PARENT_COMMENT_NAME_PLACEHOLDER"]; ?>' required>
				
				<!-- role -->
                <span><?php echo $GLOBALS["PARENT_COMMENT_ROLE"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="inputparentCommentShort" type="text" placeholder='<?php echo $GLOBALS["PARENT_COMMENT_ROLE_PLACEHOLDER"]; ?>' required>
				
				<!-- content -->
				<span><?php echo $GLOBALS["PARENT_COMMENT_COMMENT"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
				<textarea id="inputparentCommentDegree" cols="80" placeholder='<?php echo $GLOBALS["PARENT_COMMENT_COMMENT_PLACEHOLDER"]; ?>' required></textarea>
            </div>		
        </div>
    </div>
    <div class="manage-parentComment-bottom-action">
        <input type="submit" name='parentCommentSubmit' value='<?php echo $GLOBALS["PARENT_COMMENT_SUBMIT_ADD"]; ?>' id="parentCommentSubmit">
    </div>
</form>
<script>
    var myCurrentparentComment = {

    };
	var parentCommentDesciption = "";
    window.onload = function() {

        //nếu là edit thì load dữ liệu về
        if (getCurrentACtion() == dictionaryKey.editStatus) {
			document.getElementById("parentCommentSubmit").value = '<?php echo $GLOBALS["PARENT_COMMENT_SUBMIT_EDIT"] ?>';

            //fetch từ server
            setLoadingDataparentComment(true);
            requestToSever(
                sunQRequestType.get,
                getComment(getCurrentEdit()),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDataparentComment(false);
                    if (res.code === networkCode.success) {
                        myCurrentparentComment = res.data;
                        document.getElementById("parentCommentAvatar").src = myCurrentparentComment.avatar != null ? getHomeURL() + myCurrentparentComment.avatar : '<?php echo $GLOBALS["URI_ADD_NEW"]; ?>';
                        document.getElementById("inputparentCommentName").value = myCurrentparentComment.name != null ? myCurrentparentComment.name : "";
                        document.getElementById("inputparentCommentShort").value = myCurrentparentComment.role != null ? myCurrentparentComment.role : "";
						document.getElementById("inputparentCommentDegree").value = myCurrentparentComment.content != null ? myCurrentparentComment.content  : "" ;		
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setLoadingDataparentComment(dictionaryKey.ERR);
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

        } else {
						document.getElementById("parentCommentSubmit").value = '<?php echo $GLOBALS["PARENT_COMMENT_SUBMIT_ADD"] ?>';

		}
    }

    function upLoadImage(file) {
        let dataLectureImgage = new FormData();
        dataLectureImgage.append('file', file);
        window.scrollTo(0, 0);
        setLoadingDataparentComment(true);
        requestToSever(
            sunQRequestType.post,
            getURLUploadImage(),
            dataLectureImgage,
            getLocalStorage(dictionary.MSEC),
            function(res) {
                setLoadingDataparentComment(false);
console.log("url",res.url);      
				myCurrentparentComment.avatar = res.url;
				
					if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                } else {
					 //myCurrentparentComment.imgUrl = res.urls;
					//alert("loi cmn 123 " + JSON.stringify(res) +" "+res.code+" "+res.message);
				}
            },
            function(err) {
                //setLoadingDataparentComment(dictionaryKey.ERR);
				setLoadingDataparentComment(false);
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
		
	 document.getElementById("inputparentCommentName").addEventListener("input", function(e) {
		 let tttValue = e.target.value;
        myCurrentparentComment.name = e.target.value;
    });
			
    document.getElementById("inputparentCommentShort").addEventListener("input", function(e) {
		 let tttValue = e.target.value;
        myCurrentparentComment.role = tttValue.escape();
		//console.log(myCurrentparentComment.email );
    });
    document.getElementById("inputparentCommentDegree").addEventListener("input", function(e) {
		 let tttValue = e.target.value;
        myCurrentparentComment.content = tttValue.escape();
    });


    document.getElementById('uploadAvatarparentComment').addEventListener("change", (evt) => {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;
        //upLoadImage(tgt.files[0]);
        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function() {
                document.getElementById("parentCommentAvatar").src = fr.result;
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
	
	function checkInputNull(val){
		return val == null || val == "";
	}
	
    //submit form
    document.getElementById("parentCommentSubmit").addEventListener("click", function(e) {
        e.preventDefault();
        console.log("myCurrentparentComment", myCurrentparentComment);
        if (checkInputNull(myCurrentparentComment.avatar)){
			SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_PARENT_COMMENT_AVATAR)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0,0);
                })
                .show();
		}
         else if(checkInputNull(myCurrentparentComment.name)){
				SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_PARENT_COMMENT_NAME)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                })
                .show();  
		} else if(checkInputNull(myCurrentparentComment.role)){
				SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_PARENT_COMMENT_ROLE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                })
                .show();  
		}else if(checkInputNull(myCurrentparentComment.content)){
				SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_PARENT_COMMENT_CONTENT)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                })
                .show();  
		}else {
            let titlleRequestparentComment = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.REQUEST_EDIT : dictionaryKey.REQUEST_ADD;
			console.log("data lên " + JSON.stringify(myCurrentparentComment));
			//alert("data lên " + myCurrentparentComment.practiceAt);
            SunQAlert()
                .position('center')
                .title(titlleRequestparentComment)
                .type('success')
                .confirmButtonColor("#3B4EDC")
                .cancelButtonColor("#a8b1f5")
                .confirmButtonText(dictionaryKey.AGREE)
                .cancelButtonText(dictionaryKey.CANCEL)
                .callback((result) => {
                    if (result.value) {
                        window.scrollTo(0, 0);
                        let tempmyCurrentparentComment = Object.assign({},myCurrentparentComment);
                        
                        delete tempmyCurrentparentComment.createAt;
                        delete tempmyCurrentparentComment.updateAt;
                        delete tempmyCurrentparentComment.id;
						
                        setLoadingDataparentComment(true);
                        requestToSever(
                            getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                           getComment(getCurrentEdit()),
                            tempmyCurrentparentComment,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDataparentComment(false);
                                let sunqalertsuccess = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.PARENT_COMMENT_EDIT_SUCCESS : dictionaryKey.PARENT_COMMENT_ADD_SUCCESS;
                                if (res.code === networkCode.success) {
                                    //myCurrentparentComment = res.data;
                                    SunQAlert()
                                        .position('center')
                                        .title(sunqalertsuccess)
                                        .type('success')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.AGREE)
                                        .callback((result) => {
                                            webpageRedirect(getAdminHomeURL() + "?mode=online&page=list-parentcomment");
                                        })
                                        .show();
                                } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                                    makeAlertRedirect();
                                } else {
									SunQAlert()
										.position('center')
										.title(dictionaryKey.SERVER_INFO + res.message)
										.type('error')
										.confirmButtonColor("#3B4EDC")
										.confirmButtonText(dictionaryKey.TRY_AGAIN)
										.callback((result) => {
// 										
										})
										.show();  
								}
                            },
                            function(err) {
                                setLoadingDataparentComment(dictionaryKey.ERR);
                                let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.PARENT_COMMENT_EDIT_FAILED : dictionaryKey.PARENT_COMMENT_ADD_FAILED;
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