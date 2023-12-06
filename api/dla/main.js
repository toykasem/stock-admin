$(document).ready(function(){
  $(".hamburger").click(function(){
    $(this).toggleClass("is-active");
  });
});

// toggle menu
function onMenuToggle() { 
	var boxSearch = $('#boxSearch').hasClass('action');
	if (boxSearch) {
		$(".menu-box-search").toggleClass('action');
		$(".overlay").toggleClass('action');
	}  

	$(".top-menu-box").toggleClass('action'); 
	$(".top-menu").toggleClass('action'); 
	$(".main-menu-top").toggleClass('action'); 
	$(".menu-hamberger-box").toggleClass('action');
}


$('#dock li').on('click', function(){
	$('li').not(this).removeClass('active'); 
	$(this).addClass('active');
})

document.getElementById('menuActive').scrollIntoView({
	behavior: 'auto',
	block: 'center',
	inline: 'center'
});




