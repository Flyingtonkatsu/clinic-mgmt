
$(document).ready(function(){
	$('#nav-queue-reg').on('click touch', getViewQueue);
	$('#nav-new-client').on('click touch', getViewNewClient)
});

function getViewQueue(event){
	return getView($(this), 'registration/viewQueue');
}

function getViewNewClient(event){
	return getView($(this), 'registration/viewNewClient');
}

function getView(navitem, url){
	$('#page-content').html('<i class="fa fa-spinner fa-pulse fa-3x"></i>');
	$('.sidebar-nav-item').attr('class', 'sidebar-nav-item');
	navitem.attr('class', 'sidebar-nav-item sidebar-nav-active')

	$.get(url, 
		function(view){
			$('#page-content').html(view);
	});
}