<?php
include get_theme_file_path("home/online/user/account/status-account.php");
include get_theme_file_path("home/online/user/account/interact-ui-account.php");
?>
<form class="manage-UserAccount-contain">
    <div class="manage-contain-UserAccount-loading" id="UserAccount-page-loading">
        <span id="UserAccount-page-loading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="UserAccount-page-loading-progress">

        </div>
        <div class="manage-contain-UserAccount-loading-err" id="UserAccount-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>
    <div class="manage-UserAccount-contain-data">
        <div class="manage-UserAccount-contain-left">
            <label class="manage-UserAccount-contain-left-upload" for="uploadAvatarUserAccount">
                <span>
                    <?php echo $GLOBALS["UserAccount_AVATAR"]; ?>
                </span>
				<span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <img id="UserAccountAvatar" class="manage-UserAccount-contain-left-img" src='<?php echo $GLOBALS["URI_ADD_NEW"]; ?>'>
                <input type="file" id="uploadAvatarUserAccount" name="uploadAvatarUserAccount" />
            </label>
        </div>
        <div class="manage-UserAccount-contain-right">
            <div class="manage-UserAccount-contain-right-upper">
				<!-- name -->
                <span><?php echo $GLOBALS["UserAccount_INPUT_NAME"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="inputUserAccountName" type="text" placeholder='<?php echo $GLOBALS["UserAccount_INPUT_NAME_PLACEHOLDER"]; ?>' required>
				
				<!-- short name -->
                <span><?php echo $GLOBALS["UserAccount_INPUT_SHORT"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="inputUserAccountShort" type="text" placeholder='<?php echo $GLOBALS["UserAccount_INPUT_SHORT_PLACEHOLDER"]; ?>' required>
				
				<!-- degree -->
				<span><?php echo $GLOBALS["UserAccount_INPUT_DEGREE"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="inputUserAccountDegree" type="text" placeholder='<?php echo $GLOBALS["UserAccount_INPUT_DEGREE_PLACEHOLDER"]; ?>' required>
				
				<!-- university -->
				<span><?php echo $GLOBALS["UserAccount_INPUT_UNIVERSITY"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="inputUserAccountUniversity" type="text" placeholder='<?php echo $GLOBALS["UserAccount_INPUT_UNIVERSITY_PLACEHOLDER"]; ?>' required>
				
				<!-- major -->
                <span><?php echo $GLOBALS["UserAccount_INPUT_MAJOR"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="inputUserAccountMajor" type="text" placeholder='<?php echo $GLOBALS["UserAccount_INPUT_MAJOR_PLACEHOLDER"]; ?>' required>

				<!-- kinh nghiệm -->
                <span><?php echo $GLOBALS["UserAccount_INPUT_EXP"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="inputUserAccountEXPReal" type="hidden" placeholder='<?php echo $GLOBALS["UserAccount_INPUT_EXP_PLACEHOLDER"]; ?>' required>
                <input id="inputUserAccountEXP" type="text" placeholder='<?php echo $GLOBALS["UserAccount_INPUT_EXP_PLACEHOLDER"]; ?>' required>
				<!-- email -->
                <span><?php echo $GLOBALS["UserAccount_INPUT_EMAIL"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="inputUserAccountEmail" type="email" placeholder='<?php echo $GLOBALS["UserAccount_INPUT_EMAIL_PLACEHOLDER"]; ?>' required>
				<!-- số điện thoại -->
                <span><?php echo $GLOBALS["UserAccount_INPUT_PHONE"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="inputUserAccountPhone" type="text" placeholder='<?php echo $GLOBALS["UserAccount_INPUT_PHONE_PLACEHOLDER"]; ?>'>
            </div>
            <hr class="manage-UserAccount-hr-between">
            <div class="manage-UserAccount-contain-right-below">
				<!-- mô tả -->
				<span><?php echo $GLOBALS["UserAccount_INPUT_DETAIL"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
              <!--  <textarea id="UserAccountDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["UserAccount_INPUT_DETAIL_PLACEHOLDER"]; ?>' required></textarea>-->
				<div id="UserAccountDetailTextArea-toolbar-container"></div>
				<div id="UserAccountDetailTextArea" ><?php echo $GLOBALS["UserAccount_INPUT_DETAIL_PLACEHOLDER"]; ?></div>
				<!-- mô tả ngắn gọn -->
				<span id="UserAccountSubDetailTextAreaTitle"><?php echo $GLOBALS["UserAccount_INPUT_SUB_DETAIL"]; ?></span>
			<textarea id="UserAccountSubDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["UserAccount_INPUT_SUB_DETAIL_PLACEHOLDER"]; ?>' required></textarea>
            </div>
			
			
			
        </div>
    </div>
    <div class="manage-UserAccount-bottom-action">
        <input type="submit" name='UserAccountSubmit' value='<?php echo $GLOBALS["LECTURE_SUBMIT"]; ?>' id="UserAccountSubmit">
    </div>
</form>
<!-- <script src="wp-content/themes/twentytwenty/assets/js/ckeditor5.js"></script> -->
<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/decoupled-document/ckeditor.js"></script>
<script>
    var myCurrentUserAccount = {

    };
	var UserAccountDesciption = "";
    window.onload = function() {

		DecoupledEditor
            .create( document.querySelector( '#UserAccountDetailTextArea' ), {
                extraPlugins: [myCustomUploadAdapterPlugin],
            } )
            .then( editor => {
				UserAccountDesciption = editor;
                const toolbarContainer = document.querySelector( '#UserAccountDetailTextArea-toolbar-container' );

                toolbarContainer.appendChild( editor.ui.view.toolbar.element );
            } )
            .catch( error => {
                console.error( error );
            } );

        // 		if(getCurrentACtion() == dictionaryKey.editStatus){

        // 		}


//         mobiscroll.datetime('#inputUserAccountEXP', {
//             max: new Date(),
//             dateFormat: 'd/mm/yy',
//             timeFormat: 'H:ii',
//         });
		 if (getCurrentACtion() == dictionaryKey.addStatus){
			 mobiscroll.number('#inputUserAccountEXP', {
            theme: 'ios',
            themeVariant: 'light',
            layout: 'fixed',
            value: 1,
            step: 1,
            min: 0,
            max: 30,
            display: 'bubble',
        });
		 }
		 
		
		
		let tempArray = localStorage.getItem('listScroll1'); 
		
		if (tempArray){
			tempArray = JSON.parse(tempArray);
			console.log("tempArray",tempArray);
			let tempCheckExist = true;
			tempArray.some((item,index)=>{
				if(item.id == "inputUserAccountEXP"){
					tempCheckExist = false;
				   return true;
				}
			});
			console.log("tempCheckExist",tempCheckExist);
			if (tempCheckExist){
				tempArray.push({id:"inputUserAccountEXP",lib:'number'});
			}
		} else {
			tempArray = [];
				tempArray.push({id:"inputUserAccountEXP",lib:'number'});
			}
		
		
		/*
		let listScroll = [
		{id:"idAgeOfLectureFrom",lib:'number'},
		{id:"idAgeOfLectureTo",lib:'number'},
		];
		*/
		//tempArray.length = 0;
		localStorage.setItem('language','vietnam');
		localStorage.setItem('listScroll1',JSON.stringify(tempArray));
		
		
        //nếu là edit thì load dữ liệu về
        if (getCurrentACtion() == dictionaryKey.editStatus) {
			document.getElementById("UserAccountSubmit").value = '<?php echo $GLOBALS["LECTURE_SUBMIT_EDIT"] ?>';

            //fetch từ server
            setLoadingDataUserAccount(true);
            requestToSever(
                sunQRequestType.get,
                getURLUserAccount() + "/" + getCurrentEdit(),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDataUserAccount(false);
                    if (res.code === networkCode.success) {
                        myCurrentUserAccount = res.data;
                        console.log(res.data);
                        document.getElementById("inputUserAccountName").value = myCurrentUserAccount.name != null ? myCurrentUserAccount.name : "";
                        document.getElementById("inputUserAccountMajor").value = myCurrentUserAccount.specialist != null ? myCurrentUserAccount.specialist : "";
                        let dateEXPUserAccount = new Date(myCurrentUserAccount.practiceAt);
                        let yearEXP = new Date().getYear() - dateEXPUserAccount.getYear();
                        document.getElementById("inputUserAccountDegree").value = myCurrentUserAccount.degree != null ? myCurrentUserAccount.degree : "";
						document.getElementById("inputUserAccountShort").value = myCurrentUserAccount.shortId != null ? myCurrentUserAccount.shortId  : "" ;
                        document.getElementById("inputUserAccountUniversity").value = myCurrentUserAccount.university != null ? myCurrentUserAccount.university : "" ;
                        document.getElementById("inputUserAccountEmail").value = myCurrentUserAccount.email != null ? myCurrentUserAccount.email : "" ;
                        document.getElementById("inputUserAccountPhone").value = myCurrentUserAccount.phone != null ? myCurrentUserAccount.phone : "";
                        document.getElementById("inputUserAccountEXP").value = yearEXP;
						 mobiscroll.number('#inputUserAccountEXP', {
            theme: 'ios',
            themeVariant: 'light',
            layout: 'fixed',
            value: 1,
			defaultValue:yearEXP,
            step: 1,
            min: 0,
            max: 30,
            display: 'bubble',
        });
                        document.getElementById("UserAccountAvatar").src = myCurrentUserAccount.imgUrl != null ? getHomeURL() + myCurrentUserAccount.imgUrl : '<?php echo $GLOBALS["URI_ADD_NEW"]; ?>';
						UserAccountDesciption.setData(myCurrentUserAccount.description != null ? myCurrentUserAccount.description : "");
						document.getElementById("UserAccountSubDetailTextArea").value = myCurrentUserAccount.shortDescription != null ? myCurrentUserAccount.shortDescription : "";
                       /* document.getElementById("UserAccountDetailTextArea").value = myCurrentUserAccount.description != null ? myCurrentUserAccount.description : "";*/
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setLoadingDataUserAccount(dictionaryKey.ERR);
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
						document.getElementById("UserAccountSubmit").value = '<?php echo $GLOBALS["LECTURE_SUBMIT_ADD"] ?>';

		}
    }

    function downloadImage(name, id) {
        // 		//setLoadingDataUserAccount(true);
        // 		console.log();
        // 		requestToSever(
        // 				sunQRequestType.get,
        // 				"http://server.sundayq.com/resource/download/image/9551af98e7fa66e998ed0945bacde55e-1594540738366.png",
        // 				null,
        // 				getLocalStorage(dictionary.MSEC),
        // 				function(res){
        // 					//setLoadingDataUserAccount(false);
        // 					console.log("res",res);
        // 					if(res.code === networkCode.success){
        // 						window.URL.createObjectURL(blob);
        // 						document.getElementById("UserAccountAvatar").src = res.data;
        // 					} else if (res.code === networkCode.sessionTimeOut){
        // 							makeAlertRedirect();
        // 					}
        // 				},
        // 				function(err){
        // 					//setLoadingDataUserAccount(dictionaryKey.ERR);
        // 					console.log(dictionaryKey.ERR_INFO,err);
        // 				}
        // 			);
    }

    function upLoadImage(file) {
        let dataLectureImgage = new FormData();
        dataLectureImgage.append('file', file);
        window.scrollTo(0, 0);
        setLoadingDataUserAccount(true);
        requestToSever(
            sunQRequestType.post,
            getURLUploadImage(),
            dataLectureImgage,
            getLocalStorage(dictionary.MSEC),
            function(res) {
                setLoadingDataUserAccount(false);
//                 if (res.code === networkCode.success) {
//                     console.log("success", res);
// 					alert("successn");
//                     myCurrentUserAccount.imgUrl = res.data.urls[0];
//                     //myCurrentUserAccount.imgUrl
//                 } else 
console.log(res);                 
					if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                } else {
					 myCurrentUserAccount.imgUrl = res.urls;
					//alert("loi cmn 123 " + JSON.stringify(res) +" "+res.code+" "+res.message);
				}
            },
            function(err) {
                //setLoadingDataUserAccount(dictionaryKey.ERR);
				setLoadingDataUserAccount(false);
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

    document.getElementById("inputUserAccountName").addEventListener("input", function(e) {
		let tttValue = e.target.value;
        myCurrentUserAccount.name = tttValue.escape();
    });

	 document.getElementById("inputUserAccountDegree").addEventListener("input", function(e) {
		 let tttValue = e.target.value;
        myCurrentUserAccount.degree = tttValue.escape();
    });
	
	 document.getElementById("inputUserAccountShort").addEventListener("input", function(e) {
		 let tttValue = e.target.value;
        myCurrentUserAccount.shortId = tttValue.escape();
    });
	
    document.getElementById("inputUserAccountMajor").addEventListener("input", function(e) {
		 let tttValue = e.target.value;
        myCurrentUserAccount.specialist = tttValue.escape();
    });

	document.getElementById("inputUserAccountUniversity").addEventListener("input", function(e) {
		 let tttValue = e.target.value;
        myCurrentUserAccount.university = tttValue.escape();
    });
	
	/*
    document.getElementById("UserAccountDetailTextArea").addEventListener("input", function(e) {
        myCurrentUserAccount.description = e.target.value;
		 //myCurrentUserAccount.description = "<pre>"+e.target.value+"</prev>";
    });
	*/

	 document.getElementById("UserAccountSubDetailTextArea").addEventListener("input", function(e) {
        myCurrentUserAccount.shortDescription = e.target.value;
		 //myCurrentUserAccount.description = "<pre>"+e.target.value+"</prev>";
    });
			
    document.getElementById("inputUserAccountEmail").addEventListener("input", function(e) {
		 let tttValue = e.target.value;
        myCurrentUserAccount.email = tttValue.escape();
		//console.log(myCurrentUserAccount.email );
    });
    document.getElementById("inputUserAccountPhone").addEventListener("input", function(e) {
		 let tttValue = e.target.value;
        myCurrentUserAccount.phone = tttValue.escape();
    });

    document.getElementById("inputUserAccountEXP").addEventListener("change", function(e) {
//         let dateChoosingEXPD = e.target.value.split(" ")[0];

//         let newEXPDate = new Date(dateChoosingEXPD.split("/")[1] + "/" + dateChoosingEXPD.split("/")[0] + "/" + dateChoosingEXPD.split("/")[2]);
//         console.log(e.target.value);
//         let newEXP = new Date().getYear() - newEXPDate.getYear();
//         document.getElementById("inputUserAccountEXP").value = newEXP + '<?php echo $GLOBALS["UserAccount_EXP_UserAccount_DETAIL"]; ?>';

//         document.getElementById("inputUserAccountEXPReal").value = dateChoosingEXPD.split("/")[2] + "/" + dateChoosingEXPD.split("/")[1] + "/" + dateChoosingEXPD.split("/")[0] + "T0:0:0.0Z";
		let teachmYear = new Date().getFullYear() - Number.parseInt(e.target.value);
        myCurrentUserAccount.practiceAt = teachmYear + "-01-01T00:00:00.00Z";
		//alert(new Date().getYear()+" "+e.target.value+" "+myCurrentUserAccount.practiceAt);
    });

    document.getElementById('uploadAvatarUserAccount').addEventListener("change", (evt) => {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;
        //upLoadImage(tgt.files[0]);
        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function() {
                document.getElementById("UserAccountAvatar").src = fr.result;
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
	/*
    function checkEmail(value) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(value).toLowerCase());
    }

	function checkPhone(value){
    	var re = /[0-9]{8,}/;
		return re.test(value);
	}
	*/
    //submit form
    document.getElementById("UserAccountSubmit").addEventListener("click", function(e) {
        e.preventDefault();
        //console.log("email", myCurrentUserAccount.email);
        if (myCurrentUserAccount.imgUrl == "" || myCurrentUserAccount.imgUrl == null ){
			SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_IMG_UserAccount)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0,0);
                })
                .show();
		}
        else if (!checkEmail(myCurrentUserAccount.email)) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_EMAIL)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    document.getElementById("inputUserAccountEmail").focus();
					document.getElementById("inputUserAccountMajor").scrollIntoView();
                })
                .show();
        } else if(!checkPhone(myCurrentUserAccount.phone)){
				SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_PHONE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    document.getElementById("inputUserAccountPhone").focus();
					document.getElementById("inputUserAccountMajor").scrollIntoView();
                })
                .show();  
		} else {
            let titlleRequestUserAccount = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.REQUEST_EDIT: dictionaryKey.REQUEST_ADD + dictionaryKey.LECTURE_NAME;
			console.log("data lên " + JSON.stringify(myCurrentUserAccount));
			//alert("data lên " + myCurrentUserAccount.practiceAt);
            SunQAlert()
                .position('center')
                .title(titlleRequestUserAccount)
                .type('success')
                .confirmButtonColor("#3B4EDC")
                .cancelButtonColor("#a8b1f5")
                .confirmButtonText(dictionaryKey.AGREE)
                .cancelButtonText(dictionaryKey.CANCEL)
                .callback((result) => {
                    if (result.value) {
                        window.scrollTo(0, 0);
                        let tempmyCurrentUserAccount = myCurrentUserAccount;
                        if (getCurrentACtion() == dictionaryKey.editStatus) {
                           // delete tempmyCurrentUserAccount.shortId;
                            delete tempmyCurrentUserAccount.email;
                            //tempmyCurrentUserAccount.phone = "0123456789";
                        } 
						//else {
//                             //tempmyCurrentUserAccount.email = "year@sundayq.com";
//                             //tempmyCurrentUserAccount.phone = "123";
//                         }
                        delete tempmyCurrentUserAccount.createAt;
                        delete tempmyCurrentUserAccount.updateAt;
                        delete tempmyCurrentUserAccount.id;
						myCurrentUserAccount.description = UserAccountDesciption.getData();
                        //delete tempmyCurrentUserAccount.shortId;
                        //delete tempmyCurrentUserAccount.email;
                        //tempmyCurrentUserAccount.phone = "123";	
                        //alert("up"+JSON.stringify(tempmyCurrentUserAccount));
                        setLoadingDataUserAccount(true);
                        requestToSever(
                            getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                            getCurrentACtion() == dictionaryKey.editStatus ? getURLUserAccount() + "/" + getCurrentEdit() : getURLUserAccount(),
                            tempmyCurrentUserAccount,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDataUserAccount(false);
                                let sunqalertsuccess = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.UserAccount_EDIT_SUCCESS : dictionaryKey.UserAccount_ADD_SUCCESS;
                                if (res.code === networkCode.success) {
                                    //myCurrentUserAccount = res.data;
                                    SunQAlert()
                                        .position('center')
                                        .title(sunqalertsuccess)
                                        .type('success')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.AGREE)
                                        .callback((result) => {
                                            webpageRedirect(getAdminHomeURL() + "?mode=offline&page=list-UserAccount");
                                        })
                                        .show();
                                } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                                    makeAlertRedirect();
                                } else {
									//alert("loi"+JSON.stringify(res));
									SunQAlert()
										.position('center')
										.title(dictionaryKey.SERVER_INFO + res.message)
										.type('error')
										.confirmButtonColor("#3B4EDC")
										.confirmButtonText(dictionaryKey.TRY_AGAIN)
										.callback((result) => {
// 										alert("name",myCurrentUserAccount.name +"specialist",myCurrentUserAccount.specialist +"degree",myCurrentUserAccount.degree +"practiceAt",myCurrentUserAccount.practiceAt +("inputUserAccountEXP",myCurrentUserAccount.inputUserAccountEXP +"description",myCurrentUserAccount.description );
// 										(myCurrentUserAccount.name == "" || myCurrentUserAccount.name == null) && document.getElementById("inputUserAccountName").focus();
// 										(myCurrentUserAccount.specialist == "" || myCurrentUserAccount.specialist == null) && document.getElementById("inputUserAccountMajor").focus();
// 									   (myCurrentUserAccount.degree == "" || myCurrentUserAccount.degree == null) && document.getElementById("inputUserAccountDegree").focus();
// 									   (myCurrentUserAccount.practiceAt == "" || myCurrentUserAccount.practiceAt == null) && document.getElementById("UserAccountDetailTextArea").focus();
// 									   (myCurrentUserAccount.inputUserAccountEXP == "" || myCurrentUserAccount.inputUserAccountEXP == null) &&  document.getElementById("inputUserAccountEXP").focus();
// 										(myCurrentUserAccount.description == "" || myCurrentUserAccount.description == null) && document.getElementById("UserAccountDetailTextArea").focus();
										})
										.show();  
									//alert("vao else " + JSON.stringify(res) +" "+res.code+" "+res.message);
								}
                            },
                            function(err) {
                                setLoadingDataUserAccount(dictionaryKey.ERR);
                                let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.UserAccount_EDIT_FAILED : dictionaryKey.UserAccount_ADD_FAILED;
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