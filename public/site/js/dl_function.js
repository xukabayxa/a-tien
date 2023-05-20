
$(document).on('click', '.add_to_cart_detail', function(e) {	
	e.preventDefault();		

	$('#quickview').modal('hide');
	var $this = $(this);
	var form = $this.parents('form');	
	console.log(form.serialize());
	$.ajax({
		type: 'POST',
		url: "/cart/add.js",
		async: false,
		data: form.serialize(),
		dataType: 'json',
		error: addToCartFail,
		beforeSend: function() {  
		},
		success: addToCartSuccess,
		cache: false
	});
});
var GLOBAL = {
	common : {
		init: function(){
			//$('.add_to_cart').bind( 'click', addToCart );
		}
	},

	templateIndex : {
		init: function(){

		}
	},

	templateProduct : {
		init: function(){

		}
	},

	templateCart : {
		init: function(){

		}
	}

}
var UTIL = {
	fire : function(func,funcname, args){
		var namespace = GLOBAL;
		funcname = (funcname === undefined) ? 'init' : funcname;
		if (func !== '' && namespace[func] && typeof namespace[func][funcname] == 'function'){
			namespace[func][funcname](args);
		}
	},

	loadEvents : function(){
		var bodyId = document.body.id;

		// hit up common first.
		UTIL.fire('common');

		// do all the classes too.
		$.each(document.body.className.split(/\s+/),function(i,classnm){
			UTIL.fire(classnm);
			UTIL.fire(classnm,bodyId);
		});
	}

};
$(document).ready(UTIL.loadEvents);
/**
 * Ajaxy add-to-cart
 */
Number.prototype.formatMoney = function(c, d, t){
	var n = this, 
			c = isNaN(c = Math.abs(c)) ? 2 : c, 
			d = d == undefined ? "." : d, 
			t = t == undefined ? "." : t, 
			s = n < 0 ? "-" : "", 
			i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
			j = (j = i.length) > 3 ? j % 3 : 0;
	return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};
function addToCart(e){
	$('.tooltip').remove();
	if (typeof e !== 'undefined') e.preventDefault();
	var $this = $(this);
	var form = $this.parents('form');	

	$.ajax({
		type: 'POST',
		url: '/cart/add.js',
		async: false,
		data: form.serialize(),
		dataType: 'json',
		error: addToCartFail,
		beforeSend: function() {  
		},
		success: addToCartSuccess,
		cache: false
	});
}



