<?php
?>
<script>
	//online
var showOnLineMode = function(){
	if(window.innerWidth > 480){
	   let onlineOpen = document.getElementById("homeMenuOnline");
		onlineOpen && function(){onlineOpen.style.display = "block"}();
	} else {
	   let onlineOpen = document.getElementById("smallHomeMenuOnline");
		onlineOpen && function(){onlineOpen.style.display = "block"}();
	   }
	
}

var hideOnLineMode = function(){console.log("hidddd");
	hideUpload();
	hideFreeQ();
	hideSteamQ();
	hideManageAccount();
	if(window.innerWidth > 480){
	   	let onlineOpen = document.getElementById("homeMenuOnline");
	onlineOpen && function(){onlineOpen.style.display = "none"}();
	} else {
	   let onlineOpen = document.getElementById("smallHomeMenuOnline");
	onlineOpen && function(){onlineOpen.style.display = "none"}();
	   }

}

//Manage Account
function showManageAccount(){
	if(window.innerWidth > 480){
	   let sUserAccount = document.getElementById("homeMenuManageAccount");
		sUserAccount && function(){sUserAccount.style.display = "block"}();
	} else {
	    let sUserAccount = document.getElementById("smallhomeMenuManageAccount");
		sUserAccount && function(){sUserAccount.style.display = "block"}();
	   }
	if(window.innerWidth > 480){
	   let onlineFreeQ = document.getElementById("homeMenuConfirmBanking");
		onlineFreeQ && function(){onlineFreeQ.style.display = "block"}();
	} else {
	    let onlineFreeQ = document.getElementById("smallhomeMenuConfirmBanking");
		onlineFreeQ && function(){onlineFreeQ.style.display = "block"}();
	   }
	if(window.innerWidth > 480){
	   let onlineFreeQ = document.getElementById("homeMenuUserAccount");
		onlineFreeQ && function(){onlineFreeQ.style.display = "block"}();
	} else {
	    let onlineFreeQ = document.getElementById("smallhomeMenuUserAccount");
		onlineFreeQ && function(){onlineFreeQ.style.display = "block"}();
	   }
}

function hideManageAccount(){
	hideAccountUser();
	hideConfirmBanking();
	if(window.innerWidth > 480){
	   let sUserAccount = document.getElementById("homeMenuManageAccount");
		sUserAccount && function(){sUserAccount.style.display = "none"}();
	} else {
	    let sUserAccount = document.getElementById("smallhomeMenuManageAccount");
		sUserAccount && function(){sUserAccount.style.display = "none"}();
	   }
}
//consifrm banking
function showConfirmBanking(){
	showManageAccount();
	if(window.innerWidth > 480){
	   let onlineFreeQ = document.getElementById("homeMenuConfirmBanking");
		onlineFreeQ && function(){onlineFreeQ.style.display = "block"}();
	} else {
	    let onlineFreeQ = document.getElementById("smallhomeMenuConfirmBanking");
		onlineFreeQ && function(){onlineFreeQ.style.display = "block"}();
	   }
}

function hideConfirmBanking(){
	if(window.innerWidth > 480){
	   let onlineFreeQ = document.getElementById("homeMenuConfirmBanking");
		onlineFreeQ && function(){onlineFreeQ.style.display = "none"}();
	} else {
	    let onlineFreeQ = document.getElementById("smallhomeMenuConfirmBanking");
		onlineFreeQ && function(){onlineFreeQ.style.display = "none"}();
	   }
}
//list user account
function showAccountUser(){
	showManageAccount();
	if(window.innerWidth > 480){
	   let onlineFreeQ = document.getElementById("homeMenuUserAccount");
		onlineFreeQ && function(){onlineFreeQ.style.display = "block"}();
	} else {
	    let onlineFreeQ = document.getElementById("smallhomeMenuUserAccount");
		onlineFreeQ && function(){onlineFreeQ.style.display = "block"}();
	   }
}

function hideAccountUser(){
	if(window.innerWidth > 480){
	   let onlineFreeQ = document.getElementById("homeMenuUserAccount");
		onlineFreeQ && function(){onlineFreeQ.style.display = "none"}();
	} else {
	    let onlineFreeQ = document.getElementById("smallhomeMenuUserAccount");
		onlineFreeQ && function(){onlineFreeQ.style.display = "none"}();
	   }
}
	
//freeQ
function showFreeQ(){
	if(window.innerWidth > 480){
	   let onlineFreeQ = document.getElementById("homeMenuFreeQ");
		onlineFreeQ && function(){onlineFreeQ.style.display = "block"}();
	} else {
	    let onlineFreeQ = document.getElementById("smallhomeMenuFreeQ");
		onlineFreeQ && function(){onlineFreeQ.style.display = "block"}();
	   }
}

function hideFreeQ(){
	hideFreeQLesson1();
	hideFreeQLesson2();
	hideFreeQLesson3();
	if(window.innerWidth > 480){
	   let onlineFreeQ = document.getElementById("homeMenuFreeQ");
		onlineFreeQ && function(){onlineFreeQ.style.display = "none"}();
	} else {
	    let onlineFreeQ = document.getElementById("smallhomeMenuFreeQ");
		onlineFreeQ && function(){onlineFreeQ.style.display = "none"}();
	   }
}

