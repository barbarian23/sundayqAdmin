<?php 
?>

    <div class="manage-contain">
        <!-- thông tin khóa học, độ tuổi, ảnh -->
        <div class="manage-section-infomation">
            <div class="manage-section-infomation-left">
                <div class="manage-section-infomation-left-item">

                </div>

                <div class="manage-section-infomation-left-item">

                </div>

                <div class="manage-section-infomation-left-item">

                </div>
            </div>
            <div class="manage-section-infomation-right">
                <div class="manage-section-infomation-right-title">

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

                    </div>
                </div>
            </div>
            <div class="manage-section-detail-midlle">
                <div class="manage-section-detail-midlle-item">

                </div>
            </div>
            <div class="manage-section-detail-right">
                <div class="manage-section-detail-right-item">

                </div>
            </div>
        </div>

		<hr class="lecture-hr">
		
        <!-- lộ trình khóa học -->
        <div class="manage-section-road-map" id="exceltable">
            <button onclick="saveFile()"><?php echo $GLOBALS["LECTURE_DOWNLOAD_SAMPLE"]; ?></button>
			<form class="manage-section-road-map-upload-download">
				<input id="upload" type=file name="files[]" aria-label="">
				<span class="file-custom"><?php echo $GLOBALS["LECTURE_UPLOAD_PLAN_PLACEHOLDER"]; ?></span>
				<p class="manage-section-road-map-upload-download-file-return" id="fileSelected">2vcxvxcvcxvcx</p>
				<p class="manage-section-road-map-upload-download-file-return" id="fileSelectedAbsolutePath">bnmbnmbnm</p>
			</form>
            <div class="manage-section-road-map-title-table">
                <span><?php echo $GLOBALS["LECTURE_ROADMAP_LECTURE"]; ?></span>
            </div>
            <div class="manage-section-road-map-time-table">
                <table class="manage-section-road-map-time-real-table">
                    <tr>
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
                    </tr>
                </table>
            </div>
        </div>

        <!--  đăng kí nhận tư vấn -->
        <div class="manage-section-helpdesk">
            <div class="manage-section-helpdesk-title-table">
                <span><?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT"]; ?></span>
            </div>
            <div class="manage-section-helpdesk-table">
                <table class="manage-section-helpdesk-real-table">
                    <tr>
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
                    </tr>
                </table>
            </div>
        </div>

    </div>

<script src="wp-content/themes/twentytwenty/assets/js/jszip.js"></script>
<script src="wp-content/themes/twentytwenty/assets/js/xlsx.js"></script>

<script src="wp-content/themes/twentytwenty/assets/js/alasql.min.js"></script>
<script src="wp-content/themes/twentytwenty/assets/js/xlsx.core.min.js"></script>

<script>

    function excelToJSON() {
        let excelInstance = Object.create(excelToJSON.prototype);
        return excelInstance;
    };

    excelToJSON.prototype.parseExcel = function (file, mId) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var data = e.target.result;
            var workbook = XLSX.read(data, {
                type: 'binary'
            });
            workbook.SheetNames.forEach(function (sheetName) {
                var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                var json_object = JSON.stringify(XL_row_object);
                console.log(JSON.parse(json_object));
                document.getElementById(mId).innerHTML = json_object;
            })
        };

        reader.onerror = function (ex) {
            console.log("err", ex);
        };

        reader.readAsBinaryString(file);
    }

    function handleFileSelect(evt) {
        let excel = excelToJSON();
        var files = evt.target.files;
        excel.parseExcel(files[0], "ExcelContent");
    }

    document.getElementById('upload').addEventListener('change', handleFileSelect);


    // window.saveFile = function saveFile() {
    //     var sheet_1_data = [{ Col_One: 1, Col_Two: 11 }, { Col_One: 2, Col_Two: 22 }];
    //     var sheet_2_data = [{ Col_One: 10, Col_Two: 110 }, { Col_One: 20, Col_Two: 220 }];
    //     var opts = [{ sheetid: 'Sheet One', header: true }, { sheetid: 'Sheet Two', header: false }];
    //     var result = alasql('SELECT * INTO XLSX("sample_file.xlsx",?) FROM ?',
    //         [opts, [sheet_1_data, sheet_2_data]]);
    // }

    function saveFile() {
        var sheet_1_data = [{ Col_One: 1, Col_Two: 11 }, { Col_One: 2, Col_Two: 22 }];
        var sheet_2_data = [{ Col_One: 10, Col_Two: 110 }, { Col_One: 20, Col_Two: 220 }];
        var opts = [{ sheetid: 'Sheet One', header: true }, { sheetid: 'Sheet Two', header: false }];
        var result = alasql('SELECT * INTO XLSX("sample_file.xlsx",?) FROM ?',
            [opts, [sheet_1_data, sheet_2_data]]);
    }
</script>
