(function () {

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
	}

})();