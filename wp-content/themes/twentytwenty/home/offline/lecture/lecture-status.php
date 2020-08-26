<?php ?>
<script>
	var lectureStatus = {
		isFetchingLecture: false, //đang load danh sách khóa học hiện tại
        isGetLectureFromServerSuccess: false,
        isGetLectureFromServerLengthGreaterThanZero: false,
        isLEctureGetTeacherGreaterThanZero: false, //danh sách teacher do lecture load đang bị trống
        loadingCurrentView: false,
        isUploadingDataLecture: false,
        isChoosingMultiTeacher: false,
		isFetchingTeacherLecture: false,
		isGetLectureTeacherFromServerSuccess:false,
        currentLecture: 0, //trang load danh sách khóa học
        currentView: 0, //trang load danh sách người đăng ký 
	}
	var _isFetchingLecture = false,
		_isGetLectureFromServerSuccess = false,
        _isGetLectureFromServerLengthGreaterThanZero = false,
		_isLEctureGetTeacherGreaterThanZero = false,
		_isGetLectureTeacherFromServerSuccess = false,
		_loadingCurrentView = false,
        _isUploadingDataLecture = false,
        _isChoosingMultiTeacher = false,
		 _currentView = 0,
		_isFetchingTeacherLecture = false,
        _loadingCurrentView = false,
		_currentLecture = 0;
	
	 //<lecture>

    //fetching lecture
    Object.defineProperty(lectureStatus, "isFetchingLecture", {
        get() {
            return _isFetchingLecture;
        },
        set(val) {
            _isFetchingLecture = val;
            val ? showProgressListLecture() : hideProgressListLecture();
        }
    });


    function setFetchingLecture(val) {
        lectureStatus.isFetchingLecture = val;
    }

    function getFetchingLecture() {
        return lectureStatus.isFetchingLecture;
    }

    //get lecture from server
    Object.defineProperty(lectureStatus, "isGetLectureFromServerSuccess", {
        get() {
            return _isGetLectureFromServerSuccess;
        },
        set(val) {
            _isGetLectureFromServerSuccess = val;
            val ? getListLectureSuccess() : getListLectureFailed();
        }
    });


    function setIsGetLectureFromServerSuccess(val) {
        lectureStatus.isGetLectureFromServerSuccess = val;
    }

    function getIsGetLectureFromServerSuccess() {
        return lectureStatus.isGetLectureFromServerSuccess;
    }

    //get lecture from server success
    Object.defineProperty(lectureStatus, "isGetLectureFromServerLengthGreaterThanZero", {
        get() {
            return _isGetLectureFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetLectureFromServerLengthGreaterThanZero = val;
            val ? getListLectureGreaterThanZero() : getListLectureEqualToZero();
        }
    });

    function setGetLectureFromServerSuccess(val) {
        lectureStatus.isGetLectureFromServerLengthGreaterThanZero = val;
    }

    function getGetLectureFromServerSuccess() {
        return lectureStatus.isGetLectureFromServerLengthGreaterThanZero;
    }

    //get teacher from lecture
    Object.defineProperty(lectureStatus, "isLEctureGetTeacherGreaterThanZero", {
        get() {
            return _isLEctureGetTeacherGreaterThanZero;
        },
        set(val) {
            _isLEctureGetTeacherGreaterThanZero = val;
            val ? getListLectureTeacherGreaterThanZero() : getListLectureTeacherEqualThanZero();
        }
    });

    function setLectureGetTeacherThanZero(val) {
        lectureStatus.isLEctureGetTeacherGreaterThanZero = val;
    }

    function getLectureGetTeacherThanZero() {
        return lectureStatus.isLEctureGetTeacherGreaterThanZero;
    }

	 //get teacher from lecture
    Object.defineProperty(lectureStatus, "isFetchingTeacherLecture", {
        get() {
            return _isFetchingTeacherLecture;
        },
        set(val) {
            _isFetchingTeacherLecture = val;
            val ? showProgressListTeacherLecture() : hideProgressListTeacherLecture();
        }
    });

    function setFetchingTeacherLecture(val) {
        lectureStatus.isFetchingTeacherLecture = val;
    }

    function getFetchingTeacherLecture() {
        return lectureStatus.isFetchingTeacherLecture;
    }
	
    //loadingCurrentView
    Object.defineProperty(lectureStatus, "loadingCurrentView", {
        get() {
            return _loadingCurrentView;
        },
        set(val) {
            _loadingCurrentView = val;
            val == true ? loadingDataRegisterProgress() : val == false ? loadingDataRegisterDone() : loadingDataRegisterError();

        }
    });

    function setLoadingCurrentView(val) {
        lectureStatus.loadingCurrentView = val;
    }

    function getLoadingCurrentView() {
        return lectureStatus.loadingCurrentView;
    }

    //loading data _isUploadingDataLecture
    Object.defineProperty(lectureStatus, "isUploadingDataLecture", {
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
        lectureStatus.isUploadingDataLecture = val;
    }

    function getLoadingDataLEcture() {
        return lectureStatus.isUploadingDataLecture;
    }

	//get teacher in lecture 
    Object.defineProperty(lectureStatus, "isGetLectureTeacherFromServerSuccess", {
        get() {
            return _isGetLectureTeacherFromServerSuccess;
        },
        set(val) {
            _isGetLectureTeacherFromServerSuccess = val;
            val ? getListLectureTeacherSuccess() : getListLectureTeacherFailed();
        }
    });

    function setIsGetLectureTeacherFromServerSuccess(val) {
        lectureStatus.isGetLectureTeacherFromServerSuccess = val;
    }

    function getIsGetLectureTeacherFromServerSuccess() {
        return lectureStatus.isGetLectureTeacherFromServerSuccess;
    }
	
    //choosemultiowner
    Object.defineProperty(lectureStatus, "isChoosingMultiTeacher", {
        get() {
            return _isChoosingMultiTeacher;
        },
        set(val) {
            _isChoosingMultiTeacher = val;
            val == true ? chooseMultiOwwner() : chooseSingleOwwner();

        }
    });

    function setChoosingMultiTeacher(val) {
        lectureStatus.isChoosingMultiTeacher = val;
    }

    function getChoosingMultiTeacher() {
        return lectureStatus.isChoosingMultiTeacher;
    }

    Object.defineProperty(lectureStatus, "currentLecture", {
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
        return lectureStatus.currentLecture;
    }

    function setCurrentLecture(val) {
        lectureStatus.currentLecture = val;
    }

    Object.defineProperty(lectureStatus, "currentView", {
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
        lectureStatus.currentView = val;
    }

    function getCurrentView() {
        return lectureStatus.currentView;
    }
</script>