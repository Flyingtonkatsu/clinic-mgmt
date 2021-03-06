@extends('layouts.master')

@section('content')
  <div class="well">
    <div class="row">
      <div class="col-md-12">
        <h2>Modules</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <button class="btn btn-primary btn-lg" onclick="location.href='registration'"><i class="fa fa-list-alt"></i> Registration </button>

        <button class="btn btn-primary btn-lg" onclick="location.href='reception';"><i class="fa fa-book"></i> Reception </button>

        <button class="btn btn-primary btn-lg" onclick="location.href='consultation';"><i class="fa fa-stethoscope"> </i> Consultation </button>

        <button class="btn btn-primary btn-lg" onclick="location.href='labs';"> <i class="fa fa-eyedropper "></i> Labs </button>

        <button class="btn btn-primary btn-lg" onclick="location.href='pharmacy';"> <i class="fa fa-medkit "></i> Pharmacy </button>

        <button class="btn btn-primary btn-lg" onclick="location.href='';"> <i class="fa fa-archive"></i> Supplies </button>

        <button class="btn btn-primary btn-lg" onclick="location.href='';"> <i class="fa fa-bed"></i> Confinement </button>


        <button class="btn btn-primary btn-lg" onclick="location.href='admin';"> <i class="fa fa-wrench"></i> Admin </button>
      </div>
    </div>
  </div>
@endsection