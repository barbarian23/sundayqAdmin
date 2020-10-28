<?php ?>
<script>
var freeLessonPlan1Status = {
		isFetchingFreeLessonPlan1: false, //đang load danh sách liên lạc
        isGetFreeLessonPlan1FromServerSuccess: false,
        isGetFreeLessonPlan1FromServerLengthGreaterThanZero: false,
        currentSelectFreeLessonPlan1: false,
        isUploadingDataFreeLessonPlan1: false,
        currentFreeLessonPlan1: 0, //trang load danh sách người đăng ký 
		stepUploadingVideo: 0,// 0 upload tên hoặc sửa tên, 1 upload video hoặc sửa tên video
	    currentStatusFreeLessonPlan1:0, //0 là đang ở trạng thái mới tạo video - 1 là trạng thái đã tạo xong video nhưng chưa upload - 2 là trạng thái đã hoàn thiện video
}

var  _isFetchingFreeLessonPlan1 = false,
     _isGetFreeLessonPlan1FromServerSuccess = false,
     _isGetFreeLessonPlan1FromServerLengthGreaterThanZero = false,
     _currentSelectFreeLessonPlan1 = false,
     _isUploadingDataFreeLessonPlan1 = false,
     _currentFreeLessonPlan1 = 0,
	_stepUploadingVideo = 0,
	_currentStatusFreeLessonPlan1 = 0;;
	
	//fetching Upload video
    Object.defineProperty(freeLessonPlan1Status, "isFetchingFreeLessonPlan1", {
        get() {
            return _isFetchingFreeLessonPlan1;
        },
        set(val) {
            _isFetchingFreeLessonPlan1 = val;
            val ? showProgressListFreeLessonPlan1() : hideProgressListFreeLessonPlan1();
        }
    });

    function seFetchingFreeLessonPlan1(val) {
        freeLessonPlan1Status.isFetchingFreeLessonPlan1 = val;
    }

    function getFetchingFreeLessonPlan1() {
        return freeLessonPlan1Status.isFetchingFreeLessonPlan1;
    }
	
	 //get FreeLessonPlan1 from server
    Object.defineProperty(freeLessonPlan1Status, "isGetFreeLessonPlan1FromServerSuccess", {
        get() {
            return _isGetFreeLessonPlan1FromServerSuccess;
        },
        set(val) {
            _isGetFreeLessonPlan1FromServerSuccess = val;
            val ? getListFreeLessonPlan1Success() : getListFreeLessonPlan1Failed();
        }
    });


    function setIsGetFreeLessonPlan1FromServerSuccess(val) {
        freeLessonPlan1Status.isGetFreeLessonPlan1FromServerSuccess = val;
    }

    function getIsGetFreeLessonPlan1FromServerSuccess() {
        return freeLessonPlan1Status.isGetFreeLessonPlan1FromServerSuccess;
    }

	Object.defineProperty(freeLessonPlan1Status, "isGetFreeLessonPlan1FromServerLengthGreaterThanZero", {
        get() {
            return _isGetFreeLessonPlan1FromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetFreeLessonPlan1FromServerLengthGreaterThanZero = val;
            val ? getListFreeLessonPlan1GreaterThanZero() : getListFreeLessonPlan1EqualToZero();
        }
    });

    function setGetFreeLessonPlan1FromServerSuccess(val) {
        freeLessonPlan1Status.isGetFreeLessonPlan1FromServerLengthGreaterThanZero = val;
    }

    function getGetFreeLessonPlan1FromServerSuccess() {
        return freeLessonPlan1Status.isGetFreeLessonPlan1FromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentFreeLessonPlan1
    Object.defineProperty(freeLessonPlan1Status, "currentSelectFreeLessonPlan1", {
        get() {
            return _currentSelectFreeLessonPlan1;
        },
        set(val) {
            _currentSelectFreeLessonPlan1 = val;
        }
    });

    function setCurrentSelectFreeLessonPlan1(val) {
        freeLessonPlan1Status.currentSelectFreeLessonPlan1 = val;
    }

    function getCurrentSelectFreeLessonPlan1() {
        return freeLessonPlan1Status.currentSelectFreeLessonPlan1;
    }
	
	  //loading data isUploadingDataFreeLessonPlan1
    Object.defineProperty(freeLessonPlan1Status, "isUploadingDataFreeLessonPlan1", {
        get() {
            return _isUploadingDataFreeLessonPlan1;
        },
        set(val) {
            _isUploadingDataFreeLessonPlan1 = val;
            val == true ? loadingDataFreeLessonPlan1Progress() : val == false ? loadingDataFreeLessonPlan1Done() : loadingDataFreeLessonPlan1Error();
        }
    });

    function setLoadingDataFreeLessonPlan1(val) {
        freeLessonPlan1Status.isUploadingDataFreeLessonPlan1 = val;
    }

    function getLoadingDataFreeLessonPlan1() {
        return freeLessonPlan1Status.isUploadingDataFreeLessonPlan1;
    }
	
	Object.defineProperty(freeLessonPlan1Status, "currentFreeLessonPlan1", {
        get() {
            return _currentFreeLessonPlan1;
        },
        set(val) {
            _currentFreeLessonPlan1 = val;

            let dataCurrentViewFreeLessonPlan1 = {
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            seFetchingFreeLessonPlan1(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getURLListFreeLessonPlan(ageID.freelesson1.type), dataCurrentViewFreeLessonPlan1),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    seFetchingFreeLessonPlan1(false);
                    if (res.code === networkCode.success) {
						//alert(res.data.agePlans.length);
                        if (res.data.agePlans == null || res.data.agePlans.length == 0) {
							console.log("no video");
                            	setGetFreeLessonPlan1FromServerSuccess(false);
							
                        } else {
                            emptyTableListFreeLessonPlan1();
                            listFreeLessonPlan1 = listFreeLessonPlan1.concat(res.data.agePlans);
                            createListFreeLessonPlan1(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    seFetchingFreeLessonPlan1(false);
                    setIsGetFreeLessonPlan1FromServerSuccess(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentFreeLessonPlan1(val) {
        freeLessonPlan1Status.currentFreeLessonPlan1 = val;
    }

    function getCurrentFreeLessonPlan1() {
        return freeLessonPlan1Status.currentFreeLessonPlan1;
    }
	
	 //stepUploadingVideo
    Object.defineProperty(freeLessonPlan1Status, "stepUploadingVideo", {
        get() {
            return _stepUploadingVideo;
        },
        set(val) {
            _stepUploadingVideo = val;
			val == 0 ? transctionToInitVideo() : transctionToFreeLessonPlan1();
        }
    });

    function setStepUploadingVideo(val) {
        freeLessonPlan1Status.stepUploadingVideo = val;
    }

    function getStepUploadingVideo() {
        return freeLessonPlan1Status.stepUploadingVideo;
    }
	
	Object.defineProperty(freeLessonPlan1Status, "currentStatusFreeLessonPlan1", {
        get() {
            return _currentStatusFreeLessonPlan1;
        },
        set(val) {
            _currentStatusFreeLessonPlan1 = val;
        }
    });

    function setCurrentStatusFreeLessonPlan1(val) {
        freeLessonPlan1Status.currentStatusFreeLessonPlan1 = val;
    }

    function getCurrentStatusFreeLessonPlan1() {
        return freeLessonPlan1Status.currentStatusFreeLessonPlan1;
    }
	
</script>