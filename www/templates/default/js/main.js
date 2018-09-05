/*
Функция добавления товара в корзину
*/

function addToCart(itemId){
	console.log("js - addToCart()");
	$.ajax({
		type: 'POST',
		async: false,
		url: "/myshop.local/www/?controller=cart&action=addtocart&id=" + itemId + '/',
		dataType: 'json',
		success: function(data){
			if (data['success']){
				$('#cartCntItems').html(data['cntItems']);

				$('#addCart_' + itemId).hide();
				$('#removeCart_' + itemId).show();
				}
		}
	});
}

/*
Функция удаления товара из корзины
*/

function removeFromCart(itemId) {
	$.ajax({
		type: 'POST',
		async: false,
		url: "/myshop.local/www/?controller=cart&action=removefromcart&id=" + itemId + '/',
		dataType: 'json',
		success: function(data){
			if (data['success']){
				$('#cartCntItems').html(data['cntItems']);

				$('#addCart_' + itemId).show();
				$('#removeCart_' + itemId).hide();
				}
		}
	});
}

/*
Подсчет стоимости купленного товара
*/

function conversionPrice(itemId){
	var newCnt = $('#itemCnt_' + itemId).val();
	var itemPrice = $('#itemPrice_' + itemId).attr('value');
	var itemRealPrice = newCnt * itemPrice;

	$('#itemRealPrice_'+ itemId).html(itemRealPrice);
}


/*
получение данных с формы
*/

function getData(obj_form){
	var hData = {};
	$('input, textarea, select', obj_form).each(function(){
		if(this.name && this.name!=''){
			hData[this.name] = this.value;
			console.log('hData[' + this.name + ']=' + hData[this.name]);
		}
	});
	return hData;
};


/*
Регистрация нового пользователя
*/

function registerNewUser(){
	var postData = getData('#registerBox');

	$.ajax({
		type: 'POST',
		//async: false,
		url: "/myshop.local/www/?controller=user&action=register",
		data: postData,
		dataType: 'json',
		success: function(data){
			if(data['success']){
				alert('Регистрация прошла успешно');

				//левая колонка
				$('#registerBox').hide();

				$('#userLink').html(data['userName']);
				$('#userLink').attr('href', '/myshop.local/www/?controller=user');
				$('#userBox').show();

				//страница заказа
				$('#loginBox').hide();
				$('#btnSaveOrder').show();

			} else {
				alert(data['message']);
			}
		}
	});
}

function logout() {
    $.ajax({
        type: 'POST',
        url: '/myshop.local/www/?controller=user&action=logout',
        success: function() {
            $('#registerBox').show();
            $('#userBox').hide();
        }
    });
}

/*
Авторизация пользователя
*/

function login() {
	var email = $('#loginEmail').val();
	var pwd = $('#loginPwd').val();

	var postData = "&email=" + email + "&pwd=" + pwd;

	$.ajax({
        type: 'POST',
        url: '/myshop.local/www/?controller=user&action=login',
        data: postData,
        dataType: 'json',
        success: function(data) {
 			if(data['success']){
	            $('#registerBox').hide();
	            $('#loginBox').hide();

            	$('#userLink').html(data['displayName']);
				$('#userLink').attr('href', '/myshop.local/www/?controller=user');
				$('#userBox').show();

				//заполняем поля на странице заказа
				$('#name').val(data['name']);
				$('#phone').val(data['phone']);
				$('#adress').val(data['adress']);

				$('#btnSaveOrder').show();
            } else {
            	alert(data['message']);
            }
        }
    });
}

function showRegisterBox(){
	if( $("#registerBoxHidden").css('display') != 'block'){
		$("#registerBoxHidden").show();
	} else {
		$("#registerBoxHidden").hide();
	}
}

/*
Обновление данных пользователя
*/

function updateUserData(){

	var phone = $('#newPhone').val();
	var adress = $('#newAdress').val();
	var pwd1 = $('#newPwd1').val();
	var pwd2 = $('#newPwd2').val();
	var curPwd = $('#curPwd').val();
	var name = $('#newName').val();

	var postData = {phone: phone,
					adress: adress,
					pwd1: pwd1,
					pwd2: pwd2,
					curPwd: curPwd,
					name: name};

	$.ajax({
		type:'POST',
		url:"/myshop.local/www/?controller=user&action=update",
		data: postData,
		dataType: 'json',
		success: function(data){
			if(data['success']){
				$('#userLink').html(data['userName']);
				alert(data['message']);
			} else {
				alert(data['message']);
			}
		}
	});
}

function saveOrder(){
	var postData = getData('form');
	$.ajax({
		type: 'POST',
		url: "/myshop.local/www/?controller=cart&action=saveorder",
		data: postData,
		dataType: 'json',
		success: function(data){
			if(data['success']){
				alert(data['message']);
				document.location = '/myshop.local/www/index.php';
			} else {
				alert(data['message']);
			}
		}
	});
}

/*
Показывать или прятать данные о заказе
*/

function showProducts(id){
	var objName = "#purchasesForOrderId_" + id;
	if ($(objName).css('display') != 'table-row'){
		$(objName).show();
	} else {
		$(objName).hide();
	}
}