//freeQ Lesson1
function showFreeQLesson1(){
	showFreeQ();
	if(window.innerWidth > 480){
	   let onlineFreeQ = document.getElementById("homeMenuFreeLesson1");
		onlineFreeQ && function(){onlineFreeQ.style.display = "block"}();
	} else {
	    let onlineFreeQ = document.getElementById("smallhomeMenuFreeLesson1");
		onlineFreeQ && function(){onlineFreeQ.style.display = "block"}();
	   }
}

function hideFreeQLesson1(){
	if(window.innerWidth > 480){
	   let onlineFreeQ = document.getElementById("homeMenuFreeLesson1");
		onlineFreeQ && function(){onlineFreeQ.style.display = "none"}();
	} else {
	    let onlineFreeQ = document.getElementById("smallhomeMenuFreeLesson1");
		onlineFreeQ && function(){onlineFreeQ.style.display = "none"}();
	   }
}
//freeQ lesson2
function showFreeQLesson2(){
	showFreeQ();
	if(window.innerWidth > 480){
	   let onlineFreeQ = document.getElementById("homeMenuFreeLesson2");
		onlineFreeQ && function(){onlineFreeQ.style.display = "block"}();
	} else {
	    let onlineFreeQ = document.getElementById("smallhomeMenuFreeLesson2");
		onlineFreeQ && function(){onlineFreeQ.style.display = "block"}();
	   }
}

function hideFreeQLesson2(){
	if(window.innerWidth > 480){
	   let onlineFreeQ = document.getElementById("homeMenuFreeLesson2");
		onlineFreeQ && function(){onlineFreeQ.style.display = "none"}();
	} else {
	    let onlineFreeQ = document.getElementById("smallhomeMenuFreeLesson2");
		onlineFreeQ && function(){onlineFreeQ.style.display = "none"}();
	   }
}
//freeQ lesson3
	function showFreeQLesson3(){
		showFreeQ();
	if(window.innerWidth > 480){
	   let onlineFreeQ = document.getElementById("homeMenuFreeLesson3");
		onlineFreeQ && function(){onlineFreeQ.style.display = "block"}();
	} else {
	    let onlineFreeQ = document.getElementById("smallhomeMenuFreeLesson3");
		onlineFreeQ && function(){onlineFreeQ.style.display = "block"}();
	   }
}

function hideFreeQLesson3(){
	if(window.innerWidth > 480){
	   let onlineFreeQ = document.getElementById("homeMenuFreeLesson3");
		onlineFreeQ && function(){onlineFreeQ.style.display = "none"}();
	} else {
	    let onlineFreeQ = document.getElementById("smallhomeMenuFreeLesson3");
		onlineFreeQ && function(){onlineFreeQ.style.display = "none"}();
	   }
}
//upload
function showUpload(){
	if(window.innerWidth > 480){
	   let onlineUpload = document.getElementById("homeMenuUpload");
		onlineUpload && function(){onlineUpload.style.display = "block"}();
	} else {
	    let onlineUpload = document.getElementById("smallhomeMenuUpload");
		onlineUpload && function(){onlineUpload.style.display = "block"}();
	   }
}
	
function hideUpload(){
	if(window.innerWidth > 480){
	   let onlineUpload = document.getElementById("homeMenuUpload");
		onlineUpload && function(){onlineUpload.style.display = "none"}();
	} else {
	    let onlineUpload = document.getElementById("smallhomeMenuUpload");
		onlineUpload && function(){onlineUpload.style.display = "none"}();
	   }
}
	
