	<div id="divDetailChat">
		<div id="divListUser">

		</div>
		<div id="divMessage">
			<p id="usercurrent">Tin nhắn</p>
			<div id="listMessage"></div>
			<div class="chatSend">
				<input type="text" id="content" placeholder="Nhập tin nhắn ..." autocomplete="off">
				<input type="submit" id="submit" value="Gửi">
			</div>
		</div>
	</div>
	<div id="divError">
		<h3>Có lỗi, vui lòng thử lại</h3>
	</div>
	<div class="crawl-login-loading" id="divLoading">
		<div class="circle"></div>
		<div class="circle"></div>
		<div class="circle"></div>
		<div class="shadow"></div>
		<div class="shadow"></div>
		<div class="shadow"></div>
		<span id="statusApp">Đang lấy dữ liệu ...</span>
	</div>

	<script src="https://www.gstatic.com/firebasejs/8.0.2/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.0.2/firebase-auth.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.0.2/firebase-firestore.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.0.2/firebase-database.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script>
		var database = null, account = "adminchat@gmail.com", password = "abc123", id, currentIndex, isOnline = account.substring(0, account.indexOf("@")) + "isOnline", read;

		//var listUser = [{ email: "sampleclient@gmail.com", name: "sampleclient", onlineCount: 0, unreadCount: 0 }, { email: "sampleclient2@gmail.com", name: "sampleclient2", onlineCount: 0, unreadCount: 0 }];

		//var originUser = [{ email: "sampleclient@gmail.com", name: "sampleclient", onlineCount: 0, unreadCount: 0 }, { email: "sampleclient2@gmail.com", name: "sampleclient2", onlineCount: 0, unreadCount: 0 }];

		var listUser = [], originUser = [];

		var listener = null;

		var keyIsOnline, keyRead, countUnread = 0, adminCount = 0, currentMess;

		var userCurrent = "";

		var isLogin = false, keyseenClient = "", keyseenAdmin = "", isCreate = false;

		var unReadTimeout = null;

		var isScroll = false;;
		
		authentication();

		window.onload = function(){
			
			
		}
		
		function authentication() {
			var firebaseConfig = {
				apiKey: "AIzaSyBa6uKjy-usshEanycZZBOBil4mOs_rEss",
				authDomain: "samplechat-a28cf.firebaseapp.com",
				databaseURL: "https://samplechat-a28cf.firebaseio.com",
				projectId: "samplechat-a28cf",
				storageBucket: "samplechat-a28cf.appspot.com",
				messagingSenderId: "265596094510",
				appId: "1:265596094510:web:72b5c60ddd13ef4ecc77bf"
			};
			// Initialize Firebase
			firebase.initializeApp(firebaseConfig);
			//prepare
			database = firebase.database();

			login(account, password);
		}

		function actionDemo() {
			console.log("actionDemo");
			// Your web app's Firebase configuration


			//gọi khi user create account
			//register(account,password);

			//goi khi dang nhap
			//showLoading();
			// if (checkOnBoarding()) {
			// 	login(account, password);
			// 	listenForOnlineAdmin(isOnlineStatus);
			// } else {
			// 	localStorage.setItem("boarding", "pass");
			// 	register(account, password);
			// 	login(account, password);
			// 	isOnlineStatus(true, listenForOnlineAdmin);
			// }

			listenForOnlineAdmin(isOnlineStatus);

			listenForTableMessage();

			investtigateDatabase();

			// chatwithClient(listUser[0].name);
			// prepareListUser();

			serverChooseClient();
			//listenFromDatabase();


			document.getElementById("submit").addEventListener("click", function (e) {
				e.preventDefault();
				writeToDatabase(document.getElementById("content").value);
			});

			document.getElementById("content").addEventListener("focus", function (e) {
				let readStatus = {
					isAdminRead: true,
				}
				//let keyseenAdmin = localStorage.getItem(id + "read/admin");
				if (keyseenAdmin != "") {
					var updates = {};
					updates[id + "read/" + keyseenAdmin] = readStatus;
					database.ref().update(updates);
				} else {
					keyseenAdmin = database.ref(id + "read").push(readStatus).key;
					//keyseenAdmin = database.ref(id + "read/admin").push(readStatus).key;
					//localStorage.setItem(id + "read/admin", keyseenAdmin);
				}
			});			
		}

		//thêm listener để nghe trạng thái dang nhập
		firebase.auth().onAuthStateChanged(function (user) {
			if (user) {
				console.log("admin is login", user.displayName, user.email);
				// User is logged in.
				var displayName = user.displayName;
				var email = user.email;
				var uid = user.uid;
				var providerData = user.providerData;
				if (!isLogin) {
					isLogin = true;
					actionDemo();
				}
			} else {
				console.log("admin is sign out");
				// User is signed out.
				// ...
			}
		});

		//chạy khi user mớii dang ký
		function register(email, password) {
			updateStatus("Đang đăng ký ...");
			firebase.auth().createUserWithEmailAndPassword(email, password).catch(function (error) {
				// Handle Errors here.
				var errorCode = error.code;
				var errorMessage = error.message;
				console.log("register failed with error code", error.code, "message", error.message);
				// ...
			});

		}

		//khi login dịch vụ, cần login firebase
		function login(email, password) {
			updateStatus("Đang đăng nhập ...");
			firebase.auth().signInWithEmailAndPassword(email, password).catch(function (error) {
				// Handle Errors here.
				var errorCode = error.code;
				var errorMessage = error.message;
				console.log("login failed with error code", error.code, "message", error.message);
				if (error.code == "auth/user-not-found") {
					register(email, password)
				}
				// ...
			});
		}


		function listenForTableMessage() {
			try {
				window.database.ref("table_message").once('value', function (snapshot) {
					//console.log("s table message is", snapshot.val());
					if (snapshot) {
						if (snapshot.val()) {
							for (let elem in snapshot.val()) {
								//console.log("s table message is", elem, snapshot.val()[elem]);
								let isExist = originUser.some(item => {
									//console.log("email", item, item.email, snapshot.val()[elem].name, item.email == snapshot.val()[elem].name);
									if (item.email == snapshot.val()[elem].name) {
										return true;
									}
								})
								let currentLength = listUser.length; //console.log("isExist", isExist);
								if (isExist) {

								} else {
									console.log("s table message oce add", snapshot.val()[elem].name);
									let itemAccount = snapshot.val()[elem].name;
									let objectPush = {
										email: itemAccount,
										name: itemAccount.includes("@") ? itemAccount.substring(0, itemAccount.indexOf("@")) : itemAccount,
										onlineCount: 0,
										unreadCount: 0
									};
									listUser.push(objectPush);
									originUser.push(objectPush);
								}
							}
						} else {

						}
					} else {

					}
					if (originUser.length == 0) {
						listUserIsEmpty();
					} else {
						prepareListUser();
						chatwithClient(listUser[0].name, 0);
						serverChooseClient();
					}
					listenForTableMessageKeyAdded();
				});

			}
			catch (error) {
				console.error("table message error", error);
			}
		}

		function listenForTableMessageKeyAdded() {
			window.database.ref("table_message").off('child_added');
			window.database.ref("table_message").on('child_added', function (snapshot) {
				if (snapshot) {
					if (snapshot.val()) {
						//console.log("table_message change", snapshot.val(), snapshot.val().name);
						//console.log("table_message curent array", snapshot.val(), snapshot.val().name);
						let isExist = originUser.some(item => {
							//console.log("email", item, item.email, snapshot.val().name, item.email == snapshot.val().name);
							if (item.email == snapshot.val().name) {
								return true;
							}
						})
						let currentLength = listUser.length; console.log("isExist", isExist);
						if (isExist) {

						} else {
							//console.log("s table message oce add", snapshot.val().name);
							let itemAccount = snapshot.val().name;
							let objectPush = {
								email: itemAccount,
								name: itemAccount.substring(0, itemAccount.indexOf("@")),
								onlineCount: 0,
								unreadCount: 0
							};
							listUser.push(objectPush);
							originUser.push(objectPush);
							prepareListUser();
							if (id == null) {
								chatwithClient(listUser[0].name, 0);
								serverChooseClient();
							}
						}
					}
				}
			});
		}

		function writeToDatabase(message) {
			if (message == "") {
				return;
			}
			let clientMessage = {
				isClientRead: false,
				isAdminRead: true,
				isAdmin: true,
				message: message,
				adminName: "Ben",
				time: new Date().getTime() //kiểu long
			}
			let readStatus = {
				isClientRead: false,
			}
			try {
				unSeen();
				//let keyseen = localStorage.getItem(id + "read/client");
				if (this.keyseenClient != "") {
					var updates = {};
					updates[id + "read/" + keyseenClient] = readStatus;
					database.ref().update(updates);
				} else {
					keyseenClient = database.ref(id + "read").push(readStatus).key;
					//keyseen = database.ref(id + "read/client").push(readStatus).key;
					//localStorage.setItem(id + "read/client", keyseen);
				}
				//console.log("keyseen", keyseen);
				database.ref(id).push(clientMessage);
				document.getElementById("content").value = "";
			} catch (error) {
				console.error("write to firebase error", error);
			}

		}

		function isOnlineStatus(isTrue, callback, createOrNot) {
			try {
				//keyIsOnline = localStorage.getItem("IsOnline"); console.log("adminCount", adminCount, "isTrue", isTrue);
				let status = {};
				//console.log("isOnlineStatus", adminCount);
				if (createOrNot) {
					let updates = {};
					if (isTrue) {
						adminCount++;
						status = {
							status: isTrue,
							count: adminCount
						}
					} else {
						if (adminCount > 0) {
							adminCount--;
						}
						status = {
							status: adminCount == 0 ? false : true,
							count: adminCount
						}
					}
					updates[isOnline + "/" + keyIsOnline] = status;
					database.ref().update(updates);
				} else {
					status = {
						status: isTrue,
						count: adminCount
					}
					//keyIsOnline = database.ref(isOnline + "/" + keyIsOnline).push(status).key;
					//console.log("status", status, adminCount);
					keyIsOnline = database.ref(isOnline).push(status).key;
					//localStorage.setItem("IsOnline", keyIsOnline);
				}
				if (callback) {
					if (typeof callback == "function") {
						callback();
					}
				}
				//console.log("keyIsOnline", keyIsOnline);
			} catch (error) {
				console.error("is online error", error);
			}
		}

		function listenForOnlineAdmin(callback) {
			let isCreate = true;
			try {
				database.ref(isOnline).once('value', function (snapshot) {
					if (snapshot) {
						//console.log("admin count online before ", snapshot.val());
						if (snapshot.val()) {
							//console.log("admin count online is ", snapshot.val());
							for (let elem in snapshot.val()) {
								//isCreate = false;
								//console.log("admin", "'s count online is  is", elem);
								keyIsOnline = elem;
								adminCount = snapshot.val()[elem].count;
							}
						} else {
							isCreate = false;
							adminCount = 0;
						}
					} else {
						isCreate = false;
						adminCount = 0;
					}
					if (callback) {
						if (typeof callback == "function") {
							callback(true, null, isCreate);
						}
					}
				});
				database.ref(isOnline).off('child_changed');
				database.ref(isOnline).on('child_changed', function (snapshot) {
					if (snapshot) {
						if (snapshot.val()) {
							//console.log("admin change", snapshot);
							adminCount = snapshot.val().count;
						}
					}
				});
			}
			catch (error) {
				console.error("listen for admin OnOff error", error);
			}
		}

		function investtigateDatabase() {
			showLoading();
			document.getElementById("listMessage").innerHTML = "";
			updateStatus("Đang lấy dữ liệu ...");
			try {
				database.ref(id).once('value', function (snapshot) {
					hideLoading();
					// console.log("Danh sach tin nhan");
					// let parent = document.getElementById("listMessage");
					// snapshot.forEach(function (childSnapshot) {
					// 	let childData = childSnapshot.val();
					// 	console.log("Tin nhan", childData);
					// 	let chatDiv = childData.isAdmin ? createDivChatAdmin(childData.message) : createDivChatClient(childData.message);
					// 	parent.appendChild(chatDiv);
					// });

				});
			} catch (error) {
				console.log("get all databse from firebase error", error);
			}
		}

		function listenFromDatabase() {
			try {
				database.ref(id).off('child_added');
				database.ref(id).on('child_added', function (snapshot) {
					hideLoading();
					//để lấy các property của message gửi veef
					// snapshot.val().property_của object
					if (snapshot) {
						if (snapshot.val()) {
							let parent = document.getElementById("listMessage"); doNothing
							let messageReceiver = snapshot.val().message;
							//console.log("id", id, "message", snapshot.val().message, "isAdmin", snapshot.val().isAdmin, snapshot.val().time);
							//let chatDiv = snapshot.val().isAdmin ? createDivChatAdmin(messageReceiver, snapshot.val().time) : snapshot.val().user ? createDivChatClient(messageReceiver) : doNothing();
							if (snapshot.val().isAdmin == false) {
								if (snapshot.val().message != null) {
									currentMess = snapshot.val().message;
									//console.log("currentMess", currentMess);
									setUnreadMessSmall(id,null);
									//setMessaUnseen();
								}
							}
							if (snapshot.val().message) {
								let chatDiv = snapshot.val().isAdmin ? createDivChatAdmin(messageReceiver, snapshot.val().time) : createDivChatClient(messageReceiver,snapshot.val().time);
								chatDiv && parent.appendChild(chatDiv);
							}
							snapshot.val().isAdmin && unSeen();
							if (!document.hasFocus() && !snapshot.val().isAdmin) {
								//pageTitleNotification.On("Bạn có tin nhắn mới");
							}
							if (snapshot.val().isAdmin) {
								keyRead = snapshot.val().time;
							}
							scrollBottom("listMessage");
							//console.log("Listen from database message", snapshot.val());
						}
					}
				});
			} catch (error) {
				console.error("listen from databse from firebase error", error);
			}
		}

		/**
			 * table quan sát trạng thái read của admin - bảng read/client
			 */
		function listenForRead() {
			try {
				//let keyseen = localStorage.getItem(id + "read/client");
				database.ref(id + "read").once('value', function (snapshot) {
					if (snapshot) {
						if (snapshot.val()) {
							//console.log("added once snapshot.val()", snapshot, snapshot.val());
							for (let elem in snapshot.val()) {
								if (snapshot.val()[elem].isClientRead != null) {
									//console.log("value seen client", snapshot.val()[elem]);
									keyseenClient = elem;
									listenForReadChange();
									//console.log("keyseenClient", keyseenClient);
									snapshot.val()[elem].isClientRead == true && messageSeen();
								} else if (snapshot.val()[elem].isAdminRead != null) {
									if (keyseenAdmin == "") {
										keyseenAdmin = elem;
									}
									//console.log("value seen admin", snapshot.val()[elem]);
								}
							}
						} else {
							keyseenClient = "";
						}
					} else {
						keyseenClient = "";
					}
				});
				database.ref(id + "read").off('child_added');
				database.ref(id + "read").on('child_added', function (snapshot) {
					//để lấy các property của message child_added veef
					// snapshot.val().property_của object
					if (snapshot) {
						//console.log("added seen snapshot", snapshot);
						if (snapshot.val()) {
							//console.log("added seen snapshot.val()", snapshot, snapshot.val());
							if (snapshot.val().isClientRead != null) {
								if (keyseenClient == "") {
									if (snapshot.ref_.key) {
										keyseenClient = snapshot.ref_.key;
										listenForReadChange();
									}
									//keyseenClient = snapshot.ref_.key;
								}
								//console.log("keyseenClient", keyseenClient);
								snapshot.val().isClientRead == true && messageSeen();
							} else if (snapshot.val().isAdminRead != null) {
								//keyseenAdmin = elem;
								//console.log("added seen admin maybe true", snapshot.ref_.key);
								if (snapshot.ref_.key) {
									keyseenAdmin = snapshot.ref_.key;
									//listenForMeChange(id, currentIndex);
								}
								//console.log("keyseenAdmin", keyseenAdmin);
							}
						}
					}
				});
			}
			catch (error) {
				console.error("listen for read error", error);
			}
		}

		function listenForReadChange() {
			database.ref(id + "read/" + keyseenClient).off('child_changed');
			database.ref(id + "read/" + keyseenClient).on('child_changed', function (snapshot) {
				//để lấy các property của message gửi veef
				// snapshot.val().property_của object
				if (snapshot) {
					//console.log("change seen snapshot", snapshot);
					if (snapshot.val()) {
						//console.log("change seen snapshot.val()", snapshot.val());
						snapshot.val() && messageSeen();
					}
				}
			});
		}

		function listenForMe(input, index) {
			let name = input.name; console.log("listenforme", name);
			try {
				database.ref(name + "read").once('value', function (snapshot) {
					if (snapshot) {
						//console.log("admin seen once client", name, snapshot.val());
						if (snapshot.val()) {
							for (let elem in snapshot.val()) {
								if (snapshot.val()[elem].isAdminRead != null) {
									//console.log("admin seen once client", name, snapshot.val()[elem].isAdminRead);
									keyseenAdmin = elem;
									console.log("keyseenAdmin", keyseenAdmin);
									listenForMeChange(name, index);
									if (snapshot.val()[elem].isAdminRead == false) {
										swapToReadFirst(name, index);
										setUnreadForClient(name);
									} else {
										setReadForClient(name);
									}
									// snapshot.val()[elem].isAdminRead == false && function () { swapToReadFirst(index) }();
									// snapshot.val()[elem].isAdminRead == false ? setUnreadForClient(name) : setReadForClient(name);

								} else if (snapshot.val()[elem].isClientRead != null) {
									//console.log("value seen client", snapshot.val()[elem]);
									keyseenClient = elem;
									listenForReadChange();
									console.log("keyseenClient", keyseenClient);
									snapshot.val()[elem].isClientRead == true && messageSeen();
								}
							}
							//snapshot.val().isClientRead ? setReadForClient(id) : setUnReadForClient(id);
						} else {
							keyseenAdmin = "";
						}
					} else {
						keyseenAdmin = "";
					}
				});
				database.ref(name + "read").off('child_added');
				database.ref(name + "read").on('child_added', function (snapshot) {
					//để lấy các property của message gửi veef
					// snapshot.val().property_của object
					if (snapshot) {
						//console.log("added admin seen", snapshot);
						if (snapshot.val()) {
							//console.log("added admin seen client", name, snapshot.val().isAdminRead, "snapshot.val().isAdminRead != null", snapshot.val().isAdminRead != null, snapshot.ref_.key);
							if (snapshot.val().isAdminRead != null) {
								//if (keyseenAdmin == "") {
								if (snapshot.ref_.key) {
									keyseenAdmin = snapshot.ref_.key;
									//console.log("keyseenAdmin", keyseenAdmin);
									listenForMeChange(name, index);
								}
								//}
								console.log("keyseenAdmin", keyseenAdmin);
								if (snapshot.val().isAdminRead == false) {
									swapToReadFirst(name,index);
									setUnreadForClient(name);
								} else {
									setReadForClient(name);
								}
								// snapshot.val().isAdminRead == false && function () { swapToReadFirst(index) }();
								// snapshot.val().isAdminRead == false ? setUnreadForClient(name) : setReadForClient(name);
							} else if (snapshot.val().isClientRead != null) {
								//console.log("value seen client", snapshot.val());
								if (snapshot.ref_.key) {
									keyseenClient = snapshot.ref_.key;
									listenForReadChange();
									console.log("keyseenClient", keyseenClient);
								}
								snapshot.val().isClientRead == true && messageSeen();
							}
							//snapshot.node_.value_ ? setReadForClient(id) : setUnReadForClient(id);
						}
					}
				});
			}
			catch (error) {
				console.error("listen for read error", error);
			}
		}

		function listenForMeChange(name, index) {
			//console.log("listenForMeChange", name);
			database.ref(name + "read/" + keyseenAdmin).off('child_changed');
			database.ref(name + "read/" + keyseenAdmin).on('child_changed', function (snapshot) {
				//để lấy các property của message gửi veef
				// snapshot.val().property_của object
				if (snapshot) {
					//console.log("listen for me seen client", name, snapshot, snapshot.val());
					if (snapshot.val() == false) {
						swapToReadFirst(name,index);
						setUnreadForClient(name);
					} else {
						setReadForClient(name);
					}
					// if (snapshot.val()) {
					// 	console.log("listen for me seen", snapshot.val().isAdminRead, "name", name);
					// 	for (let elem in snapshot.val()) {
					// 		if (elem.startsWith("admin")) {
					// 			if (snapshot.val().isAdminRead != null) {
					// 				snapshot.val().isAdminRead == false && function () { swapToReadFirst(index) }();
					// 				snapshot.val().isAdminRead == false ? setUnreadForClient(name) : setReadForClient(name);
					// 			}
					// 		}
					// 	}
					// 	//snapshot.node_.value_ ? setReadForClient(id) : setUnReadForClient(id);
					// }
				}
			});
		}

		function listenForOnlineClientOnOff(input) {
			let name = input.name;
			//console.log("listen onoff for client", name);
			try {
				database.ref(name + "isOnline").once('value', function (snapshot) {
					if (snapshot) {
						if (snapshot.val()) {
							//console.log("client once", name, snapshot, snapshot.val());
							for (let elem in snapshot.val()) {
								//console.log("client", name, "'s status is", snapshot.val()[elem].status);
								if (snapshot.val()[elem].status) {
									setOnLineForClient(name);
									//input.unreadCount++;
								} else {
									//input.unreadCount--;
									if (snapshot.val()[elem].count === 0) {
										setOfflineForClient(name);
									}
								}
							}
						} else {
							//console.log("client " + name + " val null but snapshot ", snapshot);
						}
					}
				});
				database.ref(name + "isOnline").off('child_changed');
				database.ref(name + "isOnline").on('child_changed', function (snapshot) {
					if (snapshot) {
						if (snapshot.val()) {
							//console.log("client change", name, snapshot);
							if (snapshot.val().status) {
								setOnLineForClient(name);
								//input.unreadCount++;
								//console.log("online count", input.unreadCount, name);
							} else {
								//input.unreadCount--;
								//console.log("offline count", name);
								if (snapshot.val().count === 0) {
									//console.log("snapshot.val().count == 0");
									setOfflineForClient(name);
								}
							}
						}
					}
				});
			}
			catch (error) {
				console.error("listen for client OnOff error", error);
			}
		}

		function setReadForClient(name) {
			//console.log("setReadForClient", name);
			let readClient = document.getElementById("recentchat_" + name);
			if (readClient) {
				readClient.style.display = "none";
			}
			countUnread > 0 && countUnread--;
			console.log("read", name, countUnread);
			if (countUnread == 0) {
				pageTitleNotification.Off();
			}
			document.getElementById(name + "unread") && function () { document.getElementById(name + "unread").style.display = "none" }();
		}

		function setUnreadMessSmall(name,mess) {
			if (countUnread > 0) {
				let readClient = document.getElementById("recentchat_" + name);
				if(readClient){
				//readClient.innerHTML = mess != null ? "Tin nhắn: " + mess : "Tin nhắn chưa đọc";
				readClient.innerHTML = mess != null ? "Tin nhắn chưa đọc" : "Tin nhắn chưa đọc";
				   }
			}
		}

		function setUnreadForClient(name) {
			console.log("setUnreadForClient", name,"countread", countUnread);
			countUnread++;
			// if(unReadTimeout != null){
			// 	clearTimeout(unReadTimeout);
			// }
			// if (readClient) {
			// 	unReadTimeout = setTimeout(function(){
			// 		readClient.innerHTML = "Tin nhắn: " + currentMess;
			// 	},1000);
			// }
			//console.log("unread", name, countUnread);
			pageTitleNotification.On("Có tin nhắn");
			document.getElementById(name + "unread") && function () { document.getElementById(name + "unread").style.display = "block"; setUnreadMessSmall(name,currentMess) }();
		}

		function setMessaUnseen() {
			let readClient = document.getElementById("recentchat_" + name);
			if (readClient) {
				readClient.innerHTML = currentMess;
				readClient.style.display = "block";
			}
		}

		function setOnLineForClient(name) {
			let tName = name + "status";
			//console.log("setOnlineForClient", name);
			document.getElementById(tName) && function () { console.log("SetOnlineForClient for client", name); document.getElementById(tName).style.background = "green" }();
		}

		function setOfflineForClient(name) {
			let tName = name + "status";
			//console.log("setOfflineForClient", name);
			document.getElementById(tName) && function () { console.log("SetOfflineForClient for client", name); document.getElementById(tName).style.background = "grey" }();
		}

		function deleteMesssageDatabase() {

		}

		function doNothing() {

		}

		function prepareTime(time){
			let tempTime = new Date(time);
			let currentTime = new Date();
			let month = [0,"Tháng 1","Tháng 2","Tháng 3","Tháng 4","Tháng 5","Tháng 6","Tháng 7","Tháng 8","Tháng 9","Tháng 10","Tháng 11","Tháng 12"];
			let dayInWeek = ["Thứ hai","Thứ ba","Thứ tư","Thứ năm","Thứ sáu","Thứ bảy","Chủ nhật"];
			if(isSameDay(tempTime,currentTime)){
			   	return addZeroIfSmallerThanZeroo(tempTime.getHours()) + ":" + addZeroIfSmallerThanZeroo(tempTime.getMinutes());
			   } else if(isSameWeek(tempTime,currentTime)){
						 return dayInWeek(tempTime.getDay()) + ", " + addZeroIfSmallerThanZeroo(tempTime.getHours()) + ":" + addZeroIfSmallerThanZeroo(tempTime.getMinutes()) + " " + tempTime.getDate();
						 } else if(isSameYear(tempTime,currentTime)){
								   return addZeroIfSmallerThanZeroo(tempTime.getHours()) + ":" + addZeroIfSmallerThanZeroo(tempTime.getMinutes()) + " " + tempTime.getDate() + " " + month[tempTime.getMonth() + 1];
								   }else{
							 return addZeroIfSmallerThanZeroo(tempTime.getHours()) + ":" + addZeroIfSmallerThanZeroo(tempTime.getMinutes()) + " " + tempTime.getDate() + " " + month[tempTime.getMonth() + 1] + " " + tempTime.getFullYear();
						 }
			
		}
		
		function addZeroIfSmallerThanZeroo(number){
			return number < 10 ? "0"+number : number;
		}
		
		function isSameDay(first,second){
				   return first.getDate() == second.getDate() && first.getMonth() == second.getMonth() && first.getFullYear() == second.getFullYear();
			   }
			
			function isSameWeek(first,second){
				let weekTime = 7*24*60*60*1000;
				   return second.getTime() - first.getTime() <= weekTime;
			   }
			
			function isSameYear(first,second){
				   return first.getFullYear() == second.getFullYear();
			   }
			
		function createDivChatClient(data,time) {
			//console.log("sinh ra div", data);
			let divOutSide = document.createElement("div");
			divOutSide.className = "divAdmin";

			let divAvatar = document.createElement("div");
			divAvatar.className = "divAdminImage";

			let img = document.createElement("img"); 
			img.src = "http://admin.sundayq.com/wp-content/uploads/2020/11/user.png"; 
			divAvatar.appendChild(img);
			
			let divAdminRightDetail = document.createElement("div");
			divAdminRightDetail.className = "divAdminRightDetail";

			let divAdminRightDetailNameUser = document.createElement("span");
			divAdminRightDetailNameUser.className = "divAdminRightDetailNameUser";
			divAdminRightDetailNameUser.innerHTML = id;

			let divInSide = document.createElement("div");
			divInSide.className = "detailAdmin";

			let divTime = document.createElement("div");
			divTime.className = "detailAdminTime";
			let tTime = prepareTime(time);
			divTime.innerHTML = tTime == null ? "" : tTime;
			
			// let icon = document.createElement("i");
			// icon.className = "fa fa-address-book-o";
			// icon["aria-hidden"] = "true";

			let content = document.createElement("span");
			content.innerHTML = data;

			divInSide.appendChild(content);
			divInSide.appendChild(divTime);
			divAdminRightDetail.appendChild(divAdminRightDetailNameUser);
			divAdminRightDetail.appendChild(divInSide);
			divOutSide.appendChild(divAvatar);
			divOutSide.appendChild(divAdminRightDetail);
			return divOutSide;
		}

		function createDivChatAdmin(data, id) {
			keyRead = id;
			let divOutSide = document.createElement("div");
			divOutSide.className = "divClient";
			divOutSide.id = "divClient_" + id;

			let divInSide = document.createElement("div");
			divInSide.className = "detailClient";

			// let icon = document.createElement("i");
			// icon.className = "fa fa-user-o";
			// icon["aria-hidden"] = "true";

			let content = document.createElement("span");
			content.innerHTML = data;

			divInSide.appendChild(content);
			//divInSide.appendChild(icon);
			divOutSide.appendChild(divInSide);

			return divOutSide;
		}

		function updateStatus(status) {
			document.getElementById("statusApp").innerHTML = status;
		}

		function showLoading() {
			document.getElementById("divLoading").style.display = "block";
			document.getElementById("divDetailChat").style.display = "none";
			document.getElementById("divMessage").style.display = "none";
			document.getElementById("divListUser").style.display = "none";
			document.getElementById("divDetailChat").style.display = "none";
		}


		function hideLoading() {
			document.getElementById("divLoading").style.display = "none";
			document.getElementById("divDetailChat").style.display = "block";
			document.getElementById("divMessage").style.display = "block";
			document.getElementById("divListUser").style.display = "block";
			document.getElementById("divDetailChat").style.display = "flex";
			document.getElementById("homeMiddle").style.minHeight = "500px";
			if(isScroll == false){
			window.scrollTo({
			  top: document.getElementById('content').offsetTop,
			  left: 100,
			  behavior: 'smooth'
			});
		isScroll = true;
		}
		}

		function swapToReadFirst(name,index) {
			console.log("swapToReadFirst", name,"index",index);
			// let firstItem = listUser[index];

			// let indexRemove = 0;
			// listUser.some((item, index) => {
			// 	if (item.name == firstItem.name) {
			// 		indexRemove = index;
			// 		return true;
			// 	}
			// });
			// console.log("index remove", indexRemove);
			// listUser.splice(indexRemove, 1);
			// console.log(index, "firstItem", firstItem);
			// console.log("after shift", listUser);
			// listUser.unshift(firstItem);
			// console.log("listUser", listUser);


			let indexRemove = 0;
			listUser.some((item, indexi) => {
				if (item.name == name) {
					indexRemove = indexi;
					return true;
				}
			});

			let firstItem = listUser[indexRemove];
			//console.log("index remove", indexRemove,"is",firstItem);
			listUser.splice(indexRemove, 1);
			//console.log("index remove",index, "is", firstItem);
			//console.log("after shift", listUser);
			listUser.unshift(firstItem);
			//console.log("listUser", listUser);

			justCreateList();
		}

		function listUserIsEmpty() {
			let parent = document.getElementById("divListUser");
			parent.innerHTML = "";
			parent.appendChild(noUserHaveChat());
		}

		function prepareListUser() {
			let parent = document.getElementById("divListUser");
			parent.innerHTML = "";console.log("prepareListUser",listUser);
			listUser.forEach((item, index) => {
				let insideUser = createUserItem(item, index);
				parent.appendChild(insideUser);
				//listenForMe(item, index);
				listenForOnlineClientOnOff(item);
			});
			listUser.forEach((item, index) => {
				//let insideUser = createUserItem(item);
				//console.log("create list user ",insideUser);
				//parent.appendChild(insideUser);
				listenForMe(item, index);
				//listenForOnlineClientOnOff(item);
			});
		}

		function justCreateList() {
			let parent = document.getElementById("divListUser");
			parent.innerHTML = "";
			listUser.forEach((item, index) => {
				let insideUser = createUserItem(item, index);
				//console.log("justCreateList", insideUser);
				parent.appendChild(insideUser);
			});
		}

		function noUserHaveChat() {
			let divOutSide = document.createElement("div");
			divOutSide.className = "divAdmin";

			let divInSide = document.createElement("div");
			divInSide.className = "detailUser";
			divInSide.innerHTML = "Không có tin nhắn";

			divOutSide.appendChild(divInSide);
			return divOutSide;
		}

		function createUserItem(data, index) {
			let divOutSide = document.createElement("div");
			divOutSide.className = "divAdmin";
			divOutSide.id = "client_" + data.name;

			let divInSide = document.createElement("div");
			divInSide.className = "detailUser";

			// let icon = document.createElement("i");
			// icon.className = "fa fa-address-book-o";
			// icon["aria-hidden"] = "true";

			let divAvatar = document.createElement("div");
			divAvatar.className = "detailUserAvatar";

			let img = document.createElement("img");
			img.src = "http://admin.sundayq.com/wp-content/uploads/2020/11/user.png";
			divAvatar.appendChild(img);
			
			let divInfo = document.createElement("div");
			divInfo.className = "detailUserInfo";

			let content = document.createElement("span");
			content.className = "detailUserName";
			content.innerHTML = data.name;

			let newMess = document.createElement("span");
			newMess.className = "detailUserRecentChat";
			newMess.id = "recentchat_" + data.name;

			let divOnline = document.createElement("div");
			divOnline.className = "divStatusClient";
			divOnline.id = data.name + "status";

			let divUnRead = document.createElement("div");
			divUnRead.className = "divRemainChatClient";
			divUnRead.id = data.name + "unread";

			divOutSide.addEventListener("click", function () {
				chatwithClient(data.name, index);
				serverChooseClient();
			});

			//divInSide.appendChild(icon);
			divInfo.appendChild(content);
			divInfo.appendChild(newMess);
			divInSide.appendChild(divAvatar);
			divInSide.appendChild(divInfo);
			divOutSide.appendChild(divInSide);
			divOutSide.appendChild(divOnline);
			divOutSide.appendChild(divUnRead);

			return divOutSide;
		}

		function messageSeen() {
			let readd = document.getElementById("divClient_" + keyRead);
			if (readd) {
				let statusReadChild = readd.getElementsByClassName("statusRead")[0];
				statusReadChild && statusReadChild.remove();

				let divReadd = document.createElement("div");
				divReadd.className = "statusRead";
				divReadd.id = "seen_" + keyRead;
				let spanReadd = document.createElement("span");
				spanReadd.innerHTML = "Đã xem";

				divReadd.appendChild(spanReadd);
				readd.appendChild(divReadd);
			}
		}

		function unSeen() {
			document.getElementById("seen_" + keyRead) && document.getElementById("seen_" + keyRead).remove();
		}

		function serverChooseClient() {
			showLoading();
			document.getElementById("listMessage").innerHTML = "";
			//getAllDataBase();
			listenFromDatabase();
			listenForRead();
		}

		function chatwithClient(data, index) {
			console.log("chatwithClient",data);
			userCurrent = data;
			document.getElementById("usercurrent").innerHTML = "Tin nhắn với user " + data;
			id = data.includes("@") ? data.substring(0, data.indexOf("@")) : data;
			currentIndex = index;
			let tempId = "client_" + data;
			//console.log(document.getElementById(tempId));
			if (document.getElementById(tempId)) {
				//console.log("sodo");
				document.getElementById(tempId).classList.add("selectingUser");
			}

			listUser.forEach(item => {
				let tempIdd = "client_" + data;
				document.getElementById(tempIdd) && document.getElementById(tempIdd).classList.remove("selectingUser");
			});
		}

		window.addEventListener('online', () => isOnlineStatus(true, null, true));
		window.addEventListener('offline', () => isOnlineStatus(false, null, true));
		//window.addEventListener('focus', () => pageTitleNotification.Off());
		window.addEventListener("beforeunload", function (e) {
			isOnlineStatus(false, null, true);
			return;
		});

		var pageTitleNotification = {
			vars: {
				originalTitle: document.title,
				interval: null
			},
			On: function (notification, intervalSpeed) {
				if (this.vars.interval) {
					clearInterval(this.vars.interval);
				}
				var _this = this;
				_this.vars.interval = setInterval(function () {
					document.title = (_this.vars.originalTitle == document.title)
						? notification
						: _this.vars.originalTitle;
				}, (intervalSpeed) ? intervalSpeed : 1500);
			},
			Off: function () {
				if (this.vars.interval) {
					clearInterval(this.vars.interval);
				}
				document.title = this.vars.originalTitle;
			}
		}

		function scrollBottom(id) {
			let objDiv = document.getElementById(id);
			objDiv.scrollTop = objDiv.scrollHeight;
		}

		function fromEmailToName(name) {
			return name.substring(0, name.indexOf("@"));
		}

		function checkOnBoarding() {
			let keyboard = localStorage.getItem("boarding");
			return keyboard ? true : false;
		}

	</script>