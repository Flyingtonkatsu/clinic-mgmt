@extends('layouts.master')

@section('taskbar')
<li class="sidebar-nav-head">
	Modules
</li>

<li class="nav-item" >
  <a class="nav-link" href="registration"> <i class="fa fa-list-alt"> </i> Registration</a>
</li>
<li class="nav-item active">
  <a class="nav-link" href="reception"> <i class="fa fa-book" aria-hidden="true"></i> Reception</a>
</li>
<li class="nav-item" >
  <a class="nav-link" href="consultation"> <i class="fa  fa-stethoscope"> </i> Consultation</a>
</li>
<li class="nav-item" >
  <a class="nav-link" href="#about"> <i class="fa fa-bed"></i> Confinement</a>
</li>
<li class="nav-item" >
  <a class="nav-link" href="#about"> <i class="fa fa-calculator"></i> Accounting</a>
</li>
<li class="nav-item" >
  <a class="nav-link" href="#about"> <span class="fa fa-archive"></span> Inventory</a>
</li>
@endsection

@section('content')

    

  @endsection


@section('scripts')
	
@endsection