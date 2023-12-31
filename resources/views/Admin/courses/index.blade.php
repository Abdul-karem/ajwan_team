@extends('Admin.layoute.App')
@section('content')
<div  class="container" >
     <div style="margin: 10px" >
    <div class=" min-vh-100 d-flex flex-column">
        <table class="table">

            <div class="row align-items-start" style="margin-top: 60px">
                <div class="col">
                  <a class="btn btn-primary" href="{{ route('dashboard') }}">Back</a>
                    <a class="btn btn-success" href="{{ route('course.create') }}">Create</a>
                </div>

            </div>

            @if ($message = session()->get('success'))
                <div class="alert alert-success" id="success-message"  role="alert">
                    {{ $message }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover	table-borderless table-primary align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>teacher </th>
                            {{-- <th>description</th> --}}
                            <th>price</th>
                            <th>location</th>
                            <th>start</th>
                            <th>end</th>
                            <th>time</th>
                            {{-- <th>category</th> --}}
                            <th>Target group</th>
                            <th>status</th>
                            <Th>image</Th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($courses as $item)
                            <tr class="table-primary">
                                {{-- <td scope="row">Item</td> --}}
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->teacher_name }}</td>
                                {{-- <td>{{ $item->description }}</td> --}}
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->location }}</td>
                                <td>{{ $item->start }}</td>
                                <td>{{ $item->end }}</td>
                                <td>{{ $item->time }}</td>
                                {{-- <td>{{ $item->category->name}}</td> --}}
                                <td>{{ $item->Target_group }}</td>
                                <td>
                                    @if ($item->status == 0)
                                        Visible
                                    @else
                                        Hidden
                                    @endif
                                </td>
                                <td><img src="{{ asset('storage/' . $item->image) }}" style="width: 60px; haight:60px"></td>
                                <td>

                                    <div class="row">
                                        <form action="{{ route('course.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger  row "style="margin: 1px">Delete</button>
                                        </form>
                                    </div>
                                    <div class="row" style="margin: 2px">
                                        <a href="{{ route('course.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="row" style="margin: 2px">
                                        <a href="{{ route('course.show', $item->id) }}" class="btn btn-info">show</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    {{-- <tfoot>
                    </tfoot> --}}
                </table>
                {{-- {!! $courses->links()   !!} --}}
            </div>
            </div>
            </div>
          </div>
  <script>
    // وظيفة لإخفاء الرسالة بعد فترة زمنية محددة
    function hideMessage() {
        var message = document.getElementById('success-message');
        if (message) {
            message.style.display = 'none';
        }
    }

    // انتظر 5 ثواني ثم قم بإخفاء الرسالة
    setTimeout(hideMessage, 2000);
</script>
@endsection
