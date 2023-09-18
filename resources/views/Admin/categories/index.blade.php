@extends('Admin.layoute.App')

@section('content')
<div class="container" >
<div style="margin: 10px" class=" min-vh-100 d-flex flex-column" >
   
        <table class="table">

            <div class="row align-items-start" style="margin-top: 30px">
                <div class="col">
                  <a class="btn btn-primary" href="{{ route('dashboard') }}">Back</a>
                    <a class="btn btn-success" href="{{ route('categories.create') }}">Create</a>
                </div>

            </div>
    @if ($message = session()->get('success'))
    <div class="alert alert-success mt-3" id="success-message" role="alert">
        {{ $message }}
    </div>
    @endif

    <div class="table-responsive ">
        <table class="table table-striped table-hover table-bordered table-primary align-middle">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <img src="/imagess/{{ $item->image }}" width="100" height="100" alt="">
                    </td>
                    <td>
                        <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('categories.destroy', $item->id) }}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
