<?php
?>
<script>
	//online
function showOnLineMode(){
	if(window.innerWidth > 480){
	   let onlineOpen = document.getElementById("homeMenuOnline");
		onlineOpen && function(){onlineOpen.style.display = "block"}();
	} else {
	   let onlineOpen = document.getElementById("smallHomeMenuOnline");
		onlineOpen && function(){onlineOpen.style.display = "block"}();
	   }
	
}

function hideOnLineMode(){
	if(window.innerWidth > 480){
	   	let onlineOpen = document.getElementById("homeMenuOnline");
	onlineOpen && function(){onlineOpen.style.display = "none"}();
	} else {
	   let onlineOpen = document.getElementById("smallHomeMenuOnline");
	onlineOpen && function(){onlineOpen.style.display = "none"}();
	   }

}
//offline
function showOffLineMode(){
// 	let offlineOpen = document.getElementById("homeMenuOffline");
// 	offlineOpen.style.display == "" || offlineOpen.style.display == undefined || offlineOpen.style.display == "none" ? function(){offlineOpen.style.display = "block"}() : function(){offlineOpen.style.display = "none"}();
	if(window.innerWidth > 480){
		let offlineOpen = document.getElementById("homeMenuOffline");
		offlineOpen && function(){offlineOpen.style.display = "block"}();
	} else {
	   let offlineOpen = document.getElementById("smallHomeMenuOffline");
		offlineOpen && function(){offlineOpen.style.display = "block"}();
	   }
}
	
function hideOffLineMode(){
	hideQAcademy();
	hideQVisit();
	if(window.innerWidth > 480){
	   let offlineOpen = document.getElementById("homeMenuOffline");
		offlineOpen && function(){offlineOpen.style.display = "none"}();
	} else {
	    let offlineOpen = document.getElementById("smallHomeMenuOffline");
		offlineOpen && function(){offlineOpen.style.display = "none"}();
	   }
	
}
	
//q-academy
function showQAcademy(){
	if(window.innerWidth > 480){
	   let qacademyOpen = document.getElementById("homeMenuQAcedemy");
		qacademyOpen && function(){qacademyOpen.style.display = "block"}();
	} else {
	    let qacademyOpen = document.getElementById("smallhomeMenuQAcedemy");
		qacademyOpen && function(){qacademyOpen.style.display = "block"}();
	   }
}

function hideQAcademy(){
	if(window.innerWidth > 480){
	   let qacademyOpen = document.getElementById("homeMenuQAcedemy");
		qacademyOpen && function(){qacademyOpen.style.display = "none"}();
	} else {
	    let qacademyOpen = document.getElementById("smallhomeMenuQAcedemy");
		qacademyOpen && function(){qacademyOpen.style.display = "none"}();
	   }
}
	
//q-visit
function showQVisit(){
	if(window.innerWidth > 480){
	   let qavisitOpen = document.getElementById("homeMenuQVisit");
		qavisitOpen && function(){qavisitOpen.style.display = "block"}();
	} else {
	    let qavisitOpen = document.getElementById("smallhMenuQVisit");
		qavisitOpen && function(){qavisitOpen.style.display = "block"}();
	   }
}

function hideQVisit(){
	if(window.innerWidth > 480){
	   let qavisitOpen = document.getElementById("homeMenuQVisit");
		qavisitOpen && function(){qavisitOpen.style.display = "none"}();
	} else {
	    let qavisitOpen = document.getElementById("smallhMenuQVisit");
		qavisitOpen && function(){qavisitOpen.style.display = "none"}();
	   }
}
	
//account
function showAccountMode(){
	if(window.innerWidth > 480){
	   let adminOpen = document.getElementById("homeMenuAccount");
		adminOpen && function(){adminOpen.style.display = "block"}();
	} else {
	     let adminOpen = document.getElementById("smallHomeMenuAccount");
		adminOpen && function(){adminOpen.style.display = "block"}();
	 }
	
}

function hideAccountMode(){
	if(window.innerWidth > 480){
	   let adminOpen = document.getElementById("homeMenuAccount");
		adminOpen && function(){adminOpen.style.display = "none"}();
	} else {
	     let adminOpen = document.getElementById("smallHomeMenuAccount");
		adminOpen && function(){adminOpen.style.display = "none"}();
	   }
	
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
	
	function setHightLightText(val){
		arrayHightlightTitle.forEach(function(item,index) {
			document.getElementById(item["id"]).style.color = "rgba(240,245,250,.7)";
			   document.getElementById(item["id"]).style.fontWeight = "500";
		});
		arrayHightlightTitle.some(function(item,index) {
			if(item["key"] == val){
				 document.getElementById(item["id"]).style.color = "#fafafa";
			   document.getElementById(item["id"]).style.fontWeight = "800";
				return true;
			 }
		});
	}
	
	function setBlueBackground(val){
		arrayBlueBackground.forEach(function(item,index) {
			document.getElementById(item["id"]).classList.remove("home-middle-left-menu-title-choosing");
		});
		
		arrayBlueBackground.some(function(item,index) {
			
			if(item["key"] == val){
				 document.getElementById(item["id"]).classList.add("home-middle-left-menu-title-choosing");
			   		document.getElementById(item["body"]).style.background = "#32373c";
				return true;
				 //console.log("adddd",document.getElementById(item["id"]).classList);
			 }
		});
	}
</script>
