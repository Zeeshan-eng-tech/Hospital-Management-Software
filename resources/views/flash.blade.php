@if($message = Session::get('message'))
<div class="alert alert-success alert-dismissible">
  <h7><i class="icon fas fa-check"></i> Alert!</h7>
   {{ $message }}
    </div>
@endif()
@if($message = Session::get('delete'))
<div class="alert alert-danger alert-dismissible">
  <h7><i class="icon fas fa-check"></i> Alert!</h7>
  {{ $message }}
  </div>
@endif()
