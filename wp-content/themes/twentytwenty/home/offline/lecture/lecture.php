<?php
?>

<div class="manage-contain">
    <!-- thông tin khóa học, độ tuổi, ảnh -->
    <div class="manage-section-infomation">
        <div class="manage-section-infomation-left">
            <div class="manage-section-infomation-left-item">
				<span><?php echo $GLOBALS["LECTURE_NAME_INPUT"]; ?></span>
				<input id="idNameOfLecture" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["LECTURE_NAME_INPUT_PLACEHOLDER"]; ?>'>
            </div>

            <div class="manage-section-infomation-left-item">
				<span><?php echo $GLOBALS["LECTURE_AGE_INPUT"]; ?></span>
				<input id="idAgeOfLecture" name="lecture_age" type="text" placeholder='<?php echo $GLOBALS["LECTURE_AGE_INPUT_PLACEHOLDER"]; ?>'>
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
            <div class="manage-section-infomation-right-list-image">

            </div>
        </div>
    </div>

    <hr class="lecture-hr">

    <!-- chi tiết khóa học , ảnh -->
    <div class="manage-section-detail">
        <div class="manage-section-detail-left">
            <div class="manage-section-detail-left-item">
                <div class="manage-section-detail-left-item-avatar">
					
                </div>
                <div class="manage-section-detail-left-item-info">
					<span>213</span>
					<span>689</span>
					<hr  class="lecture-teacher-hr">
					<span><b>zxc</b>zxc</span>
					<span><b>cvb</b>cvb</span>
					<span><b>bncv</b>bnm</span>
					<span><b>bncv</b>bnm</span>
					<span><b>bncv</b>bnm</span>
					<span><b>bncv</b>bnm</span>
                </div>
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

            </div>
        </div>
    </div>

    <hr class="lecture-hr">

    <!-- lộ trình khóa học -->
    <div class="manage-section-road-map" id="exceltable">
        <div class="manage-section-road-map-upload">
            <div class="manage-section-road-map-upload-contain" id="uploadcontain">
                <div class="manage-section-road-map-upload-progress">

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

</div>

<script src="wp-content/themes/twentytwenty/assets/js/jszip.js"></script>
<script src="wp-content/themes/twentytwenty/assets/js/xlsx.js"></script>

<script src="wp-content/themes/twentytwenty/assets/js/alasql.min.js"></script>
<script src="wp-content/themes/twentytwenty/assets/js/xlsx.core.min.js"></script>

<script>
    function readExcelFile(jsonInput) {
		let arrayTitleScheduleLecture = ["manage-section-road-map-time-real-table-number", "manage-section-road-map-time-real-table-contain", "manage-section-road-map-time-real-table-time", "manage-section-road-map-time-real-table-teacher", "manage-section-road-map-time-real-table-sidekick"];
        document.getElementById("tableLecture").style.display = "flex";
        let parentTableSchedulde = document.getElementById("tableLectureInside");

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

	//prepare upload
    document.getElementById('upload').addEventListener('change', handleFileSelect);

    // window.saveFile = function saveFile() {
    //     var sheet_1_data = [{ Col_One: 1, Col_Two: 11 }, { Col_One: 2, Col_Two: 22 }];
    //     var sheet_2_data = [{ Col_One: 10, Col_Two: 110 }, { Col_One: 20, Col_Two: 220 }];
    //     var opts = [{ sheetid: 'Sheet One', header: true }, { sheetid: 'Sheet Two', header: false }];
    //     var result = alasql('SELECT * INTO XLSX("sample_file.xlsx",?) FROM ?',
    //         [opts, [sheet_1_data, sheet_2_data]]);
    // }

    function getFileExcel() {
        //let objectforSheet1 = '{Buổi:"1",Nội dung:"2",Thời gian:"3",Giảng viên:"4",Trợ giảng:"5"}';
		 let objectforSheet1 = '[{"' + getDictionaryText("LECTURE_ROADMAP_COL_1") + '":"1","' + getDictionaryText("LECTURE_ROADMAP_COL_2") + '":"2","' + getDictionaryText("LECTURE_ROADMAP_COL_3") + '":"3","' + getDictionaryText("LECTURE_ROADMAP_COL_4") + '":"4","' + getDictionaryText("LECTURE_ROADMAP_COL_5") + '":"5"}]';
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
	
	document.getElementById("idNameOfLecture").addEventListener("keydown",function(e){
		if (document.getElementById("spanNameOfLectureReference").textContent != null || document.getElementById("spanNameOfLectureReference").textContent != ""){
			document.getElementById("spanNameOfLectureReference").textContent = "";
			}
		document.getElementById("spanNameOfLectureReference").textContent = e.target.value;
	});
	document.getElementById("spanNameOfLectureReference").addEventListener("touchend",function(e){
		document.getElementById("idNameOfLecture").focus();
	});
</script>