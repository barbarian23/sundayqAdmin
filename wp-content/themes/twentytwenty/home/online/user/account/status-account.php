<?php ?>
<script>
	var userAccountStatus = {
		 isFetchingUserAccount: false, //đang load danh sách UserAccount hiện tại
        isGetUserAccountFromServerSuccess: false,
        isGetUserAccountFromServerLengthGreaterThanZero: false,
        currentSelectUserAccount: -1,
        isFetchingUserAccountLecture: false,
        isUploadingDataUserAccount: false, //load UserAccount hiện tại
        currentUserAccount: 0, //trang load danh sách UserAccount
	};
	
	var _isFetchingUserAccount = false,
		_isChoosingSelectUserAccountMain = false,
        _isGetUserAccountFromServerSuccess = false,
        _isGetUserAccountFromServerLengthGreaterThanZero = false,
        _currentSelectUserAccount = -1,
        _isFetchingUserAccountLecture = false, 
		_isUploadingDataUserAccount = false,
		_currentUserAccount = 0;

	//<UserAccount>
    //fetching UserAccount
    Object.defineProperty(userAccountStatus, "isFetchingUserAccount", {
        get() {
            return _isFetchingUserAccount;
        },
        set(val) {
            _isFetchingUserAccount = val;
            val ? showProgressListUserAccount() : hideProgressListUserAccount();
        }
    });

    function setFetchingUserAccount(val) {
        userAccountStatus.isFetchingUserAccount = val;
    }

    function getFetchingUserAccount() {
        return userAccountStatus.isFetchingUserAccount;
    }

    //get UserAccount from server
    Object.defineProperty(userAccountStatus, "isGetUserAccountFromServerSuccess", {
        get() {
            return _isGetUserAccountFromServerSuccess;
        },
        set(val) {
            _isGetUserAccountFromServerSuccess = val;
            val ? getListUserAccountSuccess() : getListUserAccountFailed();
        }
    });

    function setIsGetUserAccountFromServerSuccess(val) {
        userAccountStatus.isGetUserAccountFromServerSuccess = val;
    }

    function getIsGetUserAccountFromServerSuccess() {
        return userAccountStatus.isGetUserAccountFromServerSuccess;
    }

    //get UserAccount from server success
    Object.defineProperty(userAccountStatus, "isGetUserAccountFromServerLengthGreaterThanZero ", {
        get() {
            return _isGetUserAccountFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetUserAccountFromServerLengthGreaterThanZero = val;
            val ? getListLectureGreaterThanZero() : getListLectureEqualToZero();
        }
    });

    function setGetUserAccountFromServerLengthGreaterThanZero(val) {
        userAccountStatus.isGetUserAccountFromServerLengthGreaterThanZero = val;
    }

    function getGetUserAccountFromServerLengthGreaterThanZero() {
        return userAccountStatus.isGetUserAccountFromServerLengthGreaterThanZero;
    }

    //selectUserAccount
    Object.defineProperty(userAccountStatus, "currentSelectUserAccount", {
        get() {
            return _currentSelectUserAccount;
        },
        set(val) {
            _currentSelectUserAccount = val;
        }
    });

    function setCurrentSelectUserAccount(val, item) {
        userAccountStatus.currentSelectUserAccount = val;
        selectUserAccountIndex(item);
    }

    function getCurrentSelectUserAccount() {
        return userAccountStatus.currentSelectUserAccount;
    }

    //get UserAccount from lecture
    Object.defineProperty(userAccountStatus, "isFetchingUserAccountLecture", {
        get() {
            return _isFetchingUserAccountLecture;
        },
        set(val) {
            _isFetchingUserAccountLecture = val;
            val ? showProgressListUserAccountLecture() : hideProgressListUserAccountLecture();
        }
    });

    function setFetchingUserAccountLecture(val) {
        userAccountStatus.isFetchingUserAccountLecture = val;
    }

    function getFetchingUserAccountLecture() {
        return userAccountStatus.isFetchingUserAccountLecture;
    }

    //loading data isUploadingDataUserAccount
    Object.defineProperty(userAccountStatus, "isUploadingDataUserAccount", {
        get() {
            return _isUploadingDataUserAccount;
        },
        set(val) {
            _isUploadingDataUserAccount = val;
            val == true ? loadingDataUserAccountProgress() : val == false ? loadingDataUserAccountDone() : loadingDataUserAccountError();

        }
    });

    function setLoadingDataUserAccount(val) {
        userAccountStatus.isUploadingDataUserAccount = val;
    }

    function getLoadingDataUserAccount() {
        return userAccountStatus.isUploadingDataUserAccount;
    }

    Object.defineProperty(userAccountStatus, "currentUserAccount", {
        get() {
            return _currentUserAccount;
        },
        set(val) {
            _currentUserAccount = val;

            let dataCurrentViewUserAccount = {
				accountType:accuntSunQType.member,
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("link " + getListURLUserAccount());
            setFetchingUserAccount(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getListURLUserAccount(), dataCurrentViewUserAccount),
                //getURLAllUserAccount(),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    setFetchingUserAccount(false);
                    if (res.code === networkCode.success) {
                        if (res.data == null || res.data.length == 0) {
                            setGetUserAccountFromServerSuccess(false);
                        } else {
                            emptyTableListUserAccount();
                            listUserAccount = listUserAccount.concat(res.data);
                            createListUserAccount(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setFetchingUserAccount(false);
                    setIsGetUserAccountFromServerSuccess(false);
                    //alert(err);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentUserAccount(val) {
        userAccountStatus.currentUserAccount = val;
    }

    function getCurrentUserAccount() {
        return userAccountStatus.currentUserAccount;
    }

</script>