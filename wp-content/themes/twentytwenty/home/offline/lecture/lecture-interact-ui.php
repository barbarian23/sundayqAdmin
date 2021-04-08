<?php ?>
<script>
	
	function showProgressListTeacherLecture(){
	document.getElementById("fetchListTacherInLecture").style.display = "flex" ;
	document.getElementById("divTeacherInLecture").style.display = "none" ;
}

function hideProgressListTeacherLecture(){
	document.getElementById("fetchListTacherInLecture").style.display = "none" ;
	document.getElementById("divTeacherInLecture").style.display = "flex" ;
}
	
	function getListLectureGreaterThanZero(){
	document.getElementById("listLectureEmpty").style.display = "none" ;
	document.getElementById("tableListLecture").style.display = "flex" ;
	//fillTableListLecture();
}

	function getListLectureTeacherSuccess(){
	document.getElementById("managaeLectureError").style.display = "none" ;
	document.getElementById("divTeacherInLecture").style.display = "flex" ;
	//fillTableListLecture();
}
	
function getListLectureTeacherFailed(){
	document.getElementById("managaeLectureError").style.display = "flex" ;
	document.getElementById("divTeacherInLecture").style.display = "none" ;
	//emptyTableListLecture();
}
	
		function emptyTableListTeacherLecture(){
	document.getElementById("divTeacherInLecture").innerHTML = "";
	
}
	
function getListLectureEqualToZero(){
	document.getElementById("listLectureEmpty").style.display = "flex" ;
	document.getElementById("tableListLecture").style.display = "none" ;
	emptyTableListLecture();
}

function getListLectureSuccess(){
	document.getElementById("listLectureError").style.display = "none" ;
	document.getElementById("tableListLecture").style.display = "flex" ;
	//fillTableListLecture();
}

function getListLectureFailed(){
	document.getElementById("listLectureError").style.display = "flex" ;
	document.getElementById("tableListLecture").style.display = "none" ;
	//emptyTableListLecture();
}
	
	function showProgressListLecture(){
	document.getElementById("fetchListLectureProgress").style.display = "flex" ;
}

function hideProgressListLecture(){
	document.getElementById("fetchListLectureProgress").style.display = "none" ;
}
	
	function emptyTableListLecture(){
	document.getElementById("tableListLecture").innerHTML = "";
	//listLecture.length = 0;
}
	
	function getListLectureTeacherEqualThanZero(){
	document.getElementById("divTeacherInLecture").style.display = "none" ;
	document.getElementById("managaeLectureEmpty").style.display = "flex" ;
	//fillTableListLecture();
}

