<?php
?>
<script>
function showOffLineMode(){
// 	let offlineOpen = document.getElementById("homeMenuOffline");
// 	offlineOpen.style.display == "" || offlineOpen.style.display == undefined || offlineOpen.style.display == "none" ? function(){offlineOpen.style.display = "block"}() : function(){offlineOpen.style.display = "none"}();
	let offlineOpen = document.getElementById("homeMenuOffline");
	offlineOpen && function(){offlineOpen.style.display = "block"}();
}
	
function hideOffLineMode(){
	let offlineOpen = document.getElementById("homeMenuOffline");
	offlineOpen && function(){offlineOpen.style.display = "none"}();
}

function showOnLineMode(){
	let onlineOpen = document.getElementById("homeMenuOnline");
	onlineOpen && function(){onlineOpen.style.display = "block"}();
}

function hideOnLineMode(){
	let onlineOpen = document.getElementById("homeMenuOnline");
	onlineOpen && function(){onlineOpen.style.display = "none"}();
}

function showAccountMode(){
	let adminOpen = document.getElementById("homeMenuAccount");
	adminOpen && function(){adminOpen.style.display = "block"}();
}

function hideAccountMode(){
	let adminOpen = document.getElementById("homeMenuAccount");
	adminOpen && function(){adminOpen.style.display = "none"}();
}
	
