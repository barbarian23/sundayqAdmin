<?php ?>
<script>
var centerinfoStatus = {
		isFetchingcenterinfo: false, //đang load danh sách liên lạc
        isGetcenterinfoFromServerSuccess: false,
        isGetcenterinfoFromServerLengthGreaterThanZero: false,
        currentSelectcenterinfo: false,
        isUploadingDatacenterinfo: false,
        currentcenterinfo: 0, //trang load danh sách người đăng ký 
}

var  _isFetchingcenterinfo = false,
     _isGetcenterinfoFromServerSuccess = false,
     _isGetcenterinfoFromServerLengthGreaterThanZero = false,
     _currentSelectcenterinfo = false,
     _isUploadingDatacenterinfo = false,
     _currentcenterinfo = 0;
	
	//fetching centerinfo
    Object.defineProperty(centerinfoStatus, "isFetchingcenterinfo", {
        get() {
            return _isFetchingcenterinfo;
        },
        set(val) {
            _isFetchingcenterinfo = val;
            val ? showProgressListcenterinfo() : hideProgressListcenterinfo();
        }
    });

    function seFetchingcenterinfo(val) {
        centerinfoStatus.isFetchingcenterinfo = val;
    }

    function getFetchingcenterinfo() {
        return centerinfoStatus.isFetchingcenterinfo;
    }
	
	 //get centerinfo from server
    Object.defineProperty(centerinfoStatus, "isGetcenterinfoFromServerSuccess", {
        get() {
            return _isGetcenterinfoFromServerSuccess;
        },
        set(val) {
            _isGetcenterinfoFromServerSuccess = val;
            val ? getListcenterinfoSuccess() : getListcenterinfoFailed();
        }
    });


    function setIsGetcenterinfoFromServerSuccess(val) {
        centerinfoStatus.isGetcenterinfoFromServerSuccess = val;
    }

    function getIsGetcenterinfoFromServerSuccess() {
        return centerinfoStatus.isGetcenterinfoFromServerSuccess;
    }

	Object.defineProperty(centerinfoStatus, "isGetcenterinfoFromServerLengthGreaterThanZero", {
        get() {
            return _isGetcenterinfoFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetcenterinfoFromServerLengthGreaterThanZero = val;
            val ? getListcenterinfoGreaterThanZero() : getListcenterinfoEqualToZero();
        }
    });

    function setGetcenterinfoFromServerLengthGreaterThanZero(val) {
        centerinfoStatus.isGetcenterinfoFromServerLengthGreaterThanZero = val;
    }

    function getGetcenterinfoFromServerLengthGreaterThanZero() {
        return centerinfoStatus.isGetcenterinfoFromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentcenterinfo
    Object.defineProperty(centerinfoStatus, "currentSelectcenterinfo", {
        get() {
            return _currentSelectcenterinfo;
        },
        set(val) {
            _currentSelectcenterinfo = val;
        }
    });

    function setCurrentSelectcenterinfo(val) {
        centerinfoStatus.currentSelectcenterinfo = val;
    }

    function getCurrentSelectcenterinfo() {
        return centerinfoStatus.currentSelectcenterinfo;
    }
	
	  //loading data isUploadingDatacenterinfo
    Object.defineProperty(centerinfoStatus, "isUploadingDatacenterinfo", {
        get() {
            return _isUploadingDatacenterinfo;
        },
        set(val) {
            _isUploadingDatacenterinfo = val;
            val == true ? loadingDatacenterinfoProgress() : val == false ? loadingDatacenterinfoDone() : loadingDatacenterinfoError();
        }
    });

    function setLoadingDatacenterinfo(val) {
        centerinfoStatus.isUploadingDatacenterinfo = val;
    }

    function getLoadingDatacenterinfo() {
        return centerinfoStatus.isUploadingDatacenterinfo;
    }
	
	Object.defineProperty(centerinfoStatus, "currentcenterinfo", {
        get() {
            return _currentcenterinfo;
        },
        set(val) {
            _currentcenterinfo = val;

            let dataCurrentViewcenterinfo = {
				category: getcenterinfopart(),
				month:0,
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            seFetchingcenterinfo(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getURLListLesson(getCurrentEdit()), dataCurrentViewcenterinfo),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    seFetchingcenterinfo(false);
                    if (res.code === networkCode.success) {//alert(JSON.stringify(res.data));
                        if (res.data == null || res.data.length == 0) {
                            setGetcenterinfoFromServerLengthGreaterThanZero(false);
                        } else {
                            emptyTableListcenterinfo();
                            listcenterinfo = listcenterinfo.concat(res.data);
                            createListcenterinfo(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    seFetchingcenterinfo(false);
                    setIsGetcenterinfoFromServerSuccess(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentcenterinfo(val) {
        centerinfoStatus.currentcenterinfo = val;
    }

    function getCurrentcenterinfo() {
        return centerinfoStatus.currentcenterinfo;
    }
</script>