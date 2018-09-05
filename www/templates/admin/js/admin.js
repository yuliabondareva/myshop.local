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
Добавление новой категории
*/

function newCategory(){
	var postData = getData('#blockNewCategory');

	$.ajax({
		type: 'POST',
		url: "/myshop.local/www/?controller=admin&action=addnewcat",
		data: postData,
		dataType: 'json',
		success: function(data){
			if(data['success']){
				alert(data['message']);
				$('#newCategoryName').val('');
			} else {
				alert(data['message']);
			}
		}

	});
}

/*
Обновление данных категории
*/

function updateCat(itemId){
	var parentId = $('#parentId_' + itemId).val();
	var newName = $('#itemName_' + itemId).val();
	var postData = {itemId: itemId, parentId: parentId, newName: newName};

	$.ajax({
		type: 'POST',
		url: "/myshop.local/www/?controller=admin&action=updatecategory",
		data: postData,
		dataType: 'json',
		success: function(data){
			alert(data['message']);
		}
	});
}

/*
Добавление нового продукта
*/

function addProduct(){
	var itemName = $('#newItemName').val();
	var itemPrice = $('#newItemPrice').val();
	var itemCatId = $('#newItemCatId').val();
	var itemDesc = $('#newItemDesc').val();

	var postData = {itemName: itemName,
					itemPrice: itemPrice,
					itemCatId: itemCatId,
					itemDesc: itemDesc};

		$.ajax({
			type: 'POST',
			url: "/myshop.local/www/?controller=admin&action=addproduct",
			data: postData,
			dataType: 'json',
			success: function(data){
				alert(data['message']);
				if(data['success']){
					$('#newItemName').val('');
					$('#newItemPrice').val('');
					$('#newItemCatId').val('');
					$('#newItemDesc').val('');
				}
			}
		});
}

/*
Изменение данных продукта
*/

function updateProduct(itemId){
	var itemName = $('#itemName_' + itemId).val();
	var itemPrice = $('#itemPrice_' + itemId).val();
	var itemCatId = $('#itemCatId_' + itemId).val();
	var itemDesc = $('#itemDesc_' + itemId).val();
	var itemStatus = $('#itemStatus_' + itemId).prop('checked');

	if (! itemStatus) {
		itemStatus = 1;
	} else {
		itemStatus = 0;
	}

	var postData = {itemId: itemId,
					itemName: itemName,
					itemPrice: itemPrice,
					itemCatId: itemCatId,
					itemDesc: itemDesc,
					itemStatus: itemStatus};

		$.ajax({
			type: 'POST',
			url: "/myshop.local/www/?controller=admin&action=updateproduct",
			data: postData,
			dataType: 'json',
			success: function(data){
				alert(data['message']);
			}
		});
}

function showProducts(id){
	var objName = "#purchasesForOrderId_" + id;
	if ($(objName).css('display') != 'table-row'){
		$(objName).show();
	} else {
		$(objName).hide();
	}
}

/*
Изменение статуса заказа
*/

function updateOrderStatus(itemId){
	var status = $('#itemStatus_' + itemId).prop('checked');
	if(! status){
		status = 0
	} else {
		status = 1
	}

	var postData = {itemId: itemId, 
					status: status};
	$.ajax({
		type: 'POST',
		url: "/myshop.local/www/?controller=admin&action=setorderstatus",
		data: postData,
		dataType: 'json',
		success: function(data){
			if(! data['success']){
				alert(data['message']);
			}
		}
	});
}

/*
Изменение информации об оплате заказа
*/
function updateDatePayment(itemId){
	var datePayment = $('#datePayment_' + itemId).val();
	var postData = {itemId: itemId, 
					datePayment: datePayment};
	$.ajax({
		type: 'POST',
		url: "/myshop.local/www/?controller=admin&action=setorderdatepayment",
		data: postData,
		dataType: 'json',
		success: function(data){
			if(! data['success']){
				alert(data['message']);
			}
		}
	});
}

/*
Разлогинивание админа
*/

function logoutadmin() {
    $.ajax({
        type: 'POST',
        url: '/myshop.local/www/?controller=admin&action=logoutadmin',
        success: function() {
            $('#adminBox').hide();
            $('#loginBox').show();

            $('#leftMenu').hide();
        }
    });
}

/*
Авторизация админа
*/

function loginadmin() {
	var email = $('#loginEmail').val();
	var pwd = $('#loginPwd').val();

	var postData = "&email=" + email + "&pwd=" + pwd;

	$.ajax({
        type: 'POST',
        url: '/myshop.local/www/?controller=admin&action=loginadmin',
        data: postData,
        dataType: 'json',
        success: function(data) {
 			if(data['success']){
	            $('#loginBox').hide();
				$('#leftMenu').show();
				
            	$('#adminLink').html(data['displayName']);
				$('#adminLink').attr('href', '/myshop.local/www/?controller=admin');
				$('#adminBox').show();

				
            } else {
            	alert(data['message']);
            }
        }
    });
}