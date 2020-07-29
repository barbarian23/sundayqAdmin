<?php

?>
<div class="home-parent">
	<!-- home header -->
	<div class="home-header">
		<a href="/"><img class="home-header-img" src='<?php echo $GLOBALS['URI_HEADER_ICON'] ; ?>'></a>
	</div>
	
	<!-- home middle -->
	<div class="home-middle" id="homeMiddle">

		<!-- home middle left -->
		<!--  large screen-->
		<div class="home-middle-left">
			<div class="home-middle-left-contain" action="get">
				<div class="home-middle-left-menu" id="dashboardName">
					<a  href=<?php echo $GLOBALS["ADMIN_HOME_URL_WITHOUT_SSL"]; ?>><i class="fa fa-dashboard" id="dashboardIcon"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_TITLE"]; ?></span></a>
					<div class="home-middle-left-menu-tooltip">
						<span><?php echo $GLOBALS["ADMIN_TITLE"]; ?></span>
					</div>
				</div>
				<!-- Học online -->
				<div class="home-middle-left-menu" id="divShowOnline">
					<div class="home-middle-left-menu-title">
						<i class="fa fa-mortar-board"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE"]; ?></span>
						<div class="home-middle-left-menu-tooltip">
							<span><?php echo $GLOBALS["ADMIN_ONLINE"]; ?></span>
						</div>
					</div>
					<div class="home-middle-left-menu-content" id="homeMenuOline">

					</div>
				</div>
					
				<!-- Học offline -->
				<div class="home-middle-left-menu" id="divShowOffline">
					<div class="home-middle-left-menu-title">
						<i class="fa fa-vcard"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_OFFLINE"]; ?></span>
						<div class="home-middle-left-menu-tooltip">
							<span><?php echo $GLOBALS["ADMIN_OFFLINE"]; ?></span>
						</div>
					</div>
					<div class="home-middle-left-menu-content" id="homeMenuOffline">
						<div class="home-middle-left-menu" id="homeMenuOfflineListLecture">
							<a href="?mode=offline&page=list-lecture"><i class="fa fa-calendar"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_OFFLINE_MANAGE_LECTURE"]; ?></span></a>
							<div class="home-middle-left-menu-tooltip">
								<span><?php echo $GLOBALS["ADMIN_OFFLINE_MANAGE_LECTURE"]; ?></span>
							</div>
						</div>

						<div class="home-middle-left-menu" id="homeMenuOfflinListTeacher">
							<a href="?mode=offline&page=list-teacher"><i class="fa fa-newspaper-o"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_OFFLINE_MANAGE_TEACHER"]; ?></span></a>
							<div class="home-middle-left-menu-tooltip">
								<span><?php echo $GLOBALS["ADMIN_OFFLINE_MANAGE_TEACHER"]; ?></span>
							</div>
						</div>
					</div>
				</div>
				
				<!-- admin -->
				<div class="home-middle-left-menu" id="divShowAccount">
					<div class="home-middle-left-menu-title" id="homeMenuOfflinListTeacher">
						<i class="	fa fa-address-book"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_SUPER"]; ?></span>
						<div class="home-middle-left-menu-tooltip">
							<span><?php echo $GLOBALS["ADMIN_SUPER"]; ?></span>
						</div>
					</div>
					<div class="home-middle-left-menu-content" id="homeMenuAccount">
						<div class="home-middle-left-menu" id="homeMenuAccountSuper">
						<a href="?mode=offline&page=list-account"><i class="fa fa-address-card-o"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_SUPER_ACCOUNT"]; ?></span></a>
							<div class="home-middle-left-menu-tooltip">
								<span><?php echo $GLOBALS["ADMIN_SUPER_ACCOUNT"]; ?></span>
							</div>
						</div>

						<div class="home-middle-left-menu" id="homeMenuAccountGroup">
							<a href="?mode=offline&page=list-group"><i class="fa fa-code-fork"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_SUPER_GROUP"]; ?></span></a>
							<div class="home-middle-left-menu-tooltip">
								<span><?php echo $GLOBALS["ADMIN_SUPER_GROUP"]; ?></span>
							</div>
						</div>
					</div>
				</div>
				
			</div>
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
 							//$arrForModeOfline = array($_GET["mode"]);
							echo "<script>setMode('offline')</script>";
 							//SunQHelper::callFunction("setMode",$arrForModeOfline);
 							//$temp ='123';
							//SunQHelper::consoleLogPHP($temp);
							if(isset($_GET["page"])){
 								if(isset($_GET["action"])){
 									echo "<script>setCurrentACtion('" . $_GET["action"] . "')</script>";
 									//echo "<script>console.log('" . $_GET["action"] . "')</script>";
 								}
								if(isset($_GET["id"])){
 									echo "<script>setCurrentEdit('" . $_GET["id"] . "')</script>";
 									//echo "<script>console.log('" . $_GET["action"] . "')</script>";
 								}
								switch($_GET["page"]){
									case "lecture":
										 include get_theme_file_path( "home/offline/lecture/lecture.php" );
										break;
									case "teacher":
										include get_theme_file_path( "home/offline/teacher/teacher.php" );
										break;
									case "account":
										include get_theme_file_path( "home/admin/account/account.php" );
										break;
									case "list-account":
										include get_theme_file_path( "home/admin/account/list-account.php" );
										break;
									case "group":
										include get_theme_file_path( "home/admin/group/group.php" );
										break;
									case "list-group":
										include get_theme_file_path( "home/admin/group/list-group.php" );
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
					} else {
						?>
					<div style="width: 100%;
								display: flex;
								flex-direction: column;
								justify-content: flex-end;
								align-items: flex-start;
								position: relative;
								padding-left: 9px;">
						<h1 style="color: #66b3ff;">
							Xin chào admin của SunQ
						</h1>
						<h2 id="mainmenuOnline" style="color: #66b3ff;margin-right:13%;cursor: pointer;">
							-Lựa chọn học trực tuyến để chỉnh sửa
						</h2>
						<h2 id="mainmenuOffline" style="color: #66b3ff;margin-right:10%;cursor: pointer;">
							-Lựa chọn học ngoại tuyến để chỉnh sửa
						</h2>
						<h2 id="mainmenuAccount" style="color: #66b3ff;margin-right:10%;cursor: pointer;">
							-Lựa chọn quản lý tài khoản
						</h2>
					</div>
						<?php
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
	
	let sunqModeOfflineDiv = document.getElementById("divShowOffline");
	sunqModeOfflineDiv && sunqModeOfflineDiv.addEventListener("click",function(){
				//console.log("divShowOffline");
				if(getMode() == sunQMode.offline){
				   		hideOffLineMode();
						setMode("none");
				   }else {
						setMode(sunQMode.offline);
				   }
			});


	let sunqModeOnlineDiv = document.getElementById("divShowOnline");
	sunqModeOnlineDiv && sunqModeOnlineDiv.addEventListener("click",function(){
				if(getMode() == sunQMode.online){
				   		hideOnLineMode();
						setMode("none");
				   }else {
						setMode(sunQMode.online);
				   }
				//setMode(sunQMode.online);
			});
	
	let sunQModeAccount = document.getElementById("divShowAccount");
	sunQModeAccount && sunQModeAccount.addEventListener("click",function(){
		if(getMode() == sunQMode.account){
				   		hideAccountMode();
						setMode("none");
				   }else {
						setMode(sunQMode.account);
				   }
				//setMode(sunQMode.account);
			});
	
let mainmenuOffline = document.getElementById("mainmenuOffline");
	
if(mainmenuOffline != null){
	   document.getElementById("mainmenuOffline").addEventListener("click",function(){
		 console.log("clickkkkk");
		   showOffLineMode();
	   });
}

let mainmenuOnline = document.getElementById("mainmenuOnline");
	
if(mainmenuOnline != null){
	   document.getElementById("mainmenuOnline").addEventListener("click",function(){
		   showOnLineMode();
	   });
}
	
let mainmenuAccount = document.getElementById("mainmenuAccount");
	
if(mainmenuAccount != null){
	   document.getElementById("mainmenuAccount").addEventListener("click",function(){
		   showAccountMode();
	   });
}
	
window.addEventListener("touchend",function(e){
	let arrayContainIdValid = ["dashboardNameSmall","dashboardNameSmallA","dashboardNameSmallI","dashboardNameSmallSPAN","smallHomeMenuOfflineDivContainListLecture","smallHomeMenuOfflineAContainListLecture","smallHomeMenuOfflineIContainListLecture","smallHomeMenuOfflineDivContainListTeacher","smallHomeMenuOfflineAContainListTeacher","smallHomeMenuOfflineIContainListTeacher","dashboardIconTopSmallDivContain"];
	let arrayContainValid = ["dashboardIconTopSmall","dashboardIconTopSmallDivContain"];
	//console.log(e.target.id,arrayContainIdValid.includes(e.target.id));
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