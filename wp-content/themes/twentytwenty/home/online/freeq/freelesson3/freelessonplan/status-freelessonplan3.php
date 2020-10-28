<?php ?>
<script>
var freeLessonPlan3Status = {
		isFetchingFreeLessonPlan3: false, //đang load danh sách liên lạc
        isGetFreeLessonPlan3FromServerSuccess: false,
        isGetFreeLessonPlan3FromServerLengthGreaterThanZero: false,
        currentSelectFreeLessonPlan3: false,
        isUploadingDataFreeLessonPlan3: false,
        currentFreeLessonPlan3: 0, //trang load danh sách người đăng ký 
		stepUploadingVideo: 0,// 0 upload tên hoặc sửa tên, 1 upload video hoặc sửa tên video
	    currentStatusFreeLessonPlan3:0, //0 là đang ở trạng thái mới tạo video - 1 là trạng thái đã tạo xong video nhưng chưa upload - 2 là trạng thái đã hoàn thiện video
}

var  _isFetchingFreeLessonPlan3 = false,
     _isGetFreeLessonPlan3FromServerSuccess = false,
     _isGetFreeLessonPlan3FromServerLengthGreaterThanZero = false,
     _currentSelectFreeLessonPlan3 = false,
     _isUploadingDataFreeLessonPlan3 = false,
     _currentFreeLessonPlan3 = 0,
	_stepUploadingVideo = 0,
	_currentStatusFreeLessonPlan3 = 0;;
	
	//fetching Upload video
    Object.defineProperty(freeLessonPlan3Status, "isFetchingFreeLessonPlan3", {
        get() {
            return _isFetchingFreeLessonPlan3;
        },
        set(val) {
            _isFetchingFreeLessonPlan3 = val;
            val ? showProgressListFreeLessonPlan3() : hideProgressListFreeLessonPlan3();
        }
    });

    function seFetchingFreeLessonPlan3(val) {
        freeLessonPlan3Status.isFetchingFreeLessonPlan3 = val;
    }

    function getFetchingFreeLessonPlan3() {
        return freeLessonPlan3Status.isFetchingFreeLessonPlan3;
    }
	
	 //get FreeLessonPlan3 from server
    Object.defineProperty(freeLessonPlan3Status, "isGetFreeLessonPlan3FromServerSuccess", {
        get() {
            return _isGetFreeLessonPlan3FromServerSuccess;
        },
        set(val) {
            _isGetFreeLessonPlan3FromServerSuccess = val;
            val ? getListFreeLessonPlan3Success() : getListFreeLessonPlan3Failed();
        }
    });


    function setIsGetFreeLessonPlan3FromServerSuccess(val) {
        freeLessonPlan3Status.isGetFreeLessonPlan3FromServerSuccess = val;
    }

    function getIsGetFreeLessonPlan3FromServerSuccess() {
        return freeLessonPlan3Status.isGetFreeLessonPlan3FromServerSuccess;
    }

	Object.defineProperty(freeLessonPlan3Status, "isGetFreeLessonPlan3FromServerLengthGreaterThanZero", {
        get() {
            return _isGetFreeLessonPlan3FromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetFreeLessonPlan3FromServerLengthGreaterThanZero = val;
            val ? getListFreeLessonPlan3GreaterThanZero() : getListFreeLessonPlan3EqualToZero();
        }
    });

    function setGetFreeLessonPlan3FromServerSuccess(val) {
        freeLessonPlan3Status.isGetFreeLessonPlan3FromServerLengthGreaterThanZero = val;
    }

    function getGetFreeLessonPlan3FromServerSuccess() {
        return freeLessonPlan3Status.isGetFreeLessonPlan3FromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentFreeLessonPlan3
    Object.defineProperty(freeLessonPlan3Status, "currentSelectFreeLessonPlan3", {
        get() {
            return _currentSelectFreeLessonPlan3;
        },
        set(val) {
            _currentSelectFreeLessonPlan3 = val;
        }
    });

    function setCurrentSelectFreeLessonPlan3(val) {
        freeLessonPlan3Status.currentSelectFreeLessonPlan3 = val;
    }

    function getCurrentSelectFreeLessonPlan3() {
        return freeLessonPlan3Status.currentSelectFreeLessonPlan3;
    }
	
	  //loading data isUploadingDataFreeLessonPlan3
    Object.defineProperty(freeLessonPlan3Status, "isUploadingDataFreeLessonPlan3", {
        get() {
            return _isUploadingDataFreeLessonPlan3;
        },
        set(val) {
            _isUploadingDataFreeLessonPlan3 = val;
            val == true ? loadingDataFreeLessonPlan3Progress() : val == false ? loadingDataFreeLessonPlan3Done() : loadingDataFreeLessonPlan3Error();
        }
    });

    function setLoadingDataFreeLessonPlan3(val) {
        freeLessonPlan3Status.isUploadingDataFreeLessonPlan3 = val;
    }

    function getLoadingDataFreeLessonPlan3() {
        return freeLessonPlan3Status.isUploadingDataFreeLessonPlan3;
    }
	
	Object.defineProperty(freeLessonPlan3Status, "currentFreeLessonPlan3", {
        get() {
            return _currentFreeLessonPlan3;
        },
        set(val) {
            _currentFreeLessonPlan3 = val;

            let dataCurrentViewFreeLessonPlan3 = {
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            seFetchingFreeLessonPlan3(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getURLListFreeLessonPlan(ageID.freelesson3.type), dataCurrentViewFreeLessonPlan3),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    seFetchingFreeLessonPlan3(false);
                    if (res.code === networkCode.success) {
                        if (res.data.videos == null || res.data.videos.length == 0) {
							console.log("no video");
                            	setGetFreeLessonPlan3FromServerSuccess(false);
							
                        } else {
                            emptyTableListFreeLessonPlan3();
                            listFreeLessonPlan3 = listFreeLessonPlan3.concat(res.data.agePlans);
                            createListFreeLessonPlan3(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    seFetchingFreeLessonPlan3(false);
                    setIsGetFreeLessonPlan3FromServerSuccess(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentFreeLessonPlan3(val) {
        freeLessonPlan3Status.currentFreeLessonPlan3 = val;
    }

    function getCurrentFreeLessonPlan3() {
        return freeLessonPlan3Status.currentFreeLessonPlan3;
    }
	
	 //stepUploadingVideo
    Object.defineProperty(freeLessonPlan3Status, "stepUploadingVideo", {
        get() {
            return _stepUploadingVideo;
        },
        set(val) {
            _stepUploadingVideo = val;
			val == 0 ? transctionToInitVideo() : transctionToFreeLessonPlan3();
        }
    });

    function setStepUploadingVideo(val) {
        freeLessonPlan3Status.stepUploadingVideo = val;
    }

    function getStepUploadingVideo() {
        return freeLessonPlan3Status.stepUploadingVideo;
    }
	
	Object.defineProperty(freeLessonPlan3Status, "currentStatusFreeLessonPlan3", {
        get() {
            return _currentStatusFreeLessonPlan3;
        },
        set(val) {
            _currentStatusFreeLessonPlan3 = val;
        }
    });

    function setCurrentStatusFreeLessonPlan3(val) {
        freeLessonPlan3Status.currentStatusFreeLessonPlan3 = val;
    }

    function getCurrentStatusFreeLessonPlan3() {
        return freeLessonPlan3Status.currentStatusFreeLessonPlan3;
    }
	
</script>