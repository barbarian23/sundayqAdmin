<?php ?>
<script>
var steamqclassStatus = {
		isFetchingsteamqclass: false, //đang load danh sách liên lạc
        isGetsteamqclassFromServerSuccess: false,
        isGetsteamqclassFromServerLengthGreaterThanZero: false,
        currentSelectsteamqclass: false,
        isUploadingDatasteamqclass: false,
        currentsteamqclass: 0, //trang load danh sách người đăng ký 
		stepUploadingVideo: 0,// 0 upload tên hoặc sửa tên, 1 upload video hoặc sửa tên video
	    currentStatussteamqclass:0, //0 là đang ở trạng thái mới tạo video - 1 là trạng thái đã tạo xong video nhưng chưa upload - 2 là trạng thái đã hoàn thiện video
}

var  _isFetchingsteamqclass = false,
     _isGetsteamqclassFromServerSuccess = false,
     _isGetsteamqclassFromServerLengthGreaterThanZero = false,
     _currentSelectsteamqclass = false,
     _isUploadingDatasteamqclass = false,
     _currentsteamqclass = 0,
	_stepUploadingVideo = 0,
	_currentStatussteamqclass = 0;;
	
	//fetching Upload video
    Object.defineProperty(steamqclassStatus, "isFetchingsteamqclass", {
        get() {
            return _isFetchingsteamqclass;
        },
        set(val) {
            _isFetchingsteamqclass = val;
            val ? showProgressListsteamqclass() : hideProgressListsteamqclass();
        }
    });

    function seFetchingsteamqclass(val) {
        steamqclassStatus.isFetchingsteamqclass = val;
    }

    function getFetchingsteamqclass() {
        return steamqclassStatus.isFetchingsteamqclass;
    }
	
	 //get steamqclass from server
    Object.defineProperty(steamqclassStatus, "isGetsteamqclassFromServerSuccess", {
        get() {
            return _isGetsteamqclassFromServerSuccess;
        },
        set(val) {
            _isGetsteamqclassFromServerSuccess = val;
            val ? getListsteamqclassSuccess() : getListsteamqclassFailed();
        }
    });


    function setIsGetsteamqclassFromServerSuccess(val) {
        steamqclassStatus.isGetsteamqclassFromServerSuccess = val;
    }

    function getIsGetsteamqclassFromServerSuccess() {
        return steamqclassStatus.isGetsteamqclassFromServerSuccess;
    }

	Object.defineProperty(steamqclassStatus, "isGetsteamqclassFromServerLengthGreaterThanZero", {
        get() {
            return _isGetsteamqclassFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetsteamqclassFromServerLengthGreaterThanZero = val;
            val ? getListsteamqclassGreaterThanZero() : getListsteamqclassEqualToZero();
        }
    });

    function setGetsteamqclassFromServerSuccess(val) {
        steamqclassStatus.isGetsteamqclassFromServerLengthGreaterThanZero = val;
    }

    function getGetsteamqclassFromServerSuccess() {
        return steamqclassStatus.isGetsteamqclassFromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentsteamqclass
    Object.defineProperty(steamqclassStatus, "currentSelectsteamqclass", {
        get() {
            return _currentSelectsteamqclass;
        },
        set(val) {
            _currentSelectsteamqclass = val;
        }
    });

    function setCurrentSelectsteamqclass(val) {
        steamqclassStatus.currentSelectsteamqclass = val;
    }

    function getCurrentSelectsteamqclass() {
        return steamqclassStatus.currentSelectsteamqclass;
    }
	
	  //loading data isUploadingDatasteamqclass
    Object.defineProperty(steamqclassStatus, "isUploadingDatasteamqclass", {
        get() {
            return _isUploadingDatasteamqclass;
        },
        set(val) {
            _isUploadingDatasteamqclass = val;
            val == true ? loadingDatasteamqclassProgress() : val == false ? loadingDatasteamqclassDone() : loadingDatasteamqclassError();
        }
    });

    function setLoadingDatasteamqclass(val) {
        steamqclassStatus.isUploadingDatasteamqclass = val;
    }

    function getLoadingDatasteamqclass() {
        return steamqclassStatus.isUploadingDatasteamqclass;
    }
	
	Object.defineProperty(steamqclassStatus, "currentsteamqclass", {
        get() {
            return _currentsteamqclass;
        },
        set(val) {
            _currentsteamqclass = val;

            let dataCurrentViewsteamqclass = {
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            seFetchingsteamqclass(true);
            
        }
    });

    function setCurrentsteamqclass(val) {
        steamqclassStatus.currentsteamqclass = val;
    }

    function getCurrentsteamqclass() {
        return steamqclassStatus.currentsteamqclass;
    }
	
	 //stepUploadingVideo
    Object.defineProperty(steamqclassStatus, "stepUploadingVideo", {
        get() {
            return _stepUploadingVideo;
        },
        set(val) {
            _stepUploadingVideo = val;
			val == 0 ? transctionToInitVideo() : transctionTosteamqclass();
        }
    });

    function setStepUploadingVideo(val) {
        steamqclassStatus.stepUploadingVideo = val;
    }

    function getStepUploadingVideo() {
        return steamqclassStatus.stepUploadingVideo;
    }
	
	Object.defineProperty(steamqclassStatus, "currentStatussteamqclass", {
        get() {
            return _currentStatussteamqclass;
        },
        set(val) {
            _currentStatussteamqclass = val;
        }
    });

    function setCurrentStatussteamqclass(val) {
        steamqclassStatus.currentStatussteamqclass = val;
    }

    function getCurrentStatussteamqclass() {
        return steamqclassStatus.currentStatussteamqclass;
    }
	
</script>