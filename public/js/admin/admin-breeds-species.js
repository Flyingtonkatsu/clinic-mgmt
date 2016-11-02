$(document).ready(function(){
	getTableSpecies();
	$(".btn-add-specie").on("click touch", addSpecie);
	$(".btn-add-breed").on("click touch", addBreed);
});


function getTableSpecies(){
	getView('admin/breedspecies/getTableSpecies', $("#div-species"), function(){
		$("#select-species").on("change", getTableBreeds);
		getTableBreeds();
	});
}

function getTableBreeds(){
	var specie = $("#select-species").val();
	var data = {'specie' : specie};
	disableControls();
	getPostView('admin/breedspecies/getTableBreeds', $("#table-breeds"), data, function(){
		enableControls();
	});
}

function enableControls(){
	$("input").attr("disabled", false);
	$("button").attr("disabled", false);
}

function disableControls(){
	$("input").attr("disabled", true);
	$("button").attr("disabled", true);
}

function addSpecie(){
	var specie = $("#input-specie").val();
	var data = {'specie' : specie};
	var button = $(this);
	var def_button = button.html();

	if(!specie.trim()){
		alertMessage("danger", "Enter a valid specie name!");
		return;
	}

	disableControls();
	loadButton(button, "Adding...");

	$.post('admin/breedspecies/addSpecie', data, function(data){
		unloadButton(button, def_button);
		getTableSpecies();
		alertMessage(data.status, data.response);
		$("#input-specie").val("");
	});
}

function addBreed(){
	var specie = $("#select-species").val();
	var breed = $("#input-breed").val();
	var button = $(this);
	var def_button = button.html();
	var data = {'specie' : specie, 'breed' : breed};

	if(!breed.trim()){
		alertMessage("danger", "Enter a valid breed name!");
		return;
	}

	disableControls();
	loadButton(button, "Adding...");

	$.post('admin/breedspecies/addBreed', data, function(data){
		unloadButton(button, def_button);
		getTableSpecies();
		alertMessage(data.status, data.response);
		$("#input-breed").val("");
	});
}