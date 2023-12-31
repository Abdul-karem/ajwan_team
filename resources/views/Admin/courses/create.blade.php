@extends('Admin.layoute.App')
@section('content')
<div  class="container" >
<div  style="height: 200vh"  >
    <div class="row align-items-start" style="margin-top: 20px"  >
        <div class="col">
       <a  class="btn btn-primary" href="{{ route('course.index') }}">Back</a>
        </div>
      </div>

      @if ($errors->any())
      <div class="alert alert-danger" role="alert">
          <ul >
            @foreach ($errors->all() as $item)
            <li> {{ $item }}</li>
            @endforeach
          </ul>
      </div>
  @endif

<form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data"  >
@csrf

<div class="mb-3">
    <label for="">title:</label>
  <input type="text"
    class="form-control" name="title"  >
</div>
{{-- <div class="mb-3">

  <label for="">teacher Name:</label>
<input type="text"
  class="form-control" name="teacher_name"  >
</div> --}}
{{-- ----------------- --}}
<div class="mb-3">
  <label for="teacher_name">Teacher Name:</label>
  <select class="form-control" name="teacher_name" id="teacher_name">
    <option value="0">Select name</option>
    @foreach ($masters as $master)
      <option value="{{ $master->id }}">{{ $master->name }}</option>
    @endforeach
  </select>
</div>
{{-- ---------- --}}
<div class="mb-3">
    <label for="">description:</label>
  <textarea class="form-control" name="description"   rows="3"></textarea>
</div>
<div  class="mb-3" >
    <label for="">price:</label>
<input  class="form-control"  type="number" name="price" >
</div>
<div class="mb-3">
    <label for="">location:</label>
    <input type="text"
      class="form-control" name="location"  >
  </div>

  <div class="mb-3">
    <label for="">start time:</label>
    <input type="date" class="form-control" name="start" id="start">
</div>

<div class="mb-3">
    <label for="">end time:</label>
    <input type="date" class="form-control" name="end" id="end">
</div>

  <div class="mb-3">
    <label for="">Duration of the course:</label>
    <input type="text"
      class="form-control" name="time">
  </div>

<div class="mb-3">
    <label for="">Target group:</label>
    <input type="text"
      class="form-control" name="Target_group">
  </div>
  <div class="mb-3">
    <label for="">status:</label>
  <select class="form-control" name="status"    >
    <option value="0"> Visible</option>
    <option value="1">Hidden</option>
</select>
</div>
<div class="mb-3">
  <label for="category_id">category:</label>
  <select name="category_id" id="category_id" class="form-control">
      @foreach ($categories as $id => $name)
          <option value="{{ $id }}">{{ $name }}</option>
      @endforeach
  </select>
</div>

<div class="mb-3">
    <label for="">image:</label>
  <input type="file" class="form-control"  name="image" >
</div>

<button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>
</div>
<script language="javascript">
  document.addEventListener('DOMContentLoaded', function() {
      var today = new Date().toISOString().split('T')[0];
      document.getElementById('start').min = today;
      document.getElementById('end').min = today;

      // Event listener for start date change
      document.getElementById('start').addEventListener('change', function() {
          var startDate = new Date(this.value);
          document.getElementById('end').min = this.value;  // Set min for end date based on start date
      });
  });
</script>

@endsection
