<?php
include get_theme_file_path("home/online/freeq/kit/status-kit.php");
include get_theme_file_path("home/online/freeq/kit/interact-ui-kit.php");
?>
<form class="manage-contain">
    <div class="manage-contain-loading" id="Kit-page-loading">
        <span id="Kit-page-loading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="Kit-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="Kit-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>
    <div class="manage-teacher-contain-right">

        <!-- Link ảnh -->		
		<div class="manage-section-infomation-right">
			<div class="manage-teacher-contain-right-upper">
				<div class="manage-section-infomation-right-title">
					<span id="spanNameOfImageReference"></span>
				</div>
				<span class="manage-section-infomation-right-list-image-title"><?php echo $GLOBALS["KIT_AVATAR"]; ?></span>
				<div class="manage-section-infomation-right-list-image" id="divVideoKit">
					<div>
					</div>
				</div>
				<div class="manage-section-infomation-right-item-div-add">
				 <label for="uploadImgKitURLL">
							<span id="btnAddImageLecture"><?php echo $GLOBALS["KIT_ADD_IMAGE"] ?></span>
							<input type="file" id="uploadImgKitURLL" name="uploadImgKitURLL">
				 </label>
				</div>
			</div>
        </div>
		
        <hr class="manage-teacher-hr-between">
        <div class="manage-teacher-contain-right-upper">
            <!-- title -->
            <span><?php echo $GLOBALS["KIT_INPUT_NAME"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idTitleKit" name="Kit_name" type="text" placeholder='<?php echo $GLOBALS["KIT_INPUT_NAME_PLACEHOLDER"]; ?>' required>

            <!-- price -->
            <span><?php echo $GLOBALS["KIT_INPUT_PRICE"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idPriceKit" name="Kit_name" type="text" placeholder='<?php echo $GLOBALS["KIT_INPUT_PRICE_PLACEHOLDER"]; ?>' required>

        </div>
        <hr class="manage-teacher-hr-between">
        <!-- mô tả -->
        <div class="manage-section-common-detail-midlle">
            <div class="manage-section-detail-midlle-span">
                <span id="KitSubDetailTextAreaTitle"><?php echo $GLOBALS["KIT_INPUT_DETAIL"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            </div>
            <div class="manage-section-detail-midlle-item">
                <!--  <textarea id="teacherDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["KIT_INPUT_DETAIL_PLACEHOLDER"]; ?>' required></textarea>-->

                <div id="KitDetailTextArea-toolbar-container"></div>
                <div id="KitDetailTextArea"><?php echo $GLOBALS["KIT_INPUT_DETAIL_PLACEHOLDER"]; ?></div>

            </div>
        </div>
        <!-- mô tả ngắn gọn -->
        <div class="manage-section-common-detail-midlle">
            <div class="manage-section-detail-midlle-span">
                <span id="KitSubDetailTextAreaTitle"><?php echo $GLOBALS["KIT_INPUT_SUB_DETAIL"]; ?></span>
            </div>
            <div class="manage-section-detail-midlle-item">
                <textarea id="KitSubDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["KIT_INPUT_SUB_DETAIL_PLACEHOLDER"]; ?>' required></textarea>
            </div>
        </div>
    </div>
    <div class="manage-teacher-bottom-action">
        <input type="submit" name='KitSubmit' value='<?php echo $GLOBALS["KIT_SUBMIT_ADD"]; ?>' id="KitSubmit">
    </div>
</form>
<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/decoupled-document/ckeditor.js"></script>
<script>
    var KitDescription = "";
    window.onload = function() {
        myCurrentKit = {};
        KitDescription = "";

        DecoupledEditor
            .create(document.querySelector('#KitDetailTextArea'), {
                extraPlugins: [myCustomUploadAdapterPlugin],
            })
            .then(editor => {
                KitDescription = editor;
                let toolbarContainer = document.querySelector('#KitDetailTextArea-toolbar-container');

                toolbarContainer.appendChild(editor.ui.view.toolbar.element);
            })
            .catch(error => {
                console.error(error);
            });

        if (getCurrentACtion() == dictionaryKey.addStatus) {
            document.getElementById("KitSubmit").value = '<?php echo $GLOBALS["KIT_SUBMIT_ADD"] ?>';
        }
        if (getCurrentACtion() == dictionaryKey.editStatus) {
            document.getElementById("KitSubmit").value = '<?php echo $GLOBALS["KIT_SUBMIT_EDIT"] ?>';

            //fetch từ server
            setLoadingDataKit(true);
            requestToSever(
                sunQRequestType.get,
                getURLKit(getCurrentEdit()),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDataKit(false);
                    if (res.code === networkCode.success) {
                        myCurrentKit = res.data;
                        console.log(res.data);
                        document.getElementById("idTitleKit").value = myCurrentKit.title == null ? "" : myCurrentKit.title;
                        document.getElementById("idPriceKit").value = myCurrentKit.price == null ? "" : myCurrentKit.price;
                        KitDescription.setData(myCurrentKit.description != null ? myCurrentKit.description : "");
                        document.getElementById("KitSubDetailTextArea").value = myCurrentKit.shortDescription == null ? "" : myCurrentKit.shortDescription;
                        if (myCurrentKit.thumbnailUrls != null) {
                            let parent = document.getElementById("divVideoKit");
                            myCurrentKit.thumbnailUrls.forEach((item, index) => {
                                let imgKitParrent = document.createElement("div");
                                imgKitParrent.className = "manage-section-infomation-right-item";

                                let imgTempKit = document.createElement("img");
                                imgTempKit.id = "kit-img-" + (index + 1);
                                imgTempKit.className = "manage-section-infomation-right-item-img";console.log(getHomeURL() + item);
                                imgTempKit.src = getHomeURL() + item;
                                let imgKitClose = document.createElement("div");
                                imgKitClose.className = "manage-section-infomation-right-list-image-drop";
                                imgKitClose.innerHTML = "x";
                                imgKitClose.addEventListener("click", function() {
                                    imgKitClose.remove();
                                    imgTempKit.remove();
                                    myCurrentKit.thumbnailUrls.splice(index, 1);
                                })
                                /*imgTempKit = imgTempKit + "<div class=>x</div><img id=\"lecture-img-" + (index + 1) + "\"  class=\"manage-section-infomation-right-item\" src=\"" + getHomeURL() + item + "\" >";*/
                                imgKitParrent.appendChild(imgKitClose);
                                imgKitParrent.appendChild(imgTempKit);
                                parent.appendChild(imgKitParrent);
                            });

                        } else {
                            document.getElementById("btnAddImageKit").innerHTML = '<?php echo $GLOBALS["KIT_NO_AVATAR"]; ?>';
                        }
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    //alert(err);
                    setLoadingDataKit(dictionaryKey.ERR);
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
		
		setInputFilter(document.getElementById("idPriceKit"), function(value) {
		  return /^\d*?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
		});
		
    }

    function upLoadIteminListImage(file) {
        let dataKitImgage = new FormData();
        dataKitImgage.append('file', file);
        window.scrollTo(0, 0);
        setLoadingDataKit(true);
        requestToSever(
            sunQRequestType.post,
            getURLUploadImage(),
            dataKitImgage,
            getLocalStorage(dictionary.MSEC),
            function(res) {
                setLoadingDataKit(false);
               if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                } else {
					//alert("réult"+myCurrentKit.thumbnailUrls);
					
					if (myCurrentKit.thumbnailUrls == null){
						myCurrentKit.thumbnailUrls = [];
					}
					myCurrentKit.thumbnailUrls.push(res.url);
					
					let parent = document.getElementById("divVideoKit");
                	//parent.innerHTML = "";
                	
					let imgKitParrent = document.createElement("div");
					imgKitParrent.className = "manage-section-infomation-right-item";
					
                	let imgTempKit  = document.createElement("img");
                	imgTempKit.id = "lecture-img-" + myCurrentKit.thumbnailUrls.length + "" ;
                	imgTempKit.className = "manage-section-infomation-right-item-img";
                	imgTempKit.src = getHomeURL()+res.url;
                				//console.log("add",parent.innerHTML);
//                 let imgTempKit = "<img id=\"lecture-img-" +getCurrentACtion() == dictionaryKey.editStatus ? myCurrentKit.thumbnailUrls.length : "" + "\"  class=\"manage-section-infomation-right-item\" src=\"" + res.url + "\" >";
//                 				//console.log("imgTempKit",imgTempKit);
//                 	let parentImgList = imgTempKit + parent.innerHTML;
                	
					let imgKitClose = document.createElement("div");
								imgKitClose.className = "manage-section-infomation-right-list-image-drop";
								imgKitClose.innerHTML = "x";
								imgKitClose.addEventListener("click",function(){
									imgTempKit.remove();
									imgKitClose.remove();
									myCurrentKit.thumbnailUrls.splice(index,1);
								})
                                /*imgTempKit = imgTempKit + "<div class=>x</div><img id=\"lecture-img-" + (index + 1) + "\"  class=\"manage-section-infomation-right-item\" src=\"" + getHomeURL() + item + "\" >";*/
					imgKitParrent.appendChild(imgKitClose);
					imgKitParrent.appendChild(imgTempKit);
					parent.appendChild(imgKitParrent);
				}
            },
            function(err) {
                //setLoadingDataKit(dictionaryKey.ERR);
				 setLoadingDataKit(false);
                console.log(dictionaryKey.ERR_INFO, err);
                SunQAlert()
                    .position('center')
                    .title(dictionaryKey.thumbnailUrls_LOADED_FAILED)
                    .type('error')
                    .confirmButtonColor("#3B4EDC")
                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                    .callback((result) => {
                        //webpageRedirect(window.location.href);
                    })
                    .show();
            },
			true
        );
    }

    //on input

    document.getElementById("uploadImgKitURLL").addEventListener("change", function(evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;
        //upLoadImage(tgt.files[0]);
        // FileReader support
        //console.log("xxxxxxzz");
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function() {

                //alert("input");				
                upLoadIteminListImage(files[0]);
            }
            fr.readAsDataURL(files[0]);
        }

        // Not supported
        else {
            // fallback -- perhaps submit the input to an iframe and temporarily store
            // them on the server until the user's session ends.
        }
    });

    document.getElementById("idTitleKit").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentKit.title = tttValue.escape();
    });

    document.getElementById("idPriceKit").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentKit.price = tttValue.escape();
    });

    document.getElementById("KitSubDetailTextArea").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentKit.shortDescription = tttValue.escape();
    });

    //submit form
    document.getElementById("KitSubmit").addEventListener("click", function(e) {
        e.preventDefault();
        myCurrentKit.description = KitDescription.getData();
        
        if (myCurrentKit.thumbnailUrls == "" || myCurrentKit.thumbnailUrls == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_KIT_IMAGE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        }if (myCurrentKit.price == "" || myCurrentKit.price == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_KIT_PRICE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        }
        if (myCurrentKit.title == "" || myCurrentKit.title == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_KIT_TITLE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        }
        if (myCurrentKit.description == "" || myCurrentKit.description == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_KIT_DESCRIPTION)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        } else {
            let titlleRequestKit = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.REQUEST_EDIT : dictionaryKey.REQUEST_ADD;
            console.log("data lên " + JSON.stringify(myCurrentKit));
            //alert("data lên " + JSON.stringify(myCurrentKit));
            SunQAlert()
                .position('center')
                .title(titlleRequestKit)
                .type('success')
                .confirmButtonColor("#3B4EDC")
                .cancelButtonColor("#a8b1f5")
                .confirmButtonText(dictionaryKey.AGREE)
                .cancelButtonText(dictionaryKey.CANCEL)
                .callback((result) => {
                    if (result.value) {
                        window.scrollTo(0, 0);
                        let tempmyCurrentKit = myCurrentKit;
                        if (getCurrentACtion() == dictionaryKey.editStatus) {

                        }

                        delete tempmyCurrentKit.createAt;
                        delete tempmyCurrentKit.updateAt;
                        delete tempmyCurrentKit.id;
						myCurrentKit.price = Number.parseInt(myCurrentKit.price);
                        setLoadingDataKit(true);
                        requestToSever(
                            getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                            getCurrentACtion() == dictionaryKey.editStatus ? getURLKit(getCurrentEdit()) : getURLKit(),
                            tempmyCurrentKit,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDataKit(false);
                                //edit - title - add
                                let sunqalertsuccess = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.KIT_EDIT_SUCCESS : dictionaryKey.KIT_ADD_SUCCESS;
                                if (res.code === networkCode.success) {
                                    //myCurrentTeacher = res.data;
                                    SunQAlert()
                                        .position('center')
                                        .title(sunqalertsuccess)
                                        .type('success')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.AGREE)
                                        .callback((result) => {
                                            webpageRedirect(getAdminHomeURL() + "?mode=online&page=list-kit");
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
                                setLoadingDataKit(dictionaryKey.ERR);
                                let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.KIT_EDIT_FAILED : dictionaryKey.KIT_ADD_FAILED;
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