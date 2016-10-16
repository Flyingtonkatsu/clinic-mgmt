
$(document).ready(function(){
	$('#nav-reg-table').on('click touch', getViewRegTable);
	getMainView($('#nav-reg-table'), 'reception/viewRegTable');
});

function getViewRegTable(event){
	return getMainView($(this), 'reception/viewRegTable');
}