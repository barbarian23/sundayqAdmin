<?php

?>
<div class="home-parent">
	<!-- home header -->
	<div class="home-header">
		<img class="home-header-img" src='<?php echo $GLOBALS['URI_HEADER_ICON'] ; ?>'>
	</div>
	
	<!-- home middle -->
	<div class="home-middle" id="homeMiddle">

		<!-- home middle left -->
		<!--  large screen-->
		<div class="home-middle-left">
			<form action="get">
				<div class="home-middle-left-menu" id="dashboardName">
					<a  href=<?php echo $GLOBALS["ADMIN_HOME_URL_WITHOUT_SSL"]; ?>><i class="fa fa-dashboard" id="dashboardIcon"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_TITLE"]; ?></span></a>
				</div>
				<!-- Học online -->
				<div class="home-middle-left-menu">
					<i class="fa fa-mortar-board"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE"]; ?></span>
					<div id="homeMenuOline">

					</div>
				</div>
					
				<!-- Học offline -->
				<div class="home-middle-left-menu" id="divShowOffline">
					<i class="fa fa-vcard"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_OFFLINE"]; ?></span>
					
					<div id="homeMenuOffline">
						<div class="home-middle-left-menu">
							<a href="?mode=offline&page=list-lecture"><i class="fa fa-calendar"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_OFFLINE_MANAGE_LECTURE"]; ?></span></a>
						</div>

						<div class="home-middle-left-menu">
							<a href="?mode=offline&page=list-teacher"><i class="fa fa-newspaper-o"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_OFFLINE_MANAGE_TEACHER"]; ?></span></a>
						</div>
					</div>
				</div>
			</form>
		</div>

		<!--  small screen-->
		<div class="home-middle-left-small">
			<form action="get">
				<div class="home-middle-left-menu-small" id="dashboardIconTopSmallContent">
					<a id="dashboardIconTopSmallDivContain">
						<i class="fa fa-server" id="dashboardIconTopSmall"></i>
					</a>
				</div>
				<div class="home-middle-left-menu-small-content" id="menuContent">
					<div class="home-middle-left-menu-small" id="dashboardNameSmall">
						<a  id="dashboardNameSmallA" href=<?php echo $GLOBALS["ADMIN_HOME_URL_WITHOUT_SSL"]; ?>><i id="dashboardNameSmallI" class="fa fa-dashboard" ></i><span id="dashboardNameSmallSPAN"><?php echo $GLOBALS["ADMIN_TITLE"]; ?></span></a>
					</div>

					<!-- Học online -->
					<div class="home-middle-left-menu-small">
						<i class="fa fa-mortar-board"></i><span><?php echo $GLOBALS["ADMIN_ONLINE"]; ?></span>
						<div id="smallHomeMenuOnline">
							
						</div>
					</div>

					<!-- Học offline -->
					<div class="home-middle-left-menu-small">
						<i class="fa fa-calendar"></i><span><?php echo $GLOBALS["ADMIN_OFFLINE"]; ?></span>
						<div id="smallHomeMenuOffline">
							<div class="home-middle-left-menu-small" id="smallHomeMenuOfflineDivContainListLecture">
								<a href="?mode=offline&page=list-lecture" id="smallHomeMenuOfflineAContainListLecture"><i id="smallHomeMenuOfflineIContainListLecture" class="fa fa-newspaper-o"></i><?php echo $GLOBALS["ADMIN_OFFLINE_MANAGE_LECTURE"]; ?></a>
							</div>

							<div class="home-middle-left-menu-small" id="smallHomeMenuOfflineDivContainListTeacher">
								<a id="smallHomeMenuOfflineAContainListTeacher" href="?mode=offline&page=list-teacher"><i id="smallHomeMenuOfflineIContainListTeacher" class="fa fa-vcard"></i><?php echo $GLOBALS["ADMIN_OFFLINE_MANAGE_TEACHER"]; ?></a>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		
		<!-- home middle right -->
		<div class="home-middle-right">
			<div class="home-middle-right-contain">
				<?php
					if(isset($_GET["mode"])){
						if($_GET["mode"] == "online"){
							if(isset($_GET["page"])){

							}
						} else if($_GET["mode"] == "offline"){
 							$arrForModeOfline = array($_GET["mode"]);
							echo "<script>setMode('offline')</script>";
 							//SunQHelper::callFunction("setMode",$arrForModeOfline);
 							$temp ='123';
							//SunQHelper::consoleLogPHP($temp);
							if(isset($_GET["page"])){
								switch($_GET["page"]){
									case "lecture":
										 include get_theme_file_path( "home/offline/lecture/lecture.php" );
										break;
									case "teacher":
										include get_theme_file_path( "home/offline/teacher/teacher.php" );
										break;
									case "list-lecture":
										include get_theme_file_path( "home/offline/lecture/list-lecture.php" );
										break;
									case "list-teacher":
										include get_theme_file_path( "home/offline/teacher/list-teacher.php" );
										break;
									default:
										break;
								}
							}
						}
					}
				?>
			</div>
		</div>
	
	</div>
		
	<!-- home footer -->
	<div class="home-footer">
		
	</div>
