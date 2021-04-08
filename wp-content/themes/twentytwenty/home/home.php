<?php

?>
<div class="home-parent">
    <!-- home header -->
    <div class="home-header">
        <a href="/"><img class="home-header-img" src='<?php echo $GLOBALS['URI_HEADER_ICON']; ?>'></a>
		<span id="logout" class="admin-logout"><?php echo $GLOBALS['LOG_OUT']; ?></span>
		<span id="changePassword" class="admin-logout"><?php echo $GLOBALS['CHANGE_PASSWORD']; ?></span>
    </div>

    <!-- home middle -->
    <div class="home-middle" id="homeMiddle">

        <!-- home middle left -->
        <!--  large screen-->
        <div class="home-middle-left">
            <div class="home-middle-left-contain" action="get">
                <div class="home-middle-left-menu" id="dashboardName">
                    <a href=<?php echo $GLOBALS["ADMIN_HOME_URL_WITHOUT_SSL"]; ?>><i class="fa fa-dashboard" id="dashboardIcon"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_TITLE"]; ?></span></a>
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
                    <div class="home-middle-left-menu-content" id="homeMenuOnline">
						
						<!-- Quản lý account -->
                        <div class="" id="divShowManageAccount">
                            <i class="fa fa-vcard"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_MANAGE_ACCOUNT"]; ?></span>
                            <div class="home-middle-left-menu-tooltip">
                                <span><?php echo $GLOBALS["ADMIN_ONLINE_MANAGE_ACCOUNT"]; ?></span>
                            </div>
                        </div>
                        <div class="home-middle-left-menu-content" id="homeMenuManageAccount">
                            <!-- confirm banking -->
                            <div class="home-middle-left-menu" id="homeMenuConfirmBanking">
                                <a href="?mode=online&page=list-confirmbanking"><i class="fa fa-calendar"></i><span id="title-manage-confirmbanking" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_CONFIRM_BANKING"]; ?></span></a>
                                <div class="home-middle-left-menu-tooltip">
                                    <span><?php echo $GLOBALS["ADMIN_ONLINE_CONFIRM_BANKING"]; ?></span>
                                </div>
                            </div>

                            <!-- user account -->
                            <div class="home-middle-left-menu" id="homeMenuUserAccount">
                                <a href="?mode=online&page=list-useraccount"><i class="fa fa-calendar"></i><span id="title-manage-useraccount" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_ACCOUNT_USER"]; ?></span></a>
                                <div class="home-middle-left-menu-tooltip">
                                    <span><?php echo $GLOBALS["ADMIN_ONLINE_ACCOUNT_USER"]; ?></span>
                                </div>
                            </div>
                        </div>
						
                        <!-- upload -->
                        <div class="" id="divShowUpload">
                            <i class="fa fa-vcard"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_UPLOAD_MANAGE"]; ?></span>
                            <div class="home-middle-left-menu-tooltip">
                                <span><?php echo $GLOBALS["ADMIN_ONLINE_UPLOAD_MANAGE"]; ?></span>
                            </div>
                        </div>
                        <div class="home-middle-left-menu-content" id="homeMenuUpload">
                            <!-- video -->
                            <div class="home-middle-left-menu" id="homeMenuUploadVideo">
                                <a href="?mode=online&page=list-video"><i class="fa fa-calendar"></i><span id="title-manage-video" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_UPLOAD_VIDEO"]; ?></span></a>
                                <div class="home-middle-left-menu-tooltip">
                                    <span><?php echo $GLOBALS["ADMIN_ONLINE_UPLOAD_VIDEO"]; ?></span>
                                </div>
                            </div>

                            <!-- pdf -->
<!--                             <div class="home-middle-left-menu" id="homeMenuUploadPDF">
                                <a href="?mode=online&page=list-pdf"><i class="fa fa-calendar"></i><span id="title-manage-pdf" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_UPLOAD_PDF"]; ?></span></a>
                                <div class="home-middle-left-menu-tooltip">
                                    <span><?php echo $GLOBALS["ADMIN_ONLINE_UPLOAD_PDF"]; ?></span>
                                </div>
                            </div> -->

                            <!-- mp3 -->
<!--                             <div class="home-middle-left-menu" id="homeMenuUploadMP3">
                                <a href="?mode=online&page=list-mp3"><i class="fa fa-calendar"></i><span id="title-manage-mp3" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_UPLOAD_MP3"]; ?></span></a>
                                <div class="home-middle-left-menu-tooltip">
                                    <span><?php echo $GLOBALS["ADMIN_ONLINE_UPLOAD_MP3"]; ?></span>
                                </div>
                            </div> -->

                            <!-- word -->
