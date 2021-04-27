<?php ?>
<script>
var freeLessonPlan2Status = {
		isFetchingFreeLessonPlan2: false, //đang load danh sách liên lạc
        isGetFreeLessonPlan2FromServerSuccess: false,
        isGetFreeLessonPlan2FromServerLengthGreaterThanZero: false,
        currentSelectFreeLessonPlan2: false,
        isUploadingDataFreeLessonPlan2: false,
        currentFreeLessonPlan2: 0, //trang load danh sách người đăng ký 
		stepUploadingVideo: 0,// 0 upload tên hoặc sửa tên, 1 upload video hoặc sửa tên video
	    currentStatusFreeLessonPlan2:0, //0 là đang ở trạng thái mới tạo video - 1 là trạng thái đã tạo xong video nhưng chưa upload - 2 là trạng thái đã hoàn thiện video
}

var  _isFetchingFreeLessonPlan2 = false,
     _isGetFreeLessonPlan2FromServerSuccess = false,
     _isGetFreeLessonPlan2FromServerLengthGreaterThanZero = false,
     _currentSelectFreeLessonPlan2 = false,
     _isUploadingDataFreeLessonPlan2 = false,
     _currentFreeLessonPlan2 = 0,
	_stepUploadingVideo = 0,
	_currentStatusFreeLessonPlan2 = 0;;
	
	//fetching Upload video
    Object.defineProperty(freeLessonPlan2Status, "isFetchingFreeLessonPlan2", {
        get() {
            return _isFetchingFreeLessonPlan2;
        },
        set(val) {
            _isFetchingFreeLessonPlan2 = val;
            val ? showProgressListFreeLessonPlan2() : hideProgressListFreeLessonPlan2();
        }
    });

    function seFetchingFreeLessonPlan2(val) {
        freeLessonPlan2Status.isFetchingFreeLessonPlan2 = val;
    }

    function getFetchingFreeLessonPlan2() {
        return freeLessonPlan2Status.isFetchingFreeLessonPlan2;
    }
	
	 //get FreeLessonPlan2 from server
    Object.defineProperty(freeLessonPlan2Status, "isGetFreeLessonPlan2FromServerSuccess", {
        get() {
            return _isGetFreeLessonPlan2FromServerSuccess;
        },
        set(val) {
            _isGetFreeLessonPlan2FromServerSuccess = val;
            val ? getListFreeLessonPlan2Success() : getListFreeLessonPlan2Failed();
        }
    });


    function setIsGetFreeLessonPlan2FromServerSuccess(val) {
        freeLessonPlan2Status.isGetFreeLessonPlan2FromServerSuccess = val;
    }

    function getIsGetFreeLessonPlan2FromServerSuccess() {
        return freeLessonPlan2Status.isGetFreeLessonPlan2FromServerSuccess;
    }

	Object.defineProperty(freeLessonPlan2Status, "isGetFreeLessonPlan2FromServerLengthGreaterThanZero", {
        get() {
            return _isGetFreeLessonPlan2FromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetFreeLessonPlan2FromServerLengthGreaterThanZero = val;
            val ? getListFreeLessonPlan2GreaterThanZero() : getListFreeLessonPlan2EqualToZero();
        }
    });

    function setGetFreeLessonPlan2FromServerSuccess(val) {
        freeLessonPlan2Status.isGetFreeLessonPlan2FromServerLengthGreaterThanZero = val;
    }

    function getGetFreeLessonPlan2FromServerSuccess() {
        return freeLessonPlan2Status.isGetFreeLessonPlan2FromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentFreeLessonPlan2
    Object.defineProperty(freeLessonPlan2Status, "currentSelectFreeLessonPlan2", {
        get() {
            return _currentSelectFreeLessonPlan2;
        },
        set(val) {
            _currentSelectFreeLessonPlan2 = val;
        }
    });

    function setCurrentSelectFreeLessonPlan2(val) {
        freeLessonPlan2Status.currentSelectFreeLessonPlan2 = val;
    }

    function getCurrentSelectFreeLessonPlan2() {
        return freeLessonPlan2Status.currentSelectFreeLessonPlan2;
    }
	
	  //loading data isUploadingDataFreeLessonPlan2
    Object.defineProperty(freeLessonPlan2Status, "isUploadingDataFreeLessonPlan2", {
        get() {
            return _isUploadingDataFreeLessonPlan2;
        },
        set(val) {
            _isUploadingDataFreeLessonPlan2 = val;
            val == true ? loadingDataFreeLessonPlan2Progress() : val == false ? loadingDataFreeLessonPlan2Done() : loadingDataFreeLessonPlan2Error();
        }
    });

    function setLoadingDataFreeLessonPlan2(val) {
        freeLessonPlan2Status.isUploadingDataFreeLessonPlan2 = val;
    }

    function getLoadingDataFreeLessonPlan2() {
        return freeLessonPlan2Status.isUploadingDataFreeLessonPlan2;
    }
	
	Object.defineProperty(freeLessonPlan2Status, "currentFreeLessonPlan2", {
        get() {
            return _currentFreeLessonPlan2;
        },
        set(val) {
            _currentFreeLessonPlan2 = val;

            let dataCurrentViewFreeLessonPlan2 = {
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            seFetchingFreeLessonPlan2(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getURLListFreeLessonPlan(ageID.freelesson2.type), dataCurrentViewFreeLessonPlan2),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    seFetchingFreeLessonPlan2(false);
                    if (res.code === networkCode.success) {
                        if (res.data.agePlans == null || res.data.agePlans.length == 0) {
							console.log("no video");
                            	setGetFreeLessonPlan2FromServerSuccess(false);
							
                        } else {
                            emptyTableListFreeLessonPlan2();
                            listFreeLessonPlan2 = listFreeLessonPlan2.concat(res.data.agePlans);
                            createListFreeLessonPlan2(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    seFetchingFreeLessonPlan2(false);
                    setIsGetFreeLessonPlan2FromServerSuccess(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentFreeLessonPlan2(val) {
        freeLessonPlan2Status.currentFreeLessonPlan2 = val;
    }

    function getCurrentFreeLessonPlan2() {
        return freeLessonPlan2Status.currentFreeLessonPlan2;
    }
	
	 //stepUploadingVideo
    Object.defineProperty(freeLessonPlan2Status, "stepUploadingVideo", {
        get() {
            return _stepUploadingVideo;
        },
        set(val) {
            _stepUploadingVideo = val;
			val == 0 ? transctionToInitVideo() : transctionToFreeLessonPlan2();
        }
    });

    function setStepUploadingVideo(val) {
        freeLessonPlan2Status.stepUploadingVideo = val;
    }

    function getStepUploadingVideo() {
        return freeLessonPlan2Status.stepUploadingVideo;
    }
	
	Object.defineProperty(freeLessonPlan2Status, "currentStatusFreeLessonPlan2", {
        get() {
            return _currentStatusFreeLessonPlan2;
        },
        set(val) {
            _currentStatusFreeLessonPlan2 = val;
        }
    });

    function setCurrentStatusFreeLessonPlan2(val) {
        freeLessonPlan2Status.currentStatusFreeLessonPlan2 = val;
    }

    function getCurrentStatusFreeLessonPlan2() {
        return freeLessonPlan2Status.currentStatusFreeLessonPlan2;
    }
	
</script>