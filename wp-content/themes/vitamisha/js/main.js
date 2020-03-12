
(function () {

	document.addEventListener('click',function(e){
		if(e.target && e.target.classList.contains('header--buttons__cart')){
			e.preventDefault();

			var cartWidget = document.querySelector('.dialog_shopping_cart');
			if(!cartWidget.classList.contains('open')) {
				cartWidget.classList.add('open');
				cartWidget.style.display = 'block';
			} else {
				cartWidget.classList.remove('open')
				cartWidget.style.display = 'none'
			}
		}
		if(e.target && e.target.classList.contains('cart--close')){
			e.preventDefault();

			var cartWidget = document.querySelector('.dialog_shopping_cart');
			if(!cartWidget.classList.contains('open')) {
				cartWidget.classList.add('open');
				cartWidget.style.display = 'block';
			} else {
				cartWidget.classList.remove('open')
				cartWidget.style.display = 'none'
			}
		}

	});

	if(document.querySelector('.glide')) {
		var glide = new Glide('.glide', {
			type: 'carousel',
			startAt: 0,
			perView: 3
		});

		if(window.innerWidth>680 && window.innerWidth<992) {
			glide.update({ perView: 2 });
		} else if(window.innerWidth<680) {
			glide.update({ perView: 1 });
		} else {
			glide.update({ perView: 3 });
		}

		glide.on('resize', function() {
			if(window.innerWidth>680 && window.innerWidth<992) {
				glide.update({ perView: 2 });
			} else if(window.innerWidth<680) {
				glide.update({ perView: 1 });
			} else {
				glide.update({ perView: 3 });
			}

			var currentBlock = document.querySelector('.product_list_widget'),
				currentWidth = currentBlock.querySelector('.glide__slide--active'),
				currentSvg = currentBlock.querySelectorAll('.button--dashes');

			for (var i = 0; i < currentSvg.length; i++) {
				var currentRect = currentSvg[i].querySelector('rect');
				currentRect.setAttribute('width', currentWidth.offsetWidth-10);
				currentRect.setAttribute('height', currentWidth.offsetHeight-10);
			};
		});

		glide.mount();

		var currentBlock = document.querySelector('.product_list_widget'),
			currentWidth = currentBlock.querySelector('.glide__slide--active'),
			currentSvg = currentBlock.querySelectorAll('.button--dashes');

		for (var i = 0; i < currentSvg.length; i++) {
			var currentRect = currentSvg[i].querySelector('rect');
			currentRect.setAttribute('width', currentWidth.offsetWidth-10);
			currentRect.setAttribute('height', currentWidth.offsetHeight-10);
		};

	}

	var qtyminusButtons = document.querySelectorAll('.qtyminus_stat'),
		qtyplusButtons = document.querySelectorAll('.qtyplus_stat');

		for (var i = 0; i < qtyminusButtons.length; i++) {
			qtyminusButtons[i].addEventListener('click', function(e) {
				e.stopPropagation();

			    var a, n = this.parentNode,
			        o = n.querySelector(".quantity").querySelector('.qty'),
			        d = parseFloat(o.getAttribute("step")),
			        m = parseFloat(o.getAttribute("max")),
			        s = !0,
			        r = parseFloat(o.value);

			    s ? (a = r - d, a >= 1 ? o.value = a : o.value = 0) : (a = r + d, void 0 === m ? o.value = a : a >= m ? o.value = m : o.value = a);

			});
		}
		for (var i = 0; i < qtyplusButtons.length; i++) {
			qtyplusButtons[i].addEventListener('click', function(e) {
				e.stopPropagation();

			    var a, n = this.parentNode,
			        o = n.querySelector(".quantity").querySelector('.qty'),
			        d = parseFloat(o.getAttribute("step")),
			        m = parseFloat(o.getAttribute("max")),
			        s = !1,
			        r = parseFloat(o.value);

			    s ? (a = r - d, a >= 1 ? o.value = a : o.value = 0) : (a = r + d, void 0 === m ? o.value = a : a >= m ? o.value = m : o.value = a);

			});
		}

})();