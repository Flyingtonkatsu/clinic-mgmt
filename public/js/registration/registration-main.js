
$(document).ready(function(){
	$('#nav-queue-reg').on('click touch', getViewQueue);
	$('#nav-new-client').on('click touch', getViewNewClient)
});

function getViewQueue(event){
	getMainView($(this), 'registration/viewQueue');
}

function getViewNewClient(event){
	getMainView($(this), 'registration/viewNewClient');
}