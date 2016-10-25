
$(document).ready(function(){
	$('#nav-reg-table').on('click touch', getViewRegTable);
	$('#nav-billing').on('click touch', getViewBilling);
	getMainView($('#nav-reg-table'), 'reception/viewRegTable');
});

function getViewRegTable(event){
	return getMainView($(this), 'reception/viewRegTable');
}

function getViewBilling(){
	getMainView($(this), 'reception/getViewBilling');
}