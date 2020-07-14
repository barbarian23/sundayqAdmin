<?php
?>

<div class="manage-contain">
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
				<span><?php echo $GLOBALS["LECTURE_NAME_INPUT"]; ?></span>
				<input id="idNameOfLecture" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["LECTURE_NAME_INPUT_PLACEHOLDER"]; ?>'>
            </div>

            <div class="manage-section-infomation-left-item">
				<span><?php echo $GLOBALS["LECTURE_AGE_INPUT_FROM"]; ?></span>
				<input id="idAgeOfLectureFrom" name="lecture_age" type="text" placeholder='<?php echo $GLOBALS["LECTURE_AGE_INPUT_PLACEHOLDER"]; ?>'>
            </div>

			  <div class="manage-section-infomation-left-item">
				<span><?php echo $GLOBALS["LECTURE_AGE_INPUT_TO"]; ?></span>
				<input id="idAgeOfLectureTo" name="lecture_age" type="text" placeholder='<?php echo $GLOBALS["LECTURE_AGE_INPUT_PLACEHOLDER"]; ?>'>
            </div>
			
            <div class="manage-section-infomation-left-item">
				<span><?php echo $GLOBALS["LECTURE_TYPE_INPUT"]; ?></span>
				<input id="idTypeOfLecture" name="lecture_type" type="text" placeholder='<?php echo $GLOBALS["LECTURE_TYPE_INPUT_PLACEHOLDER"]; ?>'>
            </div>
        </div>
        <div class="manage-section-infomation-right">
            <div class="manage-section-infomation-right-title">
				<span id="spanNameOfLectureReference"></span>
            </div>
            <div class="manage-section-infomation-right-list-image" id="listLEctureImg">
<!-- 				<img id="lecture-list-img" class="manage-section-infomation-right-item" src='<?php echo $GLOBALS["URI_ADD_NEW"]; ?>'> -->
				<label class="manage-section-infomation-right-item" for="uploadImgLectureURL">
					<img id="lecture-img-0" class="manage-section-infomation-right-item-img" src='<?php echo $GLOBALS["URI_ADD_NEW"]; ?>'>
					<input type="file" id="uploadImgLectureURL" name="uploadImgLectureURL">
				</label>
            </div>
        </div>
    </div>

    <hr class="lecture-hr">

    <!-- chi tiết khóa học , ảnh -->
    <div class="manage-section-detail">
        <div class="manage-section-detail-left" id="mainTeacherSelector">
<span>Giáo viên chủ nhiệm</span>
            <div class="manage-section-detail-left-item">
                <img id="currentSelectImg" class="manage-section-detail-left-item-avatar">
					
                
                <div class="manage-section-detail-left-item-info">
					<span class="manage-section-detail-left-item-info-name" id="currentSelectName"></span>
					<span class="manage-section-detail-left-item-info-university" id="currentSelectUniversity"></span>
					<hr  class="lecture-teacher-hr">
					<span><b><?php echo $GLOBALS["TEACHER_LESSION_SPECIALIST"]; ?></b><span id="currentSelectSpecial"></span></span>
					<span><b><?php echo $GLOBALS["TEACHER_LESSION_EXP"]; ?></b><span id="currentSelectExp"></span></span>
					<span><b><?php echo $GLOBALS["TEACHER_LESSION_DEGREE"]; ?></b><span id="currentSelectDegree"><?php echo $GLOBALS["LECTURE_TEACHER_TO_STUDENT"]; ?></span></span>
                </div>
            </div>
        </div>
		
		<!-- selector teacher -->
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
		
        <div class="manage-section-detail-midlle">
			<div class="manage-section-detail-midlle-span">
				<span><?php echo $GLOBALS["LECTURE_DETAIL"]; ?></span>
			</div>
            <div class="manage-section-detail-midlle-item">
				<textarea id="lectureDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["LECTURE_DETAIL_PLACEHOLDER"]; ?>'></textarea>
            </div>
        </div>
        <div class="manage-section-detail-right">
			<div class="manage-section-detail-right-span">
				<span><?php echo $GLOBALS["LECTURE_MAIN_IMAGE"]; ?></span>
			</div>
            <div class="manage-section-detail-right-item">
				<label class="manage-section-detail-right-item" for="uploadDescriptionURL">
					<img id="lecture-main-img" class="manage-section-detail-right-item-img" src='<?php echo $GLOBALS["URI_ADD_NEW"]; ?>'>
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
            <button class="manage-section-road-map-upload-button" onclick="getFileExcel()"><?php echo $GLOBALS["LECTURE_DOWNLOAD_SAMPLE"]; ?></button>
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

    <!--  đăng kí nhận tư vấn -->
    <div class="manage-section-helpdesk" id="tableRegister">
        <hr class="lecture-hr">
        <div class="manage-section-helpdesk-title-table">
            <span><?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT"]; ?></span>
        </div>
        <div class="manage-section-helpdesk-table">
            <table class="manage-section-helpdesk-real-table" id="tableRegisterInside">