function getListLectureGreaterThanZero(){
	document.getElementById("listLectureEmpty").style.display = "none" ;
	document.getElementById("tableListLecture").style.display = "flex" ;
	//fillTableListLecture();
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

function getListTeacherSuccess(){
	document.getElementById("listTeacherError").style.display = "none" ;
	document.getElementById("tableListTeacher").style.display = "flex" ;
	//fillTableListLecture();
}

function getListTeacherFailed(){
	document.getElementById("listTeacherError").style.display = "flex" ;
	document.getElementById("tableListTeacher").style.display = "none" ;
	//emptyTableListLecture();
}

function getListLectureTeacherSuccess(){
	document.getElementById("managaeLectureError").style.display = "none" ;
	document.getElementById("tableListTeacher").style.display = "flex" ;
	//fillTableListLecture();
}

function getListLectureTeacherFailed(){
	document.getElementById("managaeLectureError").style.display = "flex" ;
	document.getElementById("divTeacherInLecture").style.display = "none" ;
	//emptyTableListLecture();
}
	
function getListTeacherGreaterThanZero(){
	document.getElementById("listTeacherEmpty").style.display = "none" ;
	document.getElementById("divTeacherInLecture").style.display = "flex" ;
	//fillTableListLecture();
}

function getListTeacherEqualToZero(){
	document.getElementById("listTeacherEmpty").style.display = "flex" ;
	document.getElementById("tableListTeacher").style.display = "none" ;
	emptyTableListTeacher();
}
	
function showProgressListTeacher(){
	document.getElementById("fetchListTeacherProgress").style.display = "flex" ;
}

function hideProgressListTeacher(){
	document.getElementById("fetchListTeacherProgress").style.display = "none" ;
}

function showProgressListLecture(){
	document.getElementById("fetchListLectureProgress").style.display = "flex" ;
}

function hideProgressListLecture(){
	document.getElementById("fetchListLectureProgress").style.display = "none" ;
}

function showProgressListTeacherLecture(){
	document.getElementById("fetchListTacherInLecture").style.display = "flex" ;
	document.getElementById("divTeacherInLecture").style.display = "none" ;
}

function hideProgressListTeacherLecture(){
	document.getElementById("fetchListTacherInLecture").style.display = "none" ;
	document.getElementById("divTeacherInLecture").style.display = "flex" ;
}

function emptyTableListLecture(){
	document.getElementById("tableListLecture").innerHTML = "";
	listLecture.length = 0;
}

function emptyTableListTeacher(){
	document.getElementById("tableListTeacher").innerHTML = "";
	listTeacher.length = 0;
}

function emptyTableListTeacherLecture(){
	document.getElementById("divTeacherInLecture").innerHTML = "";
	
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
	list.forEach((item,index) => {
		index = getCurrentTeacher() * dictionaryKey.limitRequestRegister + index + 1;
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-lecture-table-detail-strong';
		} 
		
		//console.log(item.id);
	
		
		trContent.innerHTML = "<td>"+dictionary.LECTURE_ROADMAP_COURSE_1+" "+(index)+"</td><td>"+item.title+"</td><td>"+item.courseType+"</td>"
		+"<td class='manage-list-lecture-table-detail-tr-modified'><a href=\"?mode=offline&page=lecture&action=edit&id="+item.id+"\"><div class='manage-list-lecture-table-detail-div-edit'>Chỉnh sửa</div></a><div class='manage-list-lecture-table-detail-div-delete' onclick=\"deleteLecture("+(index-1)+")\">Xóa</div></td>";
		tbody.appendChild(trContent);
	});
	parent.appendChild(tbody);
	
	//paging
document.getElementById("span-title-lecture").style.display = "flex";
let parentPaging = document.getElementById("pagingListLecture");
parentPaging.innerHTML="";
let maxPage = result.total;
let maxPerList = dictionaryKey.limitRequestRegister;
let totalPage = maxPage < maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
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

function createListTeacher(result){
	let list = result.data;
	
	if (!listVisitedTeacher.includes(getCurrentTeacher())){
			listVisitedTeacher.push(getCurrentTeacher());
	}
	
	let parent = document.getElementById("tableListTeacher");
				parent.innerHTML ="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["TEACHER_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_4"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_5"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	list.forEach((item,index) => {
		//alert(getCurrentTeacher()+" "+index);
		index = getCurrentTeacher() * dictionaryKey.limitRequestRegister + index + 1;
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-teacher-table-detail-strong';
		} 
		trContent.innerHTML = "<td>"+(index)+"</td><td>"+(item.name != null ? item.name : "Thiếu") +"</td><td>"+(item.specialist != null ? item.specialist : "Thiếu")+"</td><td>"+(item.university != null ? item.university : "Thiếu") +"</td>"
		+"<td class='manage-list-teacher-table-detail-tr-modified'><a href=\"?mode=offline&page=teacher&action=edit&id="+item.id+"\"><div class='manage-list-teacher-table-detail-div-edit'>Chỉnh sửa</div></a><div class='manage-list-teacher-table-detail-div-delete' onclick=\"deleteTeacher("+(index-1)+")\">Xóa</div></td>";
		tbody.appendChild(trContent);
	});
	parent.appendChild(tbody);
	
	//paging
	document.getElementById("span-title-teacher").style.display = "flex";
let parentPaging = document.getElementById("pagingListTeacher");
parentPaging.innerHTML="";
let maxPage = result.total;
let maxPerList = dictionaryKey.limitRequestRegister;
let totalPage = maxPage < maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
console.log(totalPage);
for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
    let tempDivPaging = document.createElement("span");
    tempDivPaging.className="manage-list-lecture-list-register-paging-index";
    if(pagingIndex == getCurrentTeacher()){
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
                        } else {
            //đặt cho số đang chọnc là màu in đậm	
                        tDiv.className="manage-list-lecture-list-register-paging-index manage-list-lecture-list-register-paging-index-selected";
                        }
            }
        if(!listVisitedTeacher.includes(pagingIndex)){//load cái mới	
           setCurrentTeacher(pagingIndex);
        } else {//load lại cái cũ
            console.log("load lại cái cũ");
            loadOldPageTeacher(pagingIndex);
        }
    });
    
    parentPaging.appendChild(tempDivPaging);
	}
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
		span2.className="manage-section-detail-left-item-span-teacher-info";
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
//select giáo viên chủ nhiệm - owner
function selectTeacherIndex(index){
	let parent = document.getElementById("currentListsOwner");
	let divFirst = document.createElement("div");
		divFirst.className="manage-section-detail-left-item-inside";
		divFirst.id="teacher_"+index.shortId;
		
		let divClose = document.createElement("div");
		divClose.className="manage-section-detail-left-item-inside-close";
		divClose.innerHTML="x";
		
		divClose.addEventListener("click",function(){
			let deletIndexl
			currentOwners.some((item,indexinside)=>{
				if(item.shortId == index.shorId){
				   deletIndexl = indexinside;
					console.log("delete",indexinside);
					return true;
				   }
			});
			currentOwners.splice(deletIndexl,1)
			document.getElementById("teacher_"+index.shortId).remove();
		});
	
		let divImg = document.createElement("img");
		divImg.className="manage-section-detail-left-item-avatar";
		divImg.src =  getHomeURL() + index.imgUrl;
		
		
		let divContent = document.createElement("div");
		divContent.className="manage-section-detail-left-item-info";
		divContent.innerHTML = "<span class=\"manage-section-detail-left-item-info-name\">"+index.degree + " " + index.name+"</span><span class=\"manage-section-detail-left-item-info-university\"> "+index.university+"</span><hr class=\"lecture-teacher-hr\"><span><b>"+'<?php echo $GLOBALS["TEACHER_LESSION_SPECIALIST"]; ?>'+"</b><span>"+index.specialist+"</span></span><span><b>"+'<?php echo $GLOBALS["TEACHER_LESSION_EXP"]; ?>'+"</b><span>"+(new Date().getYear() -  new Date(index.practiceAt).getYear()) + " năm"+"</span></span><span><b>"+'<?php echo $GLOBALS["TEACHER_LESSION_DEGREE"]; ?>'+"</b><span>"+'<?php echo $GLOBALS["LECTURE_TEACHER_TO_STUDENT"]; ?>'+"</span></span>";
	
	if ( !getChoosingMultiTeacher() ){
		parent.innerHTML = "";
	} 
	
	divFirst.appendChild(divClose);
	divFirst.appendChild(divImg);
	divFirst.appendChild(divContent);
	parent.appendChild(divFirst);
// 	<div class="manage-section-detail-left-item-inside">
// 					<div class="manage-section-detail-left-item-inside-close">x</div>
// 					<img id="currentSelectImg" class="manage-section-detail-left-item-avatar">


// 					<div class="manage-section-detail-left-item-info">
// 						<span class="manage-section-detail-left-item-info-name" id="currentSelectName"></span>
// 						<span class="manage-section-detail-left-item-info-university" id="currentSelectUniversity"></span>
// 						<hr class="lecture-teacher-hr">
// 						<span><b><?php echo $GLOBALS["TEACHER_LESSION_SPECIALIST"]; ?></b><span id="currentSelectSpecial"></span></span>
// 						<span><b><?php echo $GLOBALS["TEACHER_LESSION_EXP"]; ?></b><span id="currentSelectExp"></span></span>
// 						<span><b><?php echo $GLOBALS["TEACHER_LESSION_DEGREE"]; ?></b><span id="currentSelectDegree"><?php echo $GLOBALS["LECTURE_TEACHER_TO_STUDENT"]; ?></span></span>
// 					</div>
					
// 				</div>
	
// 	document.getElementById("currentSelectName").innerHTML = index.degree + " " + index.name;
// 	document.getElementById("currentSelectUniversity").innerHTML = index.university;
// 	document.getElementById("currentSelectSpecial").innerHTML = index.specialist;
// 	document.getElementById("currentSelectExp").innerHTML = new Date().getYear() -  new Date(index.practiceAt).getYear() + " năm";
// 	document.getElementById("currentSelectImg").src = getHomeURL() + index.imgUrl;
}
	
