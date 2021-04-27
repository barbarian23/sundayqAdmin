<?php ?>
<script>
var groupStatus = {
	isFetchingGroup: false, //đang load danh sách group hiện tại
        isGetGroupFromServerSuccess: false,
        isGetGroupFromServerLengthGreaterThanZero: false,
        currentSelectGroup: -1, //hiện đang load
        isUploadingDataGroup: false, //load group hện tại
        currentGroup: 0, //trang load danh sách group
};
var	_isFetchingGroup = false, //đang load danh sách group hiện tại
        _isGetGroupFromServerSuccess = false,
        _isGetGroupFromServerLengthGreaterThanZero = false,
        _currentSelectGroup = -1, //hiện đang load
        _isUploadingDataGroup = false, //load group hện tại
        _currentGroup = 0; //trang load danh sách group 
	
	//<group>

    Object.defineProperty(sunqStatus, "isFetchingGroup", {
        get() {
            return _isFetchingGroup;
        },
        set(val) {
            _isFetchingGroup = val;
            val ? showProgressListGroup() : hideProgressListGroup();
        }
    });

    function setFetchingGroup(val) {
        sunqStatus.isFetchingGroup = val;
    }

    function getFetchingGroup() {
        return sunqStatus.isFetchingGroup;
    }

    Object.defineProperty(sunqStatus, "isGetGroupFromServerSuccess", {
        get() {
            return _isGetGroupFromServerSuccess;
        },
        set(val) {
            _isGetGroupFromServerSuccess = val;
            val ? getListGroupSuccess() : getListGroupFailed();
        }
    });

    function setGetGroupFromServerSuccess(val) {
        sunqStatus.isGetGroupFromServerSuccess = val;
    }

    function getGetGroupFromServerSuccess() {
        return sunqStatus.isGetGroupFromServerSuccess;
    }

    Object.defineProperty(sunqStatus, "isGetGroupFromServerLengthGreaterThanZero ", {
        get() {
            return _isGetGroupFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetGroupFromServerLengthGreaterThanZero = val;
            val ? getListGroupGreaterThanZero() : getListGroupEqualToZero();
        }
    });

    function setGetGroupFromServerLengthGreaterThanZero(val) {
        sunqStatus.isGetGroupFromServerLengthGreaterThanZero = val;
    }

    function getGetGroupFromServerLengthGreaterThanZero() {
        return sunqStatus.isGetGroupFromServerLengthGreaterThanZero;
    }

    Object.defineProperty(sunqStatus, "currentSelectGroup", {
        get() {
            return _currentSelectGroup;
        },
        set(val) {
            _currentSelectGroup = val;
        }
    });

    function setCurrentSelectGroup(val, item) {
        sunqStatus.currentSelectGroup = val;
        selectGroupIndex(item);
    }

    function getCurrentSelectGroup() {
        return sunqStatus.currentSelectGroup;
    }

    Object.defineProperty(sunqStatus, "isUploadingDataGroup", {
        get() {
            return _isUploadingDataGroup;
        },
        set(val) {
            _isUploadingDataGroup = val;
            val == true ? loadingDataGroupProgress() : val == false ? loadingDataGroupDone() : loadingDataGroupError();

        }
    });

    function setLoadingDataGroup(val) {
        sunqStatus.isUploadingDataGroup = val;
    }

    function getLoadingDataGroup() {
        return sunqStatus.isUploadingDataGroup;
    }

    Object.defineProperty(sunqStatus, "currentGroup", {
        get() {
            return _currentGroup;
        },
        set(val) {
            _currentGroup = val;

            let dataCurrentViewGroup = {
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            setFetchingGroup(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getListRollGroup(), dataCurrentViewGroup),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    setFetchingGroup(false);
                    if (res.code === networkCode.success) {
                        if (res.data == null || res.data.length == 0) {
                            setGetGroupFromServerLengthGreaterThanZero(false);
                        } else {
                            emptyTableListGroup();
                            listRollGroup = listRollGroup.concat(res.data);
                            createListGroup(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setFetchingGroup(false);
                    setGetGroupFromServerSuccess(false);
                    //alert(err);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentGroup(val) {
        sunqStatus.currentGroup = val;
    }

    function getCurrentGroup() {
        return sunqStatus.currentGroup;
    }

</script>