function getListLectureTeacherGreaterThanZero(){
	document.getElementById("divTeacherInLecture").style.display = "flex" ;
	document.getElementById("managaeLectureEmpty").style.display = "none" ;
	//fillTableListLecture();
}
	
	function createListLEcture(result){
	let list = result.data;
	console.log("lisst lec",listLecture);
	if (!listVisitedLecture.includes(getCurrentLecture())){
			listVisitedLecture.push(getCurrentLecture());
		}
	let parent = document.getElementById("tableListLecture");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["LECTURE_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["LECTURE_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["LECTURE_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["LECTURE_LIST_COL_4"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableLecture(tbody,list,getCurrentLecture() );
	parent.appendChild(tbody);
	
	//paging
document.getElementById("span-title-lecture").style.display = "flex";
let parentPaging = document.getElementById("pagingListLecture");
parentPaging.innerHTML="";
let maxPage = result.total;
let maxPerList = dictionaryKey.limitRequestRegister;
let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
console.log(totalPage);
for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
    let tempDivPaging = document.createElement("span");
    tempDivPaging.className="manage-list-lecture-list-register-paging-index";
    if(pagingIndex == getCurrentLecture()){
       tempDivPaging.className="manage-list-lecture-list-register-paging-index manage-list-lecture-list-register-paging-index-selected";
       }
    
    tempDivPaging.id="paging-index-"+pagingIndex;
    tempDivPaging.innerHTML = Number.parseInt(pagingIndex) + 1;
    
    tempDivPaging.addEventListener("click",function(e){
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
        if(!listVisitedLecture.includes(pagingIndex)){//load cái mới	
           setCurrentLecture(pagingIndex);
        } else {//load lại cái cũ
            console.log("load lại cái cũ");
            loadOldPageLecture(pagingIndex);
        }
    });
    
    parentPaging.appendChild(tempDivPaging);
}
}

function loadOldPageLecture(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = (number+1)*dictionaryKey.limitRequestRegister;
		let arrayOldPage = listLecture.slice(startIndex, endIndex);
		//alert(listLecture+"old"+arrayOldPage+startIndex+endIndex);
		let parent = document.getElementById("tableListLecture");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["LECTURE_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["LECTURE_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["LECTURE_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["LECTURE_LIST_COL_4"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableLecture(tbody,arrayOldPage,number);
	parent.appendChild(tbody);
		
	}	
	
	function createTableLecture(tbody,input,number){
		input.forEach((item,index) => {
		index = number * dictionaryKey.limitRequestRegister + index + 1;
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-lecture-table-detail-strong';
		} 
		
		//console.log(item.id);
	
		
		let tempAHref = makeATagRedirect(sunQMode.offline,listScreen.offline.lecture,dictionaryKey.editStatus,item.id);
		
		trContent.innerHTML = "<td>"+dictionary.LECTURE_ROADMAP_COURSE_1+" "+(index)+"</td><td>"+item.title+"</td><td>"+item.courseType+"</td>"
		+"<td class='manage-list-lecture-table-detail-tr-modified'><a href=\""+tempAHref+"\"><div class='manage-list-lecture-table-detail-div-edit'>Chỉnh sửa</div></a><div class='manage-list-lecture-table-detail-div-delete' onclick=\"deleteLecture('"+item.id+"')\">Xóa</div></td>";
		tbody.appendChild(trContent);
	});
	}
	
	function createListTeacherLecture(list){
	let parent = document.getElementById("divTeacherInLecture");
	parent.innerHTML = "";
	list.forEach((item,index)=> {
		
		let div1 = document.createElement("div");
		div1.className = "manage-section-detail-left-item-teacher";
		div1.id = "selecTeacher_"+index;
		
		let span1 = document.createElement("span");
		span1.className="manage-section-detail-left-item-span-teacher-info";
		span1.innerHTML = item.degree + " " + item.name;
		
		let br1 = document.createElement("p");
		
		let span2 = document.createElement("span");
		span2.className="manage-section-detail-left-item-span-teacher-id-info";
		span2.innerHTML = item.shortId;
		
		div1.appendChild(span1);
 		div1.appendChild(span2);
		
// 		let div2 = document.createElement("img");
// 		div2.src=getHomeURL()+item.imgUrl;
// 		div2.className = "manage-section-detail-left-item-avatar";

// 		let div3 = document.createElement("div");
// 		div3.className = "manage-section-detail-left-item-info";

// 		let span1 = document.createElement("span");
// 		span1.className = "manage-section-detail-left-item-info-name";
// 		span1.innerHTML = item.degree + " " + item.name;

// 		let span2 = document.createElement("span");
// 		span2.className = "manage-section-detail-left-item-info-university";
// 		span2.innerHTML = item.university;
		
// 		let hrDiv = document.createElement("hr");
// 		hrDiv.className = "lecture-teacher-hr";
		
// 		let span3 = document.createElement("span");
// 		span3.innerHTML = "<b>"+'<?php echo $GLOBALS["TEACHER_LESSION_SPECIALIST"]; ?>'+"</b>"+item.specialist;
		
// 		let span4 = document.createElement("span");
// 		span4.innerHTML = "<b>"+'<?php echo $GLOBALS["TEACHER_LESSION_EXP"]; ?>'+"</b>"+(new Date().getYear() - new Date(item.practiceAt).getYear()) + " năm";
		
// 		let span5 = document.createElement("span");
// 		span5.innerHTML = "<b>"+'<?php echo $GLOBALS["TEACHER_LESSION_DEGREE"]; ?>'+"</b><span></span>Giáo viên";
		
// 		div3.appendChild(span1);
// 		div3.appendChild(span2);
// 		div3.appendChild(hrDiv);
// 		div3.appendChild(span3);
// 		div3.appendChild(span4);
// 		div3.appendChild(span5);
		
// 		div1.appendChild(div2);
// 		div1.appendChild(div3);
		//chọn owner
		div1.addEventListener("click",function(){	console.log("click owner");
			if(!getChoosingMultiTeacher()){	
				//setCurrentSelectTeacher(item.id,item);
				currentOwners.push(item.id);
				selectTeacherIndex(item);
			} else {
				let duppp = false;
				console.log("check",item.id,currentOwners);
					currentOwners.some((itemT,indexT)=>{
				console.log("some",itemT);
					if(itemT == item.id){
						console.log("dup",item.name);
					    //currentOwners.splice(indexT,1);
					    duppp = true;
						return
					   }
				});
				if (duppp == false) { 
					console.log("no dupp"); currentOwners.unshift( item.id);
					selectTeacherIndex(item);
				}
			}
			
				setChoosingSelectTeacherMain(false);
		});
		
		parent.appendChild(div1);
	})
}
	
	function createListRegister(result,isPush) {
        //lấy danh sách regisster
        //
        let data = result.data;
		if (!listVisited.includes(getCurrentView())){
			listVisited.push(getCurrentView());
		}
        console.log("dataa",data,result.total,getCurrentView());
        if (data != null) {
            if (data.length > 0) {

                let tableRegisterTitle = ["manage-section-helpdesk-real-table-order","manage-section-helpdesk-real-table-lecture","manage-section-helpdesk-real-table-name", "manage-section-helpdesk-real-table-time", "manage-section-road-map-time-real-table-phone", "manage-section-road-map-time-real-table-note","manage-section-road-map-time-real-table-admin"];
                let tableRegisterTitleTDPropeties = ["stt","lecture","name","time", "phone", "note", "adminNote"];
                let tableRegisterTitleHEADER = ['<?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT_1"] ?>',
                    '<?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT_2"] ?>',
                    '<?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT_3"] ?>',
                    '<?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT_4"] ?>',
                    '<?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT_5"] ?>',
                    '<?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT_6"] ?>',
                    '<?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT_7"] ?>'
                ];
                document.getElementById("tableRegister").style.display = "flex";

                let parent = document.getElementById("tableRegisterInside");
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
        				listRegister = listRegister.concat(data);
					}
				loadTableRegister(parent,tableRegisterTitleTDPropeties,tableRegisterTitle,data,getCurrentView());
				document.getElementById("span-title-regisster").style.display = "flex";
				let parentPaging = document.getElementById("pagingList");
				parentPaging.innerHTML="";
				let maxPage = result.total;
				let maxPerList = dictionaryKey.limitRequestRegister;
				//let totalPage = maxPage < maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
				let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage % maxPerList) <= 0 ? Number.parseInt(maxPage / maxPerList) : Number.parseInt(maxPage / maxPerList) + 1;
				console.log(totalPage);
				for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
					let tempDivPaging = document.createElement("span");
					tempDivPaging.className="manage-list-lecture-list-register-paging-index";
					if(pagingIndex == getCurrentView()){
					   tempDivPaging.className="manage-list-lecture-list-register-paging-index manage-list-lecture-list-register-paging-index-selected";
					   }
					
					tempDivPaging.id="paging-index-"+pagingIndex;
					tempDivPaging.innerHTML = Number.parseInt(pagingIndex) + 1;
					
					tempDivPaging.addEventListener("click",function(e){console.log("click",pagingIndex,totalPage,listVisited.includes(pagingIndex));
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
						if(!listVisited.includes(pagingIndex)){//load cái mới	
						   setCurrentView(pagingIndex);
						} else {//load lại cái cũ
							console.log("load lại cái cũ");
							loadOldPage(pagingIndex);
						}
					});
					
					parentPaging.appendChild(tempDivPaging);
				}
				//parent.;
            } else {
                document.getElementById("tableRegister").style.display = "flex";
                document.getElementById("tableRegisterTitle").innerHTML = '<?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT_EMPTY"]; ?>';
                document.getElementById("tableRegisterInside").style.display = 'none';

            }
        } else {
            document.getElementById("tableRegister").style.display = "flex";
            document.getElementById("tableRegisterTitle").innerHTML = '<?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT_EMPTY"]; ?>';
            document.getElementById("tableRegisterInside").style.display = 'none';
        }
    }
	
	function loadOldPage(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = (number+1)*dictionaryKey.limitRequestRegister;
		let arrayOldPage = listRegister.slice(startIndex, endIndex);
		console.log("arrayOldPage",arrayOldPage,listRegister,startIndex,endIndex);
		
		let tableRegisterTitle = ["manage-section-helpdesk-real-table-order","manage-section-helpdesk-real-table-lecture","manage-section-helpdesk-real-table-name", "manage-section-helpdesk-real-table-time", "manage-section-road-map-time-real-table-phone", "manage-section-road-map-time-real-table-note","manage-section-road-map-time-real-table-admin"];
                let tableRegisterTitleTDPropeties = ["stt","lecture","name","time", "phone", "note", "adminNote"];
                let tableRegisterTitleHEADER = ['<?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT_1"] ?>',
                    '<?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT_2"] ?>',
                    '<?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT_3"] ?>',
                    '<?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT_4"] ?>',
                    '<?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT_5"] ?>',
                    '<?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT_6"] ?>',
                    '<?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT_7"] ?>'
                ];
                document.getElementById("tableRegister").style.display = "flex";

                let parent = document.getElementById("tableRegisterInside");
				parent.innerHTML ="";
                let trFirst = document.createElement("tr");
                tableRegisterTitle.forEach((item, index) => {
                    let thFirst = document.createElement("th");
                    thFirst.className = item;
					thFirst.innerHTML = tableRegisterTitleHEADER[index];
                    trFirst.appendChild(thFirst);
                })
                parent.appendChild(trFirst);
				loadTableRegister(parent,tableRegisterTitleTDPropeties,tableRegisterTitle,arrayOldPage,number);
	}
	
	function loadTableRegister(parent,tableRegisterTitleTDPropeties,tableRegisterTitle,input,number){
		input.forEach((item, index) => {
					console.log("item",item);
                    let trRow = document.createElement("tr");
                    tableRegisterTitleTDPropeties.forEach((itemProp, indexProp) => {
                        let tdInside = document.createElement("td");
                        tdInside.className = tableRegisterTitle[indexProp];
						if (indexProp == 0){
						   tdInside.innerHTML = number * dictionaryKey.limitRequestRegister + index + 1;
						} else if(indexProp == 1){//title
						   tdInside.innerHTML = item["course"]["title"];
						}else if(indexProp == 3){//time
							let dateRegister = new Date(item["createAt"]);
							
						   tdInside.innerHTML = inputNumberSmallerThanTen(dateRegister.getDay())+"/"+inputNumberSmallerThanTen(dateRegister.getMonth())+"/"+inputNumberSmallerThanTen(dateRegister.getFullYear())+" " + inputNumberSmallerThanTen(dateRegister.getHours())+":" + inputNumberSmallerThanTen(dateRegister.getMinutes());
						} else if(indexProp == 6){//admin note
							let valueAdminNote = item["adminNote"] != null ? item["adminNote"] : "";
							 tdInside.innerHTML = "<textarea type=\"text\" style=\"resize: none;height:80px;padding:1px;\" id=\"text-area-" + 
								 
								 Number.parseInt(getCurrentView() * dictionaryKey.limitRequestRegister + index)
								 
								 + "\" >"+valueAdminNote+"</textarea>  <input type=\"button\" value=\"" + dictionaryKey.UPDATE +"\"  onclick=\"updateToRegister("+Number.parseInt(getCurrentView() * dictionaryKey.limitRequestRegister + index)+")\"> ";
						}else {
						   tdInside.innerHTML = item[itemProp] != null ? item[itemProp] : "";
						}
                        trRow.appendChild(tdInside);
                    });
                    parent.appendChild(trRow);
                });
	}
	
	function updateToRegister(number){
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
					let dataUpdateRegister = {
						isGotAdvice:true,
						adminNote: tttValue.escape()
					};
				setLoadingCurrentView(true);
                   requestToSever(
						sunQRequestType.put,
						getURLAccountAdvice()+"/"+listRegister[number]["id"],
						dataUpdateRegister,
						getData(dictionary.MSEC),
                        function(res) {
                            //console.log(res);
                            setLoadingCurrentView(false);
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
                            setLoadingCurrentView(false);
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