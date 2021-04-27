<?php ?>
<script>
var uploadVideoStatus = {
		isFetchingUploadVideo: false, //đang load danh sách liên lạc
        isGetUploadVideoFromServerSuccess: false,
        isGetUploadVideoFromServerLengthGreaterThanZero: false,
        currentSelectUploadVideo: false,
        isUploadingDataUploadVideo: false,
        currentUploadVideo: 0, //trang load danh sách người đăng ký 
		stepUploadingVideo: 0,// 0 upload tên hoặc sửa tên, 1 upload video hoặc sửa tên video
	    currentStatusUploadVideo:0, //0 là đang ở trạng thái mới tạo video - 1 là trạng thái đã tạo xong video nhưng chưa upload - 2 là trạng thái đã hoàn thiện video
}

var  _isFetchingUploadVideo = false,
     _isGetUploadVideoFromServerSuccess = false,
     _isGetUploadVideoFromServerLengthGreaterThanZero = false,
     _currentSelectUploadVideo = false,
     _isUploadingDataUploadVideo = false,
     _currentUploadVideo = 0,
	_stepUploadingVideo = 0,
	_currentStatusUploadVideo = 0;;
	
	//fetching Upload video
    Object.defineProperty(uploadVideoStatus, "isFetchingUploadVideo", {
        get() {
            return _isFetchingUploadVideo;
        },
        set(val) {
            _isFetchingUploadVideo = val;
            val ? showProgressListUploadVideo() : hideProgressListUploadVideo();
        }
    });

    function seFetchingUploadVideo(val) {
        uploadVideoStatus.isFetchingUploadVideo = val;
    }

    function getFetchingUploadVideo() {
        return uploadVideoStatus.isFetchingUploadVideo;
    }
	
	 //get UploadVideo from server
    Object.defineProperty(uploadVideoStatus, "isGetUploadVideoFromServerSuccess", {
        get() {
            return _isGetUploadVideoFromServerSuccess;
        },
        set(val) {
            _isGetUploadVideoFromServerSuccess = val;
            val ? getListUploadVideoSuccess() : getListUploadVideoFailed();
        }
    });


    function setIsGetUploadVideoFromServerSuccess(val) {
        uploadVideoStatus.isGetUploadVideoFromServerSuccess = val;
    }

    function getIsGetUploadVideoFromServerSuccess() {
        return uploadVideoStatus.isGetUploadVideoFromServerSuccess;
    }

	Object.defineProperty(uploadVideoStatus, "isGetUploadVideoFromServerLengthGreaterThanZero", {
        get() {
            return _isGetUploadVideoFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetUploadVideoFromServerLengthGreaterThanZero = val;
            val ? getListUploadVideoGreaterThanZero() : getListUploadVideoEqualToZero();
        }
    });

    function setGetUploadVideoFromServerSuccess(val) {
        uploadVideoStatus.isGetUploadVideoFromServerLengthGreaterThanZero = val;
    }

    function getGetUploadVideoFromServerSuccess() {
        return uploadVideoStatus.isGetUploadVideoFromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentUploadVideo
    Object.defineProperty(uploadVideoStatus, "currentSelectUploadVideo", {
        get() {
            return _currentSelectUploadVideo;
        },
        set(val) {
            _currentSelectUploadVideo = val;
        }
    });

    function setCurrentSelectUploadVideo(val) {
        uploadVideoStatus.currentSelectUploadVideo = val;
    }

    function getCurrentSelectUploadVideo() {
        return uploadVideoStatus.currentSelectUploadVideo;
    }
	
	  //loading data isUploadingDataUploadVideo
    Object.defineProperty(uploadVideoStatus, "isUploadingDataUploadVideo", {
        get() {
            return _isUploadingDataUploadVideo;
        },
        set(val) {
            _isUploadingDataUploadVideo = val;
            val == true ? loadingDataUploadVideoProgress() : val == false ? loadingDataUploadVideoDone() : loadingDataUploadVideoError();
        }
    });

    function setLoadingDataUploadVideo(val) {
        uploadVideoStatus.isUploadingDataUploadVideo = val;
    }

    function getLoadingDataUploadVideo() {
        return uploadVideoStatus.isUploadingDataUploadVideo;
    }
	
	Object.defineProperty(uploadVideoStatus, "currentUploadVideo", {
        get() {
            return _currentUploadVideo;
        },
        set(val) {
            _currentUploadVideo = val;

            let dataCurrentViewUploadVideo = {
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            seFetchingUploadVideo(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getListVideo(), dataCurrentViewUploadVideo),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log("res",res);
                    seFetchingUploadVideo(false);
                    if (res.code === networkCode.success) {
                        if (res.data == null || res.data.length == 0) {
							console.log("no video");
                            	setGetUploadVideoFromServerSuccess(false);
							
                        } else {
                            emptyTableListUploadVideo();
                            listUploadVideo = listUploadVideo.concat(res.data);
                            createListUploadVideo(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    seFetchingUploadVideo(false);
                    setIsGetUploadVideoFromServerSuccess(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentUploadVideo(val) {
        uploadVideoStatus.currentUploadVideo = val;
    }

    function getCurrentUploadVideo() {
        return uploadVideoStatus.currentUploadVideo;
    }
	
	 //stepUploadingVideo
    Object.defineProperty(uploadVideoStatus, "stepUploadingVideo", {
        get() {
            return _stepUploadingVideo;
        },
        set(val) {
            _stepUploadingVideo = val;
			val == 0 ? transctionToInitVideo() : transctionToUploadVideo();
        }
    });

    function setStepUploadingVideo(val) {
        uploadVideoStatus.stepUploadingVideo = val;
    }

    function getStepUploadingVideo() {
        return uploadVideoStatus.stepUploadingVideo;
    }
	
	Object.defineProperty(uploadVideoStatus, "currentStatusUploadVideo", {
        get() {
            return _currentStatusUploadVideo;
        },
        set(val) {
            _currentStatusUploadVideo = val;
        }
    });

    function setCurrentStatusUploadVideo(val) {
        uploadVideoStatus.currentStatusUploadVideo = val;
    }

    function getCurrentStatusUploadVideo() {
        return uploadVideoStatus.currentStatusUploadVideo;
    }
	
</script>