<!--                             <div class="home-middle-left-menu" id="homeMenuUploadWord">
                                <a href="?mode=online&page=list-word"><i class="fa fa-calendar"></i><span id="title-manage-word" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_UPLOAD_WORD"]; ?></span></a>
                                <div class="home-middle-left-menu-tooltip">
                                    <span><?php echo $GLOBALS["ADMIN_ONLINE_UPLOAD_WORD"]; ?></span>
                                </div>
                            </div> -->
                        </div>
                        <!-- FreeQ -->
                        <div class="" id="divShowFreeQ">
                            <i class="fa fa-vcard"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ"]; ?></span>
                            <div class="home-middle-left-menu-tooltip">
                                <span><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ"]; ?></span>
                            </div>
                        </div>
                        <div class="home-middle-left-menu-content" id="homeMenuFreeQ">
                            <!-- 0 -2 -->
                            <div class="" id="divShowFreeLesson1">
                                <i class="fa fa-calendar"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_1"]; ?></span>
                                <div class="home-middle-left-menu-tooltip">
                                    <span><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_1"]; ?></span>
                                </div>
                            </div>
                            <div class="home-middle-left-menu-content" id="homeMenuFreeLesson1">
                                <!-- bài giảng mẫu -->
                                <div class="home-middle-left-menu" id="homeMenuFreeLessonTemplate1">
                                    <a href="?mode=online&page=list-freelessontemplate1"><i class="fa fa-newspaper-o"></i><span id="title-manage-template-lesson-1" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_TEMPLATE_LESSON_1"]; ?></span></a>
                                    <div class="home-middle-left-menu-tooltip">
                                        <span><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_TEMPLATE_LESSON_1"]; ?></span>
                                    </div>
                                </div>

                                <!-- kế hoạch bài giảng -->
                                <div class="home-middle-left-menu" id="homeMenuFreeLessonPlan1">
                                    <a href="?mode=online&page=list-freelessonplan1"><i class="fa fa-newspaper-o"></i><span id="title-manage-plan-lesson-1" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_PLAN_1"]; ?></span></a>
                                    <div class="home-middle-left-menu-tooltip">
                                        <span><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_PLAN_1"]; ?></span>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 - 7 -->
                            <div class="" id="divShowFreeLesson2">
                                <i class="fa fa-calendar"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_2"]; ?></span>
                                <div class="home-middle-left-menu-tooltip">
                                    <span><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_2"]; ?></span>
                                </div>
                            </div>
                            <div class="home-middle-left-menu-content" id="homeMenuFreeLesson2">
                                <!-- bài giảng mẫu -->
                                <div class="home-middle-left-menu" id="homeMenuFreeLessonTemplate2">
                                    <a href="?mode=online&page=list-freelessontemplate2"><i class="fa fa-newspaper-o"></i><span id="title-manage-template-lesson-2" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_TEMPLATE_LESSON_2"]; ?></span></a>
                                    <div class="home-middle-left-menu-tooltip">
                                        <span><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_TEMPLATE_LESSON_2"]; ?></span>
                                    </div>
                                </div>

                                <!-- kế hoạch bài giảng -->
                                <div class="home-middle-left-menu" id="homeMenuFreeLessonPlan2">
                                    <a href="?mode=online&page=list-freelessonplan2"><i class="fa fa-newspaper-o"></i><span id="title-manage-plan-lesson-2" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_PLAN_2"]; ?></span></a>
                                    <div class="home-middle-left-menu-tooltip">
                                        <span><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_PLAN_2"]; ?></span>
                                    </div>
                                </div>
                            </div>

                            <!-- 7 - 12 -->
                            <div class="" id="divShowFreeLesson3">
                                <i class="fa fa-calendar"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_3"]; ?></span>
                                <div class="home-middle-left-menu-tooltip">
                                    <span><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_3"]; ?></span>
                                </div>
                            </div>
                            <div class="home-middle-left-menu-content" id="homeMenuFreeLesson3">
                                <!-- bài giảng mẫu -->
                                <div class="home-middle-left-menu" id="homeMenuFreeLessonTemplate3">
                                    <a href="?mode=online&page=list-freelessontemplate3"><i class="fa fa-newspaper-o"></i><span id="title-manage-template-lesson-3" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_TEMPLATE_LESSON_3"]; ?></span></a>
                                    <div class="home-middle-left-menu-tooltip">
                                        <span><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_TEMPLATE_LESSON_3"]; ?></span>
                                    </div>
                                </div>

                                <!-- kế hoạch bài giảng -->
                                <div class="home-middle-left-menu" id="homeMenuFreeLessonPlan3">
                                    <a href="?mode=online&page=list-freelessonplan3"><i class="fa fa-newspaper-o"></i><span id="title-manage-plan-lesson-3" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_PLAN_3"]; ?></span></a>
                                    <div class="home-middle-left-menu-tooltip">
                                        <span><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_PLAN_3"]; ?></span>
                                    </div>
                                </div>
                            </div>
                            <!-- kit -->
                            <div class="home-middle-left-menu" id="homeMenuKit">
                                <a href="?mode=online&page=list-kit"><i class="fa fa-calendar"></i><span id="title-manage-kit" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_KIT"]; ?></span></a>
                                <div class="home-middle-left-menu-tooltip">
                                    <span><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_KIT"]; ?></span>
                                </div>
                            </div>
                        </div>
						<!-- STEAMQ -->
						<div class="" id="divShowSteamQ">
                            <i class="fa fa-vcard"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_STEAMQ"]; ?></span>
                            <div class="home-middle-left-menu-tooltip">
                                <span><?php echo $GLOBALS["ADMIN_ONLINE_STEAMQ"]; ?></span>
                            </div>
                        </div>
						<div class="home-middle-left-menu-content" id="homeMenuSteamQ">
							<div id="homeMenuSteamQClass"></div>
							<?php
							/*fetch from sever*/
								echo "<script>fetchingSteamqClass()</script>";
							    /*
								$countSteamQPart = 0;
								foreach($GLOBALS["STEAM_Q_PART"] as $key => $value){
									//echo $key;
 									echo "<div class=\"\" id=\"divshowSteamQ" .$key . "\" onclick =\"showSteamQPart('" . $key . "')\">";
 									echo "<i class=\"fa fa-calendar\"></i><span class=\"home-middle-left-menu-text\">" . $value . "</span>";
 									echo "<div class=\"home-middle-left-menu-tooltip\">";
 									echo "<span>" . $value ."</span>";
 									echo "</div>";
 									echo "</div>";
 									echo "<div class=\"home-middle-left-menu-content steamQClass\" id=\"homeMenuSteamQ".$key."\">";
									foreach($GLOBALS["STEAM_Q_CLASS"] as $keyClass=>$valueClass){
										//echo $keyClass . " _ " . $valueClass . "\n";
										//echo "<div class=\"home-middle-left-menu\" id=\"homeMenuSteamQ\"" . $key  .">";
										echo "<div  class=\"home-middle-left-menu-content\" id=\"homeMenuSteamQClass". $keyClass ."\">";
										echo "<a href=\"?mode=online&page=list-steam-" . $GLOBALS["STEAM_Q_PART_RAW"][$countSteamQPart] . "-" . $GLOBALS["STEAM_Q_CLASS_RAW"][$keyClass] . "\">";
										echo "<i class=\"fa fa-chain\"></i><span id=\"title-manage-steamq-" . $GLOBALS["STEAM_Q_PART_RAW"][$countSteamQPart] . "-" . $GLOBALS["STEAM_Q_CLASS_RAW"][$keyClass] . "\" class=\"home-middle-left-menu-text home-menu-steamq-class \">" . $valueClass ."</span>";
										echo "</a>";
										echo "</div>";
										echo "<div class=\"home-middle-left-menu-tooltip\">";
										echo "<span>" . $value . " - " .$valueClass . "</span>";
										echo "</div>";
										//echo "<\div>";
									}
									echo "</div>";
									$countSteamQPart++;
									
								}
							*/
							?>
							<!-- Thêm lớp học -->
							<div class="home-middle-left-menu" id="homeMenuSteamQAddClass">
                                <a href="?mode=online&page=steamq-kit-add-class"><i class="fa fa-calendar"></i><span id="title-manage-steamq-add-class" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_STEAMQ_ADD_CLASS"]; ?></span></a>
                                <div class="home-middle-left-menu-tooltip">
                                    <span><?php echo $GLOBALS["ADMIN_ONLINE_STEAMQ_ADD_CLASS"]; ?></span>
                                </div>
                            </div>
							
							<!-- steamq kit -->
                            <div class="home-middle-left-menu" id="homeMenuSteamQQuestion">
                                <a href="?mode=online&page=list-steamq-kit"><i class="fa fa-calendar"></i><span id="title-manage-steamq-kit" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_STEAMQ_KIT"]; ?></span></a>
                                <div class="home-middle-left-menu-tooltip">
                                    <span><?php echo $GLOBALS["ADMIN_ONLINE_STEAMQ_KIT"]; ?></span>
                                </div>
                            </div>
							
							<!-- steamq question -->
                            <div class="home-middle-left-menu" id="homeMenuSteamQKit">
                                <a href="?mode=online&page=list-steamq-question"><i class="fa fa-calendar"></i><span id="title-manage-question" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE_STEAMQ_QUESTION"]; ?></span></a>
                                <div class="home-middle-left-menu-tooltip">
                                    <span><?php echo $GLOBALS["ADMIN_ONLINE_STEAMQ_QUESTION"]; ?></span>
                                </div>
                            </div>
						</div>
						<!-- S Part -->
						
						<!-- T Part -->
						
						<!-- E Part -->
						
						<!-- A Part -->
						
						<!-- M Part -->
                    </div>
                </div>

                <!-- Học offline -->
                <div class="home-middle-left-menu" id="divShowOffline">
                    <div class="home-middle-left-menu-title">
                        <i class="fa fa-mortar-board"></i><span class="home-middle-left-menu-text home-middle-left-menu-header-text-style"><?php echo $GLOBALS["ADMIN_OFFLINE"]; ?></span>
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
                                <a href="?mode=offline&page=list-teacher"><i class="fa fa-calendar"></i><span id="title-manage-teacher" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_OFFLINE_MANAGE_TEACHER"]; ?></span></a>
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
                                <a href="?mode=offline&page=list-event"><i class="fa fa-calendar"></i><span id="title-manage-event" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_Q_ACADEMY_MANAGE_EVENT"]; ?></span></a>
                                <div class="home-middle-left-menu-tooltip">
                                    <span><?php echo $GLOBALS["ADMIN_Q_ACADEMY_MANAGE_EVENT"]; ?></span>
                                </div>
                            </div>

                            <!-- liên hệ q-visit -->
                            <div class="home-middle-left-menu" id="homeMenuQVisitListContact">
                                <a href="?mode=offline&page=list-contact"><i class="fa fa-calendar"></i><span id="title-manage-contact" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_Q_ACADEMY_MANAGE_CONTACT"]; ?></span></a>
                                <div class="home-middle-left-menu-tooltip">
                                    <span><?php echo $GLOBALS["ADMIN_Q_ACADEMY_MANAGE_CONTACT"]; ?></span>
                                </div>
                            </div>

                            <!-- ticket -->
                            <div class="home-middle-left-menu" id="homeMenuQVisitListTicket">
                                <a href="?mode=offline&page=list-ticket"><i class="fa fa-calendar"></i><span id="title-manage-ticket" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_Q_ACADEMY_MANAGE_TICKET"]; ?></span></a>
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
                        <i class="	fa fa-mortar-board"></i><span class="home-middle-left-menu-text home-middle-left-menu-header-text-style"><?php echo $GLOBALS["ADMIN_SUPER"]; ?></span>
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
                            <a href="?mode=sa&page=list-group"><i class="fa fa-address-card-o"></i><span id="title-manage-group" class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_SUPER_GROUP"]; ?></span></a>
                            <div class="home-middle-left-menu-tooltip">
                                <span><?php echo $GLOBALS["ADMIN_SUPER_GROUP"]; ?></span>
                            </div>
                        </div>
                    </div>
                </div>

				<!-- chat -->
				<div class="home-middle-left-menu" id="divShowChat">
                    <div class="home-middle-left-menu-title" id="homeMenuManageChat">
						<a href="?mode=chat&page=admin">
							<i class="	fa fa-mortar-board"></i><span class="home-middle-left-menu-text home-middle-left-menu-header-text-style"><?php echo $GLOBALS["ADMIN_CHAT"]; ?></span>
						</a>
                        <div class="home-middle-left-menu-tooltip">
                            <span><?php echo $GLOBALS["ADMIN_CHAT"]; ?></span>
                        </div>
                    </div>
                    <div class="home-middle-left-menu-content" id="homeMenuChat">
                        
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
                        <a id="dashboardNameSmallA" href=<?php echo $GLOBALS["ADMIN_HOME_URL_WITHOUT_SSL"]; ?>><i id="dashboardNameSmallI" class="fa fa-dashboard"></i><span id="dashboardNameSmallSPAN"><?php echo $GLOBALS["ADMIN_TITLE"]; ?></span></a>
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
                if (isset($_GET["mode"])) {
                    echo "<script>setMode('" . $_GET["mode"] . "')</script>";
                    if (isset($_GET["page"])) {
                        echo "<script>setPage('" . $_GET["page"] . "')</script>";
                        echo "<script>setHightLightText('" . $_GET["page"] . "')</script>";
                        echo "<script>setBlueBackground('" . $_GET["page"] . "')</script>";
                        if (isset($_GET["action"])) {
                            echo "<script>setCurrentACtion('" . $_GET["action"] . "')</script>";
                            //echo "<script>console.log('" . $_GET["action"] . "')</script>";
                        }
                        if (isset($_GET["id"])) {
							$currentEdit=$_GET["id"];
                            echo "<script>setCurrentEdit('" . $_GET["id"] . "')</script>";
                            //echo "<script>console.log('" . $_GET["action"] . "')</script>";
                        }
                    }
                    if ($_GET["mode"] == "online") {
                        if (isset($_GET["page"])) {
                            switch ($_GET["page"]) {
                                    //QOnline
                                    //manageaccount
                                case "list-confirmbanking":
                                    echo "<script>setMode('useraccount')</script>";
                                    include get_theme_file_path("home/online/user/confirmbanking/list-confirmbanking.php");
                                    break;
                                case "confirmbanking":
                                    echo "<script>setMode('useraccount')</script>";
                                    include get_theme_file_path("home/online/user/confirmbanking/confirmbanking.php");
                                    break;
                                case "list-useraccount":
                                    echo "<script>setMode('useraccount')</script>";
                                    include get_theme_file_path("home/online/user/account/list-account.php");
                                    break;
									//upload
                                case "list-video":
                                    echo "<script>setMode('upload')</script>";
                                    include get_theme_file_path("home/online/upload/upload-video/list-upload-video.php");
                                    break;
                                case "video":
                                    echo "<script>setMode('upload')</script>";
                                    include get_theme_file_path("home/online/upload/upload-video/upload-video.php");
                                    break;
                                case "list-pdf":
                                    echo "<script>setMode('upload')</script>";
                                    include get_theme_file_path("home/online/upload/upload-pdf/list-upload-pdf.php");
                                    break;
                                case "pdf":
                                    echo "<script>setMode('upload')</script>";
                                    include get_theme_file_path("home/online/upload/upload-pdf/upload-pdf.php");
                                    break;
                                case "list-mp3":
                                    echo "<script>setMode('upload')</script>";
                                    include get_theme_file_path("home/online/upload/upload-mp3/list-upload-mp3.php");
                                    break;
                                case "mp3":
                                    echo "<script>setMode('upload')</script>";
                                    include get_theme_file_path("home/online/upload/upload-mp3/upload-mp3.php");
                                    break;
                                case "list-word":
                                    echo "<script>setMode('upload')</script>";
                                    include get_theme_file_path("home/online/upload/upload-word/list-upload-word.php");
                                    break;
                                case "word":
                                    echo "<script>setMode('upload')</script>";
                                    include get_theme_file_path("home/online/upload/upload-word/upload-word.php");
                                    break;
								//lesson1
                                case "list-freelessontemplate1":
                                    echo "<script>setMode('freeqlesson1')</script>";
                                    include get_theme_file_path("home/online/freeq/freelesson1/freelessontemplate/list-freelessontemplate1.php");
                                    break;
                                case "freelessontemplate1":
                                    echo "<script>setMode('freeqlesson1')</script>";
                                    include get_theme_file_path("home/online/freeq/freelesson1/freelessontemplate/freelessontemplate1.php");
                                    break;
								case "list-freelessonplan1":
                                    echo "<script>setMode('freeqlesson1')</script>";
                                    include get_theme_file_path("home/online/freeq/freelesson1/freelessonplan/list-freelessonplan1.php");
                                    break;
                                case "freelessonplan1":
									if (isset($_GET["month"])){
                                    	echo "<script>setMonth(". $_GET["month"] ."+'')</script>";
									}
                                    echo "<script>setMode('freeqlesson1')</script>";
                                    include get_theme_file_path("home/online/freeq/freelesson1/freelessonplan/freelessonplan1.php");
                                    break;
								//lesson2
                                case "list-freelessontemplate2":
                                    echo "<script>setMode('freeqlesson2')</script>";
                                    include get_theme_file_path("home/online/freeq/freelesson2/freelessontemplate/list-freelessontemplate2.php");
                                    break;
                                case "freelessontemplate2":
                                    echo "<script>setMode('freeqlesson2')</script>";
                                    include get_theme_file_path("home/online/freeq/freelesson2/freelessontemplate/freelessontemplate2.php");
                                    break;
								case "list-freelessonplan2":
                                    echo "<script>setMode('freeqlesson2')</script>";
                                    include get_theme_file_path("home/online/freeq/freelesson2/freelessonplan/list-freelessonplan2.php");
                                    break;
                                case "freelessonplan2":
									if (isset($_GET["month"])){
                                    	echo "<script>setMonth(". $_GET["month"] ."+'')</script>";
									}
                                    echo "<script>setMode('freeqlesson2')</script>";
                                    include get_theme_file_path("home/online/freeq/freelesson2/freelessonplan/freelessonplan2.php");
                                    break;
								//lessson3
                                case "list-freelessontemplate3":
                                    echo "<script>setMode('freeqlesson3')</script>";
                                    include get_theme_file_path("home/online/freeq/freelesson3/freelessontemplate/list-freelessontemplate3.php");
                                    break;
                                case "freelessontemplate3":
                                    echo "<script>setMode('freeqlesson3')</script>";
                                    include get_theme_file_path("home/online/freeq/freelesson3/freelessontemplate/freelessontemplate3.php");
                                    break;
								case "list-freelessonplan3":
                                    echo "<script>setMode('freeqlesson3')</script>";
                                    include get_theme_file_path("home/online/freeq/freelesson3/freelessonplan/list-freelessonplan3.php");
                                    break;
                                case "freelessonplan3":
									if (isset($_GET["month"])){
                                    	echo "<script>setMonth(". $_GET["month"] ."+'')</script>";
									}
                                    echo "<script>setMode('freeqlesson3')</script>";
                                    include get_theme_file_path("home/online/freeq/freelesson3/freelessonplan/freelessonplan3.php");
                                    break;
									
                                case "list-kit":
                                    echo "<script>setMode('freeq')</script>";
                                    include get_theme_file_path("home/online/freeq/kit/list-kit.php");
                                    break;
                                case "kit":
                                    echo "<script>setMode('freeq')</script>";
                                    include get_theme_file_path("home/online/freeq/kit/kit.php");
                                    break;
								//steamq
								/*
								//SPart
								//--under-one
								case "list-steam-science-under-one":
                                    echo "<script>setSteamqpart('S')</script>";
                                    echo "<script>setSteamqclass(0)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='S';
									$steamQClass=0;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-science-under-one":
                                    echo "<script>setSteamqpart('S')</script>";
                                    echo "<script>setSteamqclass(0)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='S';
									$steamQClass=0;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--one
								case "list-steam-science-one":
                                    echo "<script>setSteamqpart('S')</script>";
                                    echo "<script>setSteamqclass(1)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='S';
									$steamQClass=1;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-science-one":
                                    echo "<script>setSteamqpart('S')</script>";
                                    echo "<script>setSteamqclass(1)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='S';
									$steamQClass=1;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--two
								case "list-steam-science-two":
                                    echo "<script>setSteamqpart('S')</script>";
                                    echo "<script>setSteamqclass(2)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='S';
									$steamQClass=2;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-science-two":
                                    echo "<script>setSteamqpart('S')</script>";
                                    echo "<script>setSteamqclass(2)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='S';
									$steamQClass=2;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--three
								case "list-steam-science-three":
                                    echo "<script>setSteamqpart('S')</script>";
                                    echo "<script>setSteamqclass(3)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='S';
									$steamQClass=3;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-science-three":
                                    echo "<script>setSteamqpart('S')</script>";
                                    echo "<script>setSteamqclass(3)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='S';
									$steamQClass=3;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--four
								case "list-steam-science-four":
                                    echo "<script>setSteamqpart('S')</script>";
                                    echo "<script>setSteamqclass(4)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='S';
									$steamQClass=4;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-science-four":
                                    echo "<script>setSteamqpart('S')</script>";
                                    echo "<script>setSteamqclass(4)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='S';
									$steamQClass=4;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--five
								case "list-steam-science-five":
                                    echo "<script>setSteamqpart('S')</script>";
                                    echo "<script>setSteamqclass(5)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='S';
									$steamQClass=5;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-science-five":
                                    echo "<script>setSteamqpart('S')</script>";
                                    echo "<script>setSteamqclass(5)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='S';
									$steamQClass=5;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--six
								case "list-steam-science-six":
                                    echo "<script>setSteamqpart('S')</script>";
                                    echo "<script>setSteamqclass(6)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='S';
									$steamQClass=6;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-science-six":
                                    echo "<script>setSteamqpart('S')</script>";
                                    echo "<script>setSteamqclass(6)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='S';
									$steamQClass=6;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;	
								//--seven
								case "list-steam-science-seven":
                                    echo "<script>setSteamqpart('S')</script>";
                                    echo "<script>setSteamqclass(7)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='S';
									$steamQClass=7;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-science-seven":
                                    echo "<script>setSteamqpart('S')</script>";
                                    echo "<script>setSteamqclass(7)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='S';
									$steamQClass=7;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//TPart
								//--under-one
								case "list-steam-technology-under-one":
                                    echo "<script>setSteamqpart('T')</script>";
                                    echo "<script>setSteamqclass(0)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='T';
									$steamQClass=0;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-technology-under-one":
                                    echo "<script>setSteamqpart('T')</script>";
                                    echo "<script>setSteamqclass(0)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='T';
									$steamQClass=0;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--one
								case "list-steam-technology-one":
                                    echo "<script>setSteamqpart('T')</script>";
                                    echo "<script>setSteamqclass(1)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='T';
									$steamQClass=1;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-technology-one":
                                    echo "<script>setSteamqpart('T')</script>";
                                    echo "<script>setSteamqclass(1)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='T';
									$steamQClass=1;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--two
								case "list-steam-technology-two":
                                    echo "<script>setSteamqpart('T')</script>";
                                    echo "<script>setSteamqclass(2)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='T';
									$steamQClass=2;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-technology-two":
                                    echo "<script>setSteamqpart('T')</script>";
                                    echo "<script>setSteamqclass(2)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='T';
									$steamQClass=2;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--three
								case "list-steam-technology-three":
                                    echo "<script>setSteamqpart('T')</script>";
                                    echo "<script>setSteamqclass(3)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='T';
									$steamQClass=3;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-technology-three":
                                    echo "<script>setSteamqpart('T')</script>";
                                    echo "<script>setSteamqclass(3)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='T';
									$steamQClass=3;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--four
								case "list-steam-technology-four":
                                    echo "<script>setSteamqpart('T')</script>";
                                    echo "<script>setSteamqclass(4)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='T';
									$steamQClass=4;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-technology-four":
                                    echo "<script>setSteamqpart('T')</script>";
                                    echo "<script>setSteamqclass(4)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='T';
									$steamQClass=4;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--five
								case "list-steam-technology-five":
                                    echo "<script>setSteamqpart('T')</script>";
                                    echo "<script>setSteamqclass(5)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='T';
									$steamQClass=5;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-technology-five":
                                    echo "<script>setSteamqpart('T')</script>";
                                    echo "<script>setSteamqclass(5)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='T';
									$steamQClass=5;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--six
								case "list-steam-technology-six":
                                    echo "<script>setSteamqpart('T')</script>";
                                    echo "<script>setSteamqclass(6)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='T';
									$steamQClass=6;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-technology-six":
                                    echo "<script>setSteamqpart('T')</script>";
                                    echo "<script>setSteamqclass(6)</script>";
                                    echo "<script>setMode('ststeamqparteamq')</script>";
									$steamQPart='T';
									$steamQClass=6;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;	
								//--seven
								case "list-steam-technology-seven":
                                    echo "<script>setSteamqpart('T')</script>";
                                    echo "<script>setSteamqclass(7)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='T';
									$steamQClass=7;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-technology-seven":
                                    echo "<script>setSteamqpart('T')</script>";
                                    echo "<script>setSteamqclass(7)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='T';
									$steamQClass=7;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//EPart
								//--under-one
								case "list-steam-engineering-under-one":
                                    echo "<script>setSteamqpart('E')</script>";
                                    echo "<script>setSteamqclass(0)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='E';
									$steamQClass=0;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-engineering-under-one":
                                    echo "<script>setSteamqpart('E')</script>";
                                    echo "<script>setSteamqclass(0)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='E';
									$steamQClass=0;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--one
								case "list-steam-engineering-one":
                                    echo "<script>setSteamqpart('E')</script>";
                                    echo "<script>setSteamqclass(1)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='E';
									$steamQClass=1;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-engineering-one":
                                    echo "<script>setSteamqpart('E')</script>";
                                    echo "<script>setSteamqclass(1)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='E';
									$steamQClass=1;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--two
								case "list-steam-engineering-two":
                                    echo "<script>setSteamqpart('E')</script>";
                                    echo "<script>setSteamqclass(2)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='E';
									$steamQClass=2;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-engineering-two":
                                    echo "<script>setSteamqpart('E')</script>";
                                    echo "<script>setSteamqclass(2)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='E';
									$steamQClass=2;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--three
								case "list-steam-engineering-three":
                                    echo "<script>setSteamqpart('E')</script>";
                                    echo "<script>setSteamqclass(3)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='E';
									$steamQClass=3;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-engineering-three":
                                    echo "<script>setSteamqpart('E')</script>";
                                    echo "<script>setSteamqclass(3)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='E';
									$steamQClass=3;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--four
								case "list-steam-engineering-four":
                                    echo "<script>setSteamqpart('E')</script>";
                                    echo "<script>setSteamqclass(4)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='E';
									$steamQClass=4;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-engineering-four":
                                    echo "<script>setSteamqpart('E')</script>";
                                    echo "<script>setSteamqclass(4)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='E';
									$steamQClass=4;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--five
								case "list-steam-engineering-five":
                                    echo "<script>setSteamqpart('E')</script>";
                                    echo "<script>setSteamqclass(5)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='E';
									$steamQClass=5;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-engineering-five":
                                    echo "<script>setSteamqpart('E')</script>";
                                    echo "<script>setSteamqclass(5)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='E';
									$steamQClass=5;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--six
								case "list-steam-engineering-six":
                                    echo "<script>setSteamqpart('E')</script>";
                                    echo "<script>setSteamqclass(6)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='E';
									$steamQClass=6;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-engineering-six":
                                    echo "<script>setSteamqpart('E')</script>";
                                    echo "<script>setSteamqclass(6)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='E';
									$steamQClass=6;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;	
								//--seven
								case "list-steam-engineering-seven":
                                    echo "<script>setSteamqpart('E')</script>";
                                    echo "<script>setSteamqclass(7)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='E';
									$steamQClass=7;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-engineering-seven":
                                    echo "<script>setSteamqpart('E')</script>";
                                    echo "<script>setSteamqclass(7)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='E';
									$steamQClass=7;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;	
									//APart
								//--under-one
								case "list-steam-art-under-one":
                                    echo "<script>setSteamqpart('A')</script>";
                                    echo "<script>setSteamqclass(0)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='A';
									$steamQClass=0;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-art-under-one":
                                    echo "<script>setSteamqpart('A')</script>";
                                    echo "<script>setSteamqclass(0)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='A';
									$steamQClass=0;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--one
								case "list-steam-art-one":
                                    echo "<script>setSteamqpart('A')</script>";
                                    echo "<script>setSteamqclass(1)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='A';
									$steamQClass=1;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-art-one":
                                    echo "<script>setSteamqpart('A')</script>";
                                    echo "<script>setSteamqclass(1)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='A';
									$steamQClass=1;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--two
								case "list-steam-art-two":
                                    echo "<script>setSteamqpart('A')</script>";
                                    echo "<script>setSteamqclass(2)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='A';
									$steamQClass=2;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-art-two":
                                    echo "<script>setSteamqpart('A')</script>";
                                    echo "<script>setSteamqclass(2)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='A';
									$steamQClass=2;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--three
								case "list-steam-art-three":
                                    echo "<script>setSteamqpart('A')</script>";
                                    echo "<script>setSteamqclass(3)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='A';
									$steamQClass=3;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-art-three":
                                    echo "<script>setSteamqpart('A')</script>";
                                    echo "<script>setSteamqclass(3)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='A';
									$steamQClass=3;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--four
								case "list-steam-art-four":
                                    echo "<script>setSteamqpart('A')</script>";
                                    echo "<script>setSteamqclass(4)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='A';
									$steamQClass=4;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-art-four":
                                    echo "<script>setSteamqpart('A')</script>";
                                    echo "<script>setSteamqclass(4)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='A';
									$steamQClass=4;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--five
								case "list-steam-art-five":
                                    echo "<script>setSteamqpart('A')</script>";
                                    echo "<script>setSteamqclass(5)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='A';
									$steamQClass=5;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-art-five":
                                    echo "<script>setSteamqpart('A')</script>";
                                    echo "<script>setSteamqclass(5)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='A';
									$steamQClass=5;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--six
								case "list-steam-art-six":
                                    echo "<script>setSteamqpart('A')</script>";
                                    echo "<script>setSteamqclass(6)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='A';
									$steamQClass=6;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-art-six":
                                    echo "<script>setSteamqpart('A')</script>";
                                    echo "<script>setSteamqclass(6)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='A';
									$steamQClass=6;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;	
								//--seven
								case "list-steam-art-seven":
                                    echo "<script>setSteamqpart('A')</script>";
                                    echo "<script>setSteamqclass(7)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='A';
									$steamQClass=7;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-art-seven":
                                    echo "<script>setSteamqpart('A')</script>";
                                    echo "<script>setSteamqclass(7)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='A';
									$steamQClass=7;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
									//MPart
								//--under-one
								case "list-steam-math-under-one":
                                    echo "<script>setSteamqpart('M')</script>";
                                    echo "<script>setSteamqclass(0)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='M';
									$steamQClass=0;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-math-under-one":
                                    echo "<script>setSteamqpart('M')</script>";
                                    echo "<script>setSteamqclass(0)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='M';
									$steamQClass=0;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--one
								case "list-steam-math-one":
                                    echo "<script>setSteamqpart('M')</script>";
                                    echo "<script>setSteamqclass(1)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='M';
									$steamQClass=1;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-math-one":
                                    echo "<script>setSteamqpart('M')</script>";
                                    echo "<script>setSteamqclass(1)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='M';
									$steamQClass=1;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--two
								case "list-steam-math-two":
                                    echo "<script>setSteamqpart('M')</script>";
                                    echo "<script>setSteamqclass(2)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='M';
									$steamQClass=2;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-math-two":
                                    echo "<script>setSteamqpart('M')</script>";
                                    echo "<script>setSteamqclass(2)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='M';
									$steamQClass=2;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--three
								case "list-steam-math-three":
                                    echo "<script>setSteamqpart('M')</script>";
                                    echo "<script>setSteamqclass(3)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='M';
									$steamQClass=3;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-math-three":
                                    echo "<script>setSteamqpart('M')</script>";
                                    echo "<script>setSteamqclass(3)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='M';
									$steamQClass=3;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--four
								case "list-steam-math-four":
                                    echo "<script>setSteamqpart('M')</script>";
                                    echo "<script>setSteamqclass(4)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='M';
									$steamQClass=4;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-math-four":
                                    echo "<script>setSteamqpart('M')</script>";
                                    echo "<script>setSteamqclass(4)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='M';
									$steamQClass=4;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--five
								case "list-steam-math-five":
                                    echo "<script>setSteamqpart('M')</script>";
                                    echo "<script>setSteamqclass(5)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='M';
									$steamQClass=5;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-math-five":
                                    echo "<script>setSteamqpart('M')</script>";
                                    echo "<script>setSteamqclass(5)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='M';
									$steamQClass=5;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
								//--six
								case "list-steam-math-six":
                                    echo "<script>setSteamqpart('M')</script>";
                                    echo "<script>setSteamqclass(6)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='M';
									$steamQClass=6;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-math-six":
                                    echo "<script>setSteamqpart('M')</script>";
                                    echo "<script>setSteamqclass(6)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='M';
									$steamQClass=6;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;	
								//--seven
								case "list-steam-math-seven":
                                    echo "<script>setSteamqpart('M')</script>";
                                    echo "<script>setSteamqclass(7)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='M';
									$steamQClass=7;
                                    include get_theme_file_path("home/online/steamq/APart/list-APart.php");
                                    break;
                                case "steam-math-seven":
                                    echo "<script>setSteamqpart('M')</script>";
                                    echo "<script>setSteamqclass(7)</script>";
                                    echo "<script>setMode('steamqpart')</script>";
									$steamQPart='M';
									$steamQClass=7;
                                    include get_theme_file_path("home/online/steamq/APart/APart.php");
                                    break;
									*/
// 								case "steamq-kit-class":
//                                     echo "<script>setMode('steamq')</script>";
// 									if (isset($_GET["sclass"])){
// 										$steamQClass = $_GET["sclass"];
// 									}
// 									if (isset($_GET["idclass"])){
// 										$steamQClassID = $_GET["idclass"];
// 									}
//                                     include get_theme_file_path("home/online/steamq/APart/APart.php");
//                                     break;
								//add-class
								case "steamq-kit-add-class":
                                    echo "<script>setMode('steamq')</script>";
											if (isset($_GET["sclass"])){
												echo "<script>setSteamqclass('" . $_GET["sclass"] . "')</script>";
												$steamQClass = $_GET["sclass"];
											}
											if (isset($_GET["category"])){
												echo "<script>setSteamqpart('" . $_GET["category"] . "')</script>";
												$steamQCategory = $_GET["category"];
											}
                                    include get_theme_file_path("home/online/steamq/SPart/SPart.php");
									break;
								//kit
								case "list-steamq-kit":
                                    echo "<script>setMode('steamq')</script>";
                                    include get_theme_file_path("home/online/steamq/kit/list-kit.php");
                                    break;
								case "steamq-kit":
                                    echo "<script>setMode('steamq')</script>";
                                    include get_theme_file_path("home/online/steamq/kit/kit.php");
                                    break;
									//question
								case "list-steamq-question":
                                    echo "<script>setMode('steamq')</script>";
									if (isset($_GET["category"])){
												echo "<script>setSteamqpart('" . $_GET["category"] . "')</script>";
												$steamQCategory = $_GET["category"];
									}
									if (isset($_GET["idclass"])){
													echo "<script>setSteamqclassid('" . $_GET["idclass"] . "')</script>";
													$steamQClassId = $_GET["idclass"];
											}
                                    include get_theme_file_path("home/online/steamq/EPart/list-EPart.php");
                                    break;
								case "steamq-question":
                                    echo "<script>setMode('steamq')</script>";
                                    include get_theme_file_path("home/online/steamq/EPart/EPart.php");
									if (isset($_GET["category"])){
												echo "<script>setSteamqpart('" . $_GET["category"] . "')</script>";
												$steamQCategory = $_GET["category"];
									}
									if (isset($_GET["idclass"])){
													echo "<script>setSteamqclassid('" . $_GET["idclass"] . "')</script>";
													$steamQClassId = $_GET["idclass"];
											}
                                    break;
								//englishq
                                default:
									$ppagelist = strpos($_GET["page"],"steamq-kit-class");
									$ppage2one = strpos($_GET["page"],"steamq-kit-add-lesson");
									 if($ppagelist === 0){ 
										 echo "<script>setMode('steamq')</script>";
											if (isset($_GET["id"])){
													echo "<script>setSteamqclassid('" . $_GET["id"] . "')</script>";
													$steamQClassId = $_GET["idclass"];
											}
										    if (isset($_GET["nameclass"])){
													$steamQClassname = $_GET["nameclass"];
											}
											if (isset($_GET["sclass"])){
												echo "<script>setSteamqclass('" . $_GET["sclass"] . "')</script>";
												$steamQClass = $_GET["sclass"];
											}
											if (isset($_GET["category"])){
												echo "<script>setSteamqpart('" . $_GET["category"] . "')</script>";
												$steamQCategory = $_GET["category"];
											}
										 include get_theme_file_path("home/online/steamq/APart/list-APart.php");
									 } else if($ppage2one === 0){
										 echo "<script>setMode('steamq')</script>";
										 if (isset($_GET["idclass"])){
													echo "<script>setSteamqclassid('" . $_GET["idclass"] . "')</script>";
													$steamQClassId = $_GET["idclass"];
											}
										    if (isset($_GET["nameclass"])){
													$steamQClassname = $_GET["nameclass"];
											}
											if (isset($_GET["sclass"])){
												echo "<script>setSteamqclass('" . $_GET["sclass"] . "')</script>";
												$steamQClass = $_GET["sclass"];
											}
											if (isset($_GET["category"])){
												echo "<script>setSteamqpart('" . $_GET["category"] . "')</script>";
												$steamQCategory = $_GET["category"];
											}
											if (isset($_GET["parentId"])){
												echo "<script>setSteamqParentId('" . $_GET["parentId"] . "')</script>";
												echo "<script>setSteamqclassid('" . $_GET["parentId"] . "')</script>";
												$steamQParentId = $_GET["parentId"];
											}
										 include get_theme_file_path("home/online/steamq/APart/APart.php");
									 }
                                    break;
                            }
                        }
                    } else if ($_GET["mode"] == "offline" || $_GET["mode"] == "sa") {
                        //$arrForModeOfline = array($_GET["mode"]);
                        //SunQHelper::callFunction("setMode",$arrForModeOfline);
                        //$temp ='123';
                        //SunQHelper::consoleLogPHP($temp);
                        if (isset($_GET["page"])) {
                            switch ($_GET["page"]) {
                                    //Quản lý admin
                                case "account":
                                    include get_theme_file_path("home/admin/account/account.php");
                                    break;
                                case "list-account":
                                    include get_theme_file_path("home/admin/account/list-account.php");
                                    break;
                                case "group":
                                    include get_theme_file_path("home/admin/group/group.php");
                                    break;
                                case "list-group":
                                    include get_theme_file_path("home/admin/group/list-group.php");
                                    break;
                                    //Offline
                                    //QAcademy
                                case "list-lecture":
                                    echo "<script>setMode('qacademy')</script>";
                                    include get_theme_file_path("home/offline/lecture/list-lecture.php");
                                    break;
                                case "lecture":
                                    echo "<script>setMode('qacademy')</script>";
                                    include get_theme_file_path("home/offline/lecture/lecture.php");
                                    break;
                                case "list-teacher":
                                    echo "<script>setMode('qacademy')</script>";
                                    include get_theme_file_path("home/offline/teacher/list-teacher.php");
                                    break;
                                case "teacher":
                                    echo "<script>setMode('qacademy')</script>";
                                    include get_theme_file_path("home/offline/teacher/teacher.php");
                                    break;
                                    //QVisit
                                case "list-contact":
                                    echo "<script>setMode('qvisit')</script>";
                                    include get_theme_file_path("home/offline/qvisit/contact/list-contact.php");
                                    break;
                                case "list-event":
                                    echo "<script>setMode('qvisit')</script>";
                                    include get_theme_file_path("home/offline/qvisit/event/list-event.php");
                                    break;
                                case "event":
                                    echo "<script>setMode('qvisit')</script>";
                                    include get_theme_file_path("home/offline/qvisit/event/event.php");
                                    break;
                                case "list-exhibition":
                                    echo "<script>setMode('qvisit')</script>";
                                    include get_theme_file_path("home/offline/qvisit/exhibition/list-exhibition.php");
                                    break;
                                case "exhibition":
                                    echo "<script>setMode('qvisit')</script>";
                                    include get_theme_file_path("home/offline/qvisit/exhibition/exhibition.php");
                                    break;
                                case "list-ticket":
                                    echo "<script>setMode('qvisit')</script>";
                                    include get_theme_file_path("home/offline/qvisit/ticket/list-ticket.php");
                                    break;
                                default:
                                    break;
                            }
                        }
                    } else if($_GET["mode"] == "chat"){
						if (isset($_GET["page"])) {
                            switch ($_GET["page"]) {
								 case "admin":
                                    echo "<script>setMode('chat')</script>";
                                    include get_theme_file_path("home/chat/chat.php");
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
    document.getElementById("logout").addEventListener("click",function(){
		localStorage.setItem(dictionary.MSEC, "");
		testApiForSession();
	});
	document.getElementById("changePassword").addEventListener("click",function(){
		 
Swal.mixin({
  input: 'text',
  confirmButtonText: 'Tiếp theo',
  showCancelButton: true,
  progressSteps: ['1', '2']
}).queue([
  {
    title: 'Mật khẩu cũ',
    text: 'Nhập mật khẩu cũ'
  },
  {
    title: 'Mật khẩu mới',
    text: 'Nhập mật khẩu mới'
  },

]).then((result) => {
  if (result.value) {
    const answers = result.value;
	let tempmyCurrentAccount = {
		oldPassword: answers[0],
		newPassword: answers[1]
	};
	  if(answers[0] == null || answers[0] == ""){
		  SunQAlert()
                        .position('center')
                        .title(dictionaryKey.WRONG_OLD_PASSWORD)
                        .type('error')
                        .confirmButtonColor("#3B4EDC")
                        .confirmButtonText(dictionaryKey.TRY_AGAIN)
                        .callback((result) => {
                            //window.scrollTo(0,0);
                        })
                        .show();
		 }
	  if(answers[1] == null || answers[1] == ""){
		  SunQAlert()
                        .position('center')
                        .title(dictionaryKey.WRONG_NEW_PASSWORD)
                        .type('error')
                        .confirmButtonColor("#3B4EDC")
                        .confirmButtonText(dictionaryKey.TRY_AGAIN)
                        .callback((result) => {
                            //window.scrollTo(0,0);
                        })
                        .show();
		 }
	  
	  requestToSever(
                                sunQRequestType.put,
                                maybechangepass(localStorage.getItem("ididid")),
                                tempmyCurrentAccount,
                                getLocalStorage(dictionary.MSEC),
                                function(res) {
                                    //setLoadingDataAccount(false);
                                    if (res.code === networkCode.success) {
                                        // console.log("myCurrentLecture", myCurrentLecture);
                                        let sunqalertfailed = dictionaryKey.REQUEST_CHANGE_PASWORD_SUCCESS;
                                        SunQAlert()
                                            .position('center')
                                            .title(sunqalertfailed)
                                            .type('success')
                                            .confirmButtonColor("#3B4EDC")
                                            .confirmButtonText(dictionaryKey.AGREE)
                                            .callback((result) => {
//                                                 webpageRedirhttp://admin.sundayq.com/?mode=sa&page=list-accountect(getRedirectUrl(getMode(), "list-group"));
												//webpageRedirect("http://admin.sundayq.com/?mode=sa&page=list-account");
												localStorage.setItem(dictionary.MSEC, "");
												testApiForSession();
                                            })
                                            .show();
  }else if (res.code === networkCode.sessionTimeOut) {
                                        makeAlertRedirect();
                                    } else if (res.code === networkCode.accessDenied) {
                                        makeAlertPermisionDenial();
                                    } else {
                                        SunQAlert()
                                            .position('center')
                                            .title(dictionaryKey.MISS_FIELD + " " + JSON.stringify(res))
                                            .type('error')
                                            .confirmButtonColor("#3B4EDC")
                                            .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                            .callback((result) => {

                                            })
                                            .show();
                                    }
},function(err) {
                                    //setLoadingDataAccount(dictionaryKey.ERR);
                                    console.log(dictionaryKey.ERR_INFO, err);
                                    let sunqalertfailed = dictionaryKey.REQUEST_CHANGE_PASWORD_FAILED;
                                    SunQAlert()
                                        .position('center')
                                        .title(sunqalertfailed)
                                        .type('error')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                        .callback((result) => {
                                            //webpageRedirect(window.location.href);
                                        })
                                        .show();
                                });
	  
	}
	});
		});
    //large screen
    //online
	let sunqModeOnlineDiv = document.getElementById("divShowOnline");
    sunqModeOnlineDiv && sunqModeOnlineDiv.addEventListener("click", function() {
        //console.log("divShowOffline");
        if (getMode() == sunQMode.online) {
            hideOnLineMode();
            setMode("none");
        } else {
            setMode(sunQMode.online);
        }
    });
	//user account
    let sunqModeManageAccount = document.getElementById("divShowManageAccount");
	sunqModeManageAccount && sunqModeManageAccount.addEventListener("click", function() {
        //console.log("divShowFreeQ");
        if (document.getElementById("homeMenuManageAccount").style.display != "none" && document.getElementById("homeMenuManageAccount").style.display != "") {
            hideManageAccount();
            setMode("none");
        } else {
            setMode(sunQMode.manageaccount);
        }
    });
	//freeq
    let sunqModeFreeQDiv = document.getElementById("divShowFreeQ");
    sunqModeFreeQDiv && sunqModeFreeQDiv.addEventListener("click", function() {
        //console.log("divShowFreeQ");
        if (document.getElementById("homeMenuFreeQ").style.display != "none" && document.getElementById("homeMenuFreeQ").style.display != "") {
            hideFreeQ();
            setMode("none");
        } else {
            setMode(sunQMode.freeq);
        }
    });
	//steamq
	let sunqModeSteamQDiv = document.getElementById("divShowSteamQ");
    sunqModeSteamQDiv && sunqModeSteamQDiv.addEventListener("click", function() {
        console.log("divShowFreeQ");
        if (document.getElementById("homeMenuSteamQ").style.display != "none" && document.getElementById("homeMenuSteamQ").style.display != "") {
            hideSteamQ();
            setMode("none");
        } else {
            setMode(sunQMode.steamq);
        }
    });
	//steamq-part
	
    //lesson 1 in freeq
    let sunqModeFreeQDivLesson1 = document.getElementById("divShowFreeLesson1");
    sunqModeFreeQDivLesson1 && sunqModeFreeQDivLesson1.addEventListener("click", function() {
        //console.log("divShowFreeQ");
        if (document.getElementById("homeMenuFreeLesson1").style.display != "none" && document.getElementById("homeMenuFreeLesson1").style.display != "") {
            hideFreeQLesson1();
            setMode("none");
        } else {
            setMode(sunQMode.freeqlesson1);
        }
    });
    //lesson 2 in freeq
    let sunqModeFreeQDivLesson2 = document.getElementById("divShowFreeLesson2");
    sunqModeFreeQDivLesson2 && sunqModeFreeQDivLesson2.addEventListener("click", function() {
        //console.log("divShowFreeQ");
        if (document.getElementById("homeMenuFreeLesson2").style.display != "none" && document.getElementById("homeMenuFreeLesson2").style.display != "") {
            hideFreeQLesson2();
            setMode("none");
        } else {
            setMode(sunQMode.freeqlesson2);
        }
    });

    //leson 3 in freeq
    let sunqModeFreeQDivLesson3 = document.getElementById("divShowFreeLesson3");
    sunqModeFreeQDivLesson3 && sunqModeFreeQDivLesson3.addEventListener("click", function() {
        //console.log("divShowFreeQ");
        if (document.getElementById("homeMenuFreeLesson3").style.display != "none" && document.getElementById("homeMenuFreeLesson3").style.display != "") {
            hideFreeQLesson3();
            setMode("none");
        } else {
            setMode(sunQMode.freeqlesson3);
        }
    });

    //upload
    let sunqModeUploadDiv = document.getElementById("divShowUpload");
    sunqModeUploadDiv && sunqModeUploadDiv.addEventListener("click", function() {
        //console.log("divShowUpload");
        if (document.getElementById("homeMenuUpload").style.display != "none" && document.getElementById("homeMenuUpload").style.display != "") {
            hideUpload();
            setMode("none");
        } else {
            setMode(sunQMode.upload);
        }
    });

    //offline
    let sunqModeOfflineDiv = document.getElementById("divShowOffline");
    sunqModeOfflineDiv && sunqModeOfflineDiv.addEventListener("click", function() {
        //console.log("divShowOffline");
        if (getMode() == sunQMode.offline) {
            hideOffLineMode();
            setMode("none");
        } else {
            setMode(sunQMode.offline);
        }
    });

    let sunqModeQAcademyDiv = document.getElementById("divShowQAcademy");
    sunqModeQAcademyDiv && sunqModeQAcademyDiv.addEventListener("click", function() {
        //console.log("divShowOffline");
        if (document.getElementById("homeMenuQAcedemy").style.display != "none" && document.getElementById("homeMenuQAcedemy").style.display != "") {
            hideQAcademy();
            setMode("none");
        } else {
            setMode(sunQMode.qacademy);
        }
    });

    let sunqModeQVisitDiv = document.getElementById("divShowQVisit");
    sunqModeQVisitDiv && sunqModeQVisitDiv.addEventListener("click", function() {
        //console.log("divShowOffline");
        if (document.getElementById("homeMenuQVisit").style.display != "none" && document.getElementById("homeMenuQVisit").style.display != "") {
            hideQVisit();
            setMode("none");
        } else {
            setMode(sunQMode.qvisit);
        }
    });

    let sunQModeAccount = document.getElementById("divShowAccount");
    sunQModeAccount && sunQModeAccount.addEventListener("click", function() {
        if (getMode() == sunQMode.sa) {
            hideAccountMode();
            setMode("none");
        } else {
            setMode(sunQMode.sa);
        }
        //setMode(sunQMode.account);
    });

	let sunQModeChat = document.getElementById("divShowChat");
    sunQModeChat && sunQModeChat.addEventListener("click", function() {
        if (getMode() == sunQMode.chat) {
            hideAccountMode();
            setMode("none");
        } else {
            setMode(sunQMode.chat);
        }
        //setMode(sunQMode.account);
    });
	
    let mainmenuOffline = document.getElementById("mainmenuOffline");
    if (mainmenuOffline != null) {
        document.getElementById("mainmenuOffline").addEventListener("click", function() {
            console.log("clickkkkk");
            showOffLineMode();
        });
    }

    let mainmenuOnline = document.getElementById("mainmenuOnline");

    if (mainmenuOnline != null) {
        document.getElementById("mainmenuOnline").addEventListener("click", function() {
            showOnLineMode();
        });
    }

    let mainmenuAccount = document.getElementById("mainmenuAccount");

    if (mainmenuAccount != null) {
        document.getElementById("mainmenuAccount").addEventListener("click", function() {
            showAccountMode();
        });
    }

    //small screen

    let smallSunqModeOfflineDiv = document.getElementById("smallDivShowOnline");
    smallSunqModeOfflineDiv && smallSunqModeOfflineDiv.addEventListener("touchend", function() {
        //console.log("divShowOffline");
        if (getMode() == sunQMode.online) {
            hideOnLineMode();
            setMode("none");
        } else {
            setMode(sunQMode.online);
        }
    });


    let smallSunqModeOnlineDiv = document.getElementById("smallDivShowOffline");
    smallSunqModeOnlineDiv && smallSunqModeOnlineDiv.addEventListener("touchend", function() {
        if (getMode() == sunQMode.offline) {
            hideOffLineMode();
            setMode("none");
        } else {
            setMode(sunQMode.offline);
        }

    });

    let smallSunQModeAccount = document.getElementById("smallDivShowAccount");
    smallSunQModeAccount && smallSunQModeAccount.addEventListener("touchend", function() {
        if (getMode() == sunQMode.sa) {
            hideAccountMode();
            setMode("none");
        } else {
            setMode(sunQMode.sa);
        }

    });

    window.addEventListener("touchend", function(e) {
        if (window.innerWidth < 480) {
            let arrayContainInValid = ["dashboardNameSmall", "dashboardNameSmallA", "dashboardNameSmallI", "dashboardNameSmallSPAN", "smallHomeMenuOfflineDivContainListLecture", "smallHomeMenuOfflineAContainListLecture", "smallHomeMenuOfflineIContainListLecture", "smallHomeMenuOfflineDivContainListTeacher", "smallHomeMenuOfflineAContainListTeacher", "smallHomeMenuOfflineIContainListTeacher", "dashboardIconTopSmallDivContain", "smallHomeMenuAccount", "smallHomeMenuAccountSuper", "smallHomeMenuAccountSuperAContainListAccount", "smallHomeMenuAccountGroup", "smallHomeMenuAccountGroupAContainListGroup", "smallDivShowOnline", "smallDivShowOffline", "smallDivShowAccount"];
            let arrayContainValid = ["dashboardIconTopSmall", "dashboardIconTopSmallDivContain"];
            //console.log(e.target.id,arrayContainIdValid.includes(e.target.id));
            let checkId = e.target.id;
            let checkInValid = arrayContainInValid.includes(checkId);
            let checkValid = arrayContainValid.includes(checkId);
            //alert(e.target.id+" invalid "+checkInValid+" valid "+checkValid+" "+typeof e.target.id);
            if (checkInValid == false) {
                if (checkValid) {
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