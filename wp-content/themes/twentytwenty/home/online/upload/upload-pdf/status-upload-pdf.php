<?php ?>
<script>
var uploadPdfStatus = {
		isFetchingUploadPdf: false, //đang load danh sách liên lạc
        isGetUploadPdfFromServerSuccess: false,
        isGetUploadPdfFromServerLengthGreaterThanZero: false,
        currentSelectUploadPdf: false,
        isUploadingDataUploadPdf: false,
        currentUploadPdf: 0, //trang load danh sách người đăng ký 
}

var  _isFetchingUploadPdf = false,
     _isGetUploadPdfFromServerSuccess = false,
     _isGetUploadPdfFromServerLengthGreaterThanZero = false,
     _currentSelectUploadPdf = false,
     _isUploadingDataUploadPdf = false,
     _currentUploadPdf = 0;
	
	//fetching Upload Pdf
    Object.defineProperty(uploadPdfStatus, "isFetchingUploadPdf", {
        get() {
            return _isFetchingUploadPdf;
        },
        set(val) {
            _isFetchingUploadPdf = val;
            val ? showProgressListUploadPdf() : hideProgressListUploadPdf();
        }
    });

    function seFetchingUploadPdf(val) {
        uploadPdfStatus.isFetchingUploadPdf = val;
    }

    function getFetchingUploadPdf() {
        return uploadPdfStatus.isFetchingUploadPdf;
    }
	
	 //get UploadPdf from server
    Object.defineProperty(uploadPdfStatus, "isGetUploadPdfFromServerSuccess", {
        get() {
            return _isGetUploadPdfFromServerSuccess;
        },
        set(val) {
            _isGetUploadPdfFromServerSuccess = val;
            val ? getListUploadPdfSuccess() : getListUploadPdfFailed();
        }
    });


    function setIsGetUploadPdfFromServerSuccess(val) {
        uploadPdfStatus.isGetUploadPdfFromServerSuccess = val;
    }

    function getIsGetUploadPdfFromServerSuccess() {
        return uploadPdfStatus.isGetUploadPdfFromServerSuccess;
    }

	Object.defineProperty(uploadPdfStatus, "isGetUploadPdfFromServerLengthGreaterThanZero", {
        get() {
            return _isGetUploadPdfFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetUploadPdfFromServerLengthGreaterThanZero = val;
            val ? getListUploadPdfGreaterThanZero() : getListUploadPdfEqualToZero();
        }
    });

    function setGetUploadPdfFromServerSuccess(val) {
        uploadPdfStatus.isGetUploadPdfFromServerLengthGreaterThanZero = val;
    }

    function getGetUploadPdfFromServerSuccess() {
        return uploadPdfStatus.isGetUploadPdfFromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentUploadPdf
    Object.defineProperty(uploadPdfStatus, "currentSelectUploadPdf", {
        get() {
            return _currentSelectUploadPdf;
        },
        set(val) {
            _currentSelectUploadPdf = val;
        }
    });

    function setCurrentSelectUploadPdf(val) {
        uploadPdfStatus.currentSelectUploadPdf = val;
    }

    function getCurrentSelectUploadPdf() {
        return uploadPdfStatus.currentSelectUploadPdf;
    }
	
	  //loading data isUploadingDataUploadPdf
    Object.defineProperty(uploadPdfStatus, "isUploadingDataUploadPdf", {
        get() {
            return _isUploadingDataUploadPdf;
        },
        set(val) {
            _isUploadingDataUploadPdf = val;
            val == true ? loadingDataUploadPdfProgress() : val == false ? loadingDataUploadPdfDone() : loadingDataUploadPdfError();
        }
    });

    function setLoadingDataUploadPdf(val) {
        uploadPdfStatus.isUploadingDataUploadPdf = val;
    }

    function getLoadingDataUploadPdf() {
        return uploadPdfStatus.isUploadingDataUploadPdf;
    }
	
	Object.defineProperty(uploadPdfStatus, "currentUploadPdf", {
        get() {
            return _currentUploadPdf;
        },
        set(val) {
            _currentUploadPdf = val;

            let dataCurrentViewUploadPdf = {
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            seFetchingUploadPdf(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getListUploadPdf(), dataCurrentViewUploadPdf),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    seFetchingUploadPdf(false);
                    if (res.code === networkCode.success) {
                        if (res.data == null || res.data.length == 0) {
							
                            	setGetUploadPdfFromServerSuccess(false);
							
                        } else {
                            emptyTableListUploadPdf();
                            listUploadPdf = listUploadPdf.concat(res.data);
                            createListUploadPdf(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    seFetchingUploadPdf(false);
                    setIsGetUploadPdfFromServerSuccess(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentUploadPdf(val) {
        uploadPdfStatus.currentUploadPdf = val;
    }

    function getCurrentUploadPdf() {
        return uploadPdfStatus.currentUploadPdf;
    }
	
	//stepUploadingPDF
    Object.defineProperty(uploadPdfStatus, "stepUploadingPDF", {
        get() {
            return _stepUploadingPDF;
        },
        set(val) {
            _stepUploadingPDF = val;
			val == 0 ? transctionToInitPDF() : transctionToUploadPDF();
        }
    });

    function setStepUploadingPDF(val) {
        uploadPdfStatus.stepUploadingPDF = val;
    }

    function getStepUploadingPDF() {
        return uploadPdfStatus.stepUploadingPDF;
    }
</script>