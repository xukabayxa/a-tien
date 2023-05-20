var selectCallback = function(variant, selector) {
	if (variant) {
		$('.details-product .form-detail-action .iwishAddWrapper').attr('data-variant',variant.id);
		var form = jQuery('#' + selector.domIdPrefix).closest('form');

		for (var i=0,length=variant.options.length; i<length; i++) {

			var radioButton = form.find('.swatch[data-option-index="' + i + '"] :radio[value="' + variant.options[i] +'"]');

			if (radioButton.size()) {
				radioButton.get(0).checked = true;
			}
		}
	}
	var addToCart = jQuery('.form-product .btn-cart'),
		masp = jQuery('.masp'),
		form = jQuery('.form-product .form-groupx'),
		productPrice = jQuery('.details-pro .special-price .product-price'),
		qty = jQuery('.details-pro .inventory'),
		wishlist = jQuery('.details-pro .iwishAddWrapper'),
		comparePrice = jQuery('.details-pro .old-price');

	if(variant && variant.sku && variant.sku != null)
	{
		masp.text(variant.sku);
	}else{
		masp.text('Đang cập nhật');
	}

	
	if (variant && variant.available) {
		if(variant.price == 0){
			qty.html('<span>Liên hệ</span>');
		}else{
			qty.html('<span>Còn hàng</span>');
		}

		addToCart.html('Thêm vào giỏ hàng').removeAttr('disabled');
		if(variant.price == 0){
			productPrice.html('Liên hệ');
			comparePrice.hide();
			form.addClass('hidden');
			wishlist.addClass('btn-full');
		}else{
			wishlist.removeClass('btn-full');
			form.removeClass('hidden');
			productPrice.html(Haravan.formatMoney(variant.price, "{{amount_no_decimals_with_comma_separator}}₫"));
			// Also update and show the product's compare price if necessary
			if ( variant.compare_at_price > variant.price ) {
				var pt = ((variant.compare_at_price - variant.price))/variant.compare_at_price * 100;
				comparePrice.html('Giá gốc: <del class="price product-price-old" >' + Haravan.formatMoney(variant.compare_at_price, "{{amount_no_decimals_with_comma_separator}}₫") + '</del> <span class="discount">(-'+ Math.ceil(pt) +'%)</span>').show();
			} else {
				comparePrice.hide();
			}
		}

	} else {
		if(variant.price == 0){
			qty.html('<span>Liên hệ</span>');
		}else{
			qty.html('<span>Hết hàng</span>');
		}
		
		addToCart.text('Hết hàng').attr('disabled', 'disabled');
		if(variant){
			if(variant.price != 0){
				form.removeClass('hidden');
				wishlist.removeClass('btn-full');
				productPrice.html(Haravan.formatMoney(variant.price, "{{amount_no_decimals_with_comma_separator}}₫"));
				// Also update and show the product's compare price if necessary
				if ( variant.compare_at_price > variant.price ) {
					comparePrice.html('Giá gốc: <del class="price product-price-old" >' + Haravan.formatMoney(variant.compare_at_price, "{{amount_no_decimals_with_comma_separator}}₫") + '</del>').show();
				} else {
					comparePrice.hide();
				}
			}else{
				productPrice.html('Liên hệ');
				comparePrice.hide();
				form.addClass('hidden');
				wishlist.addClass('btn-full');
			}
		}else{
			productPrice.html('Liên hệ');
			comparePrice.hide();
			form.addClass('hidden');
			wishlist.addClass('btn-full');
		}

	}
	 
	 /*begin variant image*/
	 if (variant && variant.featured_image) {  
			var originalImage = jQuery(".large-image img"); 
			var newImage = variant.featured_image;
			var element = originalImage[0];
		 Haravan.Image.switchImage(newImage, element, function (newImageSizedSrc, newImage, element) {
			 jQuery(element).parents('a').attr('href', newImageSizedSrc);
			 jQuery(element).attr('src', newImageSizedSrc);
		 });
		 $('.checkurl').attr('href',$(this).attr('src'));
		 if($(window).width() > 1200){
			 setTimeout(function(){
				 $('.zoomContainer').remove();				
				 $('#zoom_01').elevateZoom({
					 gallery:'gallery_01', 
					 zoomWindowWidth:420,
					 zoomWindowHeight:500,
					 zoomWindowOffetx: 10,
					 easing : true,
					 scrollZoom : false,
					 cursor: 'pointer', 
					 galleryActiveClass: 'active', 
					 imageCrossfade: true

				 });
			 },300);
		 }
	 }

	  /*end of variant image*/
	 };


	 jQuery(function($) {
		 if(variantsize == true){

			 new Haravan.OptionSelectors('product-selectors', {
				 product: productJson,
				 onVariantSelected: selectCallback,
				 enableHistoryState: true
			 });
		 }



		 // Add label if only one product option and it isn't 'Title'. Could be 'Size'.
		 if(productOptionsSize == 1){
			 if(optionsFirst == 'Ngày'){
				 $('.selector-wrapper:eq(0)').prepend('<label><i class="fa fa-calendar"></i> '+ optionsFirst +'</label>');
			 }else{
				 $('.selector-wrapper:eq(0)').prepend('<label>'+ optionsFirst +'</label>');
			 }
		 }

		 // Hide selectors if we only have 1 variant and its title contains 'Default'.
		 if(cdefault == 1){
			 $('.selector-wrapper').hide();
		 }

		 $('.selector-wrapper').css({
			 'text-align':'left',
			 'margin-bottom':'15px'
		 });
	 });

	 jQuery('.swatch :radio').change(function() {
		 var optionIndex = jQuery(this).closest('.swatch').attr('data-option-index');
		 var optionValue = jQuery(this).val();
		 jQuery(this)
			 .closest('form')
			 .find('.single-option-selector')
			 .eq(optionIndex)
			 .val(optionValue)
			 .trigger('change');
	 });
	 $(document).ready(function() {
		 if($(window).width() > 1200){
			 $('#zoom_01').elevateZoom({
				 gallery:'gallery_01', 
				 zoomWindowWidth:420,
				 zoomWindowHeight:500,
				 zoomWindowOffetx: 10,
				 easing : true,
				 scrollZoom : false,
				 cursor: 'pointer', 
				 galleryActiveClass: 'active', 
				 imageCrossfade: true
			 });
		 }
	 });
	 $('#gallery_01 img').click(function(e){
		 e.preventDefault();
		 $('.large-image img').attr('src',$(this).parent().attr('data-zoom-image'));
	 })
	 $('#gallery_01 img, .swatch-element label').click(function(e){
		 $('.checkurl').attr('href',$(this).attr('src'));	
		 if($(window).width() > 1200){
			 setTimeout(function(){
				 $('.zoomContainer').remove();				
				 $('#zoom_01').elevateZoom({
					 gallery:'gallery_01', 
					 zoomWindowWidth:420,
					 zoomWindowHeight:500,
					 zoomWindowOffetx: 10,
					 easing : true,
					 scrollZoom : false,
					 cursor: 'pointer', 
					 galleryActiveClass: 'active', 
					 imageCrossfade: true

				 });
			 },300);
		 }
	 })

	 function scrollToxx() {
		 $('html, body').animate({ scrollTop: $('.product-tab.e-tabs').offset().top }, 'slow');
		 $('.tab-content, .product-tab .tab-link').removeClass('current');
		 $('.tab-3, .product-tab .tab-link:nth-child(3)').addClass('current');
		 return false;
	 }