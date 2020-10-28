var mySwiper = new Swiper('.swiper-container', {
	speed: 400,
	spaceBetween: 0
  });
  
  var mySwiper = document.querySelector('.swiper-container').swiper
  
  
  
  



$(document).ready(function() {
	var mayor = $('.card').eq(1).height(); // tomamos el valor primero como mayor
	// recorremos cada card-img-top existente comparando su altura con la variable ya almacenada
	// si la altura almacenada es menor a la altura del loop se asigna nuevamente
	$('.card').each(function() {
	  if ($(this).height() > mayor) mayor = $(this).height();
	});
	// con la variable ya almacenada con el valor mayor se asigna a todas las variables
	$('.card').height(mayor);
  });

  $(document).ready(function() {
	var mayor = $('.card-img-top').eq(2).height(); // tomamos el valor primero como mayor
	// recorremos cada card-img-top existente comparando su altura con la variable ya almacenada
	// si la altura almacenada es menor a la altura del loop se asigna nuevamente
	$('.card-img-top').each(function() {
	  if ($(this).height() > mayor) mayor = $(this).height();
	});
	// con la variable ya almacenada con el valor mayor se asigna a todas las variables
	$('.card-img-top').height(mayor);
  });



  $(document).ready(function() {
	var mayor = $('.card-img-top').eq(1).width(); // tomamos el valor primero como mayor
	// recorremos cada card-img-top existente comparando su altura con la variable ya almacenada
	// si la altura almacenada es menor a la altura del loop se asigna nuevamente
	$('.card-img-top').each(function() {
	  if ($(this).width() > mayor) mayor = $(this).width();
	});
	// con la variable ya almacenada con el valor mayor se asigna a todas las variables
	$('.card-img-top').width(mayor);
  });

