<?php
include get_theme_file_path("home/offline/acaIntro/acaIntro-status.php");
	include get_theme_file_path("home/offline/acaIntro/acaIntro-interact-ui.php" ); 
?>
<form class="manage-contain">
    <div class="manage-contain-loading" id="acaIntro-page-loading">
        <span id="acaIntrolesson-pageloading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="acaIntro-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="acaIntro-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>

	<div class="manage-list-lecture-title">
        <span id="currentTitle" style="text-transform:capitalists"></span>
    </div>
	
<!--     <div class="manage-teacher-contain-left">
		<div class="manage-teacher-contain-right-upper">
			<label class="manage-teacher-contain-left-upload" for="uploadShortDescriptionImg">
				<span>
					<?php echo $GLOBALS["QVISIT_ARTICLE_AVATAR"]; ?>
				</span>
				<span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
				<img id="shortDescriptionImg" class="manage-teacher-contain-left-img" src='<?php echo $GLOBALS["URI_ADD_NEW"]; ?>'>
				<input type="file" id="uploadShortDescriptionImg" name="uploadShortDescriptionImg" />
			</label>
		</div>
    </div> -->

    <div class="manage-teacher-contain-right">
        <div class="manage-teacher-contain-right-upper">
            <!-- title -->
            <span><?php echo $GLOBALS["QVISIT_ARTICLE_TITLE"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idTitleacaIntrolesson" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["QVISIT_ARTICLE_TITLE_PLACEHOLDER"]; ?>' required readonly>

        </div>
        <!-- mô tả -->
        <div class="manage-section-common-detail-midlle">
            <div class="manage-section-detail-midlle-span">
                <span id="exhibitionSubDetailTextAreaTitle"><?php echo $GLOBALS["QVISIT_ARTICLE_DES"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            </div>
            <div class="manage-section-detail-midlle-item">
                <!--  <textarea id="teacherDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["QVISIT_ARTICLE_DES_PLACEHOLDER"]; ?>' required></textarea>-->
                <div id="acaIntrolessonDetailTextArea-toolbar-container"></div>
                <div id="acaIntrolessonDetailTextArea"><?php echo $GLOBALS["QVISIT_ARTICLE_DES"]; ?></div>
            </div>
        </div>		
    </div>

    <div class="manage-teacher-bottom-action">
        <input type="submit" name='acaIntrolessonSubmit' value='<?php echo $GLOBALS["QVISIT_ARTICLE_EDIT_SUBMITR"]; ?>' id="acaIntrolessonSubmit">
    </div>
</form>
<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/decoupled-document/ckeditor.js"></script>
<script>
    let myCurrentacaIntrolesson = {}
    , acaIntrolessonDescription = "";
	
    window.onload = function() {
        myCurrentacaIntrolesson = {};
        acaIntrolessonDescription = "";

        DecoupledEditor
            .create(document.querySelector('#acaIntrolessonDetailTextArea'), {
                extraPlugins: [myCustomUploadAdapterPlugin],
            })
            .then(editor => {
                acaIntrolessonDescription = editor;
                let toolbarContainer = document.querySelector('#acaIntrolessonDetailTextArea-toolbar-container');

                toolbarContainer.appendChild(editor.ui.view.toolbar.element);
            })
            .catch(error => {
                console.error(error);
            });
		
				if (getCurrentACtion() == dictionaryKey.editStatus) {
            document.getElementById("acaIntrolessonSubmit").value = '<?php echo $GLOBALS["QVISIT_ARTICLE_EDIT_SUBMITR"] ?>';

            //fetch từ server
            setLoadingDataacaIntro(true);
            requestToSever(
                sunQRequestType.get,
                putQvist(getCurrentEdit()),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDataacaIntro(false);
                    if (res.code === networkCode.success) {
                        myCurrentacaIntrolesson = res.data;
                   
// 						document.getElementById("shortDescriptionImg").src =  myCurrentacaIntrolesson.imgThumbnail != null ? getHomeURL() + myCurrentacaIntrolesson.imgThumbnail : '<?php echo $GLOBALS["URI_ADD_NEW"]; ?>';
						
				    document.getElementById("currentTitle").innerHTML = myCurrentacaIntrolesson.name == null ? "" : myCurrentacaIntrolesson.name;
						
                        //title
                        document.getElementById("idTitleacaIntrolesson").value = myCurrentacaIntrolesson.name == null ? "" : myCurrentacaIntrolesson.name;

                        //description
                        acaIntrolessonDescription.setData(myCurrentacaIntrolesson.content != null ? myCurrentacaIntrolesson.content : "");

                        console.log(res.data);
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setLoadingDataacaIntro(dictionaryKey.ERR);
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

        } else{
			 //createQuestion(0);
			  }
		
    }
	
    document.getElementById("idTitleacaIntrolesson").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentacaIntrolesson.title = tttValue.escape();
    });
	
// 	 document.getElementById('uploadShortDescriptionImg').addEventListener("change", (evt) => {
//         var tgt = evt.target || window.event.srcElement,
//             files = tgt.files;
//         //upLoadImage(tgt.files[0]);
//         // FileReader support
//         if (FileReader && files && files.length) {
//             var fr = new FileReader();
//             fr.onload = function() {
//                 document.getElementById("shortDescriptionImg").src = fr.result;
//                 upLoadImage(files[0]);
//             }
//             fr.readAsDataURL(files[0]);
//         }

//         // Not supported
//         else {
//             // fallback -- perhaps submit the input to an iframe and temporarily store
//             // them on the server until the user's session ends.
//         }
//     });
	
	function checkNullInputt(val){
		return val == null || val == "";
	}
	
// 	function upLoadImage(file) {
//         let dataLectureImgage = new FormData();
//         dataLectureImgage.append('file', file);
//         window.scrollTo(0, 0);
//         setLoadingDataacaIntro(true);
//         requestToSever(
//             sunQRequestType.post,
//             getURLUploadImage(),
//             dataLectureImgage,
//             getLocalStorage(dictionary.MSEC),
//             function(res) {
//                 setLoadingDataacaIntro(false);  
// 				myCurrentacaIntrolesson.imgThumbnail = res.url;
// 					if (res.code === networkCode.sessionTimeOut) {
//                     makeAlertRedirect();
//                 } else {
// 				}
//             },
//             function(err) {
//                 //setLoadingDataTeacher(dictionaryKey.ERR);
// 				setLoadingDataacaIntro(false);
//                 let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.UPLOAD_IMAGE_FAILED : dictionaryKey.UPLOAD_IMAGE_FAILED;
//                 SunQAlert()
//                     .position('center')
//                     .title(sunqalertfailed)
//                     .type('error')
//                     .confirmButtonColor("#3B4EDC")
//                     .confirmButtonText(dictionaryKey.TRY_AGAIN)
//                     .callback((result) => {
//                         //webpageRedirect(window.location.href);
//                     })
//                     .show();
//                 console.log(dictionaryKey.ERR_INFO, err);
//             },
//             true,
//         );
//     }
	
    //submit form
    document.getElementById("acaIntrolessonSubmit").addEventListener("click", function(e) {
        e.preventDefault();
        myCurrentacaIntrolesson.content = acaIntrolessonDescription.getData();
        if (myCurrentacaIntrolesson.name == "" || myCurrentacaIntrolesson.name == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.ARTICLE_TITLE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        } else if (myCurrentacaIntrolesson.content == "" || myCurrentacaIntrolesson.content == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.ARTICLE_DESCRIPTION)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        } else {
            let titlleRequestFreeLesson = dictionaryKey.REQUEST_EDIT;
            //alert("data lên " + JSON.stringify(myCurrentacaIntrolesson));
            SunQAlert()
                .position('center')
                .title(titlleRequestFreeLesson)
                .type('success')
                .confirmButtonColor("#3B4EDC")
                .cancelButtonColor("#a8b1f5")
                .confirmButtonText(dictionaryKey.AGREE)
                .cancelButtonText(dictionaryKey.CANCEL)
                .callback((result) => {
                    if (result.value) {
                        window.scrollTo(0, 0);
                        let tempmyCurrentacaIntrolesson = Object.assign({},myCurrentacaIntrolesson);

						delete tempmyCurrentacaIntrolesson.id;
						delete tempmyCurrentacaIntrolesson.categoryCode;
						delete tempmyCurrentacaIntrolesson.name;
						
            console.log("data lên " + JSON.stringify(tempmyCurrentacaIntrolesson));
 						console.log(getCurrentACtion(),dictionaryKey.editStatus);
                        setLoadingDataacaIntro(true);
                        requestToSever(
                            sunQRequestType.put,
                            putQvist(getCurrentEdit()),
                            tempmyCurrentacaIntrolesson,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDataacaIntro(false);
                                let sunqalertsuccess = dictionaryKey.ARTICLE_EDIT_SUCCESS;
                                if (res.code === networkCode.success) {
                                    //myCurrentTeacher = res.data;
                                    SunQAlert()
                                        .position('center')
                                        .title(sunqalertsuccess)
                                        .type('success')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.AGREE)
                                        .callback((result) => {
										
                                            webpageRedirect(getAdminHomeURL() + "?mode=offline&page=list-article");
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
                            function(err) { //alert("err");
                                setLoadingDataacaIntro(dictionaryKey.ERR);
                                let sunqalertfailed =  dictionaryKey.ARTICLE_EDIT_FAILED;
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