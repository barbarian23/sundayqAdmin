<?php
include get_theme_file_path("home/offline/teacher/teacher-status.php");
include get_theme_file_path("home/offline/teacher/teacher-interact-ui.php");
?>
<form class="manage-teacher-contain">
    <div class="manage-contain-teacher-loading" id="teacher-page-loading">
        <span id="teacher-page-loading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="teacher-page-loading-progress">

        </div>
        <div class="manage-contain-teacher-loading-err" id="teacher-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>
    <div class="manage-teacher-contain-data">
        <div class="manage-teacher-contain-left">
            <label class="manage-teacher-contain-left-upload" for="uploadAvatarTeacher">
                <span>
                    <?php echo $GLOBALS["TEACHER_AVATAR"]; ?>
                </span>
				<span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <img id="teacherAvatar" class="manage-teacher-contain-left-img" src='<?php echo $GLOBALS["URI_ADD_NEW"]; ?>'>
                <input type="file" id="uploadAvatarTeacher" name="uploadAvatarTeacher" />
            </label>
        </div>
        <div class="manage-teacher-contain-right">
            <div class="manage-teacher-contain-right-upper">
				<!-- name -->
                <span><?php echo $GLOBALS["TEACHER_INPUT_NAME"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="inputTeacherName" type="text" placeholder='<?php echo $GLOBALS["TEACHER_INPUT_NAME_PLACEHOLDER"]; ?>' required>
				
				<!-- short name -->
                <span><?php echo $GLOBALS["TEACHER_INPUT_SHORT"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="inputTeacherShort" type="text" placeholder='<?php echo $GLOBALS["TEACHER_INPUT_SHORT_PLACEHOLDER"]; ?>' required>
				
				<!-- degree -->
				<span><?php echo $GLOBALS["TEACHER_INPUT_DEGREE"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="inputTeacherDegree" type="text" placeholder='<?php echo $GLOBALS["TEACHER_INPUT_DEGREE_PLACEHOLDER"]; ?>' required>
				
				<!-- university -->
				<span><?php echo $GLOBALS["TEACHER_INPUT_UNIVERSITY"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="inputTeacherUniversity" type="text" placeholder='<?php echo $GLOBALS["TEACHER_INPUT_UNIVERSITY_PLACEHOLDER"]; ?>' required>
				
				<!-- major -->
                <span><?php echo $GLOBALS["TEACHER_INPUT_MAJOR"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="inputTeacherMajor" type="text" placeholder='<?php echo $GLOBALS["TEACHER_INPUT_MAJOR_PLACEHOLDER"]; ?>' required>

				<!-- kinh nghiệm -->
                <span><?php echo $GLOBALS["TEACHER_INPUT_EXP"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="inputTeacherEXPReal" type="hidden" placeholder='<?php echo $GLOBALS["TEACHER_INPUT_EXP_PLACEHOLDER"]; ?>' required>
                <input id="inputTeacherEXP" type="text" placeholder='<?php echo $GLOBALS["TEACHER_INPUT_EXP_PLACEHOLDER"]; ?>' required>
				<!-- email -->
                <span><?php echo $GLOBALS["TEACHER_INPUT_EMAIL"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="inputTeacherEmail" type="email" placeholder='<?php echo $GLOBALS["TEACHER_INPUT_EMAIL_PLACEHOLDER"]; ?>' required>
				<!-- số điện thoại -->
                <span><?php echo $GLOBALS["TEACHER_INPUT_PHONE"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="inputTeacherPhone" type="text" placeholder='<?php echo $GLOBALS["TEACHER_INPUT_PHONE_PLACEHOLDER"]; ?>'>
            </div>
            <hr class="manage-teacher-hr-between">
            <div class="manage-teacher-contain-right-below">
				<!-- mô tả -->
				<span><?php echo $GLOBALS["TEACHER_INPUT_DETAIL"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
              <!--  <textarea id="teacherDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["TEACHER_INPUT_DETAIL_PLACEHOLDER"]; ?>' required></textarea>-->
				<div id="teacherDetailTextArea-toolbar-container"></div>
				<div id="teacherDetailTextArea" ><?php echo $GLOBALS["TEACHER_INPUT_DETAIL_PLACEHOLDER"]; ?></div>
				<!-- mô tả ngắn gọn -->
				<span id="teacherSubDetailTextAreaTitle"><?php echo $GLOBALS["TEACHER_INPUT_SUB_DETAIL"]; ?></span>
			<textarea id="teacherSubDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["TEACHER_INPUT_SUB_DETAIL_PLACEHOLDER"]; ?>' required></textarea>
            </div>
			
			
			
        </div>
    </div>
    <div class="manage-teacher-bottom-action">
        <input type="submit" name='teacherSubmit' value='<?php echo $GLOBALS["LECTURE_SUBMIT"]; ?>' id="teacherSubmit">
    </div>
</form>

<script src="wp-content/themes/twentytwenty/assets/js/ckeditor5.js"></script>
<script>
    var myCurrentTeacher = {

    };
	var teacherDesciption = "";
    window.onload = function() {

		DecoupledEditor
            .create( document.querySelector( '#teacherDetailTextArea' ), {
                extraPlugins: [myCustomUploadAdapterPlugin],
            } )
            .then( editor => {
				teacherDesciption = editor;
                const toolbarContainer = document.querySelector( '#teacherDetailTextArea-toolbar-container' );

                toolbarContainer.appendChild( editor.ui.view.toolbar.element );
            } )
            .catch( error => {
                console.error( error );
            } );

        // 		if(getCurrentACtion() == dictionaryKey.editStatus){

        // 		}


//         mobiscroll.datetime('#inputTeacherEXP', {
//             max: new Date(),
//             dateFormat: 'd/mm/yy',
//             timeFormat: 'H:ii',
//         });
		 if (getCurrentACtion() == dictionaryKey.addStatus){
			 mobiscroll.number('#inputTeacherEXP', {
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
				if(item.id == "inputTeacherEXP"){
					tempCheckExist = false;
				   return true;
				}
			});
			console.log("tempCheckExist",tempCheckExist);
			if (tempCheckExist){
				tempArray.push({id:"inputTeacherEXP",lib:'number'});
			}
		} else {
			tempArray = [];
				tempArray.push({id:"inputTeacherEXP",lib:'number'});
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
			document.getElementById("teacherSubmit").value = '<?php echo $GLOBALS["LECTURE_SUBMIT_EDIT"] ?>';

            //fetch từ server
            setLoadingDataTeacher(true);
            requestToSever(
                sunQRequestType.get,
                getURLTeacher() + "/" + getCurrentEdit(),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDataTeacher(false);
                    if (res.code === networkCode.success) {
                        myCurrentTeacher = res.data;
                        console.log(res.data);
                        document.getElementById("inputTeacherName").value = myCurrentTeacher.name != null ? myCurrentTeacher.name : "";
                        document.getElementById("inputTeacherMajor").value = myCurrentTeacher.specialist != null ? myCurrentTeacher.specialist : "";
                        let dateEXPTEAcher = new Date(myCurrentTeacher.practiceAt);
                        let yearEXP = new Date().getYear() - dateEXPTEAcher.getYear();
                        document.getElementById("inputTeacherDegree").value = myCurrentTeacher.degree != null ? myCurrentTeacher.degree : "";
						document.getElementById("inputTeacherShort").value = myCurrentTeacher.shortId != null ? myCurrentTeacher.shortId  : "" ;
                        document.getElementById("inputTeacherUniversity").value = myCurrentTeacher.university != null ? myCurrentTeacher.university : "" ;
                        document.getElementById("inputTeacherEmail").value = myCurrentTeacher.email != null ? myCurrentTeacher.email : "" ;
                        document.getElementById("inputTeacherPhone").value = myCurrentTeacher.phone != null ? myCurrentTeacher.phone : "";
                        document.getElementById("inputTeacherEXP").value = yearEXP;
						 mobiscroll.number('#inputTeacherEXP', {
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
                        document.getElementById("teacherAvatar").src = myCurrentTeacher.imgUrl != null ? getHomeURL() + myCurrentTeacher.imgUrl : '<?php echo $GLOBALS["URI_ADD_NEW"]; ?>';
						teacherDesciption.setData(myCurrentTeacher.description != null ? myCurrentTeacher.description : "");
						document.getElementById("teacherSubDetailTextArea").value = myCurrentTeacher.shortDescription != null ? myCurrentTeacher.shortDescription : "";
                       /* document.getElementById("teacherDetailTextArea").value = myCurrentTeacher.description != null ? myCurrentTeacher.description : "";*/
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setLoadingDataTeacher(dictionaryKey.ERR);
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
						document.getElementById("teacherSubmit").value = '<?php echo $GLOBALS["LECTURE_SUBMIT_ADD"] ?>';

		}
    }

    function downloadImage(name, id) {
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

    function upLoadImage(file) {
        let dataLectureImgage = new FormData();
        dataLectureImgage.append('file', file);
        window.scrollTo(0, 0);
        setLoadingDataTeacher(true);
        requestToSever(
            sunQRequestType.post,
            getURLUploadImage(),
            dataLectureImgage,
            getLocalStorage(dictionary.MSEC),
            function(res) {
                setLoadingDataTeacher(false);
//                 if (res.code === networkCode.success) {
//                     console.log("success", res);
// 					alert("successn");
//                     myCurrentTeacher.imgUrl = res.data.urls[0];
//                     //myCurrentTeacher.imgUrl
//                 } else 
					if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                } else {
					 myCurrentTeacher.imgUrl = res.urls[0];
					//alert("loi cmn 123 " + JSON.stringify(res) +" "+res.code+" "+res.message);
				}
            },
            function(err) {
                //setLoadingDataTeacher(dictionaryKey.ERR);
				setLoadingDataTeacher(false);
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

    document.getElementById("inputTeacherName").addEventListener("input", function(e) {
		let tttValue = e.target.value;
        myCurrentTeacher.name = tttValue.escape();
    });

	 document.getElementById("inputTeacherDegree").addEventListener("input", function(e) {
		 let tttValue = e.target.value;
        myCurrentTeacher.degree = tttValue.escape();
    });
	
	 document.getElementById("inputTeacherShort").addEventListener("input", function(e) {
		 let tttValue = e.target.value;
        myCurrentTeacher.shortId = tttValue.escape();
    });
	
    document.getElementById("inputTeacherMajor").addEventListener("input", function(e) {
		 let tttValue = e.target.value;
        myCurrentTeacher.specialist = tttValue.escape();
    });

	document.getElementById("inputTeacherUniversity").addEventListener("input", function(e) {
		 let tttValue = e.target.value;
        myCurrentTeacher.university = tttValue.escape();
    });
	
	/*
    document.getElementById("teacherDetailTextArea").addEventListener("input", function(e) {
        myCurrentTeacher.description = e.target.value;
		 //myCurrentTeacher.description = "<pre>"+e.target.value+"</prev>";
    });
	*/

	 document.getElementById("teacherSubDetailTextArea").addEventListener("input", function(e) {
        myCurrentTeacher.shortDescription = e.target.value;
		 //myCurrentTeacher.description = "<pre>"+e.target.value+"</prev>";
    });
			
    document.getElementById("inputTeacherEmail").addEventListener("input", function(e) {
		 let tttValue = e.target.value;
        myCurrentTeacher.email = tttValue.escape();
		//console.log(myCurrentTeacher.email );
    });
    document.getElementById("inputTeacherPhone").addEventListener("input", function(e) {
		 let tttValue = e.target.value;
        myCurrentTeacher.phone = tttValue.escape();
    });

    document.getElementById("inputTeacherEXP").addEventListener("change", function(e) {
//         let dateChoosingEXPD = e.target.value.split(" ")[0];

//         let newEXPDate = new Date(dateChoosingEXPD.split("/")[1] + "/" + dateChoosingEXPD.split("/")[0] + "/" + dateChoosingEXPD.split("/")[2]);
//         console.log(e.target.value);
//         let newEXP = new Date().getYear() - newEXPDate.getYear();
//         document.getElementById("inputTeacherEXP").value = newEXP + '<?php echo $GLOBALS["TEACHER_EXP_TEACHER_DETAIL"]; ?>';

//         document.getElementById("inputTeacherEXPReal").value = dateChoosingEXPD.split("/")[2] + "/" + dateChoosingEXPD.split("/")[1] + "/" + dateChoosingEXPD.split("/")[0] + "T0:0:0.0Z";
		let teachmYear = new Date().getFullYear() - Number.parseInt(e.target.value);
        myCurrentTeacher.practiceAt = teachmYear + "-01-01T00:00:00.00Z";
		//alert(new Date().getYear()+" "+e.target.value+" "+myCurrentTeacher.practiceAt);
    });

    document.getElementById('uploadAvatarTeacher').addEventListener("change", (evt) => {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;
        //upLoadImage(tgt.files[0]);
        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function() {
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
    document.getElementById("teacherSubmit").addEventListener("click", function(e) {
        e.preventDefault();
        //console.log("email", myCurrentTeacher.email);
        if (myCurrentTeacher.imgUrl == "" || myCurrentTeacher.imgUrl == null ){
			SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_IMG_TEACHER)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0,0);
                })
                .show();
		}
        else if (!checkEmail(myCurrentTeacher.email)) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_EMAIL)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    document.getElementById("inputTeacherEmail").focus();
					document.getElementById("inputTeacherMajor").scrollIntoView();
                })
                .show();
        } else if(!checkPhone(myCurrentTeacher.phone)){
				SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_PHONE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    document.getElementById("inputTeacherPhone").focus();
					document.getElementById("inputTeacherMajor").scrollIntoView();
                })
                .show();  
		} else {
            let titlleRequestTeacher = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.REQUEST_EDIT: dictionaryKey.REQUEST_ADD + dictionaryKey.LECTURE_NAME;
			console.log("data lên " + JSON.stringify(myCurrentTeacher));
			//alert("data lên " + myCurrentTeacher.practiceAt);
            SunQAlert()
                .position('center')
                .title(titlleRequestTeacher)
                .type('success')
                .confirmButtonColor("#3B4EDC")
                .cancelButtonColor("#a8b1f5")
                .confirmButtonText(dictionaryKey.AGREE)
                .cancelButtonText(dictionaryKey.CANCEL)
                .callback((result) => {
                    if (result.value) {
                        window.scrollTo(0, 0);
                        let tempmyCurrentTeacher = myCurrentTeacher;
                        if (getCurrentACtion() == dictionaryKey.editStatus) {
                           // delete tempmyCurrentTeacher.shortId;
                            delete tempmyCurrentTeacher.email;
                            //tempmyCurrentTeacher.phone = "0123456789";
                        } 
						//else {
//                             //tempmyCurrentTeacher.email = "year@sundayq.com";
//                             //tempmyCurrentTeacher.phone = "123";
//                         }
                        delete tempmyCurrentTeacher.createAt;
                        delete tempmyCurrentTeacher.updateAt;
                        delete tempmyCurrentTeacher.id;
						myCurrentTeacher.description = teacherDesciption.getData();
                        //delete tempmyCurrentTeacher.shortId;
                        //delete tempmyCurrentTeacher.email;
                        //tempmyCurrentTeacher.phone = "123";	
                        //alert("up"+JSON.stringify(tempmyCurrentTeacher));
                        setLoadingDataTeacher(true);
                        requestToSever(
                            getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                            getCurrentACtion() == dictionaryKey.editStatus ? getURLTeacher() + "/" + getCurrentEdit() : getURLTeacher(),
                            tempmyCurrentTeacher,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDataTeacher(false);
                                let sunqalertsuccess = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.TEACHER_EDIT_SUCCESS : dictionaryKey.TEACHER_ADD_SUCCESS;
                                if (res.code === networkCode.success) {
                                    //myCurrentTeacher = res.data;
                                    SunQAlert()
                                        .position('center')
                                        .title(sunqalertsuccess)
                                        .type('success')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.AGREE)
                                        .callback((result) => {
                                            webpageRedirect(getAdminHomeURL() + "?mode=offline&page=list-teacher");
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
// 										alert("name",myCurrentTeacher.name +"specialist",myCurrentTeacher.specialist +"degree",myCurrentTeacher.degree +"practiceAt",myCurrentTeacher.practiceAt +("inputTeacherEXP",myCurrentTeacher.inputTeacherEXP +"description",myCurrentTeacher.description );
// 										(myCurrentTeacher.name == "" || myCurrentTeacher.name == null) && document.getElementById("inputTeacherName").focus();
// 										(myCurrentTeacher.specialist == "" || myCurrentTeacher.specialist == null) && document.getElementById("inputTeacherMajor").focus();
// 									   (myCurrentTeacher.degree == "" || myCurrentTeacher.degree == null) && document.getElementById("inputTeacherDegree").focus();
// 									   (myCurrentTeacher.practiceAt == "" || myCurrentTeacher.practiceAt == null) && document.getElementById("teacherDetailTextArea").focus();
// 									   (myCurrentTeacher.inputTeacherEXP == "" || myCurrentTeacher.inputTeacherEXP == null) &&  document.getElementById("inputTeacherEXP").focus();
// 										(myCurrentTeacher.description == "" || myCurrentTeacher.description == null) && document.getElementById("teacherDetailTextArea").focus();
										})
										.show();  
									//alert("vao else " + JSON.stringify(res) +" "+res.code+" "+res.message);
								}
                            },
                            function(err) {
                                setLoadingDataTeacher(dictionaryKey.ERR);
                                let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.TEACHER_EDIT_FAILED : dictionaryKey.TEACHER_ADD_FAILED;
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