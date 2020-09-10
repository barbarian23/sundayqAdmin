<?php ?>
<script>
	function showProgressListContact(){
	document.getElementById("fetchListContactProgress").style.display = "flex" ;
}

function hideProgressListContact(){
	document.getElementById("fetchListContactProgress").style.display = "none" ;
}

function getListContactSuccess(){
	document.getElementById("listContactError").style.display = "none" ;
	document.getElementById("tableListContact").style.display = "flex" ;
}

function getListContactFailed(){
	document.getElementById("listContactError").style.display = "flex" ;
	document.getElementById("tableListContact").style.display = "none" ;
}
	
function getListContactGreaterThanZero(){
	document.getElementById("listContactEmpty").style.display = "none" ;
	document.getElementById("tableListContact").style.display = "flex" ;
	//fillTableListLecture();
}

function getListContactEqualToZero(){
	document.getElementById("listContactEmpty").style.display = "flex" ;
	document.getElementById("tableListContact").style.display = "none" ;
	emptyTableListContact();
}
	
function loadingDataContactProgress(){
	document.getElementById("contact-page-loading").style.display = "flex" ;
	document.getElementById("contact-page-loading-progress-error").style.display = "none" ;
	document.getElementById("contact-page-loading-progress").style.display = "block" ;
	document.getElementById("contact-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDataContactDone(){
	document.getElementById("contact-page-loading").style.display = "none" ;
}
	
function loadingDataContactError(){
	document.getElementById("contact-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("contact-page-loading-progress").style.display = "none" ;
	document.getElementById("contact-page-loading-progress-span").style.display = "none" ;
}
	
function selectContactIndex(item){
	
}
	
function emptyTableListContact(){
	document.getElementById("tableContact").innerHTML = "";
	//listRollGroup.length = 0;
}
	
function createListContact(result,isPush) {
        //lấy danh sách regisster
        //
        let data = result.data;
		if (!listVisitedContact.includes(getCurrentContact())){
			listVisitedContact.push(getCurrentContact());
		}
        console.log("dataa",data,result.total,getCurrentContact());
        if (data != null) {
            if (data.length > 0) {

                let tableContactTitle = ["manage-section-helpdesk-real-table-order","manage-section-helpdesk-real-table-lecture","manage-section-helpdesk-real-table-name", "manage-section-road-map-time-real-table-phone", "manage-section-road-map-time-real-table-note","manage-section-road-map-time-real-table-admin"];
                let tableContactTitleTDPropeties = ["stt","name","email", "phone", "message", "adminNote"];
                let tableRegisterTitleHEADER = ['<?php echo $GLOBALS["CONTACT_NEED_SUPPORT_1"] ?>',
                    '<?php echo $GLOBALS["CONTACT_NEED_SUPPORT_2"] ?>',
                    '<?php echo $GLOBALS["CONTACT_NEED_SUPPORT_3"] ?>',
                    '<?php echo $GLOBALS["CONTACT_NEED_SUPPORT_4"] ?>',
                    '<?php echo $GLOBALS["CONTACT_NEED_SUPPORT_5"] ?>',
                    '<?php echo $GLOBALS["CONTACT_NEED_SUPPORT_6"] ?>'
                ];
                document.getElementById("tableListContact").style.display = "flex";

                let parent = document.getElementById("tableContact");
				parent.innerHTML ="";
                let trFirst = document.createElement("tr");
                tableContactTitle.forEach((item, index) => {
                    let thFirst = document.createElement("th");
                    thFirst.className = item;
					thFirst.innerHTML = tableRegisterTitleHEADER[index];
                    trFirst.appendChild(thFirst);
                })
                parent.appendChild(trFirst);
				if (isPush){
        				listContact = listContact.concat(data);
					}
				loadTableContact(parent,tableContactTitleTDPropeties,tableContactTitle,data,getCurrentContact());
				document.getElementById("span-title-contact").style.display = "flex";
				let parentPaging = document.getElementById("pagingListContact");
				parentPaging.innerHTML="";
				let maxPage = result.total;
				let maxPerList = dictionaryKey.limitRequestRegister;
				//paging
				let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
				console.log(totalPage);
				for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
					let tempDivPaging = document.createElement("span");
					tempDivPaging.className="manage-list-lecture-list-register-paging-index";
					if(pagingIndex == getCurrentContact()){
					   tempDivPaging.className="manage-list-lecture-list-register-paging-index manage-list-lecture-list-register-paging-index-selected";
					   }
					
					tempDivPaging.id="paging-index-"+pagingIndex;
					tempDivPaging.innerHTML = Number.parseInt(pagingIndex) + 1;
					
					tempDivPaging.addEventListener("click",function(e){console.log("click",pagingIndex,totalPage,listContact.includes(pagingIndex));
						for (let tI = 0 ; tI < totalPage ; tI++ ){
							let tDiv = document.getElementById("paging-index-"+tI);
									if (tI != pagingIndex){
							//đặt cho các số khác là màu in nhạt	
										tDiv.className="manage-list-lecture-list-register-paging-index";
										} else {console.log("choose");
							//đặt cho số đang chọnc là màu in đậm	
										tDiv.className="manage-list-lecture-list-register-paging-index manage-list-lecture-list-register-paging-index-selected";
										}
							}
						if(!listVisitedContact.includes(pagingIndex)){//load cái mới	
						   setCurrentContact(pagingIndex);
						} else {//load lại cái cũ
							console.log("load lại cái cũ");
							loadOldPageContact(pagingIndex);
						}
					});
					
					parentPaging.appendChild(tempDivPaging);
				}
				//parent.;
            } else {
                document.getElementById("tableListContact").style.display = "flex";
                document.getElementById("tableContactTitle").innerHTML = '<?php echo $GLOBALS["CONTACT_NEED_SUPPORT"]; ?>';
                document.getElementById("tableContact").style.display = 'none';

            }
        } else {
            document.getElementById("tableListContact").style.display = "flex";
            document.getElementById("tableContactTitle").innerHTML = '<?php echo $GLOBALS["CONTACT_NEED_SUPPORT_EMPTY"]; ?>';
            document.getElementById("tableContact").style.display = 'none';
        }
    }
	
	function loadOldPageContact(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = (number+1)*dictionaryKey.limitRequestRegister;
		let arrayOldPage = listContact.slice(startIndex, endIndex);
		console.log("arrayOldPage",arrayOldPage,listContact,startIndex,endIndex);
		
		let tableContactTitle = ["manage-section-helpdesk-real-table-order","manage-section-helpdesk-real-table-lecture","manage-section-helpdesk-real-table-name", "manage-section-road-map-time-real-table-phone", "manage-section-road-map-time-real-table-note","manage-section-road-map-time-real-table-admin"];
                let tableContactTitleTDPropeties = ["stt","name","email", "phone", "message", "adminNote"];
                let tableRegisterTitleHEADER = ['<?php echo $GLOBALS["CONTACT_NEED_SUPPORT_1"] ?>',
                    '<?php echo $GLOBALS["CONTACT_NEED_SUPPORT_2"] ?>',
                    '<?php echo $GLOBALS["CONTACT_NEED_SUPPORT_3"] ?>',
                    '<?php echo $GLOBALS["CONTACT_NEED_SUPPORT_4"] ?>',
                    '<?php echo $GLOBALS["CONTACT_NEED_SUPPORT_5"] ?>',
                    '<?php echo $GLOBALS["CONTACT_NEED_SUPPORT_6"] ?>',
                ];
                document.getElementById("tableListContact").style.display = "flex";

                let parent = document.getElementById("tableContact");
				parent.innerHTML ="";
                let trFirst = document.createElement("tr");
                tableContactTitle.forEach((item, index) => {
                    let thFirst = document.createElement("th");
                    thFirst.className = item;
					thFirst.innerHTML = tableRegisterTitleHEADER[index];
                    trFirst.appendChild(thFirst);
                })
                parent.appendChild(trFirst);
				loadTableContact(parent,tableContactTitleTDPropeties,tableContactTitle,arrayOldPage,number);
	}
	
	function loadTableContact(parent,tableContactTitleTDPropeties,tableContactTitle,input,number){
		input.forEach((item, index) => {
					console.log("item",item);
                    let trRow = document.createElement("tr");
                    tableContactTitleTDPropeties.forEach((itemProp, indexProp) => {
                        let tdInside = document.createElement("td");
                        tdInside.className = tableContactTitle[indexProp];
						if (indexProp == 0){
						   tdInside.innerHTML = number * dictionaryKey.limitRequestRegister + index + 1;
						} else if(indexProp == 1){//title
						   tdInside.innerHTML = item["name"];
						} else if(indexProp == 5){//admin note
							let valueAdminNote = item["adminNote"] != null ? item["adminNote"] : "";
							 tdInside.innerHTML = "<textarea type=\"text\" style=\"resize: none;height:80px;padding:1px;\" id=\"text-area-" + 
								 
								 Number.parseInt(getCurrentContact() * dictionaryKey.limitRequestRegister + index)
								 
								 + "\" >"+valueAdminNote+"</textarea>  <input type=\"button\" value=\"" + dictionaryKey.UPDATE +"\"  onclick=\"updateToContact("+Number.parseInt(getCurrentContact() * dictionaryKey.limitRequestRegister + index)+")\"> ";
						}else {
						   tdInside.innerHTML = item[itemProp] != null ? item[itemProp] : "";
						}
                        trRow.appendChild(tdInside);
                    });
                    parent.appendChild(trRow);
                });
	}
	
	function updateToContact(number){
		 SunQAlert()
            .position('center')
            .title(dictionaryKey.REQUEST_EDIT)
            .type('success')
            .confirmButtonColor("#3B4EDC")
            .cancelButtonColor("#a8b1f5")
            .confirmButtonText(dictionaryKey.AGREE)
            .cancelButtonText(dictionaryKey.CANCEL)
            .callback((result) => {
                if (result.value) {
					let tttValue = document.getElementById("text-area-"+number).value;
					let dataUpdateContact = {
						isReplied:true,
						adminNote: tttValue.escape()
					};
				seFetchingContact(true);
                   requestToSever(
						sunQRequestType.put,
						getFeedback(listContact[number]["id"]),
						dataUpdateContact,
						getData(dictionary.MSEC),
                        function(res) {
                            //console.log(res);
                            seFetchingContact(false);
                            if (res.code === networkCode.success) {
                                SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.CONTACT_EDIT_SUCCESS)
                                    .type('success')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.AGREE)
                                    .callback((result) => {
                                       //createListRegister(getCurrentView(),false);
                                    })
                                    .show();
                            } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                                makeAlertRedirect();
                            }
                        },
                        function(err) {
                            seFetchingContact(false);
                            SunQAlert()
                                .position('center')
                                .title(dictionaryKey.CONTACT_EDIT_FAILED)
                                .type('error')
                                .confirmButtonColor("#3B4EDC")
                                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                .callback((result) => {
                                   // createListRegister(getCurrentView(),false);
                                })
                                .show();

                            console.log(dictionaryKey.ERR_INFO, err);

                        }
                    );
				}
		 }).show();
	}
</script>