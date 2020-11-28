<?php
/*
import React from 'react';
import '../assets/css/chat.css';
import DetailChat from './detailChat';
import { chatKey, firebaseConfig } from '../constant/chat';

export default class Chat extends React.Component {
    constructor(props) {
        super(props);
        this.isLogin = false;
        this.state = {
            isExpand: true,
            unRead: false,
            isLoading: true,
            listMess: [],
            statusApp: "Đang xử lý",
            isOnline: false,
        };
        //var
        this.firebase = "";
        this.database = "";
        this.firebaseConfig = "";
        this.account = "";
        this.password = "";
        this.id = "";
        this.isOnline = "";
        this.read = "";
        this.adminName = "";
        this.clientCount = 0;
        this.unreadCount = 0;
        this.keyIsOnline = "";
        this.keyRead = "";
        this.textMessage = "";
        this.tableMesssageName = "table_message";
        this.keyseenAdmin = "";
        this.keyseenClient = "";
        this.vars = {
            originalTitle: document.title,
            intervalUnseen: null
        };
        this.pageTitleNotification = {
            On: function (notification, intervalSpeed) {
                //console.log("pageTitleNotification on", this.vars.originalTitle);
                var _this = this;
                if (this.vars.intervalUnseen != null) {
                    clearInterval(this.vars.intervalUnseen);
                }
                _this.vars.intervalUnseen = setInterval(function () {
                    let temppTitle = _this.vars.originalTitle;
                    //console.log("tttt", _this.vars.originalTitle);
                    if (_this.vars.originalTitle != null) {
                        document.title = (temppTitle == document.title)
                            ? notification
                            : temppTitle;
                    }
                }, (intervalSpeed) ? intervalSpeed : 1500);
                //_this.vars.intervalUnseen;
            }.bind(this),
            Off: function () {
                //console.log("pageTitleNotification off");
                if (this.vars.intervalUnseen != null) {
                    clearInterval(this.vars.intervalUnseen);
                }
                document.title = this.vars.originalTitle;
            }.bind(this),
        }
        //function
        this.configureFirebase = this.configureFirebase.bind(this);
        this.addUserStaeListener = this.addUserStaeListener.bind(this);
        this.authentication = this.authentication.bind(this);
        this.login = this.login.bind(this);
        this.register = this.register.bind(this);
        this.action = this.action.bind(this);
        this.listenForOnlineClient = this.listenForOnlineClient.bind(this);
        this.writeToDatabase = this.writeToDatabase.bind(this);
        this.investtigateDatabase = this.investtigateDatabase.bind(this);
        this.listenFromDatabase = this.listenFromDatabase.bind(this);
        this.listenForOnlineAdmin = this.listenForOnlineAdmin.bind(this);
        this.isOnlineStatus = this.isOnlineStatus.bind(this);
        this.listenForRead = this.listenForRead.bind(this);
        this.listenForReadChange = this.listenForReadChange.bind(this);
        this.listenForBeRead = this.listenForBeRead.bind(this);
        this.listenForBeReadChange = this.listenForBeReadChange.bind(this);
        this.updateStatus = this.updateStatus.bind(this);
        this.messageSeen = this.messageSeen.bind(this);
        this.unSeen = this.unSeen.bind(this);
        this.hideLoading = this.hideLoading.bind(this);
        this.setOnFocusRead = this.setOnFocusRead.bind(this);
        this.setOnLineForAdmin = this.setOnLineForAdmin.bind(this);
        this.setOfflineForAdmin = this.setOfflineForAdmin.bind(this);
        this.checkOnBoarding = this.checkOnBoarding.bind(this);
        this.prepareSomeName = this.prepareSomeName.bind(this);
        this.scrollBottom = this.scrollBottom.bind(this);
        this.collapseChat = this.collapseChat.bind(this);
        this.expandChat = this.expandChat.bind(this);
        this.clickChat = this.clickChat.bind(this);
        this.onInputKeyBoard = this.onInputKeyBoard.bind(this);
        this.tableMessage = this.tableMessage.bind(this);
        this.checkTableMessage = this.checkTableMessage.bind(this);
        this.checkEmptyOnLinestatus = this.checkEmptyOnLinestatus.bind(this);
    }

    componentDidMount() {
        console.log("user name", this.props.username);//, "password", this.props.password, "title", document.title);
        this.prepareSomeName();
        this.prepareScriptFirebase(this.configureFirebase, function () { this.authentication(this.props.username, this.props.password) }.bind(this));
        //this.authentication(this.props.username, this.props.password);
        this.listMessage = React.createRef();
        this.inputMessage = React.createRef();
        window.addEventListener("beforeunload", (e) => this.isOnlineStatus(false, null, true));
        window.addEventListener('online', () => this.isOnlineStatus(true, null, true));
        window.addEventListener('offline', () => this.isOnlineStatus(false, null, true));
    }

    componentWillUnmount() {
        this.pageTitleNotification.Off();
    }

    handleTaile(header, newTail) {
        return newTail ? header.substring(0, header.indexOf("@")) + newTail : header.substring(0, header.indexOf("@"));
    }

    prepareSomeName() {
        this.adminName = this.props.adminName;
        this.id = this.handleTaile(this.props.username);
        this.isOnline = this.handleTaile(this.props.username, "isOnline");
        this.read = this.handleTaile(this.props.username, "read");
    }

    prepareScriptFirebase(callback1, callback2) {
        let x = document.getElementsByTagName('script')[0];

        let s = document.createElement('script');
        s.type = 'text/javascript';
        s.src = 'https://www.gstatic.com/firebasejs/8.0.2/firebase-app.js';
        x.parentNode.insertBefore(s, x);

        s.addEventListener('load', function () {
            s = document.createElement('script');
            s.type = 'text/javascript';
            s.src = 'https://www.gstatic.com/firebasejs/8.0.2/firebase-auth.js';
            x.parentNode.insertBefore(s, x);

            s.addEventListener('load', function () {
                s = document.createElement('script');
                s.type = 'text/javascript';
                s.src = 'https://www.gstatic.com/firebasejs/8.0.2/firebase-firestore.js';
                x.parentNode.insertBefore(s, x);

                s.addEventListener('load', function () {
                    s = document.createElement('script');
                    s.type = 'text/javascript';
                    s.src = 'https://www.gstatic.com/firebasejs/8.0.2/firebase-database.js';
                    x.parentNode.insertBefore(s, x);

                    s.addEventListener('load', function () {
                        if (callback1 && callback2) {
                            if (typeof callback1 == "function" && typeof callback2 == "function") {
                                callback1(callback2);
                            }
                        }
                    });
                });
            });
        });
    }

    configureFirebase(callback) {
        // Initialize Firebase
        if (!window.firebase.apps.length) {
            window.firebase.initializeApp(firebaseConfig);
        }
        //prepare
        window.database = window.firebase.database();
        this.addUserStaeListener();

        if (callback) {
            if (typeof callback == "function") {
                callback();
            }
        }
    }

    addUserStaeListener() {
        window.firebase.auth().onAuthStateChanged(function (user) {
            if (user) {
                // User is logged in.
                console.log("success");
                if (this.checkOnBoarding() == false) {

                }
                if (!this.isLogin) {
                    this.isLogin = true;
                    this.action();
                }
                var displayName = user.displayName;
                var email = user.email;
                var uid = user.uid;
                var providerData = user.providerData;
            } else {
                console.log("failed", user);
                // User is signed out.
                // ...
            }
        }.bind(this));
    }

    /**
     * xác thực 
     * @param {*} username - email
     * @param {*} password - mật khẩu
     */
    authentication(username, password) {
        this.login(username, password);
    }

    login(email, password) {
        this.updateStatus("Đang đăng nhập ..." + email);
        window.firebase.auth().signInWithEmailAndPassword(email, password).catch(function (error) {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            console.log("register failed with error code", error.code, "message", error.message);
            if (error.code == "auth/user-not-found") {
                this.register(email, password);
            }
            // ...
        }.bind(this));

    }

    register(email, password) {
        this.updateStatus("Đang đăng ký ...");
        window.firebase.auth().createUserWithEmailAndPassword(email, password).catch(function (error) {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            console.log("login failed with error code", error.code, "message", error.message);
            // ...
        });
    }

    action() {
        this.listenForOnlineClient(this.isOnlineStatus);
        this.investtigateDatabase();
        this.listenForRead();
        this.listenForBeRead();
        this.listenForOnlineAdmin();

        //getAllDataBase();
        this.listenFromDatabase();
    }

    onInputKeyBoard(e) {
        this.textMessage = e.target.value;
    }

    /**
     * Viết tin nhắn mới vào bảng
     * @param {*} e - tin nhắn
     */
    writeToDatabase(e) {
        let message = this.textMessage;
        console.log("");
        if (message != "") {
            let clientMessage = {
                isClientRead: true,
                isAdminRead: false,
                isAdmin: false,
                message: message,
                time: new Date().getTime() //kiểu long
            }
            let readStatus = {
                isAdminRead: false,
            }
            try {
                this.unSeen();
                //let keyseen = localStorage.getItem(this.id + "read/admin");
                console.log("admin read ", this.keyseenAdmin);
                if (this.keyseenAdmin != "") {
                    var updates = {};
                    updates[this.id + "read/" + this.keyseenAdmin] = readStatus;
                    window.database.ref().update(updates);
                } else {
                    this.keyseenAdmin = window.database.ref(this.id + "read").push(readStatus).key;
                    console.log("keyseenAdmin", this.keyseenAdmin);
                    //localStorage.setItem(this.id + "read/admin", keyseen);
                }
                //console.log("keyseen", keyseen);
                window.database.ref(this.id).push(clientMessage);
                document.getElementById("content").value = "";
                //update to table read_message
                this.checkTableMessage();
            } catch (error) {
                console.error("write to firebase error", error);
            }
        }
    }

    /**
     * kiểm tra table_message
     */
    checkTableMessage() {
        let tName = this.tableMesssageName;
        console.log("table message", tName);
        //kiểm tra xem trong bảng table_message đã có email này chưa, chưa có thì thêm vào
        window.database.ref(tName).once('value', function (snapshot) {
            console.log("s table message is", snapshot.val());
            if (snapshot) {
                if (snapshot.val()) {
                    let canChange = false;
                    for (let elem in snapshot.val()) {
                        console.log("s account", snapshot.val()[elem].name, snapshot.val()[elem].name != this.props.username);
                        if (snapshot.val()[elem].name == this.props.username) {
                            canChange = true;
                        }
                    }
                    if (!canChange) {
                        this.tableMessage(tName, this.props.username);
                    }
                } else {
                    this.tableMessage(tName, this.props.username);
                }
            }
        }.bind(this));
    }

    /**
     * đẩy vào bảng table_message
     * @param {*} tableName - tên bảng
     * @param {*} username - tên username
     */
    tableMessage(tableName, username) {
        let messageDetail = {
            name: username,
            urlAvatar: "11111",
            time: new Date()
        }
        window.database.ref(tableName).push(messageDetail);
    }

    checkEmptyOnLinestatus() {

    }
    /**
     * cập nhật trang thái online/offline
     * @param {*} isTrue - đặt trạng thái on/off
     * @param {*} callback - hàm callback
     * @param {*} isCreate - true là cần tạo mới,false là đã có, chỉ cần update
     */
    isOnlineStatus(isTrue, callback, isCreate) {
        try {
            //this.keyIsOnline = localStorage.getItem("IsOnline");
            let status = {};
            console.log("istrue", isTrue, "count", this.clientCount);
            // fetch('http://localhost:3001/log?msg=check' + this.clientCount)
            //     .then(response => response.json())
            //     .then(data => console.log(data));
            if (isCreate) {
                let updates = {};
                // fetch('http://localhost:3001/log?msg=createtrue' + this.clientCount)
                //     .then(response => response.json())
                //     .then(data => console.log(data));
                //update ngược dấu
                if (isTrue) {
                    this.clientCount++;
                    console.log("isTrue", isTrue, "clientCount", this.clientCount);
                    status = {
                        status: isTrue,
                        count: this.clientCount
                    }
                    // fetch('http://localhost:3001/log?msg=aftercreatetrue' + this.clientCount)
                    // .then(response => response.json())
                    // .then(data => console.log(data));
                    //update ngược dấu
                } else {
                    // fetch('http://localhost:3001/log?msg=before' + this.clientCount)
                    //     .then(response => response.json())
                    //     .then(data => console.log(data));
                    if (this.clientCount > 0) {
                        this.clientCount--;
                    }
                    // fetch('http://localhost:3001/log?msg=after' + this.clientCount)
                    //     .then(response => response.json())
                    //     .then(data => console.log(data));
                    status = {
                        status: this.clientCount == 0 ? false : true,
                        count: this.clientCount
                    }
                }
                updates[this.isOnline + "/" + this.keyIsOnline] = status;
                window.database.ref().update(updates);
            } else {
                this.clientCount++;
                status = {
                    status: isTrue,
                    count: this.clientCount
                }
                this.keyIsOnline = window.database.ref(this.isOnline).push(status).key;
                console.log("keyIsOnline", this.keyIsOnline);
                //localStorage.setItem("IsOnline", this.keyIsOnline);
            }
            if (callback) {
                if (typeof callback == "function") {
                    callback();
                }
            }
            //console.log("keyIsOnline", this.keyIsOnline);
        } catch (error) {
            console.error("is online error", error);
        }
    }

    /**
     * lắng nghe bảng online bảng online có cấu trúc chỉ là một document có 2 field là count(int) và status(boolean)
     */
    listenForOnlineClient(callback) {
        //true là tạo mới, false là update
        let isCreate = true;
        try {
            window.database.ref(this.isOnline).once('value', function (snapshot) {
                if (snapshot) {
                    if (snapshot.val()) {
                        this.clientCount = snapshot.val().count;
                        //console.log("s count online is",snapshot.val(), snapshot.val().count, this.clientCount);
                        for (let elem in snapshot.val()) {
                            isCreate = true;
                            console.log("s count online is", elem, snapshot.val()[elem].count);
                            this.keyIsOnline = elem;
                            this.clientCount = snapshot.val()[elem].count;
                        }
                    } else {
                        isCreate = false;
                        this.clientCount = 0;
                    }
                } else {
                    isCreate = false;
                    this.clientCount = 0;
                }
                if (callback) {
                    if (typeof callback == "function") {
                        callback(true, null, isCreate);
                        //this.clientCount = 0;
                    }
                }
            }.bind(this));
            window.database.ref(this.isOnline).off('child_changed');
            window.database.ref(this.isOnline).on('child_changed', function (snapshot) {
                if (snapshot) {
                    if (snapshot.val()) {
                        console.log("client change", snapshot);
                        this.clientCount = snapshot.val().count;
                    }
                }
            }.bind(this));
        }
        catch (error) {
            console.error("listen for client OnOff error", error);
        }
    }

    investtigateDatabase() {
        this.updateStatus("Đang lấy dữ liệu từ firebase ...");
        try {
            window.database.ref(this.id).once('value', function (snapshot) {
                this.hideLoading();
                // console.log("Danh sach tin nhan");
                // let parent = document.getElementById("listMessage");
                // snapshot.forEach(function (childSnapshot) {
                // 	let childData = childSnapshot.val();
                // 	console.log("Tin nhan", childData);
                // 	let chatDiv = childData.isAdmin ? createDivChatAdmin(childData.message) : createDivChatClient(childData.message);
                // 	parent.appendChild(chatDiv);
                // });

            }.bind(this));
        } catch (error) {
            console.error("get all databse from firebase error", error);
        }
    }

    listenFromDatabase() {
        try {
            window.database.ref(this.id).off('child_added');
            window.database.ref(this.id).on('child_added', function (snapshot) {
                this.hideLoading();
                //để lấy các property của message gửi veef
                // snapshot.val().property_của object
                if (snapshot) {
                    if (snapshot.val()) {
                        !snapshot.val().isAdmin && this.unSeen(this.keyRead);
                        //let parent = document.getElementById("listMessage");
                        let messageReceiver = snapshot.val();

                        //console.log("Nhan duoc tin nhan", snapshot.val());

                        //console.log("has focus", document.hasFocus(), "is admin", snapshot.val().isAdmin, "total", !document.hasFocus() && snapshot.val().isAdmin);
                        if (!document.hasFocus() && snapshot.val().isAdmin) {
                            //console.log("có tin nhắn mới");
                        }
                        if (!snapshot.val().isAdmin) {
                            this.keyRead = snapshot.val().time;
                        }

                        this.setState(state => {
                            !messageReceiver.isAdmin && function () { messageReceiver.showRead = false }();
                            //console.log("state",state);
                            //console.log("list",state.listMess);
                            const list = state.listMess.concat(messageReceiver);
                            //console.log("list",list);
                            return {
                                listMess: list,

                            };
                        });
                        this.scrollBottom("listMessage");
                        //let content = snapshot.val().isAdmin ? this.createDivChatAdmin(messageReceiver, this.id) : this.createDivChatClient(messageReceiver, snapshot.val().time);
                        //parent.appendChild(content);
                        //scrollBottom("listMessage");
                    }
                }
            }.bind(this));
        } catch (error) {
            console.error("listen from database from firebase error", error);
        }
    }

    messageSeen() {
        //console.log("messageSeen ", this.keyRead);
        this.setState(state => {
            let list = [...state.listMess];
            list = list.map((item, index) => {
                //console.log("list seen",list);
                //console.log("item", item);
                if (item.time == this.keyRead) {
                    //console.log("item.time", item.time);
                    item.showRead = true;
                }
                return item;
            });
            return {
                listMess: list,
            }
        });
        //console.log("seen", this.keyRead);
    }

    unSeen(keyRead) {
        if (keyRead == null) {
            return;
        }
        this.setState(state => {
            let list = [...state.listMess];
            list = list.map((item, index) => {
                //console.log("item unseen",item,item.time,keyRead);
                if (item.time == keyRead) {
                    //console.log("item.time", item.time);
                    item.showRead = false;
                }
                return item;
            });
            return {
                listMess: list,
            }
        });
        //console.log("unSeen", this.keyRead);
    }

    listenForOnlineAdmin() {
        try {
            window.database.ref(this.adminName + "isOnline").once('value', function (snapshot) {
                if (snapshot) {
                    if (snapshot.val()) {
                        console.log("client once", snapshot.val());
                        for (let elem in snapshot.val()) {
                            console.log("admin", this.adminName, "'s status is", snapshot.val()[elem].status);
                            snapshot.val()[elem].status ? this.setOnLineForAdmin() : this.setOfflineForAdmin();
                        }
                    }
                }
            }.bind(this));
            window.database.ref(this.adminName + "isOnline").off('child_changed');
            window.database.ref(this.adminName + "isOnline").on('child_changed', function (snapshot) {
                if (snapshot) {
                    if (snapshot.val()) {
                        console.log("admin change", this.adminName, snapshot);
                        snapshot.val().status ? this.setOnLineForAdmin() : this.setOfflineForAdmin();
                    }
                }
            }.bind(this));
        }
        catch (error) {
            console.error("listen for admin OnOff error", error);
        }
    }

    /**
     * table quan sát trạng thái read của client - bảng read/admin
     */
    listenForRead() {
        console.log("listenForRead");
        //let keyseen = localStorage.getItem(this.id + "read/admin");
        window.database.ref(this.id + "read").once('value', function (snapshot) {
            if (snapshot) {
                if (snapshot.val()) {
                    for (let elem in snapshot.val()) {
                        if (snapshot.val()[elem].isClientRead != undefined) {
                            console.log("client read", elem, snapshot.val()[elem]);
                            if (this.keyseenClient == "") {
                                this.keyseenClient = elem;
                                console.log("keyseenClient", this.keyseenClient);
                            }
                            //this.listenForBeReadChange();
                        } else if (snapshot.val()[elem].isAdminRead != undefined) {
                            if (this.keyseenAdmin == "") {
                                this.keyseenAdmin = snapshot.ref_.key;
                                console.log("keyseenAdmin", this.keyseenAdmin);
                                //this.listenForReadChange();
                            }
                        }
                    }
                }
            }
        }.bind(this));
        window.database.ref(this.id + "read").off('child_added');
        window.database.ref(this.id + "read").on('child_added', function (snapshot) {
            console.log("admin read added", snapshot, snapshot.val());
            if (snapshot) {
                if (snapshot.val()) {
                    if (snapshot.val().isClientRead != undefined) {
                        if (this.keyseenClient == "") {
                            this.keyseenClient = snapshot.ref_.key;
                            console.log("this.keyseenClient", this.keyseenClient);
                        }
                    } else if (snapshot.val().isAdminRead != null) {
                        if (this.keyseenAdmin == "") {
                            this.keyseenAdmin = snapshot.ref_.key;
                            console.log("keyseenAdmin", this.keyseenAdmin);
                        }
                    }
                }
            }
        }.bind(this));
    }

    listenForReadChange() {
        window.database.ref(this.id + "read/" + this.keyseenAdmin).off('child_changed');
        window.database.ref(this.id + "read/" + this.keyseenAdmin).on('child_changed', function (snapshot) {
            if (snapshot) {
                if (snapshot.val()) {
                    console.log("admin seen snapshot.val()", snapshot, snapshot.val(), snapshot.val() === true);
                    if (snapshot.val() === true) {
                        this.messageSeen();
                    }
                }
            }
        }.bind(this));
    }

    /**
     * table quan sát trạng thái read của admin - bảng read/client
     */
    listenForBeRead() {
        //let keyseenClient = localStorage.getItem(this.id + "read");
        console.log("listenForBeRead", this.id + "read", this.keyseenClient);
        window.database.ref(this.id + "read").once('value', function (snapshot) {
            if (snapshot) {
                if (snapshot.val()) {
                    for (let elem in snapshot.val()) {
                        if (snapshot.val()[elem].isClientRead != undefined) {
                            console.log("client read", elem, snapshot.val()[elem]);
                            this.keyseenClient = elem;
                            this.listenForBeReadChange();
                            console.log("this.keyseenClient", this.keyseenClient);
                            if (snapshot.val()[elem].isClientRead != null) {
                                snapshot.val()[elem].isClientRead == true ? function () { this.pageTitleNotification.Off(); this.setState({ unreadCount: 0 }) }.bind(this)() : function () { this.pageTitleNotification.On(chatKey.thereIsANewMEssage); this.setState({ unreadCount: 1 }) }.bind(this)();
                            }
                        } else if (snapshot.val()[elem].isAdminRead != undefined) {
                            if (this.keyseenAdmin == "") {
                                this.keyseenAdmin = snapshot.ref_.key;
                                console.log("keyseenAdmin", this.keyseenAdmin);
                                this.listenForReadChange();
                            }
                            console.log("admin value read ", snapshot);
                            snapshot.val().isAdminRead == true && this.messageSeen();
                            console.log("this.keyseenAdmin", this.keyseenAdmin);
                        }
                    }
                }
            }
        }.bind(this));
        window.database.ref(this.id + "read").off('child_added');
        window.database.ref(this.id + "read").on('child_added', function (snapshot) {
            if (snapshot) {
                if (snapshot.val()) {
                    console.log("client added", snapshot, snapshot.val());
                    if (snapshot.val().isClientRead != undefined) {
                        if (this.keyseenClient == "") {
                            this.keyseenClient = snapshot.ref_.key;
                            console.log("this.keyseenClient", this.keyseenClient);
                            this.listenForBeReadChange();
                        }
                        snapshot.val().isClientRead == true ? function () { this.pageTitleNotification.Off(); this.setState({ unreadCount: 0 }) }.bind(this)() : function () { this.pageTitleNotification.On(chatKey.thereIsANewMEssage); this.setState({ unreadCount: 1 }) }.bind(this)();
                        console.log("this.keyseenClient", this.keyseenClient);
                    } else if (snapshot.val().isAdminRead != null) {
                        if (this.keyseenAdmin == "") {
                            this.keyseenAdmin = snapshot.ref_.key;
                            console.log("keyseenAdmin", this.keyseenAdmin);
                            this.listenForReadChange();
                        }
                        console.log("admin added ", snapshot);
                        snapshot.val().isAdminRead == true && this.messageSeen();
                        console.log("this.keyseenAdmin", this.keyseenAdmin);
                    }
                }
            }
        }.bind(this));
    }

    listenForBeReadChange() {
        window.database.ref(this.id + "read/" + this.keyseenClient).off('child_changed');
        window.database.ref(this.id + "read/" + this.keyseenClient).on('child_changed', function (snapshot) {
            if (snapshot) {
                console.log("change seen snapshot", snapshot, snapshot.node_ != null, snapshot.node_.value_);
                if (snapshot.val()) {
                    console.log("change seen snapshot.val()", snapshot.val());
                    if (snapshot.val() == true) {
                        this.pageTitleNotification.Off();
                        this.setState({ unreadCount: 0 });
                    }
                    // ? function () {  }.bind(this)() : function () { t }.bind(this)();
                    // for (let elem in snapshot.val()) {
                    //     if (snapshot.val()[elem].isClientRead != undefined) {
                    //         console.log("client read", elem, snapshot.val()[elem]);
                    //         if (snapshot.val()[elem].isClientRead != null) {
                    //             snapshot.val()[elem].isClientRead ? function () { this.pageTitleNotification.Off(); this.setState({ unreadCount: 0 }) }.bind(this)() : function () { this.pageTitleNotification.On(chatKey.thereIsANewMEssage); this.setState({ unreadCount: 0 }) }.bind(this)();
                    //         }
                    //     }
                    // }
                }
                if (snapshot.node_ != null) {
                    //if (snapshot.node_.key = this.keyseenClient) {
                    if (snapshot.node_.value_ != null) {
                        console.log("snapshot node value", snapshot.node_.value_);
                        if (snapshot.node_.value_ == false) {
                            console.log("change seen client not seen");
                            this.pageTitleNotification.On(chatKey.thereIsANewMEssage); this.setState({ unreadCount: 1 })
                        }
                    }
                    //}
                }
            }
        }.bind(this));
    }

    setOnFocusRead() {
        console.log("focus", this.id + "read" + this.keyseenClient);

        let readStatus = {
            isClientRead: true
        }
        //let keyseenClient = localStorage.getItem(this.id + "read/client");
        if (this.keyseenClient != "") {
            var updates = {};
            updates[this.id + "read/" + this.keyseenClient] = readStatus;
            window.database.ref().update(updates);
        } else {
            this.keyseenClient = window.database.ref(this.id + "read").push(readStatus).key;
            console.log("keyseenClient", this.keyseenClient);
            //localStorage.setItem(this.id + "read/client", keyseenClient);
        }
    }

    checkOnBoarding() {
        let keyboard = localStorage.getItem("boarding");
        return keyboard ? true : false;

    }

    setOnLineForAdmin() {
        this.setState({
            isOnline: true
        });
    }

    setOfflineForAdmin() {
        this.setState({
            isOnline: false
        });
    }

    updateStatus(mess) {
        this.setState({
            statusApp: mess
        });
    }

    hideLoading() {
        this.setState({
            isLoading: false
        });
    }

    scrollBottom(id) {
        // if (window.document.getElementById(id)) {
        //     document.getElementById(id).scrollTop = document.getElementById(id).scrollHeight;
        // }
        //this.listMessage.scrollIntoView({ behavior: "smooth" });
        if (this.listMessage.scrollTop != null) {
            this.listMessage.scrollTop = this.listMessage.scrollHeight;
        }
    }

    collapseChat() {
        this.setState({
            isExpand: false
        });
    }

    expandChat() {
        this.setState({
            isExpand: true
        });
    }

    clickChat() {
        if (this.state.isExpand) {
            this.collapseChat();
        } else {
            this.expandChat();
        }
    }

    render() {
        return (
            <div>

                {this.state.isExpand ?
                    <div className="divMessage">

                        {/* <span id="adminStatus">{this.state.adminStatus}</span> */}
                        {
                            this.state.isOnline ?
                                <div className="headerMessage" onClick={this.collapseChat}>
                                    <span id="adminStatus">{chatKey.adminOnline}</span>
                                    <div className="adminStatus adminOnline"></div>
                                </div>
                                :
                                <div className="headerMessage" onClick={this.collapseChat}>
                                    <span id="adminStatus">{chatKey.adminOffline}</span>
                                    <div className="adminStatus adminOffline"></div>
                                </div>
                        }

                        <div className="listMessage" ref={(el) => { this.listMessage = el; }}>
                            {
                                this.state.isLoading ?
                                    <div className="divLoading">
                                        <div id="divError">
                                            <h3>{chatKey.errorPleaseTryAgain}</h3>
                                        </div>
                                        <div className="crawl-login-loading" id="divLoading">
                                            <div className="circle"></div>
                                            <div className="circle"></div>
                                            <div className="circle"></div>
                                            <div className="shadow"></div>
                                            <div className="shadow"></div>
                                            <div className="shadow"></div>
                                            <span id="statusApp">{this.state.statusApp}</span>
                                        </div>
                                    </div>
                                    :
                                    this.state.listMess.map((item, index) => {
                                        return (
                                            <DetailChat isAdmin={item.isAdmin} adminName={item.adminName ? item.adminName : "Chuyên gia"} id={item.time} key={index} message={item.message} showRead={item.showRead} idOutside={item.time} />
                                        )
                                    })
                            }
                        </div>
                        <div className="listInputAction">
                            <input type="text" id="content" ref={rel => { this.inputMessage = rel }} placeholder={chatKey.chatPlaceholder} onChange={this.onInputKeyBoard} onFocus={this.setOnFocusRead} autoComplete="off" />
                            <input type="submit" id="submit" value={chatKey.chatPlaceholder} onClick={this.writeToDatabase} />
                        </div>
                    </div>
                    :
                    null
                }
                <div className="divMessageCollapse" onClick={this.clickChat}>
                    {
                        this.state.unreadCount > 0 ?
                            <div className="divMessageCollapseChat">
                            </div>
                            :
                            null
                    }

                </div>
            </div>
        );
    }

}


*/
?>