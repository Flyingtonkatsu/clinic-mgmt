<select class="form-control" id="select-species">
	@foreach($species as $specie)
	<option>
		{{$specie->name}}
	</option>
	@endforeach
</select>