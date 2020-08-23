<?php

?>
<script>
    var sunqStatus = {
        mode: "none", //offline , online , account
		page: "none",
        isOpenMenu: false,
        isChoosingSelectTeacherMain: false,
        currentACtion: "",
        currentEdit: "",
        logining: false,
        isloginfailed: false,

        isFetchingLecture: false, //đang load danh sách khóa học hiện tại
        isGetLectureFromServerSuccess: false,
        isGetLectureFromServerLengthGreaterThanZero: false,
        isLEctureGetTeacherGreaterThanZero: false, //danh sách teacher do lecture load đang bị trống
        loadingCurrentView: false,
        isUploadingDataLecture: false,
        isChoosingMultiTeacher: false,
        currentLecture: 0, //trang load danh sách khóa học
        currentView: 0, //trang load danh sách người đăng ký 

        isFetchingTeacher: false, //đang load danh sách teacher hiện tại
        isGetTeacherFromServerSuccess: false,
        isGetTeacherFromServerLengthGreaterThanZero: false,
        isGetLectureTeacherFromServerSuccess: false,
        currentSelectTeacher: -1,
        isFetchingTeacherLecture: false,
        isUploadingDataTeacher: false, //load teacher hiện tại
        currentTeacher: 0, //trang load danh sách teacher

        isFetchingGroup: false, //đang load danh sách group hiện tại
        isGetGroupFromServerSuccess: false,
        isGetGroupFromServerLengthGreaterThanZero: false,
        currentSelectGroup: -1, //hiện đang load
        isUploadingDataGroup: false, //load group hện tại
        currentGroup: 0, //trang load danh sách group

        isFetchingAccount: false, //đang load danh sách account hiện tại
        isGetAccountFromServerSuccess: false,
        isGetAccountFromServerLengthGreaterThanZero: false,
        currentSelectAccount: -1, //hiện đang load
        isUploadingDataAccount: false, //load account hện tại
        currentAccount: 0, //trang load danh sách account
    }
    var _mode = "none",
		_page = "none",
        _isOpenMenu = false,
        _isChoosingSelectTeacherMain = false,
        _isFetchingLecture = false,
        _isGetLectureFromServerSuccess = false,
        _isGetLectureFromServerLengthGreaterThanZero = false,
        _isFetchingTeacher = false,
        _isGetTeacherFromServerSuccess = false,
        _isGetTeacherFromServerLengthGreaterThanZero = false,
        _currentSelectTeacher = -1,
        _isLEctureGetTeacherGreaterThanZero = false,
        _isGetLectureTeacherFromServerSuccess = false,
        _isFetchingTeacherLecture = false,
        _currentACtion = "",
        _currentEdit = "",
        _logining = false,
        _isloginfailed = false,
        _isUploadingDataLecture = false,
        _isUploadingDataTeacher = false,
        _isChoosingMultiTeacher = false,
        _currentView = 0,
        _loadingCurrentView = false,
        _currentTeacher = 0,
        _currentLecture = 0,
        _isFetchingGroup = false, //đang load danh sách group hiện tại
        _isGetGroupFromServerSuccess = false,
        _isGetGroupFromServerLengthGreaterThanZero = false,
        _currentSelectGroup = -1, //hiện đang load
        _isUploadingDataGroup = false, //load group hện tại
        _currentGroup = 0, //trang load danh sách group
		 _isFetchingAccount = false, //đang load danh sách account hiện tại
        _isGetAccountFromServerSuccess = false,
        _isGetAccountFromServerLengthGreaterThanZero = false,
        _currentSelectAccount = -1, //hiện đang load
        _isUploadingDataAccount = false, //load account hện tại
        _currentAccount = 0; //trang load danh sách account

    //mode setting
    Object.defineProperty(sunqStatus, "mode", {
        get() {
            return _mode;
        },
        set(val) {
            _mode = val;
            handleChooseMode(val);
        }
    });

	//page select
    Object.defineProperty(sunqStatus, "page", {
        get() {
            return _page;
        },
        set(val) {
            _page = val;
        }
    });
	
    //open menu
    Object.defineProperty(sunqStatus, "isOpenMenu", {
        get() {
            return _isOpenMenu;
        },
        set(val) {
            _isOpenMenu = val;
            val ? document.getElementById("menuContent").style.display = "flex" : document.getElementById("menuContent").style.display = "none";
        }
    });

    //<lecture>

    //fetching lecture
    Object.defineProperty(sunqStatus, "isFetchingLecture", {
        get() {
            return _isFetchingLecture;
        },
        set(val) {
            _isFetchingLecture = val;
            val ? showProgressListLecture() : hideProgressListLecture();
        }
    });


    function setFetchingLecture(val) {
        sunqStatus.isFetchingLecture = val;
    }

    function getFetchingLecture() {
        return sunqStatus.isFetchingLecture;
    }

    //get lecture from server
    Object.defineProperty(sunqStatus, "isGetLectureFromServerSuccess", {
        get() {
            return _isGetLectureFromServerSuccess;
        },
        set(val) {
            _isGetLectureFromServerSuccess = val;
            val ? getListLectureSuccess() : getListLectureFailed();
        }
    });


    function setIsGetLectureFromServerSuccess(val) {
        sunqStatus.isGetLectureFromServerSuccess = val;
    }

    function getIsGetLectureFromServerSuccess() {
        return sunqStatus.isGetLectureFromServerSuccess;
    }

    //get lecture from server success
    Object.defineProperty(sunqStatus, "isGetLectureFromServerLengthGreaterThanZero", {
        get() {
            return _isGetLectureFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetLectureFromServerLengthGreaterThanZero = val;
            val ? getListLectureGreaterThanZero() : getListLectureEqualToZero();
        }
    });

    function setGetLectureFromServerSuccess(val) {
        sunqStatus.isGetLectureFromServerLengthGreaterThanZero = val;
    }

    function getGetLectureFromServerSuccess() {
        return sunqStatus.isGetLectureFromServerLengthGreaterThanZero;
    }

    //get teacher from lecture
    Object.defineProperty(sunqStatus, "isLEctureGetTeacherGreaterThanZero", {
        get() {
            return _isLEctureGetTeacherGreaterThanZero;
        },
        set(val) {
            _isLEctureGetTeacherGreaterThanZero = val;
            val ? getListLectureTeacherGreaterThanZero() : getListLectureTeacherEqualThanZero();
        }
    });

    function setLectureGetTeacherThanZero(val) {
        sunqStatus.isLEctureGetTeacherGreaterThanZero = val;
    }

    function getLectureGetTeacherThanZero() {
        return sunqStatus.isLEctureGetTeacherGreaterThanZero;
    }

    //loadingCurrentView
    Object.defineProperty(sunqStatus, "loadingCurrentView", {
        get() {
            return _loadingCurrentView;
        },
        set(val) {
            _loadingCurrentView = val;
            val == true ? loadingDataRegisterProgress() : val == false ? loadingDataRegisterDone() : loadingDataRegisterError();

        }
    });

    function setLoadingCurrentView(val) {
        sunqStatus.loadingCurrentView = val;
    }

    function getLoadingCurrentView() {
        return sunqStatus.loadingCurrentView;
    }

    //loading data _isUploadingDataLecture
    Object.defineProperty(sunqStatus, "isUploadingDataLecture", {
        get() {
            return _isUploadingDataLecture;
        },
        set(val) {
            _isUploadingDataLecture = val;
            val == true ? loadingDataLectureProgress() : val == false ? loadingDataLectureDone() : loadingDataLectureError();
            //val ? loadingDataLectureProgress() : loadingDataLectureDone() ;
        }
    });

    function setLoadingDataLEcture(val) {
        sunqStatus.isUploadingDataLecture = val;
    }

    function getLoadingDataLEcture() {
        return sunqStatus.isUploadingDataLecture;
    }

    //choosemultiowner
    Object.defineProperty(sunqStatus, "isChoosingMultiTeacher", {
        get() {
            return _isChoosingMultiTeacher;
        },
        set(val) {
            _isChoosingMultiTeacher = val;
            val == true ? chooseMultiOwwner() : chooseSingleOwwner();

        }
    });

    function setChoosingMultiTeacher(val) {
        sunqStatus.isChoosingMultiTeacher = val;
    }

    function getChoosingMultiTeacher() {
        return sunqStatus.isChoosingMultiTeacher;
    }

    Object.defineProperty(sunqStatus, "currentLecture", {
        get() {
            return _currentLecture;
        },
        set(val) {
            _currentLecture = val;

            let dataCurrentViewLecture = {
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };

            setFetchingLecture(true);
            requestToSever(
                sunQRequestType.get,
                //getURLAllLecture(),
                prepareUrlForGetThatContainsBody(getURLAllLecture(), dataCurrentViewLecture),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    setFetchingLecture(false);
                    if (res.code === networkCode.success) {
                        if (res.data == null || res.data.length == 0) {
                            setGetLectureFromServerSuccess(false);
                        } else {
                            //setGetLectureFromServerSuccess(true);
                            emptyTableListLecture();
                            listLecture = listLecture.concat(res.data);
                            createListLEcture(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setFetchingLecture(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                    setIsGetLectureFromServerSuccess(false);

                }
            );

        }
    });

    function getCurrentLecture() {
        return sunqStatus.currentLecture;
    }

    function setCurrentLecture(val) {
        sunqStatus.currentLecture = val;
    }

    Object.defineProperty(sunqStatus, "currentView", {
        get() {
            return _currentView;
        },
        set(val) {
            _currentView = val;
            console.log(val);
            let dataCurrentViewRegister = {
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            setLoadingCurrentView(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getURLListAccountAdvice(), dataCurrentViewRegister),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    setLoadingCurrentView(false);
                    if (res.code === networkCode.success) {
                        createListRegister(res, true);
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setLoadingCurrentView(dictionaryKey.ERR);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );

        }
    });

    function setCurrentView(val) {
        sunqStatus.currentView = val;
    }

    function getCurrentView() {
        return sunqStatus.currentView;
    }

    //<teacher>
    //fetching teacher
    Object.defineProperty(sunqStatus, "isFetchingTeacher", {
        get() {
            return _isFetchingTeacher;
        },
        set(val) {
            _isFetchingTeacher = val;
            val ? showProgressListTeacher() : hideProgressListTeacher();
        }
    });

    function setFetchingTeacher(val) {
        sunqStatus.isFetchingTeacher = val;
    }

    function getFetchingTeacher() {
        return sunqStatus.isFetchingTeacher;
    }

    //get teacher from server
    Object.defineProperty(sunqStatus, "isGetTeacherFromServerSuccess", {
        get() {
            return _isGetTeacherFromServerSuccess;
        },
        set(val) {
            _isGetTeacherFromServerSuccess = val;
            val ? getListTeacherSuccess() : getListTeacherFailed();
        }
    });

    function setIsGetTeacherFromServerSuccess(val) {
        sunqStatus.isGetTeacherFromServerSuccess = val;
    }

    function getIsGetTeacherFromServerSuccess() {
        return sunqStatus.isGetTeacherFromServerSuccess;
    }

    //get teacher from server success
    Object.defineProperty(sunqStatus, "isGetTeacherFromServerLengthGreaterThanZero ", {
        get() {
            return _isGetTeacherFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetTeacherFromServerLengthGreaterThanZero = val;
            val ? getListLectureGreaterThanZero() : getListLectureEqualToZero();
        }
    });

    function setGetTeacherFromServerLengthGreaterThanZero(val) {
        sunqStatus.isGetTeacherFromServerLengthGreaterThanZero = val;
    }

    function getGetTeacherFromServerLengthGreaterThanZero() {
        return sunqStatus.isGetTeacherFromServerLengthGreaterThanZero;
    }

    //get teacher in lecture 
    Object.defineProperty(sunqStatus, "isGetLectureTeacherFromServerSuccess", {
        get() {
            return _isGetLectureTeacherFromServerSuccess;
        },
        set(val) {
            _isGetLectureTeacherFromServerSuccess = val;
            val ? getListLectureTeacherSuccess() : getListLectureTeacherFailed();
        }
    });

    function setIsGetLectureTeacherFromServerSuccess(val) {
        sunqStatus.isGetLectureTeacherFromServerSuccess = val;
    }

    function getIsGetLectureTeacherFromServerSuccess() {
        return sunqStatus.isGetLectureTeacherFromServerSuccess;
    }

    //selectTeacher
    Object.defineProperty(sunqStatus, "currentSelectTeacher", {
        get() {
            return _currentSelectTeacher;
        },
        set(val) {
            _currentSelectTeacher = val;
        }
    });

    function setCurrentSelectTeacher(val, item) {
        sunqStatus.currentSelectTeacher = val;
        selectTeacherIndex(item);
    }

    function getCurrentSelectTeacher() {
        return sunqStatus.currentSelectTeacher;
    }

    //get teacher from lecture
    Object.defineProperty(sunqStatus, "isFetchingTeacherLecture", {
        get() {
            return _isFetchingTeacherLecture;
        },
        set(val) {
            _isFetchingTeacherLecture = val;
            val ? showProgressListTeacherLecture() : hideProgressListTeacherLecture();
        }
    });

    function setFetchingTeacherLecture(val) {
        sunqStatus.isFetchingTeacherLecture = val;
    }

    function getFetchingTeacherLecture() {
        return sunqStatus.isFetchingTeacherLecture;
    }

    //loading data isUploadingDataTeacher
    Object.defineProperty(sunqStatus, "isUploadingDataTeacher", {
        get() {
            return _isUploadingDataTeacher;
        },
        set(val) {
            _isUploadingDataTeacher = val;
            val == true ? loadingDataTeacherProgress() : val == false ? loadingDataTeacherDone() : loadingDataTeacherError();

        }
    });

    function setLoadingDataTeacher(val) {
        sunqStatus.isUploadingDataTeacher = val;
    }

    function getLoadingDataTeacher() {
        return sunqStatus.isUploadingDataTeacher;
    }

    Object.defineProperty(sunqStatus, "currentTeacher", {
        get() {
            return _currentView;
        },
        set(val) {
            _currentTeacher = val;

            let dataCurrentViewTeacher = {
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentTeacher",val);
            setFetchingTeacher(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getURLAllTeacher(), dataCurrentViewTeacher),
                //getURLAllTeacher(),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    //console.log(res);
                    setFetchingTeacher(false);
                    if (res.code === networkCode.success) {
                        if (res.data == null || res.data.length == 0) {
                            setGetTeacherFromServerSuccess(false);
                        } else {
                            emptyTableListTeacher();
                            listTeacher = listTeacher.concat(res.data);
                            createListTeacher(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setFetchingTeacher(false);
                    setIsGetTeacherFromServerSuccess(false);
                    //alert(err);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentTeacher(val) {
        sunqStatus.currentTeacher = val;
    }

    function getCurrentTeacher() {
        return sunqStatus.currentTeacher;
    }

    //<group>

    Object.defineProperty(sunqStatus, "isFetchingGroup", {
        get() {
            return _isFetchingGroup;
        },
        set(val) {
            _isFetchingGroup = val;
            val ? showProgressListGroup() : hideProgressListGroup();
        }
    });

    function setFetchingGroup(val) {
        sunqStatus.isFetchingGroup = val;
    }

    function getFetchingGroup() {
        return sunqStatus.isFetchingGroup;
    }

    Object.defineProperty(sunqStatus, "isGetGroupFromServerSuccess", {
        get() {
            return _isGetGroupFromServerSuccess;
        },
        set(val) {
            _isGetGroupFromServerSuccess = val;
            val ? getListGroupSuccess() : getListGroupFailed();
        }
    });

    function setGetGroupFromServerSuccess(val) {
        sunqStatus.isGetGroupFromServerSuccess = val;
    }

    function getGetGroupFromServerSuccess() {
        return sunqStatus.isGetGroupFromServerSuccess;
    }

    Object.defineProperty(sunqStatus, "isGetGroupFromServerLengthGreaterThanZero ", {
        get() {
            return _isGetGroupFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetGroupFromServerLengthGreaterThanZero = val;
            val ? getListGroupGreaterThanZero() : getListGroupEqualToZero();
        }
    });

    function setGetGroupFromServerLengthGreaterThanZero(val) {
        sunqStatus.isGetGroupFromServerLengthGreaterThanZero = val;
    }

    function getGetGroupFromServerLengthGreaterThanZero() {
        return sunqStatus.isGetGroupFromServerLengthGreaterThanZero;
    }

    Object.defineProperty(sunqStatus, "currentSelectGroup", {
        get() {
            return _currentSelectGroup;
        },
        set(val) {
            _currentSelectGroup = val;
        }
    });

    function setCurrentSelectGroup(val, item) {
        sunqStatus.currentSelectGroup = val;
        selectGroupIndex(item);
    }

    function getCurrentSelectGroup() {
        return sunqStatus.currentSelectGroup;
    }

    Object.defineProperty(sunqStatus, "isUploadingDataGroup", {
        get() {
            return _isUploadingDataGroup;
        },
        set(val) {
            _isUploadingDataGroup = val;
            val == true ? loadingDataGroupProgress() : val == false ? loadingDataGroupDone() : loadingDataGroupError();

        }
    });

    function setLoadingDataGroup(val) {
        sunqStatus.isUploadingDataGroup = val;
    }

    function getLoadingDataGroup() {
        return sunqStatus.isUploadingDataGroup;
    }

    Object.defineProperty(sunqStatus, "currentGroup", {
        get() {
            return _currentGroup;
        },
        set(val) {
            _currentGroup = val;

            let dataCurrentViewGroup = {
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            setFetchingGroup(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getListRollGroup(), dataCurrentViewGroup),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    setFetchingGroup(false);
                    if (res.code === networkCode.success) {
                        if (res.data == null || res.data.length == 0) {
                            setGetGroupFromServerLengthGreaterThanZero(false);
                        } else {
                            emptyTableListGroup();
                            listRollGroup = listRollGroup.concat(res.data);
                            createListGroup(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setFetchingGroup(false);
                    setGetGroupFromServerSuccess(false);
                    //alert(err);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentGroup(val) {
        sunqStatus.currentGroup = val;
    }

    function getCurrentGroup() {
        return sunqStatus.currentGroup;
    }


    //<account>

    Object.defineProperty(sunqStatus, "isFetchingAccount", {
        get() {
            return _isFetchingAccount;
        },
        set(val) {
            _isFetchingAccount = val;
            val ? showProgressListAccount() : hideProgressListAccount();
        }
    });

    function setFetchingAccount(val) {
        sunqStatus.isFetchingAccount = val;
    }

    function getFetchingAccount() {
        return sunqStatus.isFetchingAccount;
    }

    Object.defineProperty(sunqStatus, "isGetAccountFromServerSuccess", {
        get() {
            return _isGetAccountFromServerSuccess;
        },
        set(val) {
            _isGetAccountFromServerSuccess = val;
            val ? getListAccountSuccess() : getListAccountFailed();
        }
    });

    function setIsGetAccountFromServerSuccess(val) {
        sunqStatus.isGetAccountFromServerSuccess = val;
    }

    function getIsGetAccountFromServerSuccess() {
        return sunqStatus.isGetAccountFromServerSuccess;
    }

    Object.defineProperty(sunqStatus, "isGetAccountFromServerLengthGreaterThanZero ", {
        get() {
            return _isGetAccountFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetAccountFromServerLengthGreaterThanZero = val;
            val ? getListAccountGreaterThanZero() : getListAccountEqualToZero();
        }
    });

    function setGetAccountFromServerLengthGreaterThanZero(val) {
        sunqStatus.isGetAccountFromServerLengthGreaterThanZero = val;
    }

    function getGetAccountFromServerLengthGreaterThanZero() {
        return sunqStatus.isGetAccountFromServerLengthGreaterThanZero;
    }

    Object.defineProperty(sunqStatus, "currentSelectAccount", {
        get() {
            return _currentSelectAccount;
        },
        set(val) {
            _currentSelectAccount = val;
        }
    });

    function setCurrentSelectAccount(val, item) {
        sunqStatus.currentSelectAccount = val;
        selectAccountIndex(item);
    }

    function getCurrentSelectAccount() {
        return sunqStatus.currentSelectAccount;
    }

    Object.defineProperty(sunqStatus, "isUploadingDataAccount", {
        get() {
            return _isUploadingDataAccount;
        },
        set(val) {
            _isUploadingDataAccount = val;
            val == true ? loadingDataAccountProgress() : val == false ? loadingDataAccountDone() : loadingDataAccountError();

        }
    });

    function setLoadingDataAccount(val) {
        sunqStatus.isUploadingDataAccount = val;
    }

    function getLoadingDataAccount() {
        return sunqStatus.isUploadingDataAccount;
    }

    Object.defineProperty(sunqStatus, "currentAccount", {
        get() {
            return _currentAccount;
        },
        set(val) {
            _currentAccount = val;

            let dataCurrentViewAccount = {
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentTeacher",val);
            setFetchingAccount(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getListAccount(), dataCurrentViewAccount),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    //console.log(res);
                    //console.log("pre listAccount",listAccount);
                    setFetchingAccount(false);
                    if (res.code === networkCode.success) {
                        if (res.data == null || res.data.length == 0) {
                            setGetAccountFromServerLengthGreaterThanZero(false);
                        } else {
                            emptyTableListAccount();
                            listAccount = listAccount.concat(res.data);
							//console.log("new listAccount",listAccount);
                            createListAccount(res);
                        }
                    }else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setFetchingAccount(false);
                    setIsGetAccountFromServerSuccess(false);
                    //alert(err);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentAccount(val) {
        sunqStatus.currentAccount = val;
    }

    function getCurrentAccount() {
        return sunqStatus.currentAccount;
    }

    //end

    //open choose select main teacher
    Object.defineProperty(sunqStatus, "isChoosingSelectTeacherMain", {
        get() {
            return _isChoosingSelectTeacherMain;
        },
        set(val) {
            _isChoosingSelectTeacherMain = val;
            val ? document.getElementById("listMainTeacher").style.display = "flex" : document.getElementById("listMainTeacher").style.display = "none";
        }
    });



    //current action 
    Object.defineProperty(sunqStatus, "currentACtion", {
        get() {
            return _currentACtion;
        },
        set(val) {
            _currentACtion = val;
        }
    });

    //current edit
    Object.defineProperty(sunqStatus, "currentEdit", {
        get() {
            return _currentEdit;
        },
        set(val) {
            _currentEdit = val;
        }
    });

    //logging
    Object.defineProperty(sunqStatus, "logining", {
        get() {
            return _logining;
        },
        set(val) {
            _logining = val;
            val ? logging() : logDone();
        }
    });


    //logging failed
    Object.defineProperty(sunqStatus, "isloginfailed", {
        get() {
            return _isloginfailed;
        },
        set(val) {
            _isloginfailed = val;
        }
    });

    function setLogInFailed(val, iText) {
        sunqStatus.isloginfailed = val;
        val ? logginFailed(iText) : loginSuccess();
    }

    function getLogInFailed() {
        return sunqStatus.isloginfailed;
    }

    function setLogging(val) {
        sunqStatus.logining = val;
    }

    function getLogging() {
        return sunqStatus.logining;
    }

    function setCurrentEdit(val) {
        sunqStatus.currentEdit = val;
    }

    function getCurrentEdit() {
        return sunqStatus.currentEdit;
    }

    function setCurrentACtion(val) {
        sunqStatus.currentACtion = val;
    }

    function getCurrentACtion() {
        return sunqStatus.currentACtion;
    }

    function setChoosingSelectTeacherMain(val) {
        sunqStatus.isChoosingSelectTeacherMain = val;
    }

    function getChoosingSelectTeacherMain() {
        return sunqStatus.isChoosingSelectTeacherMain;
    }

    function setOpenMenu(val) {
        sunqStatus.isOpenMenu = val;
    }

    function getOpenMenu() {
        return sunqStatus.isOpenMenu;
    }

    function setMode(val) {
        sunqStatus.mode = val;
    }

    function getMode() {
        return sunqStatus.mode;
    }

	function setPage(val) {
        sunqStatus.page = val;
    }

    function getPage() {
        return sunqStatus.page;
    }
	
	function handleChoosePage(val){
		
	}
	
    function handleChooseMode(val) {
        console.log("handleChooseMode", val);
        switch (val) {
            case sunQMode.online:
                showOnLineMode();
                hideOffLineMode();
                hideAccountMode();
                break;
            case sunQMode.offline:
                hideOnLineMode();
                showOffLineMode();
                hideAccountMode();
                break;
			case sunQMode.qacademy:
				showQAcademy();
                hideOnLineMode();
                showOffLineMode();
                hideAccountMode();
                break;
			case sunQMode.qvisit:
				showQVisit();
                hideOnLineMode();
                showOffLineMode();
                hideAccountMode();
                break;
            case sunQMode.sa:
                hideOnLineMode();
                hideOffLineMode();
                showAccountMode();
                break;
            default:
                break;
        }
        /*
        if (val == sunQMode.offline){
        	showOffLineMode();
        	} else {
        		hideOnlineMode()
        	}
        */
        // ? (showOffLineMode(), hideOnlineMode()) :  (hideOfflineMode(), showOnlineMode());
    }
</script>