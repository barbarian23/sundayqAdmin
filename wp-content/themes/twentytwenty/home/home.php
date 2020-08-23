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
						<i class="fa fa-mortar-board"></i><span class="home-middle-left-menu-text  home-middle-left-menu-header-text-style"><?php echo $GLOBALS["ADMIN_ONLINE"]; ?></span>
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
						<i class="fa fa-vcard"></i><span class="home-middle-left-menu-text home-middle-left-menu-header-text-style"><?php echo $GLOBALS["ADMIN_OFFLINE"]; ?></span>
						<div class="home-middle-left-menu-tooltip">
							<span><?php echo $GLOBALS["ADMIN_OFFLINE"]; ?></span>
						</div>
					</div>
					<div class="home-middle-left-menu-content" id="homeMenuOffline">
						<!-- Q-Academy -->
							<div class="" id="divShowQAcademy">
								<i class="fa fa-vcard"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_Q_ACADEMY"]; ?></span>
								<div class="home-middle-left-menu-tooltip">
									<span><?php echo $GLOBALS["ADMIN_Q_ACADEMY"]; ?></span>
								</div>
							</div>
						<div class="home-middle-left-menu-content" id="homeMenuQAcedemy">	
							<!-- khóa học -->
							<div class="home-middle-left-menu" id="homeMenuOfflineListLecture">
								<a href="?mode=offline&page=list-lecture"><i class="fa fa-calendar"></i><span id="title-manage-lecture" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_OFFLINE_MANAGE_LECTURE"]; ?></span></a>
								<div class="home-middle-left-menu-tooltip">
									<span><?php echo $GLOBALS["ADMIN_OFFLINE_MANAGE_LECTURE"]; ?></span>
								</div>
							</div>

							<!-- giảng viên -->
							<div class="home-middle-left-menu" id="homeMenuOfflinListTeacher">
								<a href="?mode=offline&page=list-teacher"><i class="fa fa-newspaper-o"></i><span id="title-manage-teacher" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_OFFLINE_MANAGE_TEACHER"]; ?></span></a>
								<div class="home-middle-left-menu-tooltip">
									<span><?php echo $GLOBALS["ADMIN_OFFLINE_MANAGE_TEACHER"]; ?></span>
								</div>
							</div>
						</div>
						<!-- Q-Visit -->
						<div class="" id="divShowQVisit">
							<i class="fa fa-vcard"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_Q_VISIT"]; ?></span>
							<div class="home-middle-left-menu-tooltip">
								<span><?php echo $GLOBALS["ADMIN_Q_VISIT"]; ?></span>
							</div>
						</div>
						<div class="home-middle-left-menu-content" id="homeMenuQVisit">
							<!-- triển lãm -->
							<div class="home-middle-left-menu" id="homeMenuQVisitListExhibiton">
								<a href="?mode=offline&page=list-exhibition"><i class="fa fa-calendar"></i><span id="title-manage-exhibition" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_Q_ACADEMY_MANAGE_EXHIBITION"]; ?></span></a>
								<div class="home-middle-left-menu-tooltip">
									<span><?php echo $GLOBALS["ADMIN_Q_ACADEMY_MANAGE_EXHIBITION"]; ?></span>
								</div>
							</div>

							<!-- sự kiện đang diễn ra -->
							<div class="home-middle-left-menu" id="homeMenuQVisitListEvent">
								<a href="?mode=offline&page=list-event"><i class="fa fa-newspaper-o"></i><span id="title-manage-event" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_Q_ACADEMY_MANAGE_EVENT"]; ?></span></a>
								<div class="home-middle-left-menu-tooltip">
									<span><?php echo $GLOBALS["ADMIN_Q_ACADEMY_MANAGE_EVENT"]; ?></span>
								</div>
							</div>
							
							<!-- liên hệ q-visit -->
							<div class="home-middle-left-menu" id="homeMenuQVisitListContact">
								<a href="?mode=offline&page=list-contact"><i class="fa fa-newspaper-o"></i><span id="title-manage-contact" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_Q_ACADEMY_MANAGE_CONTACT"]; ?></span></a>
								<div class="home-middle-left-menu-tooltip">
									<span><?php echo $GLOBALS["ADMIN_Q_ACADEMY_MANAGE_CONTACT"]; ?></span>
								</div>
							</div>
							
							<!-- ticket -->
							<div class="home-middle-left-menu" id="homeMenuQVisitListTicket">
								<a href="?mode=offline&page=list-ticket"><i class="fa fa-newspaper-o"></i><span id="title-manage-ticket" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_Q_ACADEMY_MANAGE_TICKET"]; ?></span></a>
								<div class="home-middle-left-menu-tooltip">
									<span><?php echo $GLOBALS["ADMIN_Q_ACADEMY_MANAGE_TICKET"]; ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- admin -->
				<div class="home-middle-left-menu" id="divShowAccount">
					<div class="home-middle-left-menu-title" id="homeMenuManageAdmin">
						<i class="	fa fa-address-book"></i><span class="home-middle-left-menu-text home-middle-left-menu-header-text-style"><?php echo $GLOBALS["ADMIN_SUPER"]; ?></span>
						<div class="home-middle-left-menu-tooltip">
							<span><?php echo $GLOBALS["ADMIN_SUPER"]; ?></span>
						</div>
					</div>
					<div class="home-middle-left-menu-content" id="homeMenuAccount">
						<div class="home-middle-left-menu" id="homeMenuAccountSuper">
						<a href="?mode=sa&page=list-account"><i class="fa fa-address-card-o"></i><span id="title-manage-account" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_SUPER_ACCOUNT"]; ?></span></a>
							<div class="home-middle-left-menu-tooltip">
								<span><?php echo $GLOBALS["ADMIN_SUPER_ACCOUNT"]; ?></span>
							</div>
						</div>

						<div class="home-middle-left-menu" id="homeMenuAccountGroup">
							<a href="?mode=sa&page=list-group"><i class="fa fa-code-fork"></i><span id="title-manage-group" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_SUPER_GROUP"]; ?></span></a>
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

					<!-- Học online small-->
					<div class="home-middle-left-menu-small" id="smallDivShowOnline">
						<i class="fa fa-mortar-board"></i><span><?php echo $GLOBALS["ADMIN_ONLINE"]; ?></span>
						<div id="smallHomeMenuOnline">
							
						</div>
					</div>

					<!-- Học offline small-->
					<div class="home-middle-left-menu-small" id="smallDivShowOffline">
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
					<!--Account small -->
					<div class="home-middle-left-menu-small" id="smallDivShowAccount">
						<i class="fa fa-calendar"></i><span><?php echo $GLOBALS["ADMIN_SUPER"]; ?></span>
						<div id="smallHomeMenuAccount">
							<div class="home-middle-left-menu-small" id="smallHomeMenuAccountSuper">
								<a href="?mode=sa&page=list-account" id="smallHomeMenuAccountSuperAContainListAccount"><i id="smallHomeMenuOfflineIContainListLecture" class="fa fa-newspaper-o"></i><?php echo $GLOBALS["ADMIN_SUPER_ACCOUNT"]; ?></a>
							</div>

							<div class="home-middle-left-menu-small" id="smallHomeMenuAccountGroup">
								<a id="smallHomeMenuAccountGroupAContainListGroup" href="?mode=sa&page=list-group"><i id="smallHomeMenuOfflineIContainListTeacher" class="fa fa-vcard"></i><?php echo $GLOBALS["ADMIN_SUPER_GROUP"]; ?></a>
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
						} else if($_GET["mode"] == "offline" || $_GET["mode"] == "sa"){
 							//$arrForModeOfline = array($_GET["mode"]);
							echo "<script>setMode('" . $_GET["mode"] . "')</script>";
 							//SunQHelper::callFunction("setMode",$arrForModeOfline);
 							//$temp ='123';
							//SunQHelper::consoleLogPHP($temp);
							if(isset($_GET["page"])){
								echo "<script>setPage('" . $_GET["page"] . "')</script>";
								echo "<script>setHightLightText('" . $_GET["page"] . "')</script>";
								echo "<script>setBlueBackground('" . $_GET["page"] . "')</script>";
 								if(isset($_GET["action"])){
 									echo "<script>setCurrentACtion('" . $_GET["action"] . "')</script>";
 									//echo "<script>console.log('" . $_GET["action"] . "')</script>";
 								}
								if(isset($_GET["id"])){
 									echo "<script>setCurrentEdit('" . $_GET["id"] . "')</script>";
 									//echo "<script>console.log('" . $_GET["action"] . "')</script>";
 								}
								
								switch($_GET["page"]){
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
										echo "<script>setMode('qacademy')</script>";
										include get_theme_file_path( "home/offline/lecture/list-lecture.php" );
										break;
									case "lecture":
										echo "<script>setMode('qacademy')</script>";
										include get_theme_file_path( "home/offline/lecture/lecture.php" );
										break;
									case "list-teacher":
										echo "<script>setMode('qacademy')</script>";
										include get_theme_file_path( "home/offline/teacher/list-teacher.php" );
										break;
									case "teacher":
										echo "<script>setMode('qacademy')</script>";
										include get_theme_file_path( "home/offline/teacher/teacher.php" );
										break;
									case "list-contact":
										echo "<script>setMode('qvisit')</script>";
										include get_theme_file_path( "home/offline/qvisit/contact/list-contact.php" );
										break;
									case "list-event":
										echo "<script>setMode('qvisit')</script>";
										include get_theme_file_path( "home/offline/qvisit/event/list-event.php" );
										break;
									case "event":
										echo "<script>setMode('qvisit')</script>";
										include get_theme_file_path( "home/offline/qvisit/event/event.php" );
										break;
									case "list-exhibition":
										echo "<script>setMode('qvisit')</script>";
										include get_theme_file_path( "home/offline/qvisit/exhibition/list-exhibition.php" );
										break;
									case "exhibition":
										echo "<script>setMode('qvisit')</script>";
										include get_theme_file_path( "home/offline/qvisit/exhibition/exhibition.php" );
										break;
									case "list-ticket":
										echo "<script>setMode('qvisit')</script>";
										include get_theme_file_path( "home/offline/qvisit/ticket/list-ticket.php" );
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
	//large screen
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

	let sunqModeQAcademyDiv = document.getElementById("divShowQAcademy");
	sunqModeQAcademyDiv && sunqModeQAcademyDiv.addEventListener("click",function(){
				//console.log("divShowOffline");
				if(document.getElementById("homeMenuQAcedemy").style.display != "none" && document.getElementById("homeMenuQAcedemy").style.display != ""){
				   		hideQAcademy();
						setMode("none");
				   }else {
						setMode(sunQMode.qacademy);
				   }
			});
	
	let sunqModeQVisitDiv = document.getElementById("divShowQVisit");
	sunqModeQVisitDiv && sunqModeQVisitDiv.addEventListener("click",function(){
				//console.log("divShowOffline");
				if(document.getElementById("homeMenuQVisit").style.display != "none" && document.getElementById("homeMenuQVisit").style.display != ""){
				   		hideQVisit();
						setMode("none");
				   }else {
						setMode(sunQMode.qvisit);
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
		if(getMode() == sunQMode.sa){
				   		hideAccountMode();
						setMode("none");
				   }else {
						setMode(sunQMode.sa);
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
	
//small screen
	
	let smallSunqModeOfflineDiv = document.getElementById("smallDivShowOnline");
	smallSunqModeOfflineDiv && smallSunqModeOfflineDiv.addEventListener("touchend",function(){
				//console.log("divShowOffline");
				if(getMode() == sunQMode.online){
				   		hideOnLineMode();
						setMode("none");
				   }else {
						setMode(sunQMode.online);
				   }
			});


	let smallSunqModeOnlineDiv = document.getElementById("smallDivShowOffline");
	smallSunqModeOnlineDiv && smallSunqModeOnlineDiv.addEventListener("touchend",function(){
				if(getMode() == sunQMode.offline){
				   		hideOffLineMode();
						setMode("none");
				   }else {
						setMode(sunQMode.offline);
				   }
			
			});
	
	let smallSunQModeAccount = document.getElementById("smallDivShowAccount");
	smallSunQModeAccount && smallSunQModeAccount.addEventListener("touchend",function(){
		if(getMode() == sunQMode.sa){
				   		hideAccountMode();
						setMode("none");
				   }else {
						setMode(sunQMode.sa);
				   }
				
			});
	
window.addEventListener("touchend",function(e){
	if(window.innerWidth < 480){
	let arrayContainInValid = ["dashboardNameSmall","dashboardNameSmallA","dashboardNameSmallI","dashboardNameSmallSPAN","smallHomeMenuOfflineDivContainListLecture","smallHomeMenuOfflineAContainListLecture","smallHomeMenuOfflineIContainListLecture","smallHomeMenuOfflineDivContainListTeacher","smallHomeMenuOfflineAContainListTeacher","smallHomeMenuOfflineIContainListTeacher","dashboardIconTopSmallDivContain","smallHomeMenuAccount","smallHomeMenuAccountSuper","smallHomeMenuAccountSuperAContainListAccount","smallHomeMenuAccountGroup","smallHomeMenuAccountGroupAContainListGroup","smallDivShowOnline","smallDivShowOffline","smallDivShowAccount"];
	let arrayContainValid = ["dashboardIconTopSmall","dashboardIconTopSmallDivContain"];
	//console.log(e.target.id,arrayContainIdValid.includes(e.target.id));
	let checkId = e.target.id;
		let checkInValid = arrayContainInValid.includes(checkId);
		let checkValid = arrayContainValid.includes(checkId);
		//alert(e.target.id+" invalid "+checkInValid+" valid "+checkValid+" "+typeof e.target.id);
	if(checkInValid == false){
		if (checkValid){
			getOpenMenu() ? setOpenMenu(false) : setOpenMenu(true);
		} else {
		setOpenMenu(false);
		}
	} else { 
		//getOpenMenu() ? setOpenMenu(false) : setOpenMenu(true);
	}
	}
});
</script>