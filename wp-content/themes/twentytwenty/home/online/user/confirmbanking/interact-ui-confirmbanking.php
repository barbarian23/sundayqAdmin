<?php ?>
<script>
	
	function loadingDataConfirmBankingError(){
	document.getElementById("ConfirmBanking-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("ConfirmBanking-page-loading-progress").style.display = "none" ;
	//document.getElementById("ConfirmBanking-page-loading-progress-span").style.display = "none" ;
}
	
function loadingDataConfirmBankingProgress(){
	document.getElementById("ConfirmBanking-page-loading").style.display = "flex" ;
	document.getElementById("ConfirmBanking-page-loading-progress-error").style.display = "none" ;
	document.getElementById("ConfirmBanking-page-loading-progress").style.display = "block" ;
	//document.getElementById("ConfirmBanking-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDataConfirmBankingDone(){
	document.getElementById("ConfirmBanking-page-loading").style.display = "none" ;
}
	
function getListConfirmBankingSuccess(){
	document.getElementById("listConfirmBankingError").style.display = "none" ;
	document.getElementById("tableListConfirmBanking").style.display = "flex" ;
	//fillTableListLecture();
}

function getListConfirmBankingFailed(){
	document.getElementById("listConfirmBankingError").style.display = "flex" ;
	document.getElementById("tableListConfirmBanking").style.display = "none" ;
	//emptyTableListLecture();
}

function getListConfirmBankingGreaterThanZero(){
	document.getElementById("listConfirmBankingEmpty").style.display = "none" ;
	document.getElementById("divConfirmBankingInLecture").style.display = "flex" ;
	//fillTableListLecture();
}

function getListConfirmBankingEqualToZero(){
	document.getElementById("listConfirmBankingEmpty").style.display = "flex" ;
	document.getElementById("tableListConfirmBanking").style.display = "none" ;
	emptyTableListConfirmBanking();
}
	
function showProgressListConfirmBanking(){
	document.getElementById("fetchListConfirmBankingProgress").style.display = "flex" ;
}

function hideProgressListConfirmBanking(){
	document.getElementById("fetchListConfirmBankingProgress").style.display = "none" ;
}

function emptyTableListConfirmBanking(){
	document.getElementById("tableListConfirmBanking").innerHTML = "";
	//listConfirmBanking.length = 0;
}

function emptyTableListConfirmBankingLecture(){
	document.getElementById("divConfirmBankingInLecture").innerHTML = "";
	
}
	
function createListConfirmBanking(result,isPush) {
        //lấy danh sách regisster
        //
        let data = result.data;
		if (!listVisitedConfirmBanking.includes(getCurrentConfirmBanking())){
			listVisitedConfirmBanking.push(getCurrentConfirmBanking());
		}
        console.log("dataa",data,result.total,getCurrentConfirmBanking());
        if (data != null) {
            if (data.length > 0) {
                let tableConfirmBankingTitle = ["manage-section-helpdesk-real-table-order","manage-section-helpdesk-real-table-name", "manage-section-road-map-time-real-table-status", "manage-section-road-map-time-real-table-order-note","manage-section-road-map-time-real-table-edit"];
                let tableConfirmBankingTitleTDPropeties = ["stt","phone","status", "comment", "adminNote"];
                let tableRegisterTitleHEADER = [
					'<?php echo $GLOBALS["CONFIRM_BANKING_LIST_COL_1"] ?>',
                    '<?php echo $GLOBALS["CONFIRM_BANKING_LIST_COL_2"] ?>',
                    '<?php echo $GLOBALS["CONFIRM_BANKING_LIST_COL_3"] ?>',
                    '<?php echo $GLOBALS["CONFIRM_BANKING_LIST_COL_4"] ?>',
                    '<?php echo $GLOBALS["CONFIRM_BANKING_LIST_COL_5"] ?>',
                ];
                document.getElementById("tableListConfirmBanking").style.display = "table";

                let parent = document.getElementById("tableListConfirmBanking");
				parent.innerHTML ="";
				
                let tBody = document.createElement("tbody");
                let trFirst = document.createElement("tr");
				
				//trFirst.innerHTML = "<th>1</th><th>2</th><th>3</th><tdth4</td><td>5</td>";
                tableConfirmBankingTitle.forEach((item, index) => {
                    let thFirst = document.createElement("th");
                    thFirst.className = item;
					thFirst.innerHTML = tableRegisterTitleHEADER[index];
                    trFirst.appendChild(thFirst);
                })
				
               tBody.appendChild(trFirst);
				if (isPush){
        				listConfirmBanking = listConfirmBanking.concat(data);
					}
// 				parent.innerHTML ="<tr><th class='manage-section-helpdesk-real-table-order'>1</th><th class='manage-section-helpdesk-real-table-name'>2</th><th class='manage-section-road-map-time-real-table-phone'>3</th><th class='manage-section-road-map-time-real-table-note'>4</th><th class='manage-section-road-map-time-real-table-admin'>5</th></tr><tr style=\"border:1px solid green\" class='manage-list-teacher-table-detail-strong'><td class='manage-section-helpdesk-real-table-order'>1</td><td class='manage-section-helpdesk-real-table-name'>2</td><td class='manage-section-road-map-time-real-table-phone'>3</td><td class='manage-section-road-map-time-real-table-note'><textarea type=\"text\" style=\"resize: none;height:80px;padding:1px;\"></textarea> <input type=\"button\" value=\"Click\"></td><td class='manage-section-road-map-time-real-table-admin'><div class='manage-list-teacher-table-detail-tr-modified'><a><div class='manage-list-teacher-table-detail-div-edit'>5</div></a></div></td></tr>";
 				
				 let trRow = document.createElement("tr");
			trRow.style.border = "1px solid green";
				
			trRow.className = "manage-list-teacher-table-detail-strong";
				
						loadTableConfirmBanking(parent,tBody,tableConfirmBankingTitleTDPropeties,tableConfirmBankingTitle,data,getCurrentConfirmBanking());
				//paging
				document.getElementById("span-title-ConfirmBanking").style.display = "flex";
				let parentPaging = document.getElementById("pagingListConfirmBanking");
				parentPaging.innerHTML="";
				let maxPage = result.total;
				let maxPerList = dictionaryKey.limitRequestRegister;
				//let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
				let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage % maxPerList) <= 0 ? Number.parseInt(maxPage / maxPerList) : Number.parseInt(maxPage / maxPerList) + 1;
				console.log(totalPage);
				for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
					let tempDivPaging = document.createElement("span");
					tempDivPaging.className="manage-list-lecture-list-register-paging-index";
					if(pagingIndex == getCurrentConfirmBanking()){
					   tempDivPaging.className="manage-list-lecture-list-register-paging-index manage-list-lecture-list-register-paging-index-selected";
					   }
					
					tempDivPaging.id="paging-index-"+pagingIndex;
					tempDivPaging.innerHTML = Number.parseInt(pagingIndex) + 1;
					
					tempDivPaging.addEventListener("click",function(e){console.log("click",pagingIndex,totalPage,listConfirmBanking.includes(pagingIndex));
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
						if(!listVisitedConfirmBanking.includes(pagingIndex)){//load cái mới	
						   setCurrentConfirmBanking(pagingIndex);
						} else {//load lại cái cũ
							console.log("load lại cái cũ");
							loadOldPageConfirmBanking(pagingIndex);
						}
					});
					
					parentPaging.appendChild(tempDivPaging);
				}
				//parent.;
            } else {
                document.getElementById("tableListConfirmBanking").style.display = "table";

            }
        } else {
            document.getElementById("tableListConfirmBanking").style.display = "table";
        }
    }
	
	function loadOldPageConfirmBanking(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = dictionaryKey.limitRequestRegister;
		let arrayOldPage = listConfirmBanking.slice(startIndex, endIndex);
		console.log("arrayOldPage",arrayOldPage,listConfirmBanking,startIndex,endIndex);
		
		let tableConfirmBankingTitle = ["manage-section-helpdesk-real-table-order","manage-section-helpdesk-real-table-name", "manage-section-road-map-time-real-table-status", "manage-section-road-map-time-real-table-order-note","manage-section-road-map-time-real-table-edit"];
                let tableConfirmBankingTitleTDPropeties = ["stt","phone","status", "comment", "adminNote"];
                let tableRegisterTitleHEADER = [
					'<?php echo $GLOBALS["CONFIRM_BANKING_LIST_COL_1"] ?>',
                    '<?php echo $GLOBALS["CONFIRM_BANKING_LIST_COL_2"] ?>',
                    '<?php echo $GLOBALS["CONFIRM_BANKING_LIST_COL_3"] ?>',
                    '<?php echo $GLOBALS["CONFIRM_BANKING_LIST_COL_4"] ?>',
                    '<?php echo $GLOBALS["CONFIRM_BANKING_LIST_COL_5"] ?>',
                ];
                let parent = document.getElementById("tableListConfirmBanking");
                parent.style.display = "table";
		 		parent.style.justifyContent = "center";
		 		parent.style.alignItems = "center";
				parent.innerHTML ="";
		
                let tBody = document.createElement("tbody");
                let trFirst = document.createElement("tr");
		
			//trFirst.style.border = "1px solid #ff7900";
                tableConfirmBankingTitle.forEach((item, index) => {
                    let thFirst = document.createElement("th");
                    thFirst.className = item;
					thFirst.innerHTML = tableRegisterTitleHEADER[index];
                    trFirst.appendChild(thFirst);
                })
                tBody.appendChild(trFirst);
				loadTableConfirmBanking(parent,tBody,tableConfirmBankingTitleTDPropeties,tableConfirmBankingTitle,arrayOldPage,number);
	}
	
	function loadTableConfirmBanking(parent,body,tableConfirmBankingTitleTDPropeties,tableConfirmBankingTitle,input,number){
		input.forEach((item, index) => {
                    let trRow = document.createElement("tr");
			trRow.style.border = "1px solid green";
			if(index%2==0){
			trRow.className = "manage-list-teacher-table-detail-strong";
			   }
// 			trRow.innerHTML = "<td class='manage-section-helpdesk-real-table-order'>1</td><td class='manage-section-helpdesk-real-table-name'>2</td><td class='manage-section-road-map-time-real-table-phone'>3</td><td class='manage-section-road-map-time-real-table-note'><textarea type=\"text\" style=\"resize: none;height:80px;padding:1px;\"></textarea> <input type=\"button\" value=\"Click\"></td><td class='manage-section-road-map-time-real-table-admin'><div class='manage-list-teacher-table-detail-tr-modified'><a><div class='manage-list-teacher-table-detail-div-edit'>5</div></a></div></td>";
			//trRow.innerHTML = "<td>1</td><td>2</td><td>3</td><td>4</td><td>5</td>";
			
                    tableConfirmBankingTitleTDPropeties.forEach((itemProp, indexProp) => {
                        let tdInside = document.createElement("td");
                        tdInside.className = tableConfirmBankingTitle[indexProp]; 
						if (indexProp == 0){
						   tdInside.innerHTML = number * dictionaryKey.limitRequestRegister + index + 1;
						} else if(indexProp == 1){//title
						   tdInside.innerHTML = item["phone"];
						} else if(indexProp == 2){//status
							let status = item.status == confirmStatus.complete ? '<div class="manage-list-video-status-complete"><?php echo $GLOBALS["CONFIRM_BANKING_COMPLETE"]; ?></div>' : item.status == confirmStatus.pending ? '<div class="manage-list-video-status-upload"><?php echo $GLOBALS["CONFIRM_BANKING_PENDING"]; ?></div>' : item.status == confirmStatus.paid ? '<div class="manage-list-video-status-complete"><?php echo $GLOBALS["CONFIRM_BANKING_PAID"]; ?></div>' : '<div class="manage-list-video-status-error"><?php echo $GLOBALS["CONFIRM_BANKING_CANCEL"]; ?></div>';
						   tdInside.innerHTML = status;
						}else if(indexProp == 3){//admin note
							let valueAdminNote = item["comment"] != null ? item["comment"] : "";
							 tdInside.innerHTML = "<textarea type=\"text\" style=\"resize: none;height:80px;padding:1px;\" placeholder=\"Nhập ghi chú\" id=\"text-area-" + 
								 
								 Number.parseInt(getCurrentConfirmBanking() * dictionaryKey.limitRequestRegister + index)
								 
								 + "\" >"+valueAdminNote+"</textarea>  <input type=\"button\" value=\"" + dictionaryKey.UPDATE +"\"  onclick=\"updateToConfirmBanking("+Number.parseInt(getCurrentConfirmBanking() * dictionaryKey.limitRequestRegister + index)+")\"> ";
						} else if(indexProp == 4){//Chỉnh sửa
							let tempAHref = makeATagRedirect(sunQMode.online,listScreen.online.confirmBanking,dictionaryKey.editStatus,item.id);
							
							tdInside.className= "manage-list-teacher-table-detail-tr-modified";
								  tdInside.innerHTML = "<a href=\"?"+tempAHref+"\"><div class='manage-list-teacher-table-detail-div-edit'>Xem chi tiết</div></a>";
					    }
                        trRow.appendChild(tdInside);
                    });
                    body.appendChild(trRow);
                    parent.appendChild(body);
			//alert(parent.innerHTML);
                });
	}
	
	function updateToConfirmBanking(number){
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
					let dataUpdateTicket = {
						comment: tttValue.escape()
					};
				setFetchingConfirmBanking(true);
                   requestToSever(
						sunQRequestType.put,
						getCommentURLOrder(listConfirmBanking[number]["id"]),
						dataUpdateTicket,
						getData(dictionary.MSEC),
                        function(res) {
                            //console.log(res);
                            setFetchingConfirmBanking(false);
                            if (res.code === networkCode.success) {
                                SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.CONFIRM_BANKING_COMMENT_SUCCESS)
                                    .type('success')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.AGREE)
                                    .callback((result) => {
                                            //webpageRedirect(getAdminHomeURL() + "?mode=online&page=list-confirmbanking");
                                    })
                                    .show();
                            } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   } else if (res.code === networkCode.sessionTimeOut) {
                                makeAlertRedirect();
                            }
                        },
                        function(err) {
                            setFetchingConfirmBanking(false);
                            SunQAlert()
                                .position('center')
                                .title(dictionaryKey.CONFIRM_BANKING_COMMENT_FAILED)
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