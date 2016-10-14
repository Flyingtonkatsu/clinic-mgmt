
$(document).ready(function(){
	$('#nav-lab-requests').on('click touch', getViewLabRequests);
	getMainView($('#nav-lab-requests'), 'labs/getViewLabRequests');
});

function getViewLabRequests(event){
	getMainView($(this), 'labs/getViewLabRequests');
}