</div>
<script>
// 	function showHideMenu(){alert("click");
// 		if(document.getElementById("menuContent").style.display == "none" || document.getElementById("menuContent").style.display == ""){
		
// 		document.getElementById("menuContent").style.display = "flex";
// 	} else {
		
// 		document.getElementById("menuContent").style.display = "none";
// 	}
// 	}
 	
// document.addEventListener('touchstart', function() {
//     document.getElementById("dashboardIconTopSmallDivContain").style.pointerEvents  = "auto";
// });

// document.addEventListener('touchmove', function(e) {
//     e.preventDefault();
//     document.getElementById("dashboardIconTopSmallDivContain").style.pointerEvents  = "auto";
// });

// document.addEventListener('touchend', function() {
//     setTimeout(function() {
//         document.getElementById("dashboardIconTopSmallDivContain").style.pointerEvents  = "none";
//     }, 0);
// });
	
// document.getElementById("dashboardIconTopSmallDivContain").addEventListener("touchstart",function(){
// 	getOpenMenu() ? setOpenMenu(false) : setOpenMenu(true);
// });
// document.getElementById("homeMiddle").addEventListener("touchend",function(e){
// 	console.log(e.target.id," ",e.parentNode);
// 	//let tempArrayMayClose = [];
// 	if(e.target.id != "dashboardIconTopSmall"){
// 		if(document.getElementById("menuContent").style.display != "none" && document.getElementById("menuContent").style.display != ""){
			
// 			document.getElementById("menuContent").style.display = "none";
// 		}
// 	}
// });
	
window.addEventListener("touchend",function(e){
	let arrayContainIdValid = ["dashboardNameSmall","dashboardNameSmallA","dashboardNameSmallI","dashboardNameSmallSPAN","smallHomeMenuOfflineDivContainListLecture","smallHomeMenuOfflineAContainListLecture","smallHomeMenuOfflineIContainListLecture","smallHomeMenuOfflineDivContainListTeacher","smallHomeMenuOfflineAContainListTeacher","smallHomeMenuOfflineIContainListTeacher","dashboardIconTopSmallDivContain"];
	let arrayContainValid = ["dashboardIconTopSmall","dashboardIconTopSmallDivContain"];
	console.log(e.target.id,arrayContainIdValid.includes(e.target.id));
	if(!arrayContainIdValid.includes(e.target.id)){
		if (arrayContainValid.includes(e.target.id)){
			getOpenMenu() ? setOpenMenu(false) : setOpenMenu(true);
		} else {
		 setOpenMenu(false);
		}
	} else {
		//getOpenMenu() ? setOpenMenu(false) : setOpenMenu(true);
	}
});
</script>