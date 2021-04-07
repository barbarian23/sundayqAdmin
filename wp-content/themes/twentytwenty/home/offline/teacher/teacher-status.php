<?php ?>
<script>
	var teacherStatus = {
		 isFetchingTeacher: false, //đang load danh sách teacher hiện tại
        isGetTeacherFromServerSuccess: false,
        isGetTeacherFromServerLengthGreaterThanZero: false,
        currentSelectTeacher: -1,
        isFetchingTeacherLecture: false,
        isUploadingDataTeacher: false, //load teacher hiện tại
        currentTeacher: 0, //trang load danh sách teacher
	};
	
	var _isFetchingTeacher = false,
		_isChoosingSelectTeacherMain = false,
        _isGetTeacherFromServerSuccess = false,
        _isGetTeacherFromServerLengthGreaterThanZero = false,
        _currentSelectTeacher = -1,
        _isFetchingTeacherLecture = false, 
		_isUploadingDataTeacher = false,
		_currentTeacher = 0;

	//<teacher>
    //fetching teacher
    Object.defineProperty(teacherStatus, "isFetchingTeacher", {
        get() {
            return _isFetchingTeacher;
        },
        set(val) {
            _isFetchingTeacher = val;
            val ? showProgressListTeacher() : hideProgressListTeacher();
        }
    });

    function setFetchingTeacher(val) {
        teacherStatus.isFetchingTeacher = val;
    }

    function getFetchingTeacher() {
        return teacherStatus.isFetchingTeacher;
    }

    //get teacher from server
    Object.defineProperty(teacherStatus, "isGetTeacherFromServerSuccess", {
        get() {
            return _isGetTeacherFromServerSuccess;
        },
        set(val) {
            _isGetTeacherFromServerSuccess = val;
            val ? getListTeacherSuccess() : getListTeacherFailed();
        }
    });

    function setIsGetTeacherFromServerSuccess(val) {
        teacherStatus.isGetTeacherFromServerSuccess = val;
    }

    function getIsGetTeacherFromServerSuccess() {
        return teacherStatus.isGetTeacherFromServerSuccess;
    }

    //get teacher from server success
    Object.defineProperty(teacherStatus, "isGetTeacherFromServerLengthGreaterThanZero", {
        get() {
            return _isGetTeacherFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetTeacherFromServerLengthGreaterThanZero = val;
            val ? getListTeacherGreaterThanZero() : getListTeacherEqualToZero();
        }
    });

    function setGetTeacherFromServerLengthGreaterThanZero(val) {
        teacherStatus.isGetTeacherFromServerLengthGreaterThanZero = val;
    }

    function getGetTeacherFromServerLengthGreaterThanZero() {
        return teacherStatus.isGetTeacherFromServerLengthGreaterThanZero;
    }

    //selectTeacher
    Object.defineProperty(teacherStatus, "currentSelectTeacher", {
        get() {
            return _currentSelectTeacher;
        },
        set(val) {
            _currentSelectTeacher = val;
        }
    });

    function setCurrentSelectTeacher(val, item) {
        teacherStatus.currentSelectTeacher = val;
        selectTeacherIndex(item);
    }

    function getCurrentSelectTeacher() {
        return teacherStatus.currentSelectTeacher;
    }

    //get teacher from lecture
    Object.defineProperty(teacherStatus, "isFetchingTeacherLecture", {
        get() {
            return _isFetchingTeacherLecture;
        },
        set(val) {
            _isFetchingTeacherLecture = val;
            val ? showProgressListTeacherLecture() : hideProgressListTeacherLecture();
        }
    });

    function setFetchingTeacherLecture(val) {
        teacherStatus.isFetchingTeacherLecture = val;
    }

    function getFetchingTeacherLecture() {
        return teacherStatus.isFetchingTeacherLecture;
    }

    //loading data isUploadingDataTeacher
    Object.defineProperty(teacherStatus, "isUploadingDataTeacher", {
        get() {
            return _isUploadingDataTeacher;
        },
        set(val) {
            _isUploadingDataTeacher = val;
            val == true ? loadingDataTeacherProgress() : val == false ? loadingDataTeacherDone() : loadingDataTeacherError();

        }
    });

    function setLoadingDataTeacher(val) {
        teacherStatus.isUploadingDataTeacher = val;
    }

    function getLoadingDataTeacher() {
        return teacherStatus.isUploadingDataTeacher;
    }

    Object.defineProperty(teacherStatus, "currentTeacher", {
        get() {
            return _currentTeacher;
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
                    console.log(res);
                    setFetchingTeacher(false);
                    if (res.code === networkCode.success) {
                        if (res.data == null || res.data.length == 0) {
                            setGetTeacherFromServerLengthGreaterThanZero(false);
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
        teacherStatus.currentTeacher = val;
    }

    function getCurrentTeacher() {
        return teacherStatus.currentTeacher;
    }

</script>