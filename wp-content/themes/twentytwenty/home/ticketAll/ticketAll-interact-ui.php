<?php ?>
<script>
	
	function loadingDataticketAllProgress(){
	document.getElementById("ticketAll-page-loading").style.display = "flex" ;
	document.getElementById("ticketAll-page-loading-progress-error").style.display = "none" ;
	document.getElementById("ticketAll-page-loading-progress").style.display = "block" ;
	//document.getElementById("centerInfoclass-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDataticketAllDone(){
	document.getElementById("ticketAll-page-loading").style.display = "none" ;
}
	
function loadingDataticketAllError(){
	document.getElementById("ticketAll-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("ticketAll-page-loading-progress").style.display = "none" ;
	//document.getElementById("centerInfoclass-page-loading-progress-span").style.display = "none" ;
}
	
	
	function showProgressListticketAllclass(){
	document.getElementById("fetchListticketAllclassProgress").style.display = "flex" ;
}

function hideProgressListticketAllclass(){
	document.getElementById("fetchListticketAllclassProgress").style.display = "none" ;
}

function getListticketAllclassSuccess(){
	document.getElementById("listticketAllclassError").style.display = "none" ;
	document.getElementById("tableListticketAllclass").style.display = "flex" ;
}

function getListticketAllclassFailed(){
	document.getElementById("listticketAllclassError").style.display = "flex" ;
	document.getElementById("tableListticketAllclass").style.display = "none" ;
}
	
function getListticketAllclassGreaterThanZero(){
	document.getElementById("listticketAllclassEmpty").style.display = "none" ;
	document.getElementById("tableListticketAllclass").style.display = "flex" ;
	//fillTableListLecture();
}

function getListticketAllclassEqualToZero(){
	document.getElementById("listticketAllclassEmpty").style.display = "flex" ;
	document.getElementById("tableListticketAllclass").style.display = "none" ;
	emptyTableListticketAllclass();
}
	
function loadingDataticketAllclassProgress(){
	document.getElementById("ticketAll-page-loading").style.display = "flex" ;
	document.getElementById("ticketAll-page-loading-progress-error").style.display = "none" ;
	document.getElementById("ticketAll-page-loading-progress").style.display = "block" ;
	//document.getElementById("ticketAllclass-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDataticketAllclassDone(){
	document.getElementById("ticketAll-page-loading").style.display = "none" ;
}
	
function loadingDataticketAllclassError(){
	document.getElementById("ticketAll-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("ticketAll-page-loading-progress").style.display = "none" ;
	//document.getElementById("ticketAllclass-page-loading-progress-span").style.display = "none" ;
}
	
function selectticketAllclassIndex(item){
	
}
	
function emptyTableListticketAllclass(){
	document.getElementById("tableListticketAllclass").innerHTML = "";
	//listRollGroup.length = 0;
}
		
	function transctionToInitVideo(){
		
	}
	
	function transctionToticketAllclass(){
		
	}
	
</script>