function logging(){
	document.getElementById("submitLogin").style.display = "none" ;
	document.getElementById("loginLoading").style.display = "block" ;
}

function logDone(){
	document.getElementById("submitLogin").style.display = "block" ;
	document.getElementById("loginLoading").style.display = "none" ;
}
	
function logginFailed(val){
	document.getElementById("loginErrorSpan").style.display = "table" ;
	document.getElementById("loginErrorSpan").innerHTML = val;
}

function loginSuccess(){
	document.getElementById("loginErrorSpan").style.display = "none" ;
}
	
function loadingDataLectureProgress(){
	document.getElementById("lecture-page-loading").style.display = "flex" ;
	document.getElementById("lecture-page-loading-progress-error").style.display = "none" ;
	document.getElementById("lecture-page-loading-progress").style.display = "block" ;
	document.getElementById("lecture-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDataLectureDone(){
	document.getElementById("lecture-page-loading").style.display = "none" ;
}
	
function loadingDataLectureError(){
	document.getElementById("lecture-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("lecture-page-loading-progress").style.display = "none" ;
	document.getElementById("lecture-page-loading-progress-span").style.display = "none" ;
}
	
function loadingDataTeacherProgress(){
	document.getElementById("teacher-page-loading").style.display = "flex" ;
	document.getElementById("teacher-page-loading-progress-error").style.display = "none" ;
	document.getElementById("teacher-page-loading-progress").style.display = "block" ;
	document.getElementById("teacher-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDataTeacherDone(){
	document.getElementById("teacher-page-loading").style.display = "none" ;
}
	
function loadingDataTeacherError(){
	document.getElementById("teacher-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("teacher-page-loading-progress").style.display = "none" ;
	document.getElementById("teacher-page-loading-progress-span").style.display = "none" ;
}
	
function loadingDataRegisterProgress(){
	document.getElementById("fetchListRegisterProgress").style.display = "flex" ;
	document.getElementById("listRegisterError").style.display = "none" ;
}
	
function loadingDataRegisterDone(){
	document.getElementById("fetchListRegisterProgress").style.display = "none" ;;
	document.getElementById("listRegisterError").style.display = "none" ;
}
	
function loadingDataRegisterError(){
	document.getElementById("listRegisterError").style.display = "flex" ;
	document.getElementById("fetchListRegisterProgress").style.display = "none" ;
}
		
function chooseMultiOwwner(){
	
}
	
function chooseSingleOwwner(){
	
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
                data.forEach((item, index) => {
					console.log("item",item);
					
                    let trRow = document.createElement("tr");
                    tableRegisterTitleTDPropeties.forEach((itemProp, indexProp) => {
                        let tdInside = document.createElement("td");
                        tdInside.className = tableRegisterTitle[indexProp];
						if (indexProp == 0){
						   tdInside.innerHTML = getCurrentView() * dictionaryKey.limitRequestRegister + index + 1;
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
				document.getElementById("span-title-regisster").style.display = "flex";
				let parentPaging = document.getElementById("pagingList");
				parentPaging.innerHTML="";
				let maxPage = result.total;
				let maxPerList = dictionaryKey.limitRequestRegister;
				let totalPage = maxPage < maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
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
		let endIndex = dictionaryKey.limitRequestRegister;
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
		
		arrayOldPage.forEach((item, index) => {
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
					let dataUpdateRegister = {
						isGotAdvice:true,
						adminNote:document.getElementById("text-area-"+number).value
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
	
	function loadOldPageLecture(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = dictionaryKey.limitRequestRegister;
		let arrayOldPage = listLecture.slice(startIndex, endIndex);
		//alert(listLecture+"old"+arrayOldPage+startIndex+endIndex);
		let parent = document.getElementById("tableListLecture");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["LECTURE_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["LECTURE_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["LECTURE_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["LECTURE_LIST_COL_4"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	arrayOldPage.forEach((item,index) => {
		index = number * dictionaryKey.limitRequestRegister + index + 1;
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-lecture-table-detail-strong';
		} 
		
		//console.log(item.id);
	
		
		trContent.innerHTML = "<td>"+dictionary.LECTURE_ROADMAP_COURSE_1+" "+(index)+"</td><td>"+item.title+"</td><td>"+item.courseType+"</td>"
		+"<td class='manage-list-lecture-table-detail-tr-modified'><a href=\"?mode=offline&page=lecture&action=edit&id="+item.id+"\"><div class='manage-list-lecture-table-detail-div-edit'>Chỉnh sửa</div></a><div class='manage-list-lecture-table-detail-div-delete' onclick=\"deleteLecture("+(index-1)+")\">Xóa</div></td>";
		tbody.appendChild(trContent);
	});
	parent.appendChild(tbody);
		
	}

	function loadOldPageTeacher(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = dictionaryKey.limitRequestRegister;
		let arrayOldPage = listTeacher.slice(startIndex, endIndex);
		
		let parent = document.getElementById("tableListTeacher");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["TEACHER_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_4"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_5"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	arrayOldPage.forEach((item,index) => {
		index = number * dictionaryKey.limitRequestRegister + index + 1;
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-teacher-table-detail-strong';
		} 
		trContent.innerHTML = "<td>"+(index)+"</td><td>"+(item.name != null ? item.name : "Thiếu") +"</td><td>"+(item.specialist != null ? item.specialist : "Thiếu")+"</td><td>"+(item.university != null ? item.university : "Thiếu") +"</td>"
		+"<td class='manage-list-teacher-table-detail-tr-modified'><a href=\"?mode=offline&page=teacher&action=edit&id="+item.id+"\"><div class='manage-list-teacher-table-detail-div-edit'>Chỉnh sửa</div></a><div class='manage-list-teacher-table-detail-div-delete' onclick=\"deleteTeacher("+(index-1)+")\">Xóa</div></td>";
		tbody.appendChild(trContent);
	});
	parent.appendChild(tbody);
	}
	
</script>
