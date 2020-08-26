<?php
$currentAddition = "add";
$currentNameE = "";
if (isset($_GET["addition"])) {
    $currentAddition = $_GET["addition"];
    //echo "<script>alert(\"".$currentAddition."\")</script>";
}
if (isset($_GET["name"])) {
    $currentNameE = $_GET["name"];
    //echo "<script>alert(\"".$currentAddition."\")</script>";
}
?>
<?php
include get_theme_file_path("home/admin/account/account-status.php");
include get_theme_file_path("home/admin/account/account-interact-ui.php");
?>
<form class="manage-teacher-contain">
    <div class="manage-contain-teacher-loading" id="account-page-loading">
        <span id="account-page-loading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="account-page-loading-progress">

        </div>
        <div class="manage-contain-teacher-loading-err" id="account-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>
    <div class="manage-teacher-contain-data">
        <div class="manage-teacher-contain-right">
            <div class="manage-teacher-contain-right-upper">
                <?php
                if ($currentAddition == "edit" || $currentAddition == "add") {
                ?>
                    <!-- Title -->
                    <span class="manage-teacher-contain-right-upper-title"><?php echo $GLOBALS["ACCOUNT_INFO_CHANGE"]; ?></span>

                    <!-- email -->
                    <span><?php echo $GLOBALS["ACCOUNT_INPUT_EMAIL"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                    <?php
                    if ($currentAddition == "edit") {
                    ?>
                        <input id="inputAccountEmail" type="text" placeholder='<?php echo $GLOBALS["ACCOUNT_INPUT_EMAIL"]; ?>' readonly>
                    <?php
                    } else if ($currentAddition == "add") {
                    ?>
                        <input id="inputAccountEmail" type="text" placeholder='<?php echo $GLOBALS["ACCOUNT_INPUT_EMAIL"]; ?>'>

                        <!-- password -->
                        <span><?php echo $GLOBALS["ACCOUNT_INPUT_PASSWORD"]; ?><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span></span>
                        <input id="inputAccountPassword" type="password" placeholder='<?php echo $GLOBALS["ACCOUNT_INPUT_PASSWORD_PLACEHOLDER"]; ?>' required>

                    <?php
                    }
					
                    ?>


                    <!-- name -->
                    <span><?php echo $GLOBALS["ACCOUNT_INPUT_NAME"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                    <input id="inputAccountName" type="text" placeholder='<?php echo $GLOBALS["ACCOUNT_INPUT_NAME_PLACEHOLDER"]; ?>' required>

                    <!-- phone -->
                    <span><?php echo $GLOBALS["ACCOUNT_INPUT_PHONE"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                    <input id="inputAccountPhone" type="text" placeholder='<?php echo $GLOBALS["ACCOUNT_INPUT_PHONE_PLACEHOLDER"]; ?>' required>
                <?php
                } else if ($currentAddition == "password") {
                ?>
                    <!-- Title -->
                    <span class="manage-teacher-contain-right-upper-title"><?php echo $GLOBALS["ACCOUNT_PASSWORD_CHANGE"]; ?></span>

                    <!-- password -->
                    <span><?php echo $GLOBALS["ACCOUNT_INPUT_PASSWORD"]; ?><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span></span>
                    <input id="inputAccountPassword" type="password" placeholder='<?php echo $GLOBALS["ACCOUNT_INPUT_PASSWORD_PLACEHOLDER"]; ?>' required>
                <?php
                } else if ($currentAddition == "permission") {
                ?>
                    <!-- Title -->
                    <span class="manage-teacher-contain-right-upper-title"><?php echo $GLOBALS["ACCOUNT_PERMISION_CHANGE"]; ?></span>

                    <!-- name -->
                    <!--                     <span><?php echo $GLOBALS["ACCOUNT_INPUT_NAME"]; ?><span class="span-require"></span></span>
                    <input id="inputAccountName" type="text" placeholder='<?php echo $GLOBALS["ACCOUNT_INPUT_NAME_PLACEHOLDER"]; ?>' readonly> -->

                    <!-- group -->
                    <span><?php echo $GLOBALS["ACCOUNT_INPUT_PERMISSION"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                    <select id="inputAccountRole">
                    </select>

                    <input type="button" id='accountButtonShowPerrmission' value='<?php echo $GLOBALS["GROUP_PERMISSION_INFO"]; ?>' id="accountSubmit">
                <?php
                }
                ?>
            </div>
        </div>
        <div class="manage-teacher-bottom-action">
            <input type="submit" name='accountSubmit' value='<?php echo $GLOBALS["ACCOUNT_SUBMIT_ADD"]; ?>' id="accountSubmit">
        </div>
    </div>
</form>
<script>
    var uploadDataAccount = {};
    <?php
    if ($currentAddition == "edit" || $currentAddition == "add") {//echo "<script>alert('". $currentAddition."');</script>";
    ?>
        window.onload = function() {
            //alert(getCurrentACtion() );
            if (getCurrentACtion() == dictionaryKey.editStatus) {
                document.getElementById("accountSubmit").value = '<?php echo  $GLOBALS["ACCOUNT_SUBMIT_EDIT"]; ?>';
                setLoadingDataAccount(true);
                //lấy thông tin hiện tại
                requestToSever(
                    sunQRequestType.get,
                    postAdmin() + "/" + getCurrentEdit(),
                    null,
                    getData(dictionary.MSEC),
                    function(res) {
                        setLoadingDataAccount(false);
                        if (res.code === networkCode.success) {
                            if (res.data == null || res.data.length == 0) {

                                //setLectureGetTeacherThanZero(false);
                            } else {
                                document.getElementById("inputAccountEmail").value = res.data.email;
                                document.getElementById("inputAccountName").value = res.data.name;
                                document.getElementById("inputAccountPhone").value = res.data.phone == null ? dictionaryKey.NOT_AVAILABLE : res.data.phone;
                            }
                        } else if (res.code === networkCode.accessDenied) {
                            makeAlertPermisionDenial();
                        } else if (res.code === networkCode.sessionTimeOut) {
                            makeAlertRedirect();
                        }
                    },
                    function(err) {
                        setLoadingDataAccount(dictionaryKey.ERR);
                        console.log(dictionaryKey.ERR_INFO, err);
                    }
                );
            } else {

            }
        }

        document.getElementById("inputAccountEmail").addEventListener("input", function(e) {
            let tttValue = e.target.value;
            uploadDataAccount.email = tttValue.escape();
        });

        document.getElementById("inputAccountName").addEventListener("input", function(e) {
            let tttValue = e.target.value;
            uploadDataAccount.name = tttValue.escape();
        });

        document.getElementById("inputAccountPhone").addEventListener("input", function(e) {
            let tttValue = e.target.value;
            uploadDataAccount.phone = tttValue.escape();
        });

        document.getElementById("inputAccountPassword").addEventListener("input", function(e) {
            let tttValue = e.target.value;
            uploadDataAccount.password = tttValue.escape();
        });

        document.getElementById("accountSubmit").addEventListener("click", function(e) {
            e.preventDefault();
            if (uploadDataAccount.name == null || uploadDataAccount.name == "") {
                SunQAlert()
                    .position('center')
                    .title(dictionaryKey.WRONG_NAME)
                    .type('error')
                    .confirmButtonColor("#3B4EDC")
                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                    .callback((result) => {
                        //window.scrollTo(0,0);
                    })
                    .show();
            } else if (uploadDataAccount.email == null || uploadDataAccount.email == "") {
                SunQAlert()
                    .position('center')
                    .title(dictionaryKey.WRONG_EMAIL)
                    .type('error')
                    .confirmButtonColor("#3B4EDC")
                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                    .callback((result) => {
                        //window.scrollTo(0,0);
                    })
                    .show();
            } else if (!checkEmail(uploadDataAccount.email)) {
                SunQAlert()
                    .position('center')
                    .title(dictionaryKey.WRONG_EMAIL)
                    .type('error')
                    .confirmButtonColor("#3B4EDC")
                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                    .callback((result) => {

                    })
                    .show();
            } else if (!checkPhone(uploadDataAccount.phone)) {
                SunQAlert()
                    .position('center')
                    .title(dictionaryKey.WRONG_PHONE)
                    .type('error')
                    .confirmButtonColor("#3B4EDC")
                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                    .callback((result) => {

                    })
                    .show();
            }
            if (uploadDataAccount.password == null || uploadDataAccount.password == "") {
                SunQAlert()
                    .position('center')
                    .title(dictionaryKey.WRONG_PASSWORD)
                    .type('error')
                    .confirmButtonColor("#3B4EDC")
                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                    .callback((result) => {
                        //window.scrollTo(0,0);
                    })
                    .show();
            }
            if (uploadDataAccount.password.length < 7) {
                SunQAlert()
                    .position('center')
                    .title(dictionaryKey.WRONG_PASSWORD_LENGTH)
                    .type('error')
                    .confirmButtonColor("#3B4EDC")
                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                    .callback((result) => {
                        //window.scrollTo(0,0);
                    })
                    .show();
            } else if (uploadDataAccount.phone == null || uploadDataAccount.phone == "") {
                SunQAlert()
                    .position('center')
                    .title(dictionaryKey.WRONG_BLANK_PHONE)
                    .type('error')
                    .confirmButtonColor("#3B4EDC")
                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                    .callback((result) => {
                        //window.scrollTo(0,0);
                    })
                    .show();
            } else {
                SunQAlert()
                    .position('center')
                    .title(getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.REQUEST_EDIT : dictionaryKey.REQUEST_ADD)
                    .type('success')
                    .confirmButtonColor("#3B4EDC")
                    .cancelButtonColor("#a8b1f5")
                    .confirmButtonText(dictionaryKey.AGREE)
                    .cancelButtonText(dictionaryKey.CANCEL)
                    .callback((result) => {
                        if (result.value) {
                            window.scrollTo(0, 0);
                            let tempmyCurrentAccount = {
                                name: uploadDataAccount.name,
                                phone: uploadDataAccount.phone,
                                email: uploadDataAccount.email,
                                password: uploadDataAccount.password
                            }
                            console.log("push data " + tempmyCurrentAccount);
                            setLoadingDataAccount(true);
                            requestToSever(
                                getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                                getCurrentACtion() == dictionaryKey.editStatus ? postAdmin() + "/" + getCurrentEdit() : postAdmin(),
                                tempmyCurrentAccount,
                                getLocalStorage(dictionary.MSEC),
                                function(res) {
                                    setLoadingDataAccount(false);
                                    if (res.code === networkCode.success) {
                                        // console.log("myCurrentLecture", myCurrentLecture);
                                        let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.LECTURE_EDIT_SUCCESS : dictionaryKey.LECTURE_ADD_SUCCESS;
                                        SunQAlert()
                                            .position('center')
                                            .title(sunqalertfailed)
                                            .type('success')
                                            .confirmButtonColor("#3B4EDC")
                                            .confirmButtonText(dictionaryKey.AGREE)
                                            .callback((result) => {
                                                webpageRedirect(getRedirectUrl(getMode(), "list-group"));
                                            })
                                            .show();
                                    } else if (res.code === networkCode.sessionTimeOut) {
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
                                },
                                function(err) {
                                    setLoadingDataAccount(dictionaryKey.ERR);
                                    console.log(dictionaryKey.ERR_INFO, err);
                                    let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.LECTURE_EDIT_FAILED : dictionaryKey.LECTURE_ADD_FAILED;
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
                                }
                            );
                        }
                    })
                    .show();
            }
        });
    <?php
    } else if ($currentAddition == "password") {
    ?>
        setLoadingDataAccount(false);
        document.getElementById("accountSubmit").value = '<?php echo  $GLOBALS["ACCOUNT_CHANGE_PASSWORD"]; ?>';
        document.getElementById("inputAccountPassword").addEventListener("input", function(e) {
            uploadDataAccount.password = e.target.value;
        });
        document.getElementById("accountSubmit").addEventListener("click", function(e) {
            e.preventDefault();
            if (getCurrentACtion() == dictionaryKey.addStatus) {
                if (uploadDataAccount.password == null || uploadDataAccount.password == "") {
                    SunQAlert()
                        .position('center')
                        .title(dictionaryKey.WRONG_PASSWORD)
                        .type('error')
                        .confirmButtonColor("#3B4EDC")
                        .confirmButtonText(dictionaryKey.TRY_AGAIN)
                        .callback((result) => {
                            //window.scrollTo(0,0);
                        })
                        .show();
                } else if (uploadDataAccount.password.length < 8) {
                    SunQAlert()
                        .position('center')
                        .title(dictionaryKey.WRONG_PASSWORD_LENGTH)
                        .type('error')
                        .confirmButtonColor("#3B4EDC")
                        .confirmButtonText(dictionaryKey.TRY_AGAIN)
                        .callback((result) => {
                            //window.scrollTo(0,0);
                        })
                        .show();
                }
            } else {
                SunQAlert()
                    .position('center')
                    .title(dictionaryKey.REQUEST_CHANGE_PASWORD)
                    .type('success')
                    .confirmButtonColor("#3B4EDC")
                    .cancelButtonColor("#a8b1f5")
                    .confirmButtonText(dictionaryKey.AGREE)
                    .cancelButtonText(dictionaryKey.CANCEL)
                    .callback((result) => {
                        if (result.value) {
                            window.scrollTo(0, 0);
                            let tempmyCurrentAccount = {
                                password: uploadDataAccount.password,
                            };
                            console.log("push data " + tempmyCurrentAccount);
                            setLoadingDataAccount(true);
                            requestToSever(
                                sunQRequestType.put,
                                setAccountPassword(getCurrentEdit()),
                                tempmyCurrentAccount,
                                getLocalStorage(dictionary.MSEC),
                                function(res) {
                                    setLoadingDataAccount(false);
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
                                                webpageRedirect(getRedirectUrl(getMode(), "list-group"));
                                            })
                                            .show();
                                    } else if (res.code === networkCode.sessionTimeOut) {
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
                                },
                                function(err) {
                                    setLoadingDataAccount(dictionaryKey.ERR);
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
                                }
                            );
                        }
                    })
                    .show();
            }
        });
    <?php
    } else if ($currentAddition == "permission") {
    ?>
        window.onload = function() {
            var linkPerrmission = "";
            if (getCurrentACtion() == dictionaryKey.editStatus) {
                //lấy toàn bộ các nhóm quyền
                requestToSever(
                    sunQRequestType.get,
                    getListRollGroup(),
                    null,
                    getData(dictionary.MSEC),
                    function(res) {
                        setLoadingDataAccount(false);
                        if (res.code === networkCode.success) {
                            if (res.data == null || res.data.length == 0) {

                                //setLectureGetTeacherThanZero(false);
                            } else {
                                prepareListGroup(res.data);
                            }
                        } else if (res.code === networkCode.accessDenied) {
                            makeAlertPermisionDenial();
                        } else if (res.code === networkCode.sessionTimeOut) {
                            makeAlertRedirect();
                        }
                    },
                    function(err) {
                        setLoadingDataAccount(dictionaryKey.ERR);
                        console.log(dictionaryKey.ERR_INFO, err);
                    }
                );
            }
        };


        document.getElementById("accountSubmit").value = '<?php echo  $GLOBALS["ACCOUNT_CHANGE_GROUP"]; ?>';

        function prepareListGroup(input) {
            let parent = document.getElementById("inputAccountRole");
            parent.innerHTML = "";
            input.forEach((item, index) => {
                let optionSelect = document.createElement("option");
                optionSelect.value = item.id;
                optionSelect.innerHTML = item.name;
                parent.appendChild(optionSelect);
            });

            let tempArray = localStorage.getItem('listScroll1');
            if (tempArray) {
                tempArray = JSON.parse(tempArray);
                let tempCheckExist = true;
                tempArray.some((item, index) => {
                    if (item.id == "inputAccountRole") {
                        tempCheckExist = false;
                        return true;
                    }
                });

                if (tempCheckExist) {
                    tempArray.push({
                        id: "inputAccountRole",
                        lib: 'listSelect'
                    });
                }
            }
            localStorage.setItem('language', 'vietnam');
            localStorage.setItem('listScroll1', JSON.stringify(tempArray));
            mobiscroll.settings = {
                theme: 'ios',
                themeVariant: 'light'
            };
            mobiscroll.select('#inputAccountRole', {
                display: 'bubble',
            });
        }

        document.getElementById("inputAccountRole").addEventListener("change", function(e) {
            uploadDataGroup.grid = document.getElementById(e.target.id).value;
            linkPerrmission = getHomeURL() + makeATagRedirect(sunQMode.sa, listScreen.account.group, dictionaryKey.editStatus, uploadDataGroup.grid);
            document.getElementById("accountButtonShowPerrmission").style.display = "block";
            document.getElementById("accountButtonShowPerrmission").addEventListener("click", function(e) {
                webpageRedirect(linkPerrmission);
            });
        });

        document.getElementById("accountSubmit").addEventListener("click", function(e) {
            e.preventDefault();
            if (uploadDataGroup.grid == "" || uploadDataGroup.grid == null) {
                SunQAlert()
                    .position('center')
                    .title(dictionaryKey.WRONG_GROUP_PERMISSION)
                    .type('error')
                    .confirmButtonColor("#3B4EDC")
                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                    .callback((result) => {
                        //window.scrollTo(0,0);
                    })
                    .show();
            } else {
                SunQAlert()
                    .position('center')
                    .title(dictionaryKey.REQUEST_CHANGE_PERMISSION)
                    .type('success')
                    .confirmButtonColor("#3B4EDC")
                    .cancelButtonColor("#a8b1f5")
                    .confirmButtonText(dictionaryKey.AGREE)
                    .cancelButtonText(dictionaryKey.CANCEL)
                    .callback((result) => {
                        if (result.value) {
                            window.scrollTo(0, 0);
                            console.log("push data " + uploadDataGroup);
                            setLoadingDataAccount(true);
                            requestToSever(
                                sunQRequestType.put,
                                putAdminRole(getCurrentEdit(), uploadDataGroup.grid),
                                null,
                                getLocalStorage(dictionary.MSEC),
                                function(res) {
                                    setLoadingDataAccount(false);
                                    if (res.code === networkCode.success) {
                                        // console.log("myCurrentLecture", myCurrentLecture);
                                        let sunqalertfailed = dictionaryKey.REQUEST_CHANGE_PERMISSION_SUCCESS;
                                        SunQAlert()
                                            .position('center')
                                            .title(sunqalertfailed)
                                            .type('success')
                                            .confirmButtonColor("#3B4EDC")
                                            .confirmButtonText(dictionaryKey.AGREE)
                                            .callback((result) => {
                                                webpageRedirect(getRedirectUrl(getMode(), "list-account"));
                                            })
                                            .show();
                                    } else if (res.code === networkCode.sessionTimeOut) {
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
                                },
                                function(err) {
                                    setLoadingDataAccount(dictionaryKey.ERR);
                                    console.log(dictionaryKey.ERR_INFO, err);
                                    let sunqalertfailed = dictionaryKey.REQUEST_CHANGE_PERMISSION_FAILED;
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
                                }
                            );
                        }
                    })
                    .show();
            }


        });
    <?php
    }
    ?>
</script>