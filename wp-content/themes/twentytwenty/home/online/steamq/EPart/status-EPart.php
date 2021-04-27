<?php ?>
<script>
var QuestionStatus = {
		isFetchingQuestion: false, //đang load danh sách liên lạc
        isGetQuestionFromServerSuccess: false,
        isGetQuestionFromServerLengthGreaterThanZero: false,
        currentSelectQuestion: false,
        isUploadingDataQuestion: false,
	    //load image
	    isChoosingVideoQuestion:false,
		isFetchingVideoQuestion:false,
		isVideoQuestionGreaterThanZero:false,
		isVideoQuestionFromServerSuccess:false,
	
        currentQuestion: 0, //trang load danh sách người đăng ký 
		stepUploadingVideo: 0,// 0 upload tên hoặc sửa tên, 1 upload video hoặc sửa tên video
	    currentStatusQuestion:0, //0 là đang ở trạng thái mới tạo video - 1 là trạng thái đã tạo xong video nhưng chưa upload - 2 là trạng thái đã hoàn thiện video
}

var  _isFetchingQuestion = false,
     _isGetQuestionFromServerSuccess = false,
     _isGetQuestionFromServerLengthGreaterThanZero = false,
     _currentSelectQuestion = false,
     _isUploadingDataQuestion = false,
     _currentQuestion = 0,
	_stepUploadingVideo = 0,
	_currentStatusQuestion = 0;;
	
	//fetching Upload video
    Object.defineProperty(QuestionStatus, "isFetchingQuestion", {
        get() {
            return _isFetchingQuestion;
        },
        set(val) {
            _isFetchingQuestion = val;
            val ? showProgressListQuestion() : hideProgressListQuestion();
        }
    });

    function seFetchingQuestion(val) {
        QuestionStatus.isFetchingQuestion = val;
    }

    function getFetchingQuestion() {
        return QuestionStatus.isFetchingQuestion;
    }
	
	 //get Question from server
    Object.defineProperty(QuestionStatus, "isGetQuestionFromServerSuccess", {
        get() {
            return _isGetQuestionFromServerSuccess;
        },
        set(val) {
            _isGetQuestionFromServerSuccess = val;
            val ? getListQuestionSuccess() : getListQuestionFailed();
        }
    });


    function setIsGetQuestionFromServerSuccess(val) {
        QuestionStatus.isGetQuestionFromServerSuccess = val;
    }

    function getIsGetQuestionFromServerSuccess() {
        return QuestionStatus.isGetQuestionFromServerSuccess;
    }

	Object.defineProperty(QuestionStatus, "isGetQuestionFromServerLengthGreaterThanZero", {
        get() {
            return _isGetQuestionFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetQuestionFromServerLengthGreaterThanZero = val;
            val ? getListQuestionGreaterThanZero() : getListQuestionEqualToZero();
        }
    });

    function setGetQuestionFromServerSuccess(val) {
        QuestionStatus.isGetQuestionFromServerLengthGreaterThanZero = val;
    }

    function getGetQuestionFromServerSuccess() {
        return QuestionStatus.isGetQuestionFromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentQuestion
    Object.defineProperty(QuestionStatus, "currentSelectQuestion", {
        get() {
            return _currentSelectQuestion;
        },
        set(val) {
            _currentSelectQuestion = val;
        }
    });

    function setCurrentSelectQuestion(val) {
        QuestionStatus.currentSelectQuestion = val;
    }

    function getCurrentSelectQuestion() {
        return QuestionStatus.currentSelectQuestion;
    }
	
	  //loading data isUploadingDataQuestion
    Object.defineProperty(QuestionStatus, "isUploadingDataQuestion", {
        get() {
            return _isUploadingDataQuestion;
        },
        set(val) {
            _isUploadingDataQuestion = val;
            val == true ? loadingDataQuestionProgress() : val == false ? loadingDataQuestionDone() : loadingDataQuestionError();
        }
    });

    function setLoadingDataQuestion(val) {
        QuestionStatus.isUploadingDataQuestion = val;
    }

    function getLoadingDataQuestion() {
        return QuestionStatus.isUploadingDataQuestion;
    }
	
	//image
	Object.defineProperty(QuestionStatus, "isFetchingVideoQuestion", {
        get() {
            return _isFetchingVideoQuestion;
        },
        set(val) {
            _isFetchingVideoQuestion = val;
            val ? showProgressVideoQuestion() : hideProgressVideoQuestion();
        }
    });

    function setFetchingVideoQuestion(val) {
        QuestionStatus.isFetchingVideoQuestion = val;
    }

    function getFetchingVideoQuestion() {
        return QuestionStatus.isFetchingVideoQuestion;
    }

    Object.defineProperty(QuestionStatus, "isVideoQuestionFromServerSuccess", {
        get() {
            return _isVideoQuestionFromServerSuccess;
        },
        set(val) {
            _isVideoQuestionFromServerSuccess = val;
            val ? getVideoQuestionSuccess() : getVideoQuestionFailed();
        }
    });

    function setVideoQuestionFromServerSuccess(val) {
        QuestionStatus.isVideoQuestionFromServerSuccess = val;
    }

    function getVideoQuestionFromServerSuccess() {
        return QuestionStatus.isVideoQuestionFromServerSuccess;
    }

    Object.defineProperty(QuestionStatus, "isQuestionGreaterThanZero", {
        get() {
            return _isQuestionGreaterThanZero;
        },
        set(val) {
            _isQuestionGreaterThanZero = val;
            val ? getListQuestionGreaterThanZero() : getListQuestionEqualToZero();
        }
    });

    function setQuestionGreaterThanZero(val) {
        QuestionStatus.isQuestionGreaterThanZero = val;
    }

    function getQuestionGreaterThanZero() {
        return QuestionStatus.isQuestionGreaterThanZero;
    }

    Object.defineProperty(QuestionStatus, "isChoosingVideoQuestion", {
        get() {
            return _isChoosingVideoQuestion;
        },
        set(val) {
            _isChoosingVideoQuestion = val;
            val ? document.getElementById("listQuestion").style.display = "flex" : document.getElementById("listQuestion").style.display = "none";
        }
    });

    function setChoosingVideoQuestion(val) {
        QuestionStatus.isChoosingVideoQuestion = val;
    }

    function getChoosingVideoQuestion() {
        return QuestionStatus.isChoosingVideoQuestion;
    }

    //image

	Object.defineProperty(QuestionStatus, "currentQuestion", {
        get() {
            return _currentQuestion;
        },
        set(val) {
            _currentQuestion = val;
            let dataCurrentViewQuestion = {
				classId:getSteamqclassid(),
				category:getSteamqpart(),
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            seFetchingQuestion(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getListURLQuestion(), dataCurrentViewQuestion),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    seFetchingQuestion(false);
                    if (res.code === networkCode.success) {
                        if (res.data == null || res.data.length == 0) {
							console.log("no question");
                            	setQuestionGreaterThanZero(false);
							
                        } else {
                            emptyTableListQuestion();
                            listQuestion = listQuestion.concat(res.data);
                            createListQuestion(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    seFetchingQuestion(false);
                    setIsGetQuestionFromServerSuccess(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentQuestion(val) {
        QuestionStatus.currentQuestion = val;
    }

    function getCurrentQuestion() {
        return QuestionStatus.currentQuestion;
    }
	
	 //stepUploadingVideo
    Object.defineProperty(QuestionStatus, "stepUploadingVideo", {
        get() {
            return _stepUploadingVideo;
        },
        set(val) {
            _stepUploadingVideo = val;
			val == 0 ? transctionToInitVideo() : transctionToQuestion();
        }
    });

    function setStepUploadingVideo(val) {
        QuestionStatus.stepUploadingVideo = val;
    }

    function getStepUploadingVideo() {
        return QuestionStatus.stepUploadingVideo;
    }
	
	Object.defineProperty(QuestionStatus, "currentStatusQuestion", {
        get() {
            return _currentStatusQuestion;
        },
        set(val) {
            _currentStatusQuestion = val;
        }
    });

    function setCurrentStatusQuestion(val) {
        QuestionStatus.currentStatusQuestion = val;
    }

    function getCurrentStatusQuestion() {
        return QuestionStatus.currentStatusQuestion;
    }
	
</script>