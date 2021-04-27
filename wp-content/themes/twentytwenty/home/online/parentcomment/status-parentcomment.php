<?php ?>
<script>
	var parentCommentStatus = {
		 isFetchingparentComment: false, //đang load danh sách parentComment hiện tại
        isGetparentCommentFromServerSuccess: false,
        isGetparentCommentFromServerLengthGreaterThanZero: false,
        currentSelectparentComment: -1,
        isFetchingparentCommentLecture: false,
        isUploadingDataparentComment: false, //load parentComment hiện tại
        currentparentComment: 0, //trang load danh sách parentComment
	};
	
	var _isFetchingparentComment = false,
		_isChoosingSelectparentCommentMain = false,
        _isGetparentCommentFromServerSuccess = false,
        _isGetparentCommentFromServerLengthGreaterThanZero = false,
        _currentSelectparentComment = -1,
        _isFetchingparentCommentLecture = false, 
		_isUploadingDataparentComment = false,
		_currentparentComment = 0;

	//<parentComment>
    //fetching parentComment
    Object.defineProperty(parentCommentStatus, "isFetchingparentComment", {
        get() {
            return _isFetchingparentComment;
        },
        set(val) {
            _isFetchingparentComment = val;
            val ? showProgressListparentComment() : hideProgressListparentComment();
        }
    });

    function setFetchingparentComment(val) {
        parentCommentStatus.isFetchingparentComment = val;
    }

    function getFetchingparentComment() {
        return parentCommentStatus.isFetchingparentComment;
    }

    //get parentComment from server
    Object.defineProperty(parentCommentStatus, "isGetparentCommentFromServerSuccess", {
        get() {
            return _isGetparentCommentFromServerSuccess;
        },
        set(val) {
            _isGetparentCommentFromServerSuccess = val;
            val ? getListparentCommentSuccess() : getListparentCommentFailed();
        }
    });

    function setIsGetparentCommentFromServerSuccess(val) {
        parentCommentStatus.isGetparentCommentFromServerSuccess = val;
    }

    function getIsGetparentCommentFromServerSuccess() {
        return parentCommentStatus.isGetparentCommentFromServerSuccess;
    }

    //get parentComment from server success
    Object.defineProperty(parentCommentStatus, "isGetparentCommentFromServerLengthGreaterThanZero", {
        get() {
            return _isGetparentCommentFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetparentCommentFromServerLengthGreaterThanZero = val;
            val ? getListparentCommentGreaterThanZero() : getListparentCommentEqualToZero();
        }
    });

    function setGetparentCommentFromServerLengthGreaterThanZero(val) {
        parentCommentStatus.isGetparentCommentFromServerLengthGreaterThanZero = val;
    }

    function getGetparentCommentFromServerLengthGreaterThanZero() {
        return parentCommentStatus.isGetparentCommentFromServerLengthGreaterThanZero;
    }

    //selectparentComment
    Object.defineProperty(parentCommentStatus, "currentSelectparentComment", {
        get() {
            return _currentSelectparentComment;
        },
        set(val) {
            _currentSelectparentComment = val;
        }
    });

    function setCurrentSelectparentComment(val, item) {
        parentCommentStatus.currentSelectparentComment = val;
        selectparentCommentIndex(item);
    }

    function getCurrentSelectparentComment() {
        return parentCommentStatus.currentSelectparentComment;
    }

    //get parentComment from lecture
    Object.defineProperty(parentCommentStatus, "isFetchingparentCommentLecture", {
        get() {
            return _isFetchingparentCommentLecture;
        },
        set(val) {
            _isFetchingparentCommentLecture = val;
            val ? showProgressListparentCommentLecture() : hideProgressListparentCommentLecture();
        }
    });

    function setFetchingparentCommentLecture(val) {
        parentCommentStatus.isFetchingparentCommentLecture = val;
    }

    function getFetchingparentCommentLecture() {
        return parentCommentStatus.isFetchingparentCommentLecture;
    }

    //loading data isUploadingDataparentComment
    Object.defineProperty(parentCommentStatus, "isUploadingDataparentComment", {
        get() {
            return _isUploadingDataparentComment;
        },
        set(val) {
            _isUploadingDataparentComment = val;
            val == true ? loadingDataparentCommentProgress() : val == false ? loadingDataparentCommentDone() : loadingDataparentCommentError();

        }
    });

    function setLoadingDataparentComment(val) {
        parentCommentStatus.isUploadingDataparentComment = val;
    }

    function getLoadingDataparentComment() {
        return parentCommentStatus.isUploadingDataparentComment;
    }

    Object.defineProperty(parentCommentStatus, "currentparentComment", {
        get() {
            return _currentparentComment;
        },
        set(val) {
            _currentparentComment = val;

            let dataCurrentViewparentComment = {
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentparentComment",val);
            setFetchingparentComment(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getListComment(), dataCurrentViewparentComment),
                //getURLAllparentComment(),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    setFetchingparentComment(false);
                    if (res.code === networkCode.success) {
                        if (res.data == null || res.data.length == 0) {
                            setGetparentCommentFromServerLengthGreaterThanZero(false);
                        } else {
                            emptyTableListparentComment();
                            listparentComment = listparentComment.concat(res.data);
                            createListparentComment(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setFetchingparentComment(false);
                    setIsGetparentCommentFromServerSuccess(false);
                    //alert(err);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentparentComment(val) {
        parentCommentStatus.currentparentComment = val;
    }

    function getCurrentparentComment() {
        return parentCommentStatus.currentparentComment;
    }

</script>