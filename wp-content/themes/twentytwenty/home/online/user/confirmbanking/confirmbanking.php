<?php
include get_theme_file_path("home/online/user/confirmbanking/status-confirmbanking.php");
include get_theme_file_path("home/online/user/confirmbanking/interact-ui-confirmbanking.php");
?>
<form class="manage-teacher-contain">
    <div class="manage-contain-teacher-loading" id="ConfirmBanking-page-loading">
        <span id="ConfirmBanking-page-loading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="ConfirmBanking-page-loading-progress">

        </div>
        <div class="manage-contain-teacher-loading-err" id="ConfirmBanking-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>
    <div class="manage-teacher-contain-data">
        <div class="manage-teacher-contain-right">
          
			<div class="manage-list-lecture-title">
				<span><?php echo $GLOBALS["CONFIRM_BANKING_TITLE"]; ?></span>
			</div>
			
            <div class="manage-teacher-contain-right-upper">
                <!-- phone -->
                <span><?php echo $GLOBALS["CONFIRM_BANKING_PHONE"]; ?></span>
                <input id="inputConfirmBankingName" type="text" readonly>

                <!-- status -->
                <span><?php echo $GLOBALS["CONFIRM_BANKING_STATUS"]; ?></span>
                <input id="inputConfirmBankingStatus" type="text" readonly>

                <!-- kit -->
                <span><?php echo $GLOBALS["CONFIRM_BANKING_KIT"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>

                <div class="manage-section-infomation-right">
                    <div class="manage-teacher-contain-right-upper">
                        <div class="manage-section-infomation-right-title">
                            <span id="spanNameOfImageReference"></span>
                        </div>
                        <span class="manage-section-infomation-right-list-image-title"><?php echo $GLOBALS["KIT_AVATAR"]; ?></span>
                        <div class="manage-section-infomation-right-list-image" id="divVideoKit">
                            <div>
                            </div>
                        </div>
                        <div class="manage-section-infomation-right-item-div-add">
                            <label for="gotoKit">
                                <span id="btnAddImageLecture"><?php echo $GLOBALS["CONFIRM_BANKING_KIT_GO_TO_KIT"] ?></span>
                                <input type="button" id="gotoKit" name="gotoKit">
                            </label>
                        </div>
                    </div>
                </div>

                <hr class="manage-teacher-hr-between">
                <div class="manage-teacher-contain-right-upper">
                    <!-- title -->
                    <span><?php echo $GLOBALS["KIT_INPUT_NAME"]; ?></span>
                    <input id="idTitleKit" name="Kit_name" type="text" readonly>

<!--                     <span class="manage-section-infomation-right-list-image-title"><?php echo $GLOBALS["CONFIRM_BANKING_KIT_TRANSSACTIONS"]; ?></span> -->
                    <div class="manage-section-infomation-right-list-image" id="divTransactions">
						
						 <!-- Anhr chuyeern khoan -->
<!-- 						<div class="manage-teacher-contain-left" id="confirmBankingAvatar">
							<div class="manage-teacher-contain-right-upper">
								<label class="manage-teacher-contain-left-upload" for="uploadImageVideo">
									<span>
										<?php echo $GLOBALS["CONFIRM_BANKING_AVATAR"]; ?>
									</span>
									<span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
									<img id="imageConfirmBanking" class="manage-teacher-contain-left-img" src='<?php echo $GLOBALS["URI_ADD_NEW"]; ?>'>
								</label>
							</div>
						</div> -->
						
                        <!-- date transfer -->
                        <!-- 					<span><?php echo $GLOBALS["CONFIRM_BANKING_KIT_PRICE_DATE"]; ?></span>
					<input id="idPriceDate" name="Kit_date" type="text" readonly> -->

                        <!-- price transfer -->
                        <!-- 					<span><?php echo $GLOBALS["CONFIRM_BANKING_KIT_PRICE_BANKING"]; ?></span>
					<input id="idPricePrice" name="Kit_date" type="text" readonly> -->

                        <!-- transfer content -->
                        <!-- 					<span><?php echo $GLOBALS["CONFIRM_BANKING_KIT_PRICE_NOTE"]; ?></span>
					<input id="idPriceContent" name="Kit_content" type="text" readonly> -->


                    </div>

                    <!-- price -->
                    <span><?php echo $GLOBALS["KIT_INPUT_PRICE"]; ?></span>
                    <input id="idPriceKit" name="Kit_name" type="text" readonly>
					
					 <div class="manage-section-common-detail-midlle">
                    <div class="manage-section-detail-midlle-span">
                        <span id="KitSubDetailTextAreaTitle"><?php echo $GLOBALS["KIT_INPUT_SUB_DETAIL"]; ?></span>
                    </div>
                    <div class="manage-section-detail-midlle-item">
                        <textarea id="KitSubDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["KIT_INPUT_SUB_DETAIL_PLACEHOLDER"]; ?>' required readonly></textarea>
                    </div>
                </div>
                </div>
                <hr class="manage-teacher-hr-between">
                <!-- GHi chú của admin -->
                <div class="manage-section-common-detail-midlle">
                    <div class="manage-section-detail-midlle-span">
                        <span id="adminNoteTitle"><?php echo $GLOBALS["CONFIRM_BANKING_KIT_ADMIN_NOTE"]; ?></span>
                    </div>
                    <div class="manage-section-detail-midlle-item">
                        <textarea id="adminNote" cols="80" placeholder='<?php echo $GLOBALS["CONFIRM_BANKING_KIT_ADMIN_NOTE_PLACEHOLDER"]; ?>' required></textarea>
        				<input type="submit" name='ConfirmNote' value='<?php echo $GLOBALS["CONFIRM_BANKING_KIT_ADMIN_SUBMIT"]; ?>' id="ConfirmNote">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="manage-teacher-bottom-action" id="ConfirmBankingAction">
<!--         <input type="submit" name='ConfirmBankingSubmit' value='<?php echo $GLOBALS["CONFIRM_BANKING_APRROVE"]; ?>' id="ConfirmBankingSubmit">
		<input type="submit" name='ConfirmBankingReject' value='<?php echo $GLOBALS["CONFIRM_BANKING_REJECT"]; ?>' id="ConfirmBankingReject"> -->
    </div>
</form>
<script>
    var myCurrentConfirmBanking = {};
    window.onload = function() {
        //nếu là edit thì load dữ liệu về
        if (getCurrentACtion() == dictionaryKey.editStatus) {
            //fetch từ server
            setLoadingDataConfirmBanking(true);
            requestToSever(
                sunQRequestType.get,
                getURLOrder(getCurrentEdit()),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDataConfirmBanking(false);
                    if (res.code === networkCode.success) {
                        myCurrentConfirmBanking = res.data.order;
						console.log(myCurrentConfirmBanking);
                        if (myCurrentConfirmBanking.status != confirmStatus.pending) {
                           if(document.getElementById("ConfirmBankingSubmit")){
							   document.getElementById("ConfirmBankingSubmit").style.display = "none";
						   }
                            
                           if(document.getElementById("ConfirmBankingReject")){
							   document.getElementById("ConfirmBankingReject").style.display = "none";
						   }
                        } else if (myCurrentConfirmBanking.status == confirmStatus.pending) {
                            if(document.getElementById("ConfirmBankingSubmit")){
								document.getElementById("ConfirmBankingSubmit").value = '<?php echo $GLOBALS["CONFIRM_BANKING_APRROVE"] ?>';
							}
                            if(document.getElementById("ConfirmBankingReject")){ 
								document.getElementById("ConfirmBankingReject").value = '<?php echo $GLOBALS["CONFIRM_BANKING_REJECT"] ?>';
							}
                        }
						
						document.getElementById("adminNote").value = myCurrentConfirmBanking.comment ? myCurrentConfirmBanking.comment  : "";
						
                        console.log(res.data.order);
                        document.getElementById("inputConfirmBankingName").value = myCurrentConfirmBanking.phone != null ? myCurrentConfirmBanking.phone : "";
                        let status = myCurrentConfirmBanking.status != null ? myCurrentConfirmBanking.status == confirmStatus.complete ? '<?php echo $GLOBALS["CONFIRM_BANKING_COMPLETE"]; ?>' : myCurrentConfirmBanking.status == confirmStatus.pending ? '<?php echo $GLOBALS["CONFIRM_BANKING_PENDING"]; ?>' : '<?php echo $GLOBALS["CONFIRM_BANKING_PAID"]; ?>' : "";
                        document.getElementById("inputConfirmBankingStatus").value = status;

                        document.getElementById("idTitleKit").value = myCurrentConfirmBanking.kit.title == null ? "" : myCurrentConfirmBanking.kit.title;
                        document.getElementById("idPriceKit").value = myCurrentConfirmBanking.kit.price == null ? "" : handleNumber(myCurrentConfirmBanking.kit.price + "") + "đ";;
                        document.getElementById("KitSubDetailTextArea").value = myCurrentConfirmBanking.kit.shortDescription == null ? "" : myCurrentConfirmBanking.kit.shortDescription;
//                         if (myCurrentConfirmBanking.transactions != null) {
//                             let parent = document.getElementById("divTransactions");
//                             myCurrentConfirmBanking.transactions.forEach((item, index) => {

// 								let content = document.createElement("div");
// 								content.className ="manage-section-infomation-right-item manage-section-infomation-right-item-transaction";
								
//                                 let dateTranssfer = item.createAt == null ? "" : fromDateTimeToString(item.createAt);

// 								let spanOrder = document.createElement("span");
// 								spanOrder.className = "manage-teacher-contain-right-upper-center";
//                                 spanOrder.innerHTML = '<?php echo $GLOBALS["CONFIRM_BANKING_KIT_TYPE_TRANSFER_ORDER"]; ?>' + " " + (index + 1);
// 								content.appendChild(spanOrder);
								
// 								let spanType = document.createElement("span");
//                                 spanType.innerHTML = '<?php echo $GLOBALS["CONFIRM_BANKING_KIT_TYPE_TRANSACITON_METHOD"]; ?>';
//                                 let inputType = document.createElement("input");
//                                 inputType.id = "idPriceType_" + index;
//                                 inputType.name = "Kit_type";
//                                 inputType.type = "text";
//                                 inputType.readonly = true;
//                                 inputType.value = item.transactionType == moneyType.payonline ? '<?php echo $GLOBALS["CONFIRM_BANKING_KIT_TYPE_PAY_ONLINE"]; ?>' : '<?php echo $GLOBALS["CONFIRM_BANKING_KIT_TYPE_TRANSFER_ONLINE"]; ?>';
								
// 								if(item.transactionType != moneyType.payonline){
// 								let divImgOutside = document.createElement("div");
// 									divImgOutside.className = "manage-teacher-contain-right-upper";
// 								let labelImg = document.createElement("label");
// 									labelImg.className = "manage-teacher-contain-left-upload manage-teacher-contain-left-upload-transaction";
// 									let spanImg = document.createElement("span");
// 									spanImg.innerHTML = '<?php echo $GLOBALS["CONFIRM_BANKING_AVATAR"]; ?>';
// 									let imgImg = document.createElement("img");
// 									imgImg.className = "manage-teacher-contain-left-img";
// 									imgImg.id = "imageConfirmBanking_"+index;
// 									imgImg.src = item.url == null ? '<?php echo $GLOBALS["URI_ADD_NEW"]; ?>' : item.url;
									
// 									labelImg.appendChild(spanImg);
// 									labelImg.appendChild(imgImg);
// 									divImgOutside.appendChild(labelImg);
// 									content.appendChild(labelImg);
// 									//content.appendChild(imgImg);
// 							    }
								
//                                 let spanDate = document.createElement("span");
//                                 spanDate.innerHTML = '<?php echo $GLOBALS["CONFIRM_BANKING_KIT_PRICE_DATE"]; ?>';
//                                 let inputDate = document.createElement("input");
//                                 inputDate.id = "idPriceDate_" + index;
//                                 inputDate.name = "Kit_date";
//                                 inputDate.type = "text";
//                                 inputDate.readonly = true;
//                                 inputDate.value = dateTranssfer;

//                                 let spanBanking = document.createElement("span");
//                                 spanBanking.innerHTML = '<?php echo $GLOBALS["CONFIRM_BANKING_KIT_PRICE_BANKING"]; ?>';
//                                 let inputBanking = document.createElement("input");
//                                 inputBanking.id = "idPricePrice_" + index;
//                                 inputBanking.name = "Kit_price";
//                                 inputBanking.type = "text";
//                                 inputBanking.readonly = true;
//                                 inputBanking.value = handleNumber(item.amount + "") + "đ";

//                                 let spanNote = document.createElement("span");
//                                 spanNote.innerHTML = '<?php echo $GLOBALS["CONFIRM_BANKING_KIT_PRICE_NOTE"]; ?>';
//                                 let inputNote = document.createElement("input");
//                                 inputNote.id = "idPricePrice_" + index;
//                                 inputNote.name = "Kit_price";
//                                 inputNote.type = "text";
//                                 inputNote.readonly = true;
//                                 inputNote.value = item.orderInfo;

// 								content.appendChild(spanType);
// 								content.appendChild(inputType);
// 								content.appendChild(spanDate);
// 								content.appendChild(inputDate);
// 								content.appendChild(spanBanking);
// 								content.appendChild(inputBanking);
// 								content.appendChild(spanNote);
// 								content.appendChild(inputNote);
								
// 								parent.appendChild(content)
//                             });
//                         } else { 
// //                             let parent = document.getElementById("divTransactions");

// // 							let spanParent = document.createElement("span");
// // 							spanParent.innerHTML = '<?php echo $GLOBALS["CONFIRM_BANKING_TRANSACTION_NO_INFO"]; ?>';
// // 							spanParent.style.color = "red";
// // 							parent.appendChild(spanParent);
							
// 							document.getElementById("ConfirmBankingAction").style.display = "none";
// 						}

                        // 							document.getElementById("idPricePrice").value =  myCurrentConfirmBanking.transactions.amount
                        //  == null ? '' : myCurrentConfirmBanking.transactions.amount;
                        // 							document.getElementById("idPriceContent").value =  myCurrentConfirmBanking.transactions.orderInfo
                        //  == null ? '' : myCurrentConfirmBanking.transactions.orderInfo;
                        
                        if (myCurrentConfirmBanking.kit.thumbnailUrls != null) {
                            let parent = document.getElementById("divVideoKit");
                            myCurrentConfirmBanking.kit.thumbnailUrls.forEach((item, index) => {
                                let imgKitParrent = document.createElement("div");
                                imgKitParrent.className = "manage-section-infomation-right-item";
                                let imgTempKit = document.createElement("img");
                                imgTempKit.id = "kit-img-" + (index + 1);
                                imgTempKit.className = "manage-section-infomation-right-item-img";
                                imgTempKit.src = getHomeURL() + item;
                                let imgKitClose = document.createElement("div");
                                imgKitClose.className = "manage-section-infomation-right-list-image-drop";

                                imgKitParrent.appendChild(imgTempKit);
                                parent.appendChild(imgKitParrent);
                            });

                        } else {
                            document.getElementById("btnAddImageKit").innerHTML = '<?php echo $GLOBALS["KIT_NO_AVATAR"]; ?>';
                        }
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setLoadingDataConfirmBanking(dictionaryKey.ERR);
                    console.log(dictionaryKey.ERR_INFO, err);
                    SunQAlert()
                        .position('center')
                        .title(dictionaryKey.ERROR_API_MESSAGE)
                        .type('error')
                        .confirmButtonColor("#3B4EDC")
                        .confirmButtonText(dictionaryKey.TRY_AGAIN)
                        .callback((result) => {
                            webpageRedirect(window.location.href);
                        })
                        .show();
                }
            );

        } else {
            //document.getElementById("ConfirmBankingSubmit").value = '<?php echo $GLOBALS["LECTURE_SUBMIT_ADD"] ?>';

        }
    }

	function updateAdminNote(){
		 SunQAlert()
            .position('center')
            .title(dictionaryKey.REQUEST_EDIT)
            .type('success')
            .confirmButtonColor("#3B4EDC")
            .cancelButtonColor("#a8b1f5")
            .confirmButtonText(dictionaryKey.AGREE)
            .cancelButtonText(dictionaryKey.CANCEL)
            .callback((result) => {
                if (result.value) {
					
					let dataUpdateTicket = {
						comment: myCurrentConfirmBanking.comment
					};
				setLoadingDataConfirmBanking(true);
                   requestToSever(
						sunQRequestType.put,
						getCommentURLOrder(getCurrentEdit()),
						dataUpdateTicket,
						getData(dictionary.MSEC),
                        function(res) {
                            //console.log(res);
                            setLoadingDataConfirmBanking(false);
                            if (res.code === networkCode.success) {
                                SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.CONFIRM_BANKING_COMMENT_SUCCESS)
                                    .type('success')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.AGREE)
                                    .callback((result) => {
                                       //createListRegister(getCurrentView(),false);
                                       webpageRedirect(getAdminHomeURL() + "?mode=online&page=list-confirmbanking");
                                    })
                                    .show();
                            } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   } else if (res.code === networkCode.sessionTimeOut) {
                                makeAlertRedirect();
                            }
                        },
                        function(err) {
                            setLoadingDataConfirmBanking(false);
                            SunQAlert()
                                .position('center')
                                .title(dictionaryKey.CONFIRM_BANKING_COMMENT_FAILED)
                                .type('error')
                                .confirmButtonColor("#3B4EDC")
                                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                .callback((result) => {
                                   // createListRegister(getCurrentView(),false);
                                })
                                .show();

                            console.log(dictionaryKey.ERR_INFO, err);

                        }
                    );
				}
		 }).show();
	}
	
	 document.getElementById("ConfirmNote").addEventListener("click", function(e) {
		  e.preventDefault();
        updateAdminNote();
    });
	
	 document.getElementById("adminNote").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentConfirmBanking.comment = tttValue.escape();
    });
	
    document.getElementById("gotoKit").addEventListener("click", function() {
        if (myCurrentConfirmBanking.kit.id) {
            webpageRedirect(makeATagRedirect(sunQMode.online, listScreen.online.kit, dictionaryKey.editStatus, myCurrentConfirmBanking.kit.id));
        }
    });

