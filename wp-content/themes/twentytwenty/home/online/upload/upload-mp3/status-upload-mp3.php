<?php ?>
<script>
var uploadMp3Status = {
		isFetchingUploadMp3: false, //đang load danh sách liên lạc
        isGetUploadMp3FromServerSuccess: false,
        isGetUploadMp3FromServerLengthGreaterThanZero: false,
        currentSelectUploadMp3: false,
        isUploadingDataUploadMp3: false,
        currentUploadMp3: 0, //trang load danh sách người đăng ký 
		stepUploadingVideo: 0,// 0 upload tên hoặc sửa tên, 1 upload video hoặc sửa tên video
	    currentStatusUploadMp3:0, //0 là đang ở trạng thái mới tạo video - 1 là trạng thái đã tạo xong video nhưng chưa upload - 2 là trạng thái đã hoàn thiện video
}

var  _isFetchingUploadMp3 = false,
     _isGetUploadMp3FromServerSuccess = false,
     _isGetUploadMp3FromServerLengthGreaterThanZero = false,
     _currentSelectUploadMp3 = false,
     _isUploadingDataUploadMp3 = false,
     _currentUploadMp3 = 0,
	_stepUploadingVideo = 0,
	_currentStatusUploadMp3 = 0;;
	
	//fetching Upload video
    Object.defineProperty(uploadMp3Status, "isFetchingUploadMp3", {
        get() {
            return _isFetchingUploadMp3;
        },
        set(val) {
            _isFetchingUploadMp3 = val;
            val ? showProgressListUploadMp3() : hideProgressListUploadMp3();
        }
    });

    function seFetchingUploadMp3(val) {
        uploadMp3Status.isFetchingUploadMp3 = val;
    }

    function getFetchingUploadMp3() {
        return uploadMp3Status.isFetchingUploadMp3;
    }
	
	 //get UploadMp3 from server
    Object.defineProperty(uploadMp3Status, "isGetUploadMp3FromServerSuccess", {
        get() {
            return _isGetUploadMp3FromServerSuccess;
        },
        set(val) {
            _isGetUploadMp3FromServerSuccess = val;
            val ? getListUploadMp3Success() : getListUploadMp3Failed();
        }
    });


    function setIsGetUploadMp3FromServerSuccess(val) {
        uploadMp3Status.isGetUploadMp3FromServerSuccess = val;
    }

    function getIsGetUploadMp3FromServerSuccess() {
        return uploadMp3Status.isGetUploadMp3FromServerSuccess;
    }

	Object.defineProperty(uploadMp3Status, "isGetUploadMp3FromServerLengthGreaterThanZero", {
        get() {
            return _isGetUploadMp3FromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetUploadMp3FromServerLengthGreaterThanZero = val;
            val ? getListUploadMp3GreaterThanZero() : getListUploadMp3EqualToZero();
        }
    });

    function setGetUploadMp3FromServerSuccess(val) {
        uploadMp3Status.isGetUploadMp3FromServerLengthGreaterThanZero = val;
    }

    function getGetUploadMp3FromServerSuccess() {
        return uploadMp3Status.isGetUploadMp3FromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentUploadMp3
    Object.defineProperty(uploadMp3Status, "currentSelectUploadMp3", {
        get() {
            return _currentSelectUploadMp3;
        },
        set(val) {
            _currentSelectUploadMp3 = val;
        }
    });

    function setCurrentSelectUploadMp3(val) {
        uploadMp3Status.currentSelectUploadMp3 = val;
    }

    function getCurrentSelectUploadMp3() {
        return uploadMp3Status.currentSelectUploadMp3;
    }
	
	  //loading data isUploadingDataUploadMp3
    Object.defineProperty(uploadMp3Status, "isUploadingDataUploadMp3", {
        get() {
            return _isUploadingDataUploadMp3;
        },
        set(val) {
            _isUploadingDataUploadMp3 = val;
            val == true ? loadingDataUploadMp3Progress() : val == false ? loadingDataUploadMp3Done() : loadingDataUploadMp3Error();
        }
    });

    function setLoadingDataUploadMp3(val) {
        uploadMp3Status.isUploadingDataUploadMp3 = val;
    }

    function getLoadingDataUploadMp3() {
        return uploadMp3Status.isUploadingDataUploadMp3;
    }
	
	Object.defineProperty(uploadMp3Status, "currentUploadMp3", {
        get() {
            return _currentUploadMp3;
        },
        set(val) {
            _currentUploadMp3 = val;

            let dataCurrentViewUploadMp3 = {
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            seFetchingUploadMp3(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getListUploadMp3(), dataCurrentViewUploadMp3),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    seFetchingUploadMp3(false);
                    if (res.code === networkCode.success) {
                        if (res.data == null || res.data.length == 0) {
							
                            	setGetUploadMp3FromServerSuccess(false);
							
                        } else {
                            emptyTableListUploadMp3();
                            listUploadMp3 = listUploadMp3.concat(res.data);
                            createListUploadMp3(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    seFetchingUploadMp3(false);
                    setIsGetUploadMp3FromServerSuccess(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentUploadMp3(val) {
        uploadMp3Status.currentUploadMp3 = val;
    }

    function getCurrentUploadMp3() {
        return uploadMp3Status.currentUploadMp3;
    }
	
	 //stepUploadingVideo
    Object.defineProperty(uploadMp3Status, "stepUploadingVideo", {
        get() {
            return _stepUploadingVideo;
        },
        set(val) {
            _stepUploadingVideo = val;
			val == 0 ? transctionToInitVideo() : transctionToUploadMp3();
        }
    });

    function setStepUploadingVideo(val) {
        uploadMp3Status.stepUploadingVideo = val;
    }

    function getStepUploadingVideo() {
        return uploadMp3Status.stepUploadingVideo;
    }
	
	Object.defineProperty(uploadMp3Status, "currentStatusUploadMp3", {
        get() {
            return _currentStatusUploadMp3;
        },
        set(val) {
            _currentStatusUploadMp3 = val;
        }
    });

    function setCurrentStatusUploadMp3(val) {
        uploadMp3Status.currentStatusUploadMp3 = val;
    }

    function getCurrentStatusUploadMp3() {
        return uploadMp3Status.currentStatusUploadMp3;
    }
	
</script>