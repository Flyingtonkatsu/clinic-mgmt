
$(document).ready(function(){
	$('#nav-med-requests').on('click touch', getViewMedRequests);
	getMainView($('#nav-med-requests'), 'pharmacy/getViewMedRequests');
});

function getViewMedRequests(event){
	getMainView($(this), 'pharmacy/getViewMedRequests');
}