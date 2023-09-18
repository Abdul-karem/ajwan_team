@extends('Admin.layoute.App')
@section('content')
<div  class="container" >
    <div style="margin: 10px" class=" min-vh-100 d-flex flex-column" >
       
      <table class="table">
    
          <div class="row align-items-start" style="margin-top: 30px">
              <div class="col">
                <a  class="btn btn-primary" href="{{ route('master.index') }}">Back</a>          </div>
    
          </div>
    @if ($message = session()->get('success'))
    <div class="alert alert-success mt-3" role="alert">
      {{ $message }}
    </div>
    @endif
    <form action="{{ route('master.update', $master->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="mb-3">
          <label for="name">Name:</label>
          <input type="text" class="form-control" name="name" value="{{ $master->name }}">
      </div>

      {{-- <div class="mb-3">
          <label for="course_id">Master:</label>
          <select class="form-control" name="course_id" id="course_id">
              <option value="0">Select a Master</option>
              @foreach ($courses as $course)
                  <option value="{{ $course->id }}" {{ $course->id == $master->course_id ? 'selected' : '' }}>
                      {{ $course->title }}
                  </option>
              @endforeach
          </select>
      </div> --}}

      <div class="mb-3">
          <label for="image">Image:</label>
          <img src="/imagess/{{ $master->image }}" style="width: 100px; height: 100px;">
          <input type="file" class="form-control" name="image" value="{{ $master->image }}"  >
      </div>

      <div class="mb-3">
          <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </form>
</div>
</div>
</div>
        @endsection