<!--                 <tr>
                    <th class="manage-section-helpdesk-real-table-name">
                        <span><?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT_1"]; ?></span>
                    </th>
                    <th class="manage-section-helpdesk-real-table-phone">
                        <span><?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT_2"]; ?></span>
                    </th>
                    <th class="manage-section-road-map-time-real-table-email">
                        <span><?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT_3"]; ?></span>
                    </th>
                    <th class="manage-section-road-map-time-real-table-note">
                        <span><?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT_4"]; ?></span>
                    </th>
                </tr>
                <tr>
                    <td class="manage-section-helpdesk-real-table-name">
                        Buổi 1
                    </td>
                    <td class="manage-section-helpdesk-real-table-phone">
                        Hoạt động ngoài trời
                    </td>
                    <td class="manage-section-road-map-time-real-table-email">
                        9:30 am
                    </td>
                    <td class="manage-section-road-map-time-real-table-note">
                        Nguyễn Văn A
                    </td>
                </tr> -->
            </table>
        </div>
    </div>

	<div class="manage-content-bottom-action">
		<button id="lectureSubmit">
			<?php echo $GLOBALS["LECTURE_SUBMIT"] ; ?>
		</button>
	</div>
</div>

<script src="wp-content/themes/twentytwenty/assets/js/jszip.js"></script>
<script src="wp-content/themes/twentytwenty/assets/js/xlsx.js"></script>

