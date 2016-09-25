
$(document).ready(function(){
	$('#nav-reg-table').on('click touch', getViewRegTable);
});

function getViewRegTable(event){
	return getMainView($(this), 'reception/viewRegTable');
}