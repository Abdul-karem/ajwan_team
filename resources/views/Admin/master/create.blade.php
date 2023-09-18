@extends('Admin.layoute.App')
@section('content')
<div class="container" style="height: 160vh"  >
    <div class="row align-items-start" style="margin-top: 20px"  >
        <div class="col">
       <a  class="btn btn-primary" href="{{ route('master.index') }}">Back</a>
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

<form action="{{ route('master.store') }}" method="post" enctype="multipart/form-data"  >
@csrf

<div class="mb-3">
    <label for="">name:</label>
  <input type="text"
    class="form-control" name="name"  >
</div>
{{-- <div class="mb-3">
    <label for="course_id">Course</label>
    <select class="form-control" name="course_id" id="course_id">
        <option value="0">Select a Course</option>
        @foreach ($courses as $course)
            <option value="{{ $course->id }}">{{ $course->title }}</option>
        @endforeach
    </select>
  </div> --}}

<div class="mb-3">
    <label for="">image:</label>
  <input type="file" class="form-control"  name="image" >
</div>

<button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>
@endsection
