$(document).ready(function(){
	$("#nav-employee-reg").on("click touch", getViewEmployeeReg);
	$("#nav-breeds-species").on("click touch", getViewBreedsSpecies);
});

function getViewEmployeeReg(event){
	return getMainView($(this), 'admin/employees/viewEmployeeReg');
}

function getViewBreedsSpecies(event){
	return getMainView($(this), 'admin/breedspecies/viewBreedsSpecies');
}