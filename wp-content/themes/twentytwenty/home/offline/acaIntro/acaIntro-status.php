<?php ?>
<script>
var acaIntroStatus = {
		isFetchingacaIntro: false, //đang load danh sách liên lạc
        isGetacaIntroFromServerSuccess: false,
        isGetacaIntroFromServerLengthGreaterThanZero: false,
        currentSelectacaIntro: false,
        isUploadingDataacaIntro: false,
        currentacaIntro: 0, //trang load danh sách người đăng ký 
}

var  _isFetchingacaIntro = false,
     _isGetacaIntroFromServerSuccess = false,
     _isGetacaIntroFromServerLengthGreaterThanZero = false,
     _currentSelectacaIntro = false,
     _isUploadingDataacaIntro = false,
     _currentacaIntro = 0;
	
	//fetching acaIntro
    Object.defineProperty(acaIntroStatus, "isFetchingacaIntro", {
        get() {
            return _isFetchingacaIntro;
        },
        set(val) {
            _isFetchingacaIntro = val;
            val ? showProgressListacaIntro() : hideProgressListacaIntro();
        }
    });

    function seFetchingacaIntro(val) {
        acaIntroStatus.isFetchingacaIntro = val;
    }

    function getFetchingacaIntro() {
        return acaIntroStatus.isFetchingacaIntro;
    }
	
	 //get acaIntro from server
    Object.defineProperty(acaIntroStatus, "isGetacaIntroFromServerSuccess", {
        get() {
            return _isGetacaIntroFromServerSuccess;
        },
        set(val) {
            _isGetacaIntroFromServerSuccess = val;
            val ? getListacaIntroSuccess() : getListacaIntroFailed();
        }
    });


    function setIsGetacaIntroFromServerSuccess(val) {
        acaIntroStatus.isGetacaIntroFromServerSuccess = val;
    }

    function getIsGetacaIntroFromServerSuccess() {
        return acaIntroStatus.isGetacaIntroFromServerSuccess;
    }

	Object.defineProperty(acaIntroStatus, "isGetacaIntroFromServerLengthGreaterThanZero", {
        get() {
            return _isGetacaIntroFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetacaIntroFromServerLengthGreaterThanZero = val;
            val ? getListacaIntroGreaterThanZero() : getListacaIntroEqualToZero();
        }
    });

    function setGetacaIntroFromServerLengthGreaterThanZero(val) {
        acaIntroStatus.isGetacaIntroFromServerLengthGreaterThanZero = val;
    }

    function getGetacaIntroFromServerLengthGreaterThanZero() {
        return acaIntroStatus.isGetacaIntroFromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentacaIntro
    Object.defineProperty(acaIntroStatus, "currentSelectacaIntro", {
        get() {
            return _currentSelectacaIntro;
        },
        set(val) {
            _currentSelectacaIntro = val;
        }
    });

    function setCurrentSelectacaIntro(val) {
        acaIntroStatus.currentSelectacaIntro = val;
    }

    function getCurrentSelectacaIntro() {
        return acaIntroStatus.currentSelectacaIntro;
    }
	
	  //loading data isUploadingDataacaIntro
    Object.defineProperty(acaIntroStatus, "isUploadingDataacaIntro", {
        get() {
            return _isUploadingDataacaIntro;
        },
        set(val) {
            _isUploadingDataacaIntro = val;
            val == true ? loadingDataacaIntroProgress() : val == false ? loadingDataacaIntroDone() : loadingDataacaIntroError();
        }
    });

    function setLoadingDataacaIntro(val) {
        acaIntroStatus.isUploadingDataacaIntro = val;
    }

    function getLoadingDataacaIntro() {
        return acaIntroStatus.isUploadingDataacaIntro;
    }
	
	Object.defineProperty(acaIntroStatus, "currentacaIntro", {
        get() {
            return _currentacaIntro;
        },
        set(val) {
            _currentacaIntro = val;
            console.log("getQvist",getQvist());
            seFetchingacaIntro(true);
            requestToSever(
                sunQRequestType.get,
                getQvist(),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    seFetchingacaIntro(false);
                    if (res.code === networkCode.success) {//alert(JSON.stringify(res.data));
                        if (res.data == null || res.data.length == 0) {
                            setGetacaIntroFromServerLengthGreaterThanZero(false);
                        } else {
                            emptyTableListacaIntro();
                            listacaIntro = listacaIntro.concat(res.data);
                            createListacaIntro(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    seFetchingacaIntro(false);
                    setIsGetacaIntroFromServerSuccess(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentacaIntro(val) {
        acaIntroStatus.currentacaIntro = val;
    }

    function getCurrentacaIntro() {
        return acaIntroStatus.currentacaIntro;
    }	
</script>