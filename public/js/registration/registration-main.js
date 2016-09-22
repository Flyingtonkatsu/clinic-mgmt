
$(document).ready(function(){
	$('#nav-queue-reg').on('click touch', getViewQueue);
	$('#nav-new-client').on('click touch', getViewNewClient)
});

function getViewQueue(event){
	getView($(this), 'registration/viewQueue');
}

function getViewNewClient(event){
	getView($(this), 'registration/viewNewClient');
}