function addToCartSuccess (jqXHR, textStatus, errorThrown){
	$.ajax({
		type: 'GET',
		url: '/cart.js',
		async: false,
		cache: false,
		dataType: 'json',
		success: function (cart){
			dl_hidePopup('.loading');
			$('#popupCartModal').html('');		
			console.log(jqXHR)
			if(jqXHR['image'] == null){
				var src = "https://hstatic.net/0/0/global/noDefaultImage6_large.gif";
			}else{
				var src = Haravan.resizeImage(jqXHR['image'], 'small');
			}

			var $popupMobile = '<div class="popup_overlay"></div>'
			+'<div class="modal-dialog">'

			+'<div class="modal-content">'
			+ '<button type="button" class="close flyclose" onclick="dl_flytocart();" data-dismiss="modal" data-backdrop="false" aria-label="Close" style="position: relative; z-index: 9;"><span aria-hidden="true">×</span></button>'
			+ '<div class="row row-noGutter"><div class="modal-left">'
			+ '<h3 class="title"><i class="fa fa-check-square-o"></i> Sản phẩm này vừa được thêm vào giỏ hàng</h3>'

			+ '<div class="modal-body"><div class="media"><div class="media-left"><div class="thumb-1x1">'
			+ '<img src="'+ src +'" alt="'+ jqXHR['title'] +'"></div></div>'
			+ '<div class="media-body"><div class="product-title"><a data-id="'+ jqXHR['id'] +'" href="'+ jqXHR['url'] +'" title="'+ jqXHR['title'] +'">'+ jqXHR['title'] +'</a></div>'
			+ '<div class="qty">Số lượng: <span>'+jqXHR['quantity'] +'</span></div>'
			+ '<div class="product-new-price">Giá: <span>' + Haravan.formatMoney(jqXHR['price'], "{{amount_no_decimals_with_comma_separator}}₫") + '</span></div></div></div>'
			+ '</div>'
			+ '</div>'
			+ '<div class="modal-right">'

			+ '<h3 class="title"><a href="/cart"><i class="fa fa-caret-right"></i> Giỏ hàng của bạn <i>(<b class="cart-popup-count"></b>)</i> sản phẩm </a></h3>'
			+ '<div class="total_price hidden"><span>Tổng tiền: </span> <span class="">' + Haravan.formatMoney(cart.total_price, "{{amount_no_decimals_with_comma_separator}}₫") + '</span></div>'
			+ '<a href="/checkout" class="btn btn-block btn-red btn-full">Tiến hành thanh toán</a>'
			+ '</div>'
			+ '</div></div>';
			$('#popupCartModal').html($popupMobile);
			
			
			
			$.ajax({
url: '/products/'+ jqXHR['handle'] +'?view=vi_title',
success: function(data){
$('.product-title a[data-id="'+ jqXHR['id'] +'"]').html(data.split('####')[0]);
}
})
			
			
			$('#popupCartModal').modal(); 	
			Haravan.updateCartFromForm(cart, '.top-cart-content .mini-products-list');
			Haravan.updateCartPopupForm(cart, '#popup-cart-desktop .tbody-popup');
		}
	});







}
function addToCartFail(jqXHR, textStatus, errorThrown){
	var response = $.parseJSON(jqXHR.responseText);
	var $info = '<div class="error">'+ response.description +'</div>';
}
$(document).on('click', ".remove-item-cart", function () {
	var variantId = $(this).attr('data-id');
	removeItemCart(variantId);
});
$(document).on('click', ".items-count", function () {
	$(this).parent().children('.items-count').prop('disabled', true);
	var thisBtn = $(this);
	var variantId = $(this).parent().find('.variantID').val();
	var qty =  $(this).parent().children('.number-sidebar').val();
	updateQuantity(qty, variantId);
});
$(document).on('change', ".number-sidebar", function () {
	var variantId = $(this).parent().children('.variantID').val();
	var qty =  $(this).val();

	updateQuantity(qty, variantId);
});
function updateQuantity (qty, variantId){
	var variantIdUpdate = variantId;

	$.ajax({
		type: "POST",
		url: "/cart/update.js",
		data: 'quantity='+qty+'&id=' + variantId,

		dataType: "json",
		success: function (cart, variantId) {

			Haravan.onCartUpdateClick(cart, variantIdUpdate);
			//Haravan.updateCartFromForm(cart, '.top-cart-content .mini-products-list');
		},
		error: function (qty, variantId) {
			Haravan.onError(qty, variantId)
		}
	})
}
function removeItemCart (variantId){
	var variantIdRemove = variantId;
	console.log('quantity=0&line=' + variantId);
	$.ajax({
		type: "POST",
		url: "/cart/update.js",
		data: 'quantity=0&id=' + variantId,

		dataType: "json",
		success: function (cart, variantId) {
			Haravan.onCartRemoveClick(cart, variantIdRemove);

			$('.productid-'+variantIdRemove).remove();
			if($('.tbody-popup>div').length == '0' ){
				$('#popup-cart').modal('hide');
			}
			if($('.list-item-cart>li').length == '0' ){
				$('.mini-products-list').html('<div class="no-item"><p>Không có sản phẩm nào trong giỏ hàng.</p></div>');
			}
			if($('.cart-tbody>div').length == '0' ){
				$('.bg-cart-page').remove();
				$('.page_cart').html('');
				$('.bg-cart-page-mobile').remove();
				jQuery('<div class="bg-cart-page" style="min-height: auto"><p>Không có sản phẩm nào trong giỏ hàng. Quay lại <a href="/">cửa hàng</a> để tiếp tục mua sắm.</p></div>').appendTo('.cart');
			}
		},
		error: function (variantId, r) {
			Haravan.onError(variantId, r)
		}
	})
}

function dl_flytocart(e){
	if($(window).width() > 1200){
		var cart = $('.heading-cart');
		var imgtodrag = $('#popupCartModal .media .thumb-1x1');
		if (imgtodrag) {
			var imgclone = imgtodrag.clone()
			.offset({
				top: imgtodrag.offset().top,
				left: imgtodrag.offset().left
			})
			.css({
				'opacity': '0.5',
				'position': 'absolute',
				'height': '150px',
				'width': '150px',
				'z-index': '100'
			})
			.appendTo($('body'))
			.animate({
				'top': cart.offset().top + 10,
				'left': cart.offset().left + 10,
				'width': 75,
				'height': 75
			}, 1000, 'easeInOutExpo');

			setTimeout(function () {
				cart.effect("shake", {
					times: 2
				}, 200);
			}, 1500);

			imgclone.animate({
				'width': 0,
				'height': 0
			}, function () {
				$(this).detach()
			});
		}

		$('html, body').animate({
			scrollTop: $('header').offset().top
		}, 500);
	}
}

