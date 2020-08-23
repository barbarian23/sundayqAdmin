<?php ?>
<script>
	function showProgressListTicket(){
	document.getElementById("fetchListTicketProgress").style.display = "flex" ;
}

function hideProgressListTicket(){
	document.getElementById("fetchListTicketProgress").style.display = "none" ;
}

function getListTicketSuccess(){
	document.getElementById("listTicketError").style.display = "none" ;
	document.getElementById("tableListTicket").style.display = "flex" ;
}

function getListTicketFailed(){
	document.getElementById("listTicketError").style.display = "flex" ;
	document.getElementById("tableListTicket").style.display = "none" ;
}
	
function getListTicketGreaterThanZero(){
	document.getElementById("listTicketEmpty").style.display = "none" ;
	document.getElementById("tableListTicket").style.display = "flex" ;
	//fillTableListLecture();
}

function getListTicketEqualToZero(){
	document.getElementById("listTicketEmpty").style.display = "flex" ;
	document.getElementById("tableListTicket").style.display = "none" ;
	emptyTableListLecture();
}
	
function loadingDataTicketProgress(){
	document.getElementById("ticket-page-loading").style.display = "flex" ;
	document.getElementById("ticket-page-loading-progress-error").style.display = "none" ;
	document.getElementById("ticket-page-loading-progress").style.display = "block" ;
	document.getElementById("ticket-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDataTicketDone(){
	document.getElementById("ticket-page-loading").style.display = "none" ;
}
	
function loadingDataTicketError(){
	document.getElementById("ticket-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("ticket-page-loading-progress").style.display = "none" ;
	document.getElementById("ticket-page-loading-progress-span").style.display = "none" ;
}
	
function selectTicketIndex(item){
	
}
	
function emptyTableListTicket(){
	document.getElementById("tableListTicket").innerHTML = "";
	//listRollGroup.length = 0;
}
	
function createListTicket(result,isPush) {
        //lấy danh sách regisster
        //
        let data = result.data;
		if (!listVisitedTicket.includes(getCurrentTicket())){
			listVisitedTicket.push(getCurrentTicket());
		}
        console.log("dataa",data,result.total,getCurrentTicket());
        if (data != null) {
            if (data.length > 0) {

                let tableTicketTitle = ["manage-section-helpdesk-real-table-order","manage-section-helpdesk-real-table-lecture","manage-section-helpdesk-real-table-name", "manage-section-road-map-time-real-table-phone", "manage-section-road-map-time-real-table-note","manage-section-road-map-time-real-table-admin"];
                let tableTicketTitleTDPropeties = ["stt","name","email", "phone", "message", "adminNote"];
                let tableRegisterTitleHEADER = ['<?php echo $GLOBALS["TICKET_NEED_SUPPORT_1"] ?>',
                    '<?php echo $GLOBALS["TICKET_NEED_SUPPORT_2"] ?>',
                    '<?php echo $GLOBALS["TICKET_NEED_SUPPORT_3"] ?>',
                    '<?php echo $GLOBALS["TICKET_NEED_SUPPORT_4"] ?>',
                    '<?php echo $GLOBALS["TICKET_NEED_SUPPORT_5"] ?>',
                    '<?php echo $GLOBALS["TICKET_NEED_SUPPORT_6"] ?>',
                ];
                document.getElementById("tableTicket").style.display = "flex";

                let parent = document.getElementById("tableTicketInside");
				parent.innerHTML ="";
                let trFirst = document.createElement("tr");
                tableRegisterTitle.forEach((item, index) => {
                    let thFirst = document.createElement("th");
                    thFirst.className = item;
					thFirst.innerHTML = tableRegisterTitleHEADER[index];
                    trFirst.appendChild(thFirst);
                })
                parent.appendChild(trFirst);
				if (isPush){
        				listTicket = listTicket.concat(data);
					}
				loadTableTicket(parent,tableTicketTitleTDPropeties,tableTicketTitle,data,getCurrenTicket());
				document.getElementById("span-title-ticket").style.display = "flex";
				let parentPaging = document.getElementById("pagingListTicket");
				parentPaging.innerHTML="";
				let maxPage = result.total;
				let maxPerList = dictionaryKey.limitRequestRegister;
				let totalPage = maxPage < maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
				console.log(totalPage);
				for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
					let tempDivPaging = document.createElement("span");
					tempDivPaging.className="manage-list-lecture-list-register-paging-index";
					if(pagingIndex == getCurrenTicket()){
					   tempDivPaging.className="manage-list-lecture-list-register-paging-index manage-list-lecture-list-register-paging-index-selected";
					   }
					
					tempDivPaging.id="paging-index-"+pagingIndex;
					tempDivPaging.innerHTML = Number.parseInt(pagingIndex) + 1;
					
					tempDivPaging.addEventListener("click",function(e){console.log("click",pagingIndex,totalPage,listTicket.includes(pagingIndex));
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
						if(!listVisitedTicket.includes(pagingIndex)){//load cái mới	
						   setCurrentTicket(pagingIndex);
						} else {//load lại cái cũ
							console.log("load lại cái cũ");
							loadOldPageTicket(pagingIndex);
						}
					});
					
					parentPaging.appendChild(tempDivPaging);
				}
				//parent.;
            } else {
                document.getElementById("tableTicket").style.display = "flex";
                document.getElementById("tableTicketTitle").innerHTML = '<?php echo $GLOBALS["TICKET_NEED_SUPPORT"]; ?>';
                document.getElementById("tableTicketInside").style.display = 'none';

            }
        } else {
            document.getElementById("tableTicket").style.display = "flex";
            document.getElementById("tableTicketTitle").innerHTML = '<?php echo $GLOBALS["TICKET_NEED_SUPPORT_EMPTY"]; ?>';
            document.getElementById("tableTicketInside").style.display = 'none';
        }
    }
	
	function loadOldPageTicket(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = dictionaryKey.limitRequestRegister;
		let arrayOldPage = listTicket.slice(startIndex, endIndex);
		console.log("arrayOldPage",arrayOldPage,listTicket,startIndex,endIndex);
		
		let tableTicketTitle = ["manage-section-helpdesk-real-table-order","manage-section-helpdesk-real-table-lecture","manage-section-helpdesk-real-table-name", "manage-section-road-map-time-real-table-phone", "manage-section-road-map-time-real-table-note","manage-section-road-map-time-real-table-admin"];
                let tableTicketTitleTDPropeties = ["stt","name","email", "phone", "message", "adminNote"];
                let tableRegisterTitleHEADER = ['<?php echo $GLOBALS["TICKET_NEED_SUPPORT_1"] ?>',
                    '<?php echo $GLOBALS["TICKET_NEED_SUPPORT_2"] ?>',
                    '<?php echo $GLOBALS["TICKET_NEED_SUPPORT_3"] ?>',
                    '<?php echo $GLOBALS["TICKET_NEED_SUPPORT_4"] ?>',
                    '<?php echo $GLOBALS["TICKET_NEED_SUPPORT_5"] ?>',
                    '<?php echo $GLOBALS["TICKET_NEED_SUPPORT_6"] ?>',
                ];
                document.getElementById("tableTicket").style.display = "flex";

                let parent = document.getElementById("tableTicketInside");
				parent.innerHTML ="";
                let trFirst = document.createElement("tr");
                tableTicketTitle.forEach((item, index) => {
                    let thFirst = document.createElement("th");
                    thFirst.className = item;
					thFirst.innerHTML = tableRegisterTitleHEADER[index];
                    trFirst.appendChild(thFirst);
                })
                parent.appendChild(trFirst);
				loadTableTicket(parent,tableTicketTitleTDPropeties,tableTicketTitle,arrayOldPage,number);
	}
	
	function loadTableTicket(parent,tableTicketTitleTDPropeties,tableTicketTitle,input,number){
		input.forEach((item, index) => {
					console.log("item",item);
                    let trRow = document.createElement("tr");
                    tableTicketTitleTDPropeties.forEach((itemProp, indexProp) => {
                        let tdInside = document.createElement("td");
                        tdInside.className = tableTicketTitle[indexProp];
						if (indexProp == 0){
						   tdInside.innerHTML = number * dictionaryKey.limitRequestRegister + index + 1;
						} else if(indexProp == 1){//title
						   tdInside.innerHTML = item["course"]["name"];
						} else if(indexProp == 5){//admin note
							let valueAdminNote = item["adminNote"] != null ? item["adminNote"] : "";
							 tdInside.innerHTML = "<textarea type=\"text\" style=\"resize: none;height:80px;padding:1px;\" id=\"text-area-" + 
								 
								 Number.parseInt(getCurrentTicket() * dictionaryKey.limitRequestRegister + index)
								 
								 + "\" >"+valueAdminNote+"</textarea>  <input type=\"button\" value=\"" + dictionaryKey.UPDATE +"\"  onclick=\"updateToTicket("+Number.parseInt(getCurrentTicket() * dictionaryKey.limitRequestRegister + index)+")\"> ";
						}else {
						   tdInside.innerHTML = item[itemProp] != null ? item[itemProp] : "";
						}
                        trRow.appendChild(tdInside);
                    });
                    parent.appendChild(trRow);
                });
	}
	
	function updateToTicket(number){
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
						isGotAdvice:true,
						adminNote: tttValue.escape()
					};
				setLoadingCurrentView(true);
                   requestToSever(
						sunQRequestType.put,
						getURLTicket()+"/"+listTicket[number]["id"],
						dataUpdateTicket,
						getData(dictionary.MSEC),
                        function(res) {
                            //console.log(res);
                            setLoadingDataTicket(false);
                            if (res.code === networkCode.success) {
                                SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.REGISTER_EDIT_SUCCESS)
                                    .type('success')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.AGREE)
                                    .callback((result) => {
                                       //createListRegister(getCurrentView(),false);
                                    })
                                    .show();
                            } else if (res.code === networkCode.sessionTimeOut) {
                                makeAlertRedirect();
                            }
                        },
                        function(err) {
                            setLoadingDataTicket(false);
                            SunQAlert()
                                .position('center')
                                .title(dictionaryKey.REGISTER_EDIT_FAILED)
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