//     document.getElementById("ConfirmBankingSubmit").addEventListener("click", function(e) {
//         e.preventDefault();
//         if (myCurrentConfirmBanking.status == confirmStatus.pending) {
//             let tempmyCurrentUploadVideo = myCurrentConfirmBanking;
//             if (getCurrentACtion() == dictionaryKey.editStatus) {

//             }
//             SunQAlert()
//                 .position('center')
//                 .title(dictionaryKey.REQUEST_PROVE)
//                 .type('success')
//                 .confirmButtonColor("#3B4EDC")
//                 .cancelButtonColor("#a8b1f5")
//                 .confirmButtonText(dictionaryKey.AGREE)
//                 .cancelButtonText(dictionaryKey.CANCEL)
//                 .callback((result) => {
//                     if (result.value) {
//                         window.scrollTo(0, 0);

// 						let transid = myCurrentConfirmBanking.transactions == null ? "" : myCurrentConfirmBanking.transactions[0].id == null ? "" : myCurrentConfirmBanking.transactions[0].id;
//                         setFetchingConfirmBanking(true);
//                         requestToSever(
//                             sunQRequestType.post,
//                             verifyTransferMoney(transid),
//                             {isSuccess:true},
//                             getLocalStorage(dictionary.MSEC),
//                             function(res) {
//                                 setFetchingConfirmBanking(false);
//                                 if (res.code === networkCode.success) {
//                                     //myCurrentUploadVideo = res.data;
//                                     SunQAlert()
//                                         .position('center')
//                                         .title(dictionaryKey.CONFIRM_BANKING_APPROVE_SUCCESS)
//                                         .type('success')
//                                         .confirmButtonColor("#3B4EDC")
//                                         .confirmButtonText(dictionaryKey.AGREE)
//                                         .callback((result) => {
//                                             webpageRedirect(getAdminHomeURL() + "?mode=online&page=list-confirmbanking");
//                                         })
//                                         .show();
//                                 } else if (res.code === networkCode.accessDenied) {
//                                     makeAlertPermisionDenial();
//                                 } else if (res.code === networkCode.sessionTimeOut) {
//                                     makeAlertRedirect();
//                                 } else {
//                                     //alert("loi"+JSON.stringify(res));
//                                     SunQAlert()
//                                         .position('center')
//                                         .title(dictionaryKey.SERVER_INFO + res.message)
//                                         .type('error')
//                                         .confirmButtonColor("#3B4EDC")
//                                         .confirmButtonText(dictionaryKey.TRY_AGAIN)
//                                         .callback((result) => {})
//                                         .show();
//                                 }
//                             },
//                             function(err) {
//                                 //alert(err);
//                                 setFetchingConfirmBanking(dictionaryKey.ERR);
//                                 SunQAlert()
//                                     .position('center')
//                                     .title(dictionaryKey.CONFIRM_BANKING_APPROVE_FAILED)
//                                     .type('error')
//                                     .confirmButtonColor("#3B4EDC")
//                                     .confirmButtonText(dictionaryKey.TRY_AGAIN)
//                                     .callback((result) => {
//                                         // webpageRedirect(window.location.href);

