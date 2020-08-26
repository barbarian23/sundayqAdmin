<?php
include get_theme_file_path("home/admin/group/group-status.php");
include get_theme_file_path("home/admin/group/group-interact-ui.php");
?>
<form class="manage-teacher-contain">
    <div class="manage-contain-teacher-loading" id="group-page-loading">
        <span id="group-page-loading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="group-page-loading-progress">

        </div>
        <div class="manage-contain-teacher-loading-err" id="group-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>
    <div class="manage-teacher-contain-data">
        <div class="manage-teacher-contain-right">
            <div class="manage-teacher-contain-right-upper" id="tableDetailListGroup">
				<!-- name -->
                <span><?php echo $GLOBALS["GROUP_INPUT_NAME"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="inputGroupName" type="text" placeholder='<?php echo $GLOBALS["GROUP_INPUT_NAME_PLACEHOLDER"]; ?>' required>
				
				<!-- resource -->
                <span><?php echo $GLOBALS["GROUP_INPUT_RESOURCE"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <table class="manage-list-lecture-table-detail" id="inputGroupResource">
						<!-- permission -->
<!-- 						<span><?php echo $GLOBALS["GROUP_PERMISSION"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
						<div class="manage-teacher-contain-right-upper-list-checkbox" id="listCheckbox_1">
							<label class="manage-teacher-contain-right-upper-container"><?php echo $GLOBALS["GROUP_PERMISSION_1"]; ?>
							  <input class="manage-teacher-contain-right-upper-checkbox" type="checkbox" checked="checked" readonly>
							  <span class="manage-teacher-contain-right-upper-checkmark"></span>
							</label>
							<label class="manage-teacher-contain-right-upper-container"><?php echo $GLOBALS["GROUP_PERMISSION_2"]; ?>
							  <input class="manage-teacher-contain-right-upper-checkbox" type="checkbox">
							  <span class="manage-teacher-contain-right-upper-checkmark"></span>
							</label>
							<label class="manage-teacher-contain-right-upper-container"><?php echo $GLOBALS["GROUP_PERMISSION_3"]; ?>
							  <input class="manage-teacher-contain-right-upper-checkbox" type="checkbox">
							  <span class="manage-teacher-contain-right-upper-checkmark"></span>
							</label>
							<label class="manage-teacher-contain-right-upper-container"><?php echo $GLOBALS["GROUP_PERMISSION_4"]; ?>
							  <input class="manage-teacher-contain-right-upper-checkbox" type="checkbox">
							  <span class="manage-teacher-contain-right-upper-checkmark"></span>
							</label>
							<label class="manage-teacher-contain-right-upper-container"><?php echo $GLOBALS["GROUP_PERMISSION_5"]; ?>
							  <input class="manage-teacher-contain-right-upper-checkbox" type="checkbox">
							  <span class="manage-teacher-contain-right-upper-checkmark"></span>
							</label>
						</div> -->
				</table>
        </div>
    </div>
    <div class="manage-teacher-bottom-action">
        <input type="submit" name='accountSubmit' value='<?php echo $GLOBALS["GROUP_SUBMIT_ADD"]; ?>' id="groupSubmit">
    </div>
	</div>
</form>
<script>
	var listResource = [],uploadDataGroup;
	window.onload = function(){	
		uploadDataGroup = {};
		uploadDataGroup.roles = [];
		if (getCurrentACtion() == dictionaryKey.editStatus){
			document.getElementById("groupSubmit").value='<?php echo  $GLOBALS["GROUP_SUBMIT_EDIT"]; ?>';
		} 
		setLoadingDataGroup(true);
        requestToSever(
            sunQRequestType.get,
            getAllResources(),
            null,
            getData(dictionary.MSEC),
            function(res) {
                setLoadingDataGroup(false);
                if (res.code === networkCode.success) {
                    if (res.data == null || res.data.length == 0) {
						listResource = [];
                        //setLectureGetTeacherThanZero(false);
                    } else {
						prepareSelect(res.data,getInfoFromServer);
						listResource = res.data;
// 						if(getCurrentACtion() == dictionaryKey.addStatus){
// 						   uploadDataGroup.resource = listResource[0].name;
// 						   }
                    }
                } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                }
            },
            function(err) {
                setLoadingDataGroup(dictionaryKey.ERR);
                console.log(dictionaryKey.ERR_INFO, err);
            }
        );
		
	}
		
	function getInfoFromServer(){
		if(getCurrentACtion() == dictionaryKey.editStatus){
		   requestToSever(
            sunQRequestType.get,
            postRollGroup() + "/" + getCurrentEdit(),
            null,
            getData(dictionary.MSEC),
            function(res) {
                setLoadingDataGroup(false);
                if (res.code === networkCode.success) {
                    if (res.data == null || res.data.length == 0) {
						
                    } else {//alert("name"+res.data.name+"role"+res.data.roles[0].resource+"scope"+res.data.roles[0].scopes)
						document.getElementById("inputGroupName").value=res.data.name;
						uploadDataGroup.name=res.data.name;
						if(!uploadDataGroup.roles){
							uploadDataGroup.roles = [];
						}
						res.data.roles.forEach((item,index)=>{//alert("roles"+item);
							let idResource = -1;
							//tìm ra id của list resource của nhóm quyền đang sửa
							listResource.some((itemResource,indexResource)=>{
								if(itemResource.name == item.resource){
								   idResource = indexResource;
								   return true;
								   }
							});//alert("resource"+idResource);
							item.scopes.forEach((itemScope)=>{
								let idDOMNamePermisison = "permission_resource_"+itemScope+"_"+idResource;
								document.getElementById(idDOMNamePermisison).checked = true;
							});
							uploadDataGroup.roles.push({resource:item.resource,scopes:item.scopes});
						});
						
						
                    }
                } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                }
            },
            function(err) {
                setLoadingDataGroup(dictionaryKey.ERR);
                console.log(dictionaryKey.ERR_INFO, err);
            }
        );
		   }
	}
	
	function prepareSelect(input,callback){
		//tạo mảng
		let parent = document.getElementById("inputGroupResource");
		parent.innerHTML = "";
		let groupArray = ['<?php echo $GLOBALS["GROUP_PERMISSION"]; ?>','<?php echo $GLOBALS["GROUP_PERMISSION_1"]; ?>','<?php echo $GLOBALS["GROUP_PERMISSION_2"]; ?>','<?php echo $GLOBALS["GROUP_PERMISSION_3"]; ?>','<?php echo $GLOBALS["GROUP_PERMISSION_4"]; ?>','<?php echo $GLOBALS["GROUP_PERMISSION_5"]; ?>'];
		let trHead = document.createElement("tr");
		groupArray.forEach((itemInside,indexInside)=>{
			let thInside = document.createElement("th");
			thInside.innerHTML = itemInside;
			trHead.appendChild(thInside);
		});
		parent.appendChild(trHead);
		input.forEach((item,index) => {
			let trInside = document.createElement("tr");
			if (index % 2 != 0){
			trInside.className = 'manage-list-lecture-table-detail-strong';
			} 
			//cột đầu tiên
			let tdInsideTitle = document.createElement("td");
			
			tdInsideTitle.innerHTML = item.name;
			trInside.appendChild(tdInsideTitle);
			rollGroupList.forEach((itemInside,indexInside)=>{
				let tdInside = document.createElement("td");
				
				let labelPer = document.createElement("label");
				labelPer.className = "manage-teacher-contain-right-upper-container";
				//labelPer.innerHTML = itemInside.display;

				let inputPer = document.createElement("input");
				inputPer.className = "manage-teacher-contain-right-upper-checkbox";
				inputPer.type = "checkbox";
				inputPer.id="permission_resource_"+itemInside.name+"_"+index;
				inputPer.addEventListener("change",function(e){
					let tempIndex = -1;
					uploadDataGroup.roles.some((temptempItem,temptempIndex)=>{
						if(temptempItem.resource == item.name){
							  tempIndex = temptempIndex;
							  return true;
						}
					});
					if(this.checked){
						//auto check read
						let checkedId = document.getElementById("permission_resource_read_"+index);
						if (!checkedId.checked){
							checkedId.checked = true;
						}
						if(!uploadDataGroup.roles){
							uploadDataGroup.roles = [];
						}
						
						if (uploadDataGroup.roles[tempIndex] == null){
							uploadDataGroup.roles.push({resource:item.name,scopes:Array.of("read",itemInside.name)});
						} else {
							let isNeedRead = true;
							uploadDataGroup.roles[tempIndex].scopes.some(function(itemCheckRead){
								if(itemCheckRead == "read"){
									isNeedRead = false;
									return true;
								}
							});
								
							if(isNeedRead){
								uploadDataGroup.roles[tempIndex].scopes.push("read");
								uploadDataGroup.roles[tempIndex].scopes.push(itemInside.name);
							} else {
								uploadDataGroup.roles[tempIndex].scopes.push(itemInside.name);
							} 
						}
					} else {
						if(itemInside.name == "read" && uploadDataGroup.roles[tempIndex].scopes.length > 1){
						   document.getElementById("permission_resource_read_"+index).checked = true;
						  }else {
						let isPermissionId = null;
						uploadDataGroup.roles[tempIndex].scopes.pop(itemInside.name);
						//nếu như không có permisison trong resource -> xóa resource
						if(uploadDataGroup.roles[tempIndex].scopes.length == 0){
						   uploadDataGroup.roles.pop(tempIndex)
						}
						}
					}
				});

				let lspanPer = document.createElement("span");
				lspanPer.className = "manage-teacher-contain-right-upper-checkmark";

				labelPer.appendChild(inputPer);
				labelPer.appendChild(lspanPer);
				tdInside.appendChild(labelPer);
				trInside.appendChild(tdInside);
			});
			parent.appendChild(trInside);
		});
		//gọi callback
		callback();
 	}
	
	document.getElementById("inputGroupName").addEventListener("input",function(e){
		let tttValue = e.target.value;
		uploadDataGroup.name = tttValue.escape();
		
	});
	
// 	document.getElementById("inputGroupResource").addEventListener("change",function(e){
// 		uploadDataGroup.resource = listResource[e.target.value].name;
		
// 	});
	
	document.getElementById("groupSubmit").addEventListener("click",function(e){
		e.preventDefault();
		if (uploadDataGroup.name == null || uploadDataGroup.name == ""){
			SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_IMG_TEACHER)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    //window.scrollTo(0,0);
                })
                .show();
		}  else {
			SunQAlert()
            .position('center')
            .title(getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.REQUEST_EDIT: dictionaryKey.REQUEST_ADD )
            .type('success')
            .confirmButtonColor("#3B4EDC")
            .cancelButtonColor("#a8b1f5")
            .confirmButtonText(dictionaryKey.AGREE)
            .cancelButtonText(dictionaryKey.CANCEL)
            .callback((result) => {
                if (result.value) {
                    window.scrollTo(0, 0);
                    let tempmyCurrentGroup = {
						name:uploadDataGroup.name,
						roles:uploadDataGroup.roles
					}
                    console.log("push data "+tempmyCurrentGroup);
					//alert(JSON.stringify(uploadDataGroup));
                    setLoadingDataGroup(true);
                    requestToSever(
                        getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                        getCurrentACtion() == dictionaryKey.editStatus ? postRollGroup() + "/" + getCurrentEdit() : postRollGroup(),
                        tempmyCurrentGroup,
                        getLocalStorage(dictionary.MSEC),
                        function(res) {
                            setLoadingDataGroup(false);
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
                                        webpageRedirect(getRedirectUrl(getMode(),"list-group"));
                                    })
                                    .show();
                            } else if (res.code === networkCode.sessionTimeOut) {
                                makeAlertRedirect();
                            } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else {
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
                            setLoadingDataGroup(dictionaryKey.ERR);
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