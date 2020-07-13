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
	listLecture = list;
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
	
		
		trContent.innerHTML = "<td>"+dictionary.LECTURE_ROADMAP_COL_1+" "+(index + 1)+"</td><td>"+item.title+"</td><td>"+item.courseType+"</td>"
		+"<td class='manage-list-lecture-table-detail-tr-modified'><a href=\"?mode=offline&page=lecture&action=edit&id="+item.id+"\"><div class='manage-list-lecture-table-detail-div-edit'>Chỉnh sửa</div></a></td>";
		tbody.appendChild(trContent);
	});
	parent.appendChild(tbody);
}

function createListTeacher(list){
	listLecture = list;
	let parent = document.getElementById("tableListTeacher");
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["TEACHER_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_4"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_5"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	list.forEach((item,index) => {
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-lecture-table-detail-strong';
		} 
		trContent.innerHTML = "<td>"+(index + 1)+"</td><td>"+item.name+"</td><td>"+item.specialist+"</td><td>"+item.university+"</td>"
		+"<td class='manage-list-teacher-table-detail-tr-modified'><a href=\"?mode=offline&page=teacher&action=edit&id="+item.id+"\"><div class='manage-list-teacher-table-detail-div-edit'>Chỉnh sửa</div></a></td>";
		tbody.appendChild(trContent);
	});
	parent.appendChild(tbody);
}

function createListTeacherLecture(list){
	let parent = document.getElementById("divTeacherInLecture");
	parent.innerHTML = "";
	list.forEach((item,index)=> {
		let div1 = document.createElement("div");
		div1.className = "manage-section-detail-left-item";
		div1.id = "selecTeacher_"+index;
		
		let div2 = document.createElement("img");
		div2.className = "manage-section-detail-left-item-avatar";

		let div3 = document.createElement("div");
		div3.className = "manage-section-detail-left-item-info";

		let span1 = document.createElement("span");
		span1.className = "manage-section-detail-left-item-info-name";
		span1.innerHTML = item.degree + " " + item.name;

		let span2 = document.createElement("span");
		span2.className = "manage-section-detail-left-item-info-university";
		span2.innerHTML = item.university;
		
		let hrDiv = document.createElement("hr");
		hrDiv.className = "lecture-teacher-hr";
		
		let span3 = document.createElement("span");
		span3.innerHTML = "<b>"+'<?php echo $GLOBALS["TEACHER_LESSION_SPECIALIST"]; ?>'+"</b>"+item.specialist;
		
		let span4 = document.createElement("span");
		span4.innerHTML = "<b>"+'<?php echo $GLOBALS["TEACHER_LESSION_EXP"]; ?>'+"</b>"+item.practiceAt;
		
		let span5 = document.createElement("span");
		span5.innerHTML = "<b>"+'<?php echo $GLOBALS["TEACHER_LESSION_DEGREE"]; ?>'+"</b><span></span>Giáo viên";
		
		div3.appendChild(span1);
		div3.appendChild(span2);
		div3.appendChild(hrDiv);
		div3.appendChild(span3);
		div3.appendChild(span4);
		div3.appendChild(span5);
		
		div1.appendChild(div2);
		div1.appendChild(div3);
		
		div1.addEventListener("click",function(){
			setCurrentSelectTeacher(index,item);
			setChoosingSelectTeacherMain(false);
		});
		
		parent.appendChild(div1);
	})
}
	
function selectTeacherIndex(index){
	document.getElementById("currentSelectName").innerHTML = index.degree + " " + index.name;
	document.getElementById("currentSelectUniversity").innerHTML = index.university;
	document.getElementById("currentSelectSpecial").innerHTML = index.specialist;
	document.getElementById("currentSelectExp").innerHTML = index.practiceAt;
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
	
	document.getElementById("loginErrorSpan").style.display = "block" ;
	document.getElementById("loginErrorSpan").innerHTML = val;
}

function loginSuccess(){
	document.getElementById("loginErrorSpan").style.display = "none" ;
}
</script>