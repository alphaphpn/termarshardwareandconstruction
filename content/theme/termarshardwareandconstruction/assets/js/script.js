/** Theme Script **/

$(document).ready(function(){
	$('.slick-frontbanner').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: false,
		autoplaySpeed: 2000,
		arrows: true,
		dots: true
	});

	$('.slick-products').slick({
		infinite: false,
		slidesToShow: 5,
		slidesToScroll: 1,
		autoplay: false,
		autoplaySpeed: 2000,
		arrows: false,
		responsive: [
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 599,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				}
			}
		]
	});
});