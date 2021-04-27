<?php ?>
<script>
var uploadWordStatus = {
		isFetchingUploadWord: false, //đang load danh sách liên lạc
        isGetUploadWordFromServerSuccess: false,
        isGetUploadWordFromServerLengthGreaterThanZero: false,
        currentSelectUploadWord: false,
        isUploadingDataUploadWord: false,
        currentUploadWord: 0, //trang load danh sách người đăng ký 
		stepUploadingVideo: 0,// 0 upload tên hoặc sửa tên, 1 upload video hoặc sửa tên video
	    currentStatusUploadWord:0, //0 là đang ở trạng thái mới tạo video - 1 là trạng thái đã tạo xong video nhưng chưa upload - 2 là trạng thái đã hoàn thiện video
}

var  _isFetchingUploadWord = false,
     _isGetUploadWordFromServerSuccess = false,
     _isGetUploadWordFromServerLengthGreaterThanZero = false,
     _currentSelectUploadWord = false,
     _isUploadingDataUploadWord = false,
     _currentUploadWord = 0,
	_stepUploadingVideo = 0,
	_currentStatusUploadWord = 0;;
	
	//fetching Upload video
    Object.defineProperty(uploadWordStatus, "isFetchingUploadWord", {
        get() {
            return _isFetchingUploadWord;
        },
        set(val) {
            _isFetchingUploadWord = val;
            val ? showProgressListUploadWord() : hideProgressListUploadWord();
        }
    });

    function seFetchingUploadWord(val) {
        uploadWordStatus.isFetchingUploadWord = val;
    }

    function getFetchingUploadWord() {
        return uploadWordStatus.isFetchingUploadWord;
    }
	
	 //get UploadWord from server
    Object.defineProperty(uploadWordStatus, "isGetUploadWordFromServerSuccess", {
        get() {
            return _isGetUploadWordFromServerSuccess;
        },
        set(val) {
            _isGetUploadWordFromServerSuccess = val;
            val ? getListUploadWordSuccess() : getListUploadWordFailed();
        }
    });


    function setIsGetUploadWordFromServerSuccess(val) {
        uploadWordStatus.isGetUploadWordFromServerSuccess = val;
    }

    function getIsGetUploadWordFromServerSuccess() {
        return uploadWordStatus.isGetUploadWordFromServerSuccess;
    }

	Object.defineProperty(uploadWordStatus, "isGetUploadWordFromServerLengthGreaterThanZero", {
        get() {
            return _isGetUploadWordFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetUploadWordFromServerLengthGreaterThanZero = val;
            val ? getListUploadWordGreaterThanZero() : getListUploadWordEqualToZero();
        }
    });

    function setGetUploadWordFromServerSuccess(val) {
        uploadWordStatus.isGetUploadWordFromServerLengthGreaterThanZero = val;
    }

    function getGetUploadWordFromServerSuccess() {
        return uploadWordStatus.isGetUploadWordFromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentUploadWord
    Object.defineProperty(uploadWordStatus, "currentSelectUploadWord", {
        get() {
            return _currentSelectUploadWord;
        },
        set(val) {
            _currentSelectUploadWord = val;
        }
    });

    function setCurrentSelectUploadWord(val) {
        uploadWordStatus.currentSelectUploadWord = val;
    }

    function getCurrentSelectUploadWord() {
        return uploadWordStatus.currentSelectUploadWord;
    }
	
	  //loading data isUploadingDataUploadWord
    Object.defineProperty(uploadWordStatus, "isUploadingDataUploadWord", {
        get() {
            return _isUploadingDataUploadWord;
        },
        set(val) {
            _isUploadingDataUploadWord = val;
            val == true ? loadingDataUploadWordProgress() : val == false ? loadingDataUploadWordDone() : loadingDataUploadWordError();
        }
    });

    function setLoadingDataUploadWord(val) {
        uploadWordStatus.isUploadingDataUploadWord = val;
    }

    function getLoadingDataUploadWord() {
        return uploadWordStatus.isUploadingDataUploadWord;
    }
	
	Object.defineProperty(uploadWordStatus, "currentUploadWord", {
        get() {
            return _currentUploadWord;
        },
        set(val) {
            _currentUploadWord = val;

            let dataCurrentViewUploadWord = {
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            seFetchingUploadWord(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getListUploadWord(), dataCurrentViewUploadWord),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    seFetchingUploadWord(false);
                    if (res.code === networkCode.success) {
                        if (res.data == null || res.data.length == 0) {
							
                            	setGetUploadWordFromServerSuccess(false);
							
                        } else {
                            emptyTableListUploadWord();
                            listUploadWord = listUploadWord.concat(res.data);
                            createListUploadWord(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    seFetchingUploadWord(false);
                    setIsGetUploadWordFromServerSuccess(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentUploadWord(val) {
        uploadWordStatus.currentUploadWord = val;
    }

    function getCurrentUploadWord() {
        return uploadWordStatus.currentUploadWord;
    }
	
	 //stepUploadingVideo
    Object.defineProperty(uploadWordStatus, "stepUploadingVideo", {
        get() {
            return _stepUploadingVideo;
        },
        set(val) {
            _stepUploadingVideo = val;
			val == 0 ? transctionToInitVideo() : transctionToUploadWord();
        }
    });

    function setStepUploadingVideo(val) {
        uploadWordStatus.stepUploadingVideo = val;
    }

    function getStepUploadingVideo() {
        return uploadWordStatus.stepUploadingVideo;
    }
	
	Object.defineProperty(uploadWordStatus, "currentStatusUploadWord", {
        get() {
            return _currentStatusUploadWord;
        },
        set(val) {
            _currentStatusUploadWord = val;
        }
    });

    function setCurrentStatusUploadWord(val) {
        uploadWordStatus.currentStatusUploadWord = val;
    }

    function getCurrentStatusUploadWord() {
        return uploadWordStatus.currentStatusUploadWord;
    }
	
</script>