<script src="wp-content/themes/twentytwenty/assets/js/alasql.min.js"></script>
<script src="wp-content/themes/twentytwenty/assets/js/xlsx.core.min.js"></script>

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
	var myCurrentLecture;
	window.onload = function(){
		
		 mobiscroll.number('#idAgeOfLectureFrom', {
			theme: 'ios',
			themeVariant: 'light',
			layout: 'fixed',
			value:1,
			step: 1,
			min: 3,
			max: 15,
			display: 'bubble',
		});
		
		 mobiscroll.number('#idAgeOfLectureTo', {
			theme: 'ios',
			themeVariant: 'light',
			layout: 'fixed',
			value:1,
			step: 1,
			min: 3,
			max: 15,
			display: 'bubble',
		});
		
		
		setFetchingTeacherLecture(true);
		requestToSever(
		sunQRequestType.get,
		getURLAllTeacher(),
		null,
		getData(dictionary.MSEC),
		function(res){
			console.log(res);
			setFetchingTeacherLecture(false);
			if(res.code === networkCode.success){
				if (res.data == null || res.data.length == 0){
					setLectureGetTeacherThanZero(false);
				} else {
					emptyTableListTeacherLecture();
					createListTeacherLecture(res.data);
				}
			} else if (res.code === networkCode.sessionTimeOut){
					makeAlertRedirect();
			}
		},
		function(err){
			
			setFetchingTeacherLecture(false);
			setIsGetLectureTeacherFromServerSuccess(false);
			console.log(dictionaryKey.ERR_INFO,err);
// 			if(res){
// 			if (res.code === networkCode.sessionTimeOut){
// 					makeAlertRedirect();
// 			} else {
// 				//console.log("123cxzczxc");
				
// 			}
//			}
		}
		);
		
		clearListImageAndDetailImage();
		//nếu là edit thì load dữ liệu lên
		if(getCurrentACtion() == dictionaryKey.editStatus){
			
			//fetch từ server
			setLoadingDataLEcture(true);
			requestToSever(
				sunQRequestType.get,
				getURLecture()+"/"+getCurrentEdit(),
				null,
				getLocalStorage(dictionary.MSEC),
				function(res){
					setLoadingDataLEcture(false);
					if(res.code === networkCode.success){
						myCurrentLecture = res.data;
						console.log("myCurrentLecture",myCurrentLecture);
						document.getElementById("idNameOfLecture").value = myCurrentLecture.title;
						document.getElementById("spanNameOfLectureReference").textContent = myCurrentLecture.title;
						document.getElementById("idAgeOfLectureFrom").value = myCurrentLecture.minTargetAge;
						document.getElementById("idAgeOfLectureTo").value = myCurrentLecture.maxTargetAge;
						document.getElementById("idTypeOfLecture").value = myCurrentLecture.courseType;
						document.getElementById("lectureDetailTextArea").textContent = myCurrentLecture.description;
						document.getElementById("lecture-main-img").src = getHomeURL()+myCurrentLecture.descriptionImgUrl;
						
						let parent = document.getElementById("listLEctureImg");
						let imgTempLEcture = "";
						let parentImgList = parent.innerHTML;
						if(myCurrentLecture.otherImgUrls != null){
						myCurrentLecture.otherImgUrls.forEach((item,index)=>{			
							imgTempLEcture = imgTempLEcture + "<img id=\"lecture-img-" + (index+1) + "\"  class=\"manage-section-infomation-right-item\" src=\"" + getHomeURL()+item + "\" >";
						});
					}

						parent.innerHTML = imgTempLEcture + parent.innerHTML;
						
					} else if (res.code === networkCode.sessionTimeOut){
							makeAlertRedirect();
					}
				},
				function(err){
					setLoadingDataLEcture(dictionaryKey.ERR);
					console.log(dictionaryKey.ERR_INFO,err);
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
			
		}
		
	}
	
    function readExcelFile(jsonInput) {
		let arrayTitleScheduleLecture = ["manage-section-road-map-time-real-table-number", "manage-section-road-map-time-real-table-contain", "manage-section-road-map-time-real-table-time", "manage-section-road-map-time-real-table-teacher", "manage-section-road-map-time-real-table-sidekick"];
        document.getElementById("tableLecture").style.display = "flex";
        let parentTableSchedulde = document.getElementById("tableLectureInside");
		parentTableSchedulde.innerHTML = "";
        jsonInput.forEach(function(item, index) {
            let trInsideSchedule = document.createElement("tr");
            if (index == 0) {
				let countInsideSchedule = 0;
                for (let prop in item) {
                    if (Object.prototype.hasOwnProperty.call(item, prop)) {
                        let thInsideScheduleTr = document.createElement("th");
                        thInsideScheduleTr.className = arrayTitleScheduleLecture[countInsideSchedule++];
                        thInsideScheduleTr.innerHTML = prop;
                        trInsideSchedule.appendChild(thInsideScheduleTr);
                    }
                }
				parentTableSchedulde.appendChild(trInsideSchedule);
            }
        });

        jsonInput.forEach(function(item, index) {
            let trInsideSchedule = document.createElement("tr");
			let countInsideSchedule = 0;
            for (let prop in item) {
                if (Object.prototype.hasOwnProperty.call(item, prop)) {
					
                    let tdInsideScheduleTr = document.createElement("td");
                    tdInsideScheduleTr.className = arrayTitleScheduleLecture[countInsideSchedule++];
                    tdInsideScheduleTr.innerHTML = item[prop];
                    trInsideSchedule.appendChild(tdInsideScheduleTr);
                }
            }
			if (getCurrentACtion() == dictionaryKey.editStatus){
					myCurrentLecture.coursePlans.dayIndex = index;
					myCurrentLecture.coursePlans.title = index;
					myCurrentLecture.coursePlans.description = index;
					myCurrentLecture.coursePlans.time = index;
					//map
					myCurrentLecture.coursePlans.teacherId = index;
					myCurrentLecture.coursePlans.supporterId = index;
			}
            parentTableSchedulde.appendChild(trInsideSchedule);
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
                console.log("index", index);
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
		document.getElementById("fileSelected").innerHTML = evt.target.value.split( '\\' ).pop();
		document.getElementById("fileSelectedAbsolutePath").style.display = "block";
		document.getElementById("fileSelectedAbsolutePath").innerHTML = evt.target.value.split( '\\' );
        excel.parseExcel(files[0], "ExcelContent");
    }

    // window.saveFile = function saveFile() {
    //     var sheet_1_data = [{ Col_One: 1, Col_Two: 11 }, { Col_One: 2, Col_Two: 22 }];
    //     var sheet_2_data = [{ Col_One: 10, Col_Two: 110 }, { Col_One: 20, Col_Two: 220 }];
    //     var opts = [{ sheetid: 'Sheet One', header: true }, { sheetid: 'Sheet Two', header: false }];
    //     var result = alasql('SELECT * INTO XLSX("sample_file.xlsx",?) FROM ?',
    //         [opts, [sheet_1_data, sheet_2_data]]);
    // }

    function getFileExcel() {
          let objectforSheet1 = "[{\""+ getDictionaryText("LECTURE_ROADMAP_COL_1") + "\":\"1\",\"" + getDictionaryText("LECTURE_ROADMAP_COL_2") + "\":\"2\",\"" + getDictionaryText("LECTURE_ROADMAP_COL_3") +  "\":\"3\",\"" + getDictionaryText("LECTURE_ROADMAP_COL_4") +  "\":\"4\",\"" + getDictionaryText("LECTURE_ROADMAP_COL_5") +  "\":\"5\"}]";
		//let  objectforSheet1= "[{ \"Col_One\": \"10\", \"Col_Two\": \"110\" }, { \"Col_One\": \"20\", \"Col_Two\": \"220\" }]";
        let sheet_1_data = JSON.parse(objectforSheet1);
        let sheet_2_data = [{ Col_One: 10, Col_Two: 110 }, { Col_One: 20, Col_Two: 220 }];
        let opts = [{
            sheetid: 'Sheet One',
            header: true
        }, {
            sheetid: 'Sheet Two',
            header: false
        }];
        let result = alasql('SELECT * INTO XLSX( "' + getDictionaryText("LECTURE_FILE_SAMPLE_NAME") + '.xlsx",?) FROM ?',
            [opts, [sheet_1_data]]);
        //[opts, [sheet_1_data, sheet_2_data]]);
    }
	
	function download(text, name, type) {
	  var a = document.getElementById("a");
	  var file = new Blob([text], {type: type});
	  a.href = URL.createObjectURL(file);
	  a.download = name;
	}
	
	//prepare upload
		document.getElementById('upload').addEventListener('change', handleFileSelect);

		document.getElementById("idNameOfLecture").addEventListener("keydown",function(e){
			if (document.getElementById("spanNameOfLectureReference").textContent != null || document.getElementById("spanNameOfLectureReference").textContent != ""){
				document.getElementById("spanNameOfLectureReference").textContent = "";
				}
			document.getElementById("spanNameOfLectureReference").textContent = e.target.value;
		});

		document.getElementById("spanNameOfLectureReference").addEventListener("touchend",function(e){
			document.getElementById("idNameOfLecture").focus();
		});

		document.getElementById("mainTeacherSelector").addEventListener("click",function(e){
			getChoosingSelectTeacherMain() ? setChoosingSelectTeacherMain(false) : setChoosingSelectTeacherMain(true);
		});

		document.getElementById("listMainTeacherClose").addEventListener("click",function(e){
			getChoosingSelectTeacherMain() && setChoosingSelectTeacherMain(false);
		});
	
	function upLoadIteminListImage(file){
		let dataLectureImgage= new FormData();
		dataLectureImgage.append('file', file);
		
		setLoadingDataLEcture(true);
			requestToSever(
				sunQRequestType.post,
				getURLUploadImage(),
				dataLectureImgage,
				getLocalStorage(dictionary.MSEC),
				function(res){
					setLoadingDataLEcture(false);
					if(res.code === networkCode.success){
						myCurrentTeacher.otherImgUrls.push(res.data.urls[0]);
					} else if (res.code === networkCode.sessionTimeOut){
							makeAlertRedirect();
					}
				},
				function(err){
					setLoadingDataLEcture(dictionaryKey.ERR);
					console.log(dictionaryKey.ERR_INFO,err);
					SunQAlert()
							.position('center')
							.title("Tải ảnh thất bại")
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
	
	function upLoadDEsImage(file){
		let dataLectureImgage= new FormData();
		dataLectureImgage.append('file', file);
		
		setLoadingDataLEcture(true);
			requestToSever(
				sunQRequestType.post,
				getURLUploadImage(),
				dataLectureImgage,
				getLocalStorage(dictionary.MSEC),
				function(res){
					setLoadingDataLEcture(false);
					if(res.code === networkCode.success){
						myCurrentTeacher.descriptionImgUrl = res.data.urls[0];
					} else if (res.code === networkCode.sessionTimeOut){
							makeAlertRedirect();
					}
				},
				function(err){
					setLoadingDataLEcture(dictionaryKey.ERR);
					console.log(dictionaryKey.ERR_INFO,err);
					SunQAlert()
							.position('center')
							.title("Tải ảnh thất bại")
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
	
	
	document.getElementById("uploadDescriptionURL").addEventListener("change",function(evt){
		var tgt = evt.target || window.event.srcElement,
			files = tgt.files;
		//upLoadImage(tgt.files[0]);
		// FileReader support
		// console.log("xxxxxxzz");
		if (FileReader && files && files.length) {
			var fr = new FileReader();
			fr.onload = function () {
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
	
	
	document.getElementById("uploadImgLectureURL").addEventListener("change",function(evt){
		var tgt = evt.target || window.event.srcElement,
			files = tgt.files;
		//upLoadImage(tgt.files[0]);
		// FileReader support
		//console.log("xxxxxxzz");
		if (FileReader && files && files.length) {
			var fr = new FileReader();
			fr.onload = function () {
			
				let parent = document.getElementById("listLEctureImg");
				
				let imgTempLEcture = "<img id=\"lecture-img-" +getCurrentACtion() == dictionaryKey.editStatus ? myCurrentLecture.otherImgUrls.length : "" + "\"  class=\"manage-section-infomation-right-item\" src=\"" + fr.result + "\" >";
				console.log("imgTempLEcture",imgTempLEcture);
				let parentImgList = imgTempLEcture + parent.innerHTML;
				
				parent.innerHTML = parentImgList;
				
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
	
	document.getElementById("idNameOfLecture").addEventListener("keydown",function(e){
		myCurrentLecture.title = e.target.value;
	}); 

	document.getElementById("idAgeOfLectureFrom").addEventListener("change",function(e){
		myCurrentLecture.maxTargetAge = e.target.value;
	});
	document.getElementById("idAgeOfLectureTo").addEventListener("change",function(e){
		myCurrentLecture.minTargetAge = e.target.value;
	});
	document.getElementById("idTypeOfLecture").addEventListener("keydown",function(e){
		myCurrentLecture.courseType = e.target.value;
	});
	document.getElementById("lectureDetailTextArea").addEventListener("keydown",function(e){
		myCurrentLecture.description = e.target.value;
	});
	
	//submit form
	document.getElementById("lectureSubmit").addEventListener("click",function(){
		let tempmyCurrentLecture = myCurrentLecture;
		delete tempmyCurrentLecture.createAt;
		delete tempmyCurrentLecture.updateAt;
		delete tempmyCurrentLecture.id;
delete tempmyCurrentLecture.owner;
		if(getCurrentACtion() == dictionaryKey.editStatus){
			
		}
		
		//delete tempmyCurrentLecture.coursePlans;
console.log(tempmyCurrentLecture);
		setLoadingDataLEcture(true);
			requestToSever(
				getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
				getCurrentACtion() == dictionaryKey.editStatus ? getURLecture()+"/"+getCurrentEdit() : getURLecture(),
				tempmyCurrentLecture,
				getLocalStorage(dictionary.MSEC),
				function(res){
					setLoadingDataLEcture(false);
					if(res.code === networkCode.success){
						console.log("myCurrentLecture",myCurrentLecture);
						let sunqalertfailed= getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.LECTURE_EDIT_SUCCESS : dictionaryKey.LECTURE_ADD_SUCCESS ;
					SunQAlert()
							.position('center')
							.title(sunqalertfailed)
							.type('success')
							.confirmButtonColor("#3B4EDC")
							.confirmButtonText(dictionaryKey.AGREE)
							.callback((result) => {
									webpageRedirect("http://admin.sundayq.com/?mode=offline&page=list-lecture");
							   })
							 .show();
					} else if (res.code === networkCode.sessionTimeOut){
							makeAlertRedirect();
					}
				},
				function(err){
					setLoadingDataLEcture(dictionaryKey.ERR);
					console.log(dictionaryKey.ERR_INFO,err);
					let sunqalertfailed= getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.LECTURE_EDIT_FAILED : dictionaryKey.LECTURE_ADD_FAILED ;
					SunQAlert()
							.position('center')
							.title(sunqalertfailed)
							.type('error')
							.confirmButtonColor("#3B4EDC")
							.confirmButtonText(dictionaryKey.TRY_AGAIN)
							.callback((result) => {
									webpageRedirect(window.location.href);
							   })
							 .show();
				}
			);
	});
</script>
