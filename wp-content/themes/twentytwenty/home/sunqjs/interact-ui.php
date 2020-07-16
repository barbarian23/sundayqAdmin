<?php
?>
<script>
function showOffLineMode(){
	let offlineOpen = document.getElementById("homeMenuOffline");
	offlineOpen && function(){offlineOpen.style.display = "block"}();
}
	
function hideOfflineMode(){
	let offlineOpen = document.getElementById("homeMenuOffline");
	offlineOpen && function(){offlineOpen.style.display = "none"}();
}

function showOnlineMode(){
	let onlineOpen = document.getElementById("homeMenuOnline");
	onlineOpen && function(){onlineOpen.style.display = "block"}();
}

function hideOnlineMode(){
	let onlineOpen = document.getElementById("homeMenuOnline");
	onlineOpen && function(){onlineOpen.style.display = "block"}();
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
	
function createListLEcture(list){
	listLecture = list;console.log("lisst lec",listLecture);
	let parent = document.getElementById("tableListLecture");
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["LECTURE_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["LECTURE_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["LECTURE_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["LECTURE_LIST_COL_4"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	list.forEach((item,index) => {
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-lecture-table-detail-strong';
		} 
		
		//console.log(item.id);
	
		
		trContent.innerHTML = "<td>"+dictionary.LECTURE_ROADMAP_COURSE_1+" "+(index + 1)+"</td><td>"+item.title+"</td><td>"+item.courseType+"</td>"
		+"<td class='manage-list-lecture-table-detail-tr-modified'><a href=\"?mode=offline&page=lecture&action=edit&id="+item.id+"\"><div class='manage-list-lecture-table-detail-div-edit'>Chỉnh sửa</div></a><div class='manage-list-lecture-table-detail-div-delete' onclick=\"deleteLecture("+index+")\">Xóa</div></td>";
		tbody.appendChild(trContent);
	});
	parent.appendChild(tbody);
}

function createListTeacher(list){
	listTeacher = list;
	let parent = document.getElementById("tableListTeacher");
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["TEACHER_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_4"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_5"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	list.forEach((item,index) => {
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-teacher-table-detail-strong';
		} 
		trContent.innerHTML = "<td>"+(index + 1)+"</td><td>"+(item.name != null ? item.name : "Thiếu") +"</td><td>"+(item.specialist != null ? item.specialist : "Thiếu")+"</td><td>"+(item.university != null ? item.university : "Thiếu") +"</td>"
		+"<td class='manage-list-teacher-table-detail-tr-modified'><a href=\"?mode=offline&page=teacher&action=edit&id="+item.id+"\"><div class='manage-list-teacher-table-detail-div-edit'>Chỉnh sửa</div></a><div class='manage-list-teacher-table-detail-div-delete' onclick=\"deleteTeacher("+index+")\">Xóa</div></td>";
		tbody.appendChild(trContent);
	});
	parent.appendChild(tbody);
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
		div1.addEventListener("click",function(){
			if(!getChoosingMultiTeacher()){	
				//setCurrentSelectTeacher(item.id,item);
				
				currentOwners.push(item.id);
			} else {
				currentOwners[0] = item.id;
			}
			selectTeacherIndex(item);
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
	
function chooseMultiOwwner(){
	
}
	
function chooseSingleOwwner(){
	
}
</script>
