<?php ?>
<script>
var contactStatus = {
		isFetchingContact: false, //đang load danh sách liên lạc
        isGetContactFromServerSuccess: false,
        isGetContactFromServerLengthGreaterThanZero: false,
        currentSelectContact: false,
        isUploadingDataContact: false,
        currentContact: 0, //trang load danh sách người đăng ký 
}

var  _isFetchingContact = false,
     _isGetContactFromServerSuccess = false,
     _isGetContactFromServerLengthGreaterThanZero = false,
     _currentSelectContact = false,
     _isUploadingDataContact = false,
     _currentContact = 0;
	
	//fetching contact
    Object.defineProperty(contactStatus, "isFetchingContact", {
        get() {
            return _isFetchingContact;
        },
        set(val) {
            _isFetchingContact = val;
            val ? showProgressListContact() : hideProgressListContact();
        }
    });

    function seFetchingContact(val) {
        contactStatus.isFetchingContact = val;
    }

    function getFetchingContact() {
        return contactStatus.isFetchingContact;
    }
	
	 //get contact from server
    Object.defineProperty(contactStatus, "isGetContactFromServerSuccess", {
        get() {
            return _isGetContactFromServerSuccess;
        },
        set(val) {
            _isGetContactFromServerSuccess = val;
            val ? getListLectureContact() : getListContactFailed();
        }
    });


    function setIsGetContactFromServerSuccess(val) {
        contactStatus.isGetContactFromServerSuccess = val;
    }

    function getIsGetContactFromServerSuccess() {
        return contactStatus.isGetContactFromServerSuccess;
    }

	Object.defineProperty(contactStatus, "isGetContactFromServerLengthGreaterThanZero", {
        get() {
            return _isGetContactFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetContactFromServerLengthGreaterThanZero = val;
            val ? getListContactGreaterThanZero() : getListContactEqualToZero();
        }
    });

    function setGetContactFromServerSuccess(val) {
        contactStatus.isGetContactFromServerLengthGreaterThanZero = val;
    }

    function getGetContactFromServerSuccess() {
        return contactStatus.isGetContactFromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentContact
    Object.defineProperty(contactStatus, "currentSelectContact", {
        get() {
            return _currentSelectContact;
        },
        set(val) {
            _currentSelectContact = val;
        }
    });

    function setCurrentSelectContact(val) {
        contactStatus.currentSelectContact = val;
    }

    function getCurrentSelectContact() {
        return contactStatus.currentSelectContact;
    }
	
	  //loading data isUploadingDataContact
    Object.defineProperty(contactStatus, "isUploadingDataContact", {
        get() {
            return _isUploadingDataContact;
        },
        set(val) {
            _isUploadingDataContact = val;
            val == true ? loadingDataContactProgress() : val == false ? loadingDataContactDone() : loadingDataContactError();
        }
    });

    function setLoadingDataContact(val) {
        contactStatus.isUploadingDataContact = val;
    }

    function getLoadingDataContact() {
        return contactStatus.isUploadingDataContact;
    }
	
	Object.defineProperty(contactStatus, "currentContact", {
        get() {
            return _currentContact;
        },
        set(val) {
            _currentContact = val;

            let dataCurrentViewContact = {
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            setFetchingGroup(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getListContact(), dataCurrentViewContact),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    seFetchingContact(false);
                    if (res.code === networkCode.success) {
                        if (res.data == null || res.data.length == 0) {
                            setGetContactFromServerLengthGreaterThanZero(false);
                        } else {
                            emptyTableListContact();
                            listContact = listContact.concat(res.data);
                            createListContact(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    seFetchingContact(false);
                    setIsGetContactFromServerSuccess(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentContact(val) {
        contactStatus.currentContact = val;
    }

    function getCurrentContact() {
        return contactStatus.currentContact;
    }
	
</script>