//offline
var showOffLineMode = function(){
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
	
var hideOffLineMode = function(){
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
var showAccountMode = function(){
	if(window.innerWidth > 480){
	   let adminOpen = document.getElementById("homeMenuAccount");
		adminOpen && function(){adminOpen.style.display = "block"}();
	} else {
	     let adminOpen = document.getElementById("smallHomeMenuAccount");
		adminOpen && function(){adminOpen.style.display = "block"}();
	 }
	
}

var hideAccountMode = function(){
	if(window.innerWidth > 480){
	   let adminOpen = document.getElementById("homeMenuAccount");
		adminOpen && function(){adminOpen.style.display = "none"}();
	} else {
	     let adminOpen = document.getElementById("smallHomeMenuAccount");
		adminOpen && function(){adminOpen.style.display = "none"}();
	   }
	
}
	
	//chat
var showChatMode = function(){
	if(window.innerWidth > 480){
	 
	} else {
	   
	 }
	
}

var hideChatMode = function(){
	if(window.innerWidth > 480){
	  
	} else {
	     
	   }
	
}

//steamq
function showSteamQ(){
	if(window.innerWidth > 480){
	   let onlineSteamQ = document.getElementById("homeMenuSteamQ");
		onlineSteamQ && function(){onlineSteamQ.style.display = "block"}();
	} else {
	    let onlineSteamQ = document.getElementById("smallhomeMenuSteamQ");
		onlineSteamQ && function(){onlineSteamQ.style.display = "block"}();
	   }
}

function hideSteamQ(){
	hideAllSteamQPart();
	if(window.innerWidth > 480){
	   let onlineSteamQ = document.getElementById("homeMenuSteamQ");
		onlineSteamQ && function(){onlineSteamQ.style.display = "none"}();
	} else {
	    let onlineFreeQ = document.getElementById("smallhomeMenuSteamQ");
		onlineFreeQ && function(){onlineFreeQ.style.display = "none"}();
	   }
}
	
var showSteamQPartDetail = function(part){console.log("showSteamQPart ",part);
	showSteamQ();
	//setMode(sunQMode.steamqpart);
	if(window.innerWidth > 480){
	   let adminOpen = document.getElementById("homeMenuSteamQ"+part);
		adminOpen && function(){adminOpen.style.display = "block"}();
	} else {
	     let adminOpen = document.getElementById("smallHomeMenuSteamQ"+part);
		adminOpen && function(){adminOpen.style.display = "block"}();
	 }
	
}

var hideSteamQPartDetail = function(part){
	setMode("none");
	if(window.innerWidth > 480){
	   let adminOpen = document.getElementById("homeMenuSteamQ"+part);
		adminOpen && function(){adminOpen.style.display = "none"}();
	} else {
	     let adminOpen = document.getElementById("smallHomeMenuSteamQ"+part);
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
		
function fetchingSteamqClass(){
	setSteamqClassFetching(0);
	requestToSever(
                sunQRequestType.get,
                getURLListClass(),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    if (res.code === networkCode.success) {
                    	setSteamqClassFetching(1);
						let cdata = res.data.classes;
// 						let parent = document.getElementById("homeMenuSteamQ");
// 						let childPartent2 = parent.innerHTML;
						//parent.innerHTML = "";
						cdata.forEach((item,index)=>{
							arrayHightlightTitle.push({key:"steamq-kit-class-" + index,id:"title-manage-steamq-add-class-" + index});
							arrayBlueBackground.push({key:"steamq-kit-class-" + index,id:"divShowSteamQ",body:"homeMenuSteamQ"});
							
							arrayHightlightTitle.push({key:"steamq-kit-add-lesson-" + index,id:"title-manage-steamq-add-class-" + index});
							arrayBlueBackground.push({key:"steamq-kit-add-lesson-" + index,id:"divShowSteamQ",body:"homeMenuSteamQ"});
							//console.log(item);
							STEAMQ_CLASS.push(item);
							//console.log(STEAMQ_CLASS.length);
							//console.log(STEAMQ_CLASS[0])
							let parent = document.getElementById("homeMenuSteamQClass");
							let divOuter = document.createElement("div");
							divOuter.id = "homeMenuSteamQClass"+index;
							divOuter.className = "home-middle-left-menu";
							
							let diva = document.createElement("a");
							diva.href = '?mode=online&page=steamq-kit-class-' + index + '&sclass=' + index + '&id=' + item.id + '&category=science';
							let divai = document.createElement("i");
							divai.className = "fa fa-calendar";
							let divaispan = document.createElement("span");
							divaispan.id = "title-manage-steamq-add-class-"+index;
							divaispan.className = "home-middle-left-menu-text";
							divaispan.innerHTML = item.description

							diva.appendChild(divai);
							diva.appendChild(divaispan);
							divOuter.appendChild(diva);


							let divTooltip = document.createElement("div");
							let spanTooltip = document.createElement("span");
							spanTooltip,innerHTML = '<?php echo $GLOBALS["ADMIN_ONLINE_STEAMQ_ADD_CLASS"]; ?>';
							divTooltip.appendChild(spanTooltip);

							parent.appendChild(divOuter);
							parent.appendChild(divTooltip);
							});
							setHightLightText(getPage());
                            setBlueBackground(getPage());
// 							let childPartent1 = parent.innerHTML;
// 							parent.innerHTML = "";
// 							parent.innerHTML = childPartent1 + "" + childPartent2;
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    	setSteamqClassFetching(-1);
					
                    SunQAlert()
                        .position('center')
                        .title(dictionaryKey.ERROR_API_MESSAGE)
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
	
function chooseMultiOwwner(){
	
}
	
function chooseSingleOwwner(){
	
}
	
	function setHightLightText(val){
		arrayHightlightTitle.forEach(function(item,index) {//console.log(item["id"]);
			if(document.getElementById(item["id"]) && item["id"] != "title-manage-ticket-all"){
			document.getElementById(item["id"]).style.color = "rgba(240,245,250,.7)";
			   document.getElementById(item["id"]).style.fontWeight = "500";
		}
		});
		arrayHightlightTitle.some(function(item,index) {
			if(item["key"] == val){
				if(document.getElementById(item["id"])){
				 document.getElementById(item["id"]).style.color = "#fafafa";
			   document.getElementById(item["id"]).style.fontWeight = "800";
				}
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
			   		document.getElementById(item["body"]).style.background = "#48606a";
				return true;
				 //console.log("adddd",document.getElementById(item["id"]).classList);
			 }
		});
	}
</script>
