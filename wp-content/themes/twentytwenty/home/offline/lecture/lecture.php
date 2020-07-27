<?php
?>

<form class="manage-contain">
    <div class="manage-contain-loading" id="lecture-page-loading">
        <span id="lecture-page-loading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="lecture-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="lecture-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>
    <!-- thông tin khóa học, độ tuổi, ảnh -->
    <div class="manage-section-infomation">
        <div class="manage-section-infomation-left">
            <div class="manage-section-infomation-left-item">
                <span><?php echo $GLOBALS["LECTURE_NAME_INPUT"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="idNameOfLecture" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["LECTURE_NAME_INPUT_PLACEHOLDER"]; ?>' required>
            </div>

            <div class="manage-section-infomation-left-item">
                <span><?php echo $GLOBALS["LECTURE_AGE_INPUT_FROM"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="idAgeOfLectureFrom" name="lecture_age" type="text" placeholder='<?php echo $GLOBALS["LECTURE_AGE_INPUT_PLACEHOLDER"]; ?>' required>
            </div>

            <div class="manage-section-infomation-left-item">
                <span><?php echo $GLOBALS["LECTURE_AGE_INPUT_TO"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="idAgeOfLectureTo" name="lecture_age" type="text" placeholder='<?php echo $GLOBALS["LECTURE_AGE_INPUT_PLACEHOLDER"]; ?>' required>
            </div>

            <div class="manage-section-infomation-left-item">
                <span><?php echo $GLOBALS["LECTURE_TYPE_INPUT"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="idTypeOfLecture" name="lecture_type" type="text" placeholder='<?php echo $GLOBALS["LECTURE_TYPE_INPUT_PLACEHOLDER"]; ?>' required>
            </div>
        </div>
        <div class="manage-section-infomation-right">
            <div class="manage-section-infomation-right-title">
                <span id="spanNameOfLectureReference"></span>
            </div>
			<span class="manage-section-infomation-right-list-image-title"><?php echo $GLOBALS["LECTURE_LIST_IMAGE"]; ?></span>
            <div class="manage-section-infomation-right-list-image" id="listLEctureImg">
				
                <!-- 				<img id="lecture-list-img" class="manage-section-infomation-right-item" src='<?php echo $GLOBALS["URI_ADD_NEW"]; ?>'> -->
                <div>


                   
                </div>
            </div>
			<div class="manage-section-infomation-right-item-div-add">
			 <label for="uploadImgLectureURLL">
				 		<span id="btnAddImageLecture"><?php echo $GLOBALS["LECTURE_ADD_IMAGE"] ?></span>
                        <input type="file" id="uploadImgLectureURLL" name="uploadImgLectureURL">
             </label>
			</div>
        </div>
    </div>

    <hr class="lecture-hr">

    <!-- chi tiết khóa học , ảnh -->
    <div class="manage-section-detail">
        <div class="manage-section-detail-left">
            <span class="manage-section-detail-left-title"><?php echo $GLOBALS["LECTURE_MAIN_TEACHER"]; ?> <span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span></span>
			
			<div class="manage-section-detail-left-choosing-radio" >
				<label class="containerLecture"><?php echo $GLOBALS["LECTURE_SIGNLE_OWNER"] ; ?>
				  	<input type="radio" checked="checked" name="radio" id="singleOwner">
				  	<span class="checkmarkLecture"></span>
				</label>
				<label class="containerLecture"><?php echo $GLOBALS["LECTURE_MULTI_OWNER"] ; ?>
				  	<input type="radio" name="radio" id="multiOwner">
				  	<span class="checkmarkLecture"></span>
				</label>
			</div>
			
			<div class="manage-section-detail-left-choosing-button" id="mainTeacherSelector">
				<span><?php echo $GLOBALS["LECTURE_CHOOSE_OWNER"]; ?></span>
			</div>
			
            <div class="manage-section-detail-left-item" id="currentListsOwner">
<!-- 				<div class="manage-section-detail-left-item-inside">
					<div class="manage-section-detail-left-item-inside-close">x</div>
					<img id="currentSelectImg" class="manage-section-detail-left-item-avatar">


					<div class="manage-section-detail-left-item-info">
						<span class="manage-section-detail-left-item-info-name" id="currentSelectName"></span>
						<span class="manage-section-detail-left-item-info-university" id="currentSelectUniversity"></span>
						<hr class="lecture-teacher-hr">
						<span><b><?php echo $GLOBALS["TEACHER_LESSION_SPECIALIST"]; ?></b><span id="currentSelectSpecial"></span></span>
						<span><b><?php echo $GLOBALS["TEACHER_LESSION_EXP"]; ?></b><span id="currentSelectExp"></span></span>
						<span><b><?php echo $GLOBALS["TEACHER_LESSION_DEGREE"]; ?></b><span id="currentSelectDegree"><?php echo $GLOBALS["LECTURE_TEACHER_TO_STUDENT"]; ?></span></span>
					</div>
					
				</div> -->
            </div>
			
			        <!-- selector teacher -->
			
<!-- 			<div class="manage-section-detail-left-list-parent">
				<span></span><span></span>
			</div> -->
			
			<div class="manage-section-detail-left-list-parent" id="listMainTeacher">
				
				<span class="manage-section-detail-left-list-close" id="listMainTeacherClose"><?php echo $GLOBALS["CLOSE"]; ?></span>
				<div class="sunq-process-contain" id="fetchListTacherInLecture">
					<div class="sunq-process-contain-running">

					</div>
				</div>
				<div class="manage-section-detail-left-list" id="divTeacherInLecture">

				</div>
				<div class="manage-section-detail-left-list-empty" id="managaeLectureEmpty">
					<img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
					<span><?php echo $GLOBALS["TEACHER_NO_LIST"]; ?></span>
				</div>
				<div class="manage-section-detail-left-list-empty" id="managaeLectureError">
					<img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
					<span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
				</div> 
			</div>
        </div>

		


        <div class="manage-section-detail-midlle">
            <div class="manage-section-detail-midlle-span">
                <span><?php echo $GLOBALS["LECTURE_DETAIL"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            </div>
            <div class="manage-section-detail-midlle-item">
<!--                  <textarea id="lectureDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["LECTURE_DETAIL_PLACEHOLDER"]; ?>' required></textarea>  -->
				<div id="lectureDetailTextArea-toolbar-container"></div>
				<div id="lectureDetailTextArea" ><?php echo $GLOBALS["LECTURE_DETAIL_PLACEHOLDER"]; ?></div>
				
            </div>
			<div class="manage-section-detail-midlle-span">
                <span><?php echo $GLOBALS["LECTURE_SUB_DETAIL"]; ?></span>
            </div>
			<div class="manage-section-detail-midlle-item">
				<textarea id="lectureSubDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["LECTURE_SUB_DETAIL_PLACEHOLDER"]; ?>' required></textarea>
			</div>
        </div>
        <div class="manage-section-detail-right">
            <div class="manage-section-detail-right-span">
                <span><?php echo $GLOBALS["LECTURE_MAIN_IMAGE"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            </div>
            <div class="manage-section-detail-right-item">
				<img id="lecture-main-img" class="manage-section-detail-right-item-img" src='<?php echo $GLOBALS["URI_ADD_NEW"]; ?>'>
                
            </div>
			<div class="manage-section-detail-right-item-input-change">
				<label class="manage-section-detail-right-item-input-change-label" for="uploadDescriptionURL">
                    <span id="btnUploadDesImg"></span>
                    <input type="file" id="uploadDescriptionURL" name="uploadDescriptionURL">
                </label>
			</div>
        </div>
    </div>

    <hr class="lecture-hr">

    <!-- lộ trình khóa học -->
    <div class="manage-section-road-map" id="exceltable">
        <div class="manage-section-road-map-upload">
            <div class="sunq-process-contain" id="uploadcontain">
                <div class="sunq-process-contain-running">

                </div>
            </div>
            <button class="manage-section-road-map-upload-button" id="btnDownloadExcel"><?php echo $GLOBALS["LECTURE_DOWNLOAD_SAMPLE"]; ?></button>
        </div>

        <div class="manage-section-road-map-upload-download">
            <label for="upload" class="manage-section-road-map-label-for-upload">
                <i class="fa fa-cloud-upload"></i> <?php echo $GLOBALS["LECTURE_UPLOAD_PLAN_PLACEHOLDER"]; ?>
            </label>
            <input id="upload" type=file name="files[]">
            <p class="manage-section-road-map-upload-download-file-return" id="fileSelected"></p>
            <p class="manage-section-road-map-upload-download-file-return" id="fileSelectedAbsolutePath"></p>
        </div>

        <div class="manage-section-road-map-time-table" id="tableLecture">
            <div class="manage-section-road-map-title-table">
                <span><?php echo $GLOBALS["LECTURE_ROADMAP_LECTURE"]; ?></span>
            </div>
            <table class="manage-section-road-map-time-real-table" id="tableLectureInside">
                <!--                     <tr>
                        <th class="manage-section-road-map-time-real-table-number"> 
                			<span><?php echo $GLOBALS["LECTURE_ROADMAP_COL_1"]; ?></span>
                        </th>
                        <th class="manage-section-road-map-time-real-table-contain">
                           <span><?php echo $GLOBALS["LECTURE_ROADMAP_COL_2"]; ?></span>
                        </th>
                        <th class="manage-section-road-map-time-real-table-time">
                            <span><?php echo $GLOBALS["LECTURE_ROADMAP_COL_3"]; ?></span>
                        </th>
                        <th class="manage-section-road-map-time-real-table-teacher">
                           <span><?php echo $GLOBALS["LECTURE_ROADMAP_COL_4"]; ?></span>
                        </th>
                        <th class="manage-section-road-map-time-real-table-sidekick">
                            <span><?php echo $GLOBALS["LECTURE_ROADMAP_COL_5"]; ?></span>
                        </th>
                    </tr> -->

                <!--                     <tr>
                        <td class="manage-section-road-map-time-real-table-number">
                            Buổi 1
                        </td>
                        <td class="manage-section-road-map-time-real-table-contain">
                            Hoạt động ngoài trời
                        </td>
                        <td class="manage-section-road-map-time-real-table-time">
                            9:30 am
                        </td>
                        <td class="manage-section-road-map-time-real-table-teacher">
                            Nguyễn Văn A
                        </td>
                        <td class="manage-section-road-map-time-real-table-sidekick">
                            Nguyễn Văn B
                        </td>
                    </tr>
					 <tr>
                        <td class="manage-section-road-map-time-real-table-number">
                            Buổi 1
                        </td>
                        <td class="manage-section-road-map-time-real-table-contain">
                            Hoạt động ngoài trời
                        </td>
                        <td class="manage-section-road-map-time-real-table-time">
                            9:30 am
                        </td>
                        <td class="manage-section-road-map-time-real-table-teacher">
                            Nguyễn Văn A
                        </td>
                        <td class="manage-section-road-map-time-real-table-sidekick">
                            Nguyễn Văn B
                        </td>
                    </tr> -->
            </table>
        </div>
    </div>



    <div class="manage-content-bottom-action">
        <input id="lectureSubmit" type="submit" value='<?php echo $GLOBALS["LECTURE_SUBMIT_ADD"]; ?>' name="submitLecture">

    </div>

</form>

<script src="wp-content/themes/twentytwenty/assets/js/jszip.js"></script>
<script src="wp-content/themes/twentytwenty/assets/js/xlsx.js"></script>

<script src="wp-content/themes/twentytwenty/assets/js/alasql.min.js"></script>
<script src="wp-content/themes/twentytwenty/assets/js/xlsx.core.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/decoupled-document/ckeditor.js"></script>
<script>
    //load from data teacher
    // 	coursePlans: [
    // 		id:"String",
    // 		dayIndex:"String",
    // 		title:"String",
    // 		description:"String",
    // 		time:"String",
    // 		teacherId:"String",
    // 		supporterId:"String",
    // 	]
    var myCurrentLecture={}, myCurrentTacherInLecture , currentOwners = [];
	var sheet_1_data ;
    var sheet_2_data ;
    window.onload = function() {
		myCurrentLecture =  {};
		lectureDescription = "";
		DecoupledEditor
            .create( document.querySelector( '#lectureDetailTextArea' ) )
            .then( editor => {
				lectureDescription = editor;
                const toolbarContainer = document.querySelector( '#lectureDetailTextArea-toolbar-container' );

                toolbarContainer.appendChild( editor.ui.view.toolbar.element );
            } )
            .catch( error => {
                console.error( error );
            } );
		
        mobiscroll.number('#idAgeOfLectureFrom', {
            theme: 'ios',
            themeVariant: 'light',
            layout: 'fixed',
            value: 1,
            step: 1,
            min: 0,
            max: 18,
            display: 'bubble',
        });

        mobiscroll.number('#idAgeOfLectureTo', {
            theme: 'ios',
            themeVariant: 'light',
            layout: 'fixed',
            value: 1,
            step: 1,
            min: 0,
            max: 18,
            display: 'bubble',
        });


        setFetchingTeacherLecture(true);
        requestToSever(
            sunQRequestType.get,
            getURLAllTeacher(),
            null,
            getData(dictionary.MSEC),
            function(res) {
                setFetchingTeacherLecture(false);
                if (res.code === networkCode.success) {
                    if (res.data == null || res.data.length == 0) {
                        setLectureGetTeacherThanZero(false);
                    } else {
                        emptyTableListTeacherLecture();
						getFileExcel(res.data,createListTeacherLecture);
						myCurrentTacherInLecture = res.data;
                        //createListTeacherLecture(res.data);
                    }
                } else if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                }
            },
            function(err) {

                setFetchingTeacherLecture(false);
                setIsGetLectureTeacherFromServerSuccess(false);
                console.log(dictionaryKey.ERR_INFO, err);
                // 			if(res){
                // 			if (res.code === networkCode.sessionTimeOut){
                // 					makeAlertRedirect();
                // 			} else {
                // 				//console.log("123cxzczxc");

                // 			}
                //			}
            }
        );
		getCurrentACtion() == dictionaryKey.editStatus ? document.getElementById("btnUploadDesImg").innerHTML='<?php echo $GLOBALS["LECTURE_EDIT_DES_IMG"]; ?>' : document.getElementById("btnUploadDesImg").innerHTML='<?php echo $GLOBALS["LECTURE_ADD_DES_IMG"]; ?>' ;
        clearListImageAndDetailImage();
        if (getCurrentACtion() == dictionaryKey.editStatus) {
			document.getElementById("lectureSubmit").value = '<?php echo $GLOBALS["LECTURE_SUBMIT_EDIT"] ?>';
            //fetch từ server
            setLoadingDataLEcture(true);
            requestToSever(
                sunQRequestType.get,
                getURLecture() + "/" + getCurrentEdit(),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDataLEcture(false);
                    if (res.code === networkCode.success) {
                        myCurrentLecture = res.data;
                        console.log("myCurrentLecture", myCurrentLecture);
                        document.getElementById("idNameOfLecture").value = myCurrentLecture.title;
                        document.getElementById("spanNameOfLectureReference").textContent = myCurrentLecture.title;
                        document.getElementById("idAgeOfLectureFrom").value = myCurrentLecture.minTargetAge;
                        document.getElementById("idAgeOfLectureTo").value = myCurrentLecture.maxTargetAge;
                        document.getElementById("idTypeOfLecture").value = myCurrentLecture.courseType;
                        document.getElementById("lectureSubDetailTextArea").value = myCurrentLecture.shortDescription == null ? "" : myCurrentLecture.shortDescription;
                        //document.getElementById("lectureDetailTextArea").textContent = myCurrentLecture.description;
						lectureDescription.setData(myCurrentLecture.description != null ? myCurrentLecture.description : "");
                        document.getElementById("lecture-main-img").src = getHomeURL() + myCurrentLecture.descriptionImgUrl;
						//console.log(res.data);
// 						if(res.data.coursePlans){
// 						   	if (res.data.coursePlans.length > 0){
// 									res.data.coursePlans.forEach((item,index)=>{
// 										delete item.supporter;
// 										delete item.teacher;
// 										delete item.courseId ;
// 										delete item.createAt ;
// 										delete item.updateAt;
// 									});
// 								}
// 						   }
                        let parent = document.getElementById("listLEctureImg");
                        // 						let imgTempLEcture = "";
                        // 						let parentImgList = parent.innerHTML;
                        // 						if(myCurrentLecture.otherImgUrls != null){
                        // 						myCurrentLecture.otherImgUrls.forEach((item,index)=>{			
                        // 							imgTempLEcture = imgTempLEcture + "<img id=\"lecture-img-" + (index+1) + "\"  class=\"manage-section-infomation-right-item\" src=\"" + getHomeURL()+item + "\" >";
                        // 						});
                        // 					}

                        // 						parent.innerHTML = imgTempLEcture + parent.innerHTML;
                        
                        //let parentImgList = parent.innerHTML;
                        if (myCurrentLecture.otherImgUrls != null) {
                            myCurrentLecture.otherImgUrls.forEach((item, index) => {
								let imgLEctureParrent = document.createElement("div");
								imgLEctureParrent.className = "manage-section-infomation-right-item";
								
								let imgTempLEcture = document.createElement("img");
								imgTempLEcture.id = "lecture-img-" + (index + 1);
								imgTempLEcture.className = "manage-section-infomation-right-item-img";
								imgTempLEcture.src = getHomeURL() + item;
								let imgLEctureClose = document.createElement("div");
								imgLEctureClose.className = "manage-section-infomation-right-list-image-drop";
								imgLEctureClose.innerHTML = "x";
								imgLEctureClose.addEventListener("click",function(){
									imgLEctureClose.remove();
									imgTempLEcture.remove();
									myCurrentLecture.otherImgUrls.splice(index,1);
								})
                                /*imgTempLEcture = imgTempLEcture + "<div class=>x</div><img id=\"lecture-img-" + (index + 1) + "\"  class=\"manage-section-infomation-right-item\" src=\"" + getHomeURL() + item + "\" >";*/
								imgLEctureParrent.appendChild(imgLEctureClose);
								imgLEctureParrent.appendChild(imgTempLEcture);
								parent.appendChild(imgLEctureParrent);
                            });
							
                        } else {
						    document.getElementById("btnAddImageLecture").innerHTML = '<?php echo $GLOBALS["LECTURE_LECTURE_NO_IMAGE"]; ?>';
						}

					
						
						
						if (getCurrentACtion() == dictionaryKey.editStatus) {
							//load data lên bài giảng
							//console.log("load data"+myCurrentLecture.coursePlans);
							if(myCurrentLecture.coursePlans != undefined ){
								//console.log("!= undefined"+myCurrentLecture.coursePlans+" "+myCurrentLecture.coursePlans.length);
								if(myCurrentLecture.coursePlans.length > 0){
									loadToRoadMapList(myCurrentLecture.coursePlans);
								}
							} 
							
							
						//load giáo viên chủ nhiệm -owner
							//setCurrentSelectTeacher(myCurrentLecture.ownerId,myCurrentLecture.owner);
							
							
							if(myCurrentLecture.owners != null){
								
								if(myCurrentLecture.owners.length > 1){
							 	setChoosingMultiTeacher(true);
									document.getElementById("multiOwner").checked = true;
							} else {
								setChoosingMultiTeacher(false);
							}
								
							myCurrentLecture.owners.forEach((item,index)=>{
								selectTeacherIndex(item.teacher);
								currentOwners.push(item.teacher.id);
								console.log("owwner",currentOwners);
							})
							}
							
							//load data lên người đăng ký
// 							 loadToRegisterList([
// {dayIndex:0,name:"ccc",email:"zxc@gmail.com",phone:"123213213123",time:"string",remark:"zxcczxzxc"},
// {dayIndex:1,name:"ccc",email:"zxc@gmail.com",phone:"123213213123",time:"string",remark:"zxcczxzxc"},
// {dayIndex:2,name:"ccc",email:"zxc@gmail.com",phone:"123213213123",time:"string",remark:"zxcczxzxc"}
// ]);
 						}
						
                        //parent.innerHTML = imgTempLEcture + parent.innerHTML;

                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setLoadingDataLEcture(dictionaryKey.ERR);
                    console.log(dictionaryKey.ERR_INFO, err);
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
        } else {
			
			document.getElementById("lectureSubmit").value = '<?php echo $GLOBALS["LECTURE_SUBMIT_ADD"] ?>';
		}

    }


	
	function loadToRoadMapList(jsonInput){
		let arrayTitleScheduleLecture = ["manage-section-road-map-time-real-table-number", "manage-section-road-map-time-real-table-contain", "manage-section-road-map-time-real-table-time", "manage-section-road-map-time-real-table-teacher", "manage-section-road-map-time-real-table-sidekick"];
		let arrayPropertyScheduleLecture = ["dayIndex","title","time","teacherId","supporterId"];
		
        document.getElementById("tableLecture").style.display = "flex";
        let parentTableSchedulde = document.getElementById("tableLectureInside");
        parentTableSchedulde.innerHTML = "";
		let titleArray = ["Buổi","Nội dung","Thời gian","giảng viên", "trợ giảng"];
        let trInsideSchedule = document.createElement("tr");
        titleArray.forEach(function(item, index) {
            let thInsideScheduleTr = document.createElement("th");
			thInsideScheduleTr.className = arrayTitleScheduleLecture[index];
			thInsideScheduleTr.innerHTML = titleArray[index];
			trInsideSchedule.appendChild(thInsideScheduleTr);
        });
        parentTableSchedulde.appendChild(trInsideSchedule);
		jsonInput.forEach(function(cItem,cIndex){
				let trInsideSchedule = document.createElement("tr");
			    arrayTitleScheduleLecture.forEach(function(item, index) {
				let countInsideSchedule = 0;
				//console.log(jsonInput);
				//for (let prop in item) {
	//                 if (Object.prototype.hasOwnProperty.call(item, prop)) {
						//console.log("yea",cItem,arrayPropertyScheduleLecture[index],typeof arrayPropertyScheduleLecture[index],arrayTitleScheduleLecture[index]);

							let tdInsideScheduleTr = document.createElement("td");
							tdInsideScheduleTr.className = arrayTitleScheduleLecture[index];
							tdInsideScheduleTr.innerHTML = cItem[arrayPropertyScheduleLecture[index]];
							//console.log("ccc",myCurrentTacherInLecture);
							if (index  == 3){
								console.log("teacherid ",cItem.teacherId);
								
								if(myCurrentTacherInLecture != null){
									myCurrentTacherInLecture.some((itemTeacher,indexTeacher) => {
										console.log("teacherid some",itemTeacher.id);
										if( cItem.teacherId == itemTeacher.id){
											console.log("match",itemTeacher.shortId);
										   tdInsideScheduleTr.innerHTML = itemTeacher.shortId ;
										   return true;
									}
									});
									if(tdInsideScheduleTr.innerHTML == "undefined" || cItem.teacherId == null){
									   tdInsideScheduleTr.innerHTML = '<?php echo $GLOBALS["LACK_TEACHER"]; ?>';
									   }
								} else {
									tdInsideScheduleTr.innerHTML = cItem.teacherId ;
								}
							  
							} else if (index  == 4){
								
								if(myCurrentTacherInLecture != null){
									myCurrentTacherInLecture.some((itemTeacher,indexTeacher) => {
										if( cItem.supporterId == itemTeacher.id){
										   tdInsideScheduleTr.innerHTML = itemTeacher.shortId ;
										   return true;
									}
									});
									console.log("");
									if(tdInsideScheduleTr.innerHTML == "undefined"  || cItem.teacherId == null){
									   tdInsideScheduleTr.innerHTML = '<?php echo $GLOBALS["LACK_TEACHER"]; ?>';
									   }
								} else {
									tdInsideScheduleTr.innerHTML = cItem.supporterId ;
								}
							  
							}
							//console.log("item",cItem.viewIndex);
							//myCurrentLecture.coursePlans[countInsideSchedule] = item[arrayPropertyScheduleLecture[item]];
							//countInsideSchedule++;
							trInsideSchedule.appendChild(tdInsideScheduleTr);


			});
			parentTableSchedulde.appendChild(trInsideSchedule);
		})

	}
	
	//chỉ load lên
	function loadToRegisterList(jsonInput){
		
		let arrayTitleScheduleLecture = ["manage-section-helpdesk-real-table-name", "manage-section-helpdesk-real-table-phone", "manage-section-road-map-time-real-table-email", "manage-section-road-map-time-real-table-note"];
		let arrayPropertyScheduleLecture = ["name","email","phone","remark"];
		
        document.getElementById("tableRegister").style.display = "flex";
        let parentTableSchedulde = document.getElementById("tableRegisterInside");
        parentTableSchedulde.innerHTML = "";
		let titleArray = ["Họ và tên","Số điện thoại","Email", "Ghi chú"];
        let trInsideSchedule = document.createElement("tr");
        titleArray.forEach(function(item, index) {
            let thInsideScheduleTr = document.createElement("th");
			thInsideScheduleTr.className = arrayTitleScheduleLecture[index];
			thInsideScheduleTr.innerHTML = titleArray[index];
			trInsideSchedule.appendChild(thInsideScheduleTr);
        });
        parentTableSchedulde.appendChild(trInsideSchedule);
		jsonInput.forEach(function(cItem,cIndex){
		
				let trInsideSchedule = document.createElement("tr");
			    arrayTitleScheduleLecture.forEach(function(item, index) {
					//console.log("item",item,"index",index);
				let countInsideSchedule = 0;

							let tdInsideScheduleTr = document.createElement("td");
							tdInsideScheduleTr.className = arrayTitleScheduleLecture[index];
							tdInsideScheduleTr.innerHTML = cItem[arrayPropertyScheduleLecture[index]];
							

							trInsideSchedule.appendChild(tdInsideScheduleTr);


			});
			parentTableSchedulde.appendChild(trInsideSchedule);
		
		})
		
	}
	
    function readExcelFile(jsonInput) {
        let arrayTitleScheduleLecture = ["manage-section-road-map-time-real-table-number", "manage-section-road-map-time-real-table-contain", "manage-section-road-map-time-real-table-time", "manage-section-road-map-time-real-table-teacher", "manage-section-road-map-time-real-table-sidekick"];
		let arrayPropertyScheduleLecture = ["dayIndex","title","time","teacherId","supporterId"];
        document.getElementById("tableLecture").style.display = "flex";
        let parentTableSchedulde = document.getElementById("tableLectureInside");
        parentTableSchedulde.innerHTML = "";
        jsonInput.forEach(function(item, index) {
            let trInsideSchedule = document.createElement("tr");
            if (index == 0) {
                let countInsideSchedule = 0;
                for (let prop in item) {
                    if (Object.prototype.hasOwnProperty.call(item, prop)) {
						if(countInsideSchedule < 5){
							let thInsideScheduleTr = document.createElement("th");
							thInsideScheduleTr.className = arrayTitleScheduleLecture[countInsideSchedule++];
							thInsideScheduleTr.innerHTML = prop;
							console.log("th",prop);
							trInsideSchedule.appendChild(thInsideScheduleTr);
						}
                    }
                }
                parentTableSchedulde.appendChild(trInsideSchedule);
            }
        });
		myCurrentLecture = myCurrentLecture == null ? {} : myCurrentLecture ;
		myCurrentLecture.coursePlans = myCurrentLecture.coursePlans == null ? [] : myCurrentLecture.coursePlans;
		//console.log(myCurrentLecture.coursePlans);
		myCurrentLecture.coursePlans.length = 0;
        jsonInput.forEach(function(item, index) {
            let trInsideSchedule = document.createElement("tr");
            let countInsideSchedule = 0;
			console.log("jsonInput",item[1],item[1] != "" && item[1] != undefined);
			if(item["Nội dung"] != "" && item["Nội dung"] != undefined){
			myCurrentLecture.coursePlans[index] = {};
            for (let prop in item) {
                if (Object.prototype.hasOwnProperty.call(item, prop)) {
                    //console.log("let",countInsideSchedule,prop, item[prop]);
					if(countInsideSchedule < 5){
						let tdInsideScheduleTr = document.createElement("td");
						tdInsideScheduleTr.className = arrayTitleScheduleLecture[countInsideSchedule];
						tdInsideScheduleTr.innerHTML = item[prop];
						//myCurrentLecture[arrayPropertyScheduleLecture[countInsideSchedule]] = item[prop];
						
						//console.log("excel",item[prop]);
						if (countInsideSchedule == 0){
							myCurrentLecture.coursePlans[index]["dayIndex"] = index;
						}
						else if (countInsideSchedule == 3){
							let isFindName = false;
							 myCurrentTacherInLecture.some((itemI,indexI)=>{
								 //console.log("item in excel",item[prop],item[prop] == null);
								if(item[prop] == itemI.shortId || item[prop] == itemI.name){
									myCurrentLecture.coursePlans[index][arrayPropertyScheduleLecture[countInsideSchedule]] = itemI.id;
									isFindName = true;
								   return item.shortId;
								}
							});
							if (!isFindName){
								tdInsideScheduleTr.innerHTML = dictionaryKey.LACK_TEACHER;
								myCurrentLecture.coursePlans[index][arrayPropertyScheduleLecture[countInsideSchedule]] = dictionaryKey.LACK_TEACHER;
								}
						} else if(countInsideSchedule == 4){
							let isFindName = false;
							myCurrentTacherInLecture.some((itemI,indexI)=>{
								// console.log("item in excel",item[prop]);
								if(item[prop] == itemI.shortId || item[prop] == itemI.name){
									myCurrentLecture.coursePlans[index][arrayPropertyScheduleLecture[countInsideSchedule]] = itemI.id;
								isFindName = true;
								   return item.shortId;
								}
							});
							console.log("isFindName",isFindName);
							if (!isFindName){
								tdInsideScheduleTr.innerHTML = dictionaryKey.LACK_TEACHER;
								myCurrentLecture.coursePlans[index][arrayPropertyScheduleLecture[countInsideSchedule]] = dictionaryKey.LACK_TEACHER;
								}
						}
						else {
							myCurrentLecture.coursePlans[index][arrayPropertyScheduleLecture[countInsideSchedule]] = item[prop];
						}
					
						//console.log("push to courrse plan",myCurrentLecture.coursePlans[index],myCurrentLecture);
						trInsideSchedule.appendChild(tdInsideScheduleTr);
						countInsideSchedule++;
					}
                } 
            }
				console.log("yeaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",countInsideSchedule);
					if (countInsideSchedule == 3){
						console.log("giảng viên",item["Giảng viên"]);
								if(item["Giảng viên"] == null){
									let tdInsideScheduleTr = document.createElement("td");
						tdInsideScheduleTr.className = "manage-section-road-map-time-real-table-teacher";
								tdInsideScheduleTr.innerHTML = dictionaryKey.LACK_TEACHER;
									console.log("input",dictionaryKey.LACK_TEACHER);
								myCurrentLecture.coursePlans[index][arrayPropertyScheduleLecture[countInsideSchedule]] = dictionaryKey.LACK_TEACHER;
									trInsideSchedule.appendChild(tdInsideScheduleTr);
								   }
							}
						if (countInsideSchedule + 1 == 4){
							console.log("trợ giảng",item["Trợ giảng"]);
									if(item["Trợ giảng"] == null){
										let tdInsideScheduleTr = document.createElement("td");
										tdInsideScheduleTr.className = "manage-section-road-map-time-real-table-sidekick";
								tdInsideScheduleTr.innerHTML = dictionaryKey.LACK_TEACHER;
								myCurrentLecture.coursePlans[index][arrayPropertyScheduleLecture[countInsideSchedule]] = dictionaryKey.LACK_TEACHER;
										trInsideSchedule.appendChild(tdInsideScheduleTr);
									   }
							}
				console.log("pussh new",myCurrentLecture.coursePlans);
// 			if (item[3] == null){
// 				myCurrentLecture.coursePlans[index][arrayPropertyScheduleLecture[countInsideSchedule]] = dictionaryKey.LACK_TEACHER;
// 			}
// 			if (item[4] == null){
// 				myCurrentLecture.coursePlans[index][arrayPropertyScheduleLecture[countInsideSchedule]] = dictionaryKey.LACK_TEACHER;
// 				}
//             if (getCurrentACtion() == dictionaryKey.editStatus) {
//                 myCurrentLecture.coursePlans.dayIndex = index;
//                 myCurrentLecture.coursePlans.title = index;
//                 myCurrentLecture.coursePlans.description = index;
//                 myCurrentLecture.coursePlans.time = index;
//                 //map
//                 myCurrentLecture.coursePlans.teacherId = index;
//                 myCurrentLecture.coursePlans.supporterId = index;
//             }
            myCurrentLecture.coursePlans[index]["description"] = "description";
            parentTableSchedulde.appendChild(trInsideSchedule);
			
		}
        });
    }

    function excelToJSON() {
        let excelInstance = Object.create(excelToJSON.prototype);
        return excelInstance;
    };

    excelToJSON.prototype.parseExcel = function(file, mId) {
        var reader = new FileReader();
        reader.onload = function(e) {
            let data = e.target.result;
            let workbook = XLSX.read(data, {
                type: 'binary'
            });
            workbook.SheetNames.forEach(function(sheetName, index) {
                //console.log("index", index);
                let XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                let json_object = JSON.stringify(XL_row_object);
                if (index == 0 && json_object != undefined) {
                    let json_data = JSON.parse(json_object);
                    console.log(json_data, json_object);
                    readExcelFile(json_data);
                }
                //document.getElementById(mId).innerHTML = json_object;
            })
        };

        reader.onerror = function(ex) {
            console.log("err", ex);
        };

        reader.readAsBinaryString(file);
    }

    function handleFileSelect(evt) {
        let excel = excelToJSON();
        let files = evt.target.files;
        document.getElementById("fileSelected").style.display = "block";
        document.getElementById("fileSelected").innerHTML = evt.target.value.split('\\').pop();
        document.getElementById("fileSelectedAbsolutePath").style.display = "block";
        document.getElementById("fileSelectedAbsolutePath").innerHTML = evt.target.value.split('\\');
        excel.parseExcel(files[0], "ExcelContent");
    }

    // window.saveFile = function saveFile() {
    //     var sheet_1_data = [{ Col_One: 1, Col_Two: 11 }, { Col_One: 2, Col_Two: 22 }];
    //     var sheet_2_data = [{ Col_One: 10, Col_Two: 110 }, { Col_One: 20, Col_Two: 220 }];
    //     var opts = [{ sheetid: 'Sheet One', header: true }, { sheetid: 'Sheet Two', header: false }];
    //     var result = alasql('SELECT * INTO XLSX("sample_file.xlsx",?) FROM ?',
    //         [opts, [sheet_1_data, sheet_2_data]]);
    // }

    function getFileExcel(data,callback) {
		
// 		 let objectforSheet1 = "[{\"" + getDictionaryText("LECTURE_ROADMAP_COL_1") + "\":\"1\",\"" 
// 		 							  + getDictionaryText("LECTURE_ROADMAP_COL_2") + "\":\"2\",\"" 
// 		 							  + getDictionaryText("LECTURE_ROADMAP_COL_3") + "\":\"3\",\"" 
// 		 							  + getDictionaryText("LECTURE_ROADMAP_COL_4") + "\":\"4\",\"" 
// 		 							  + getDictionaryText("LECTURE_ROADMAP_COL_5") + "\":\"5\",\"\":\"\",\"\":\"\",\"" 
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_1")   + "\":\"6\",\"" 
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_2")   + "\":\"7\",\""
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_3")   + "\":\"8\",\""
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_4")   + "\":\"9\",\""
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_5")   + "\":\"10\",\""
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_6")   + "\":\"11\"}]";
		
		let objectforSheet1 = "[";
        
		data && data.forEach((item,index)=>{
			//console.log("item",item);
			let tempPushLEcture = "";
// 			if(index == 0){
// 				 tempPushLEcture += "{\"" + getDictionaryText("LECTURE_ROADMAP_COL_1") + "\":\"1\",\"" 
// 		 							  + getDictionaryText("LECTURE_ROADMAP_COL_2") + "\":\"2\",\"" 
// 		 							  + getDictionaryText("LECTURE_ROADMAP_COL_3") + "\":\"3\",\"" 
// 		 							  + getDictionaryText("LECTURE_ROADMAP_COL_4") + "\":\"4\",\"" 
// 		 							  + getDictionaryText("LECTURE_ROADMAP_COL_5") + "\":\"5\",\"\":\"\",\"\":\"\",\"" 
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_1")   + "\":\""+(index+1)+"\",\"" 
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_2")   + "\":\""+item.name+"\",\""
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_3")   + "\":\""+item.phone+"\",\""
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_4")   + "\":\""+item.email+"\",\""
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_5")   + "\":\""+item.specialist+"\",\""
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_6")   + "\":\""+(new Date().getYear() - new Date(item.practiceAt).getYear()) + " năm"+"\"}";
// 			} else {
// 							tempPushLEcture += ",{\"" + getDictionaryText("LECTURE_ROADMAP_COL_1") + "\":\"\",\"" 
// 		 							  + getDictionaryText("LECTURE_ROADMAP_COL_2") + "\":\"\",\"" 
// 		 							  + getDictionaryText("LECTURE_ROADMAP_COL_3") + "\":\"\",\"" 
// 		 							  + getDictionaryText("LECTURE_ROADMAP_COL_4") + "\":\"\",\"" 
// 		 							  + getDictionaryText("LECTURE_ROADMAP_COL_5") + "\":\"\",\"\":\"\",\"\":\"\",\"" 
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_1")   + "\":\""+(index+1)+"\",\"" 
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_2")   + "\":\""+item.name+"\",\""
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_3")   + "\":\""+item.phone+"\",\""
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_4")   + "\":\""+item.email+"\",\""
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_5")   + "\":\""+item.specialist+"\",\""
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_6")   + "\":\""+(new Date().getYear() - new Date(item.practiceAt).getYear()) + " năm"+"\"}";
// 			}
			
			if(index == 0){
// 			   tempPushLEcture += "{\"" + getDictionaryText("LECTURE_ROADMAP_COL_1") + "\":\"\",\"" 
// 		 							  + getDictionaryText("LECTURE_ROADMAP_COL_2") + "\":\"\",\"" 
// 		 							  + getDictionaryText("LECTURE_ROADMAP_COL_3") + "\":\"\",\"" 
// 		 							  + getDictionaryText("LECTURE_ROADMAP_COL_4") + "\":\"\",\"" 
// 		 							  + getDictionaryText("LECTURE_ROADMAP_COL_5") + "\":\"\",\"\":\"\",\"\":\"\",\"" 
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_1")   + "\":\""+(index+1)+"\",\"" 
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_2")   + "\":\""+item.name+"\",\""
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_3")   + "\":\""+item.phone+"\",\""
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_4")   + "\":\""+item.email+"\",\""
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_5")   + "\":\""+item.specialist+"\",\""
// 		 							  + getDictionaryText("TEACHER_SHEET_COL_6")   + "\":\""+(new Date().getYear() - new Date(item.practiceAt).getYear()) + " năm"+"\"}";
				 tempPushLEcture += "{\"" + getDictionaryText("LECTURE_ROADMAP_COL_1") + "\":\"1\",\"" 
		 							  + getDictionaryText("LECTURE_ROADMAP_COL_2") + "\":\"2\",\"" 
		 							  + getDictionaryText("LECTURE_ROADMAP_COL_3") + "\":\"3\",\"" 
		 							  + getDictionaryText("LECTURE_ROADMAP_COL_4") + "\":\"4\",\"" 
		 							  + getDictionaryText("LECTURE_ROADMAP_COL_5") + "\":\"5\",\"\":\"\",\"\":\"\",\"" 
		 							  + getDictionaryText("TEACHER_SHEET_COL_1")   + "\":\""+(index+1)+"\",\"" 
		 							  + getDictionaryText("TEACHER_SHEET_COL_2")   + "\":\""+item.name+"\",\""
		 							  + getDictionaryText("TEACHER_SHEET_COL_3")   + "\":\""+item.shortId+"\"}";
			} else {
							tempPushLEcture += ",{\"" + getDictionaryText("LECTURE_ROADMAP_COL_1") + "\":\"\",\"" 
		 							  + getDictionaryText("LECTURE_ROADMAP_COL_2") + "\":\"\",\"" 
		 							  + getDictionaryText("LECTURE_ROADMAP_COL_3") + "\":\"\",\"" 
		 							  + getDictionaryText("LECTURE_ROADMAP_COL_4") + "\":\"\",\"" 
		 							  + getDictionaryText("LECTURE_ROADMAP_COL_5") + "\":\"\",\"\":\"\",\"\":\"\",\"" 
		 							  + getDictionaryText("TEACHER_SHEET_COL_1")   + "\":\""+(index+1)+"\",\"" 
		 							  + getDictionaryText("TEACHER_SHEET_COL_2")   + "\":\""+item.name+"\",\""
		 							  + getDictionaryText("TEACHER_SHEET_COL_3")   + "\":\""+item.shortId+"\"}";
			}
			
			objectforSheet1 += tempPushLEcture;
		})
		objectforSheet1 += "]";
         sheet_1_data = JSON.parse(objectforSheet1);
		
		
		document.getElementById("btnDownloadExcel").style.display = "block";
	
        console.log(data);
        callback(data);
    }
	
	document.getElementById("btnDownloadExcel").addEventListener("click",function(e){
		e.preventDefault();
		
        let opts = [{
            sheetid: 'Sheet One',
            header: true
        }, {
            sheetid: 'Sheet Two',
            header: false
        }];
           //         [opts, [sheet_1_data, sheet_2_data]]);
		 let result = alasql('SELECT * INTO XLSX( "' + getDictionaryText("LECTURE_FILE_SAMPLE_NAME") + '.xlsx",?) FROM ?',
            [opts, [sheet_1_data]]);
	});
	
	function downloadExxcel(e){	
		
	}

    function download(text, name, type) {
        var a = document.getElementById("a");
        var file = new Blob([text], {
            type: type
        });
        a.href = URL.createObjectURL(file);
        a.download = name;
    }

    //prepare upload
    document.getElementById('upload').addEventListener('change', handleFileSelect);

    document.getElementById("idNameOfLecture").addEventListener("input", function(e) {
        if (document.getElementById("spanNameOfLectureReference").textContent != null || document.getElementById("spanNameOfLectureReference").textContent != "") {
            document.getElementById("spanNameOfLectureReference").textContent = "";
        }
        document.getElementById("spanNameOfLectureReference").textContent = e.target.value;
    });

    document.getElementById("spanNameOfLectureReference").addEventListener("touchend", function(e) {
        document.getElementById("idNameOfLecture").focus();
    });

    document.getElementById("mainTeacherSelector").addEventListener("click", function(e) {
        getChoosingSelectTeacherMain() ? setChoosingSelectTeacherMain(false) : setChoosingSelectTeacherMain(true);
    });

    document.getElementById("listMainTeacherClose").addEventListener("click", function(e) {
        getChoosingSelectTeacherMain() && setChoosingSelectTeacherMain(false);
    });

	 document.getElementById("singleOwner").addEventListener("change", function(e) {
        setChoosingMultiTeacher(false);
		 currentOwners.length = 0;
		 document.getElementById("currentListsOwner").innerHTML = "";
    });
	
	 document.getElementById("multiOwner").addEventListener("change", function(e) {
        setChoosingMultiTeacher(true);
    });
	
    function upLoadIteminListImage(file) {
        let dataLectureImgage = new FormData();
        dataLectureImgage.append('file', file);
        window.scrollTo(0, 0);
        setLoadingDataLEcture(true);
        requestToSever(
            sunQRequestType.post,
            getURLUploadImage(),
            dataLectureImgage,
            getLocalStorage(dictionary.MSEC),
            function(res) {
                setLoadingDataLEcture(false);
               if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                } else {
					//alert("réult"+myCurrentLecture.otherImgUrls);
					
					if (myCurrentLecture.otherImgUrls == null){
						myCurrentLecture.otherImgUrls = [];
					}
					myCurrentLecture.otherImgUrls.push(res.urls[0]);
					
					let parent = document.getElementById("listLEctureImg");
                	//parent.innerHTML = "";
                	
					let imgLEctureParrent = document.createElement("div");
					imgLEctureParrent.className = "manage-section-infomation-right-item";
					
                	let imgTempLEcture  = document.createElement("img");
                	imgTempLEcture.id = "lecture-img-" + myCurrentLecture.otherImgUrls.length + "" ;
                	imgTempLEcture.className = "manage-section-infomation-right-item-img";
                	imgTempLEcture.src = getHomeURL()+res.urls[0];
                				//console.log("add",parent.innerHTML);
//                 let imgTempLEcture = "<img id=\"lecture-img-" +getCurrentACtion() == dictionaryKey.editStatus ? myCurrentLecture.otherImgUrls.length : "" + "\"  class=\"manage-section-infomation-right-item\" src=\"" + res.urls[0] + "\" >";
//                 				//console.log("imgTempLEcture",imgTempLEcture);
//                 	let parentImgList = imgTempLEcture + parent.innerHTML;
                	
					let imgLEctureClose = document.createElement("div");
								imgLEctureClose.className = "manage-section-infomation-right-list-image-drop";
								imgLEctureClose.innerHTML = "x";
								imgLEctureClose.addEventListener("click",function(){
									imgTempLEcture.remove();
									imgLEctureClose.remove();
									myCurrentLecture.otherImgUrls.splice(index,1);
								})
                                /*imgTempLEcture = imgTempLEcture + "<div class=>x</div><img id=\"lecture-img-" + (index + 1) + "\"  class=\"manage-section-infomation-right-item\" src=\"" + getHomeURL() + item + "\" >";*/
					imgLEctureParrent.appendChild(imgLEctureClose);
					imgLEctureParrent.appendChild(imgTempLEcture);
					parent.appendChild(imgLEctureParrent);
				}
            },
            function(err) {
                //setLoadingDataLEcture(dictionaryKey.ERR);
				 setLoadingDataLEcture(false);
                console.log(dictionaryKey.ERR_INFO, err);
                SunQAlert()
                    .position('center')
                    .title("Tải ảnh thất bại "+err)
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

    function upLoadDEsImage(file) {
        let dataLectureImgage = new FormData();
        dataLectureImgage.append('file', file);
        //window.scrollTo(0, 0);
        setLoadingDataLEcture(true);
        requestToSever(
            sunQRequestType.post,
            getURLUploadImage(),
            dataLectureImgage,
            getLocalStorage(dictionary.MSEC),
            function(res) {
                setLoadingDataLEcture(false);
              if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                } else {
					 myCurrentLecture.descriptionImgUrl = res.urls[0];
						  //alert("loi"+JSON.stringify(res)); 
						   }
            },
            function(err) {
                setLoadingDataLEcture(false);
                setLoadingDataLEcture(dictionaryKey.ERR);
                console.log(dictionaryKey.ERR_INFO, err);
                SunQAlert()
                    .position('center')
                    .title("Tải ảnh thất bại "+err)
                    .type('error')
                    .confirmButtonColor("#3B4EDC")
                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                    .callback((result) => {
                      //  webpageRedirect(window.location.href);
                    })
                    .show();
            },
			true
        );
    }


    document.getElementById("uploadDescriptionURL").addEventListener("change", function(evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;
        //upLoadImage(tgt.files[0]);
        // FileReader support
        // console.log("xxxxxxzz");
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function() {
                document.getElementById("lecture-main-img").src = fr.result;
                upLoadDEsImage(files[0]);
            }
            fr.readAsDataURL(files[0]);
        }

        // Not supported
        else {
            // fallback -- perhaps submit the input to an iframe and temporarily store
            // them on the server until the user's session ends.
        }
    });


    document.getElementById("uploadImgLectureURLL").addEventListener("change", function(evt) {
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

    document.getElementById("idNameOfLecture").addEventListener("input", function(e) {
        myCurrentLecture.title = e.target.value;
    });

    document.getElementById("idAgeOfLectureFrom").addEventListener("change", function(e) {
        myCurrentLecture.minTargetAge = e.target.value;
    });
    document.getElementById("idAgeOfLectureTo").addEventListener("change", function(e) {
        myCurrentLecture.maxTargetAge = e.target.value;
    });
    document.getElementById("idTypeOfLecture").addEventListener("input", function(e) {
        myCurrentLecture.courseType = e.target.value;
    });
//     document.getElementById("lectureDetailTextArea").addEventListener("input", function(e) {
//         myCurrentLecture.description = e.target.value;
//     });
     
	   document.getElementById("lectureSubDetailTextArea").addEventListener("input", function(e) {
        myCurrentLecture.shortDescription = e.target.value;
    });

    //submit form
    document.getElementById("lectureSubmit").addEventListener("click", function(e) {
        e.preventDefault();
		
		delete myCurrentLecture.createAt;
         delete myCurrentLecture.updateAt;
         delete myCurrentLecture.id;
         delete myCurrentLecture.owners;
		
		
		if(getCurrentACtion() == dictionaryKey.editStatus){
		   delete myCurrentLecture.accountGetAdvices
		   }
						if(myCurrentLecture.coursePlans){
						   	if (myCurrentLecture.coursePlans.length > 0){
									myCurrentLecture.coursePlans.forEach((item,index)=>{
										delete item.courseId ;
										delete item.createAt ;
										delete item.updateAt;
										delete item.teacher;
										delete item.supporter;
									});
								}
						   }
		
        let titlleRequestLecture = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.REQUEST_ADD : dictionaryKey.REQUEST_EDIT + dictionaryKey.TEACHER_NAME;
		myCurrentLecture.ownerIds = currentOwners;
		myCurrentLecture.description = lectureDescription.getData();
		
		console.log("push",myCurrentLecture);
 				myCurrentLecture.maxTargetAge = Number.parseInt(myCurrentLecture.maxTargetAge);
 				myCurrentLecture.minTargetAge = Number.parseInt(myCurrentLecture.minTargetAge);
		if(myCurrentLecture.otherImgUrls == null){
			window.scrollTo(0,0);
			 SunQAlert()
                                .position('center')
                                .title(dictionaryKey.WRONG_IMG_LECTURE_LIST)
                                .type('error')
                                .confirmButtonColor("#3B4EDC")
                                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                .callback((result) => {
                                    
                                })
                                .show();
		} else if(myCurrentLecture.otherImgUrls.length == 0){
			window.scrollTo(0,0);
				  SunQAlert()
                                .position('center')
                                .title(dictionaryKey.WRONG_IMG_LECTURE_LIST)
                                .type('error')
                                .confirmButtonColor("#3B4EDC")
                                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                .callback((result) => {
                                    
                                })
                                .show();
				  }
		else if (myCurrentLecture.descriptionImgUrl == "" || myCurrentLecture.descriptionImgUrl == null){
				 SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.WRONG_IMG_LECTURE_DEC)
                                    .type('error')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                    .callback((result) => {
                                       
                                    })
                                    .show();
				 }
				 else if (myCurrentLecture.descriptionImgUrl == "" || myCurrentLecture.descriptionImgUrl == null){
			SunQAlert()
                                .position('center')
                                .title("")
                                .type('error')
                                .confirmButtonColor("#3B4EDC")
                                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                .callback((result) => {	
                                    //webpageRedirect(window.location.href);
                                })
                                .show();
		}  
		else if(currentOwners.length == 0){
			window.scrollTo(0,0);
				  SunQAlert()
                                .position('center')
                                .title(dictionaryKey.WRONG_OWNER)
                                .type('error')
                                .confirmButtonColor("#3B4EDC")
                                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                .callback((result) => {
                                    
                                })
                                .show();
				  }
		else {
        SunQAlert()
            .position('center')
            .title(titlleRequestLecture)
            .type('success')
            .confirmButtonColor("#3B4EDC")
            .cancelButtonColor("#a8b1f5")
            .confirmButtonText(dictionaryKey.AGREE)
            .cancelButtonText(dictionaryKey.CANCEL)
            .callback((result) => {
                if (result.value) {
                    window.scrollTo(0, 0);
                    let tempmyCurrentLecture = myCurrentLecture;
                    delete tempmyCurrentLecture.createAt;
                    delete tempmyCurrentLecture.updateAt;
                    delete tempmyCurrentLecture.id;
                    delete tempmyCurrentLecture.owner;
                    if (getCurrentACtion() == dictionaryKey.editStatus) {

                    }

                    //delete tempmyCurrentLecture.coursePlans;
                    console.log(tempmyCurrentLecture);
                    setLoadingDataLEcture(true);
                    requestToSever(
                        getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                        getCurrentACtion() == dictionaryKey.editStatus ? getURLecture() + "/" + getCurrentEdit() : getURLecture(),
                        tempmyCurrentLecture,
                        getLocalStorage(dictionary.MSEC),
                        function(res) {
                            setLoadingDataLEcture(false);
                            if (res.code === networkCode.success) {
                               // console.log("myCurrentLecture", myCurrentLecture);
                                let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.LECTURE_EDIT_SUCCESS : dictionaryKey.LECTURE_ADD_SUCCESS;
                                SunQAlert()
                                    .position('center')
                                    .title(sunqalertfailed)
                                    .type('success')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.AGREE)
                                    .callback((result) => {
                                        webpageRedirect(getAdminHomeURL() + "?mode=offline&page=list-lecture");
                                    })
                                    .show();
                            } else if (res.code === networkCode.sessionTimeOut) {
                                makeAlertRedirect();
                            } else {
								SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.MISS_FIELD+" "+JSON.stringify(res))
                                    .type('error')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                    .callback((result) => {
                                       
                                    })
                                    .show();
							}
                        },
                        function(err) {
                            setLoadingDataLEcture(dictionaryKey.ERR);
                            console.log(dictionaryKey.ERR_INFO, err);
                            let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.LECTURE_EDIT_FAILED : dictionaryKey.LECTURE_ADD_FAILED;
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
                        }
                    );
                }
            })
            .show();
	}
    });
</script>