//                                     })
//                                     .show();
//                                 console.log(dictionaryKey.ERR_INFO, err);
//                             }
//                         );
//                     }
//                 })
//                 .show();
//         }
//     });
	
// 	document.getElementById("ConfirmBankingReject").addEventListener("click", function(e) {
//         e.preventDefault();
//         if (myCurrentConfirmBanking.status == confirmStatus.pending) {
//             let tempmyCurrentUploadVideo = myCurrentConfirmBanking;
//             if (getCurrentACtion() == dictionaryKey.editStatus) {

//             }
//             SunQAlert()
//                 .position('center')
//                 .title(dictionaryKey.REQUEST_REJECT)
//                 .type('success')
//                 .confirmButtonColor("#3B4EDC")
//                 .cancelButtonColor("#a8b1f5")
//                 .confirmButtonText(dictionaryKey.AGREE)
//                 .cancelButtonText(dictionaryKey.CANCEL)
//                 .callback((result) => {
//                     if (result.value) {
//                         window.scrollTo(0, 0);

// 						let transid = myCurrentConfirmBanking.transactions == null ? "" : myCurrentConfirmBanking.transactions[0].id == null ? "" : myCurrentConfirmBanking.transactions[0].id;
//                         setLoadingDataConfirmBanking(true);
//                         requestToSever(
//                             sunQRequestType.post,
//                             verifyTransferMoney(transid),
// 							{isSuccess:false},
//                             getLocalStorage(dictionary.MSEC),
//                             function(res) {
//                                 setLoadingDataConfirmBanking(false);
//                                 if (res.code === networkCode.success) {
//                                     //myCurrentUploadVideo = res.data;
//                                     SunQAlert()
//                                         .position('center')
//                                         .title(dictionaryKey.CONFIRM_BANKING_REJECT_SUCCESS)
//                                         .type('success')
//                                         .confirmButtonColor("#3B4EDC")
//                                         .confirmButtonText(dictionaryKey.AGREE)
//                                         .callback((result) => {
//                                             webpageRedirect(getAdminHomeURL() + "?mode=online&page=list-confirmbanking");
//                                         })
//                                         .show();
//                                 } else if (res.code === networkCode.accessDenied) {
//                                     makeAlertPermisionDenial();
//                                 } else if (res.code === networkCode.sessionTimeOut) {
//                                     makeAlertRedirect();
//                                 } else {
//                                     //alert("loi"+JSON.stringify(res));
//                                     SunQAlert()
//                                         .position('center')
//                                         .title(dictionaryKey.SERVER_INFO + res.message)
//                                         .type('error')
//                                         .confirmButtonColor("#3B4EDC")
//                                         .confirmButtonText(dictionaryKey.TRY_AGAIN)
//                                         .callback((result) => {})
//                                         .show();
//                                 }
//                             },
//                             function(err) {
//                                 //alert(err);
//                                 setLoadingDataConfirmBanking(dictionaryKey.ERR);
//                                 SunQAlert()
//                                     .position('center')
//                                     .title(dictionaryKey.CONFIRM_BANKING_REJECT_FAILED)
//                                     .type('error')
//                                     .confirmButtonColor("#3B4EDC")
//                                     .confirmButtonText(dictionaryKey.TRY_AGAIN)
//                                     .callback((result) => {
//                                         // webpageRedirect(window.location.href);

//                                     })
//                                     .show();
//                                 console.log(dictionaryKey.ERR_INFO, err);
//                             }
//                         );
//                     }
//                 })
//                 .show();
//         }
//     });
</script>