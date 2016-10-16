
$(document).ready(function(){
	$('#nav-queue-reg').on('click touch', getViewQueue);
	$('#nav-new-client').on('click touch', getViewNewClient)
	getMainView($('#nav-queue-reg'), 'registration/viewQueue');
});

function getViewQueue(event){
	getMainView($(this), 'registration/viewQueue');
}

function getViewNewClient(event){
	getMainView($(this), 'registration/viewNewClient');
}