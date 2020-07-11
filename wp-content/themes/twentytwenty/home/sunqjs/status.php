<?php

?>
<script>
var sunqStatus = {
	mode:"offline", //offline hoặc online
	isOpenMenu:false,
	isChoosingSelectTeacherMain:false
}
var _mode = "offline",
	_isOpenMenu = false,
	_isChoosingSelectTeacherMain = false;
	
//mode setting
Object.defineProperty(sunqStatus,"mode",{
	get(){
		return _mode;
	},
	set(val){
		_mode = val;
		handleChooseMode(val);
	}
});

//open menu
Object.defineProperty(sunqStatus,"isOpenMenu",{
	get(){
		return _isOpenMenu;
	},
	set(val){
		_isOpenMenu = val;
		val ? document.getElementById("menuContent").style.display = "flex" : document.getElementById("menuContent").style.display = "none" ;
	}
});

//open choose select main teacher
Object.defineProperty(sunqStatus,"isChoosingSelectTeacherMain",{
	get(){
		return _isChoosingSelectTeacherMain;
	},
	set(val){
		_isChoosingSelectTeacherMain = val;
		val ? document.getElementById("listMainTeacher").style.display = "flex" : document.getElementById("listMainTeacher").style.display = "none" ;
	}
});

function setChoosingSelectTeacherMain(val){
	sunqStatus.isChoosingSelectTeacherMain = val;
}

function getChoosingSelectTeacherMain(){
	return sunqStatus.isChoosingSelectTeacherMain;
}	
	
function setOpenMenu(val){
	sunqStatus.isOpenMenu = val;
}

function getOpenMenu(){
	return sunqStatus.isOpenMenu;
}
	
function setMode(val){
	sunqStatus.mode = val;
}

function getMode(){
	return sunqStatus.mode;
}
	
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

function handleChooseMode(val){
	val == sunQMode.offline ? (showOffLineMode(), hideOnlineMode()) :  (hideOfflineMode(), showOnlineMode());
} 


</script>
