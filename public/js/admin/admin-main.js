$(document).ready(function(){
	$("#nav-link-employee-reg").on("click touch", getViewEmployeeReg);
	$("#nav-link-employee-list").on("click touch", getViewEmployeeList);
});

function getViewEmployeeReg(event){
	return getMainView($(this), 'admin/viewEmployeeReg');
}

function getViewEmployeeList(event){
	return getMainView($(this), 'admin/viewEmployeeList');
}