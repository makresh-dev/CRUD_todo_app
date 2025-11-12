@extends('layout.default')
@section('content')
    <div class="d-flex align-items-center">
    <div class="container card shadow-sm" style="max-width: 500px; margin-top: 100px">
        <div class="fs-3 fw-bold text-center mt-3" style="">Add New Task</div>
        <form class="p-3" method="POST" action="{{ route('task.add.post') }}">
            @csrf
            <div class="mb-3">
                <input type="text" name="title" class="form-control">
            </div>
            <div class="mb-3">
                <input type="datetime-local" class="form-control" name="deadline">
            </div>
            <div class="mb-3">
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
            @if(session()->has('success'))
           <div class="alert alert-success" style="width: 20rem">
               {{ session()->get('success') }}
           </div>
       @endif
       @if(session('error'))
           <div class="alert alert-danger" style="width: 20rem">
               {{ session('error') }}
           </div>
       @endif
            <button type="submit" class="btn btn-success">Add Task</button>
        </form>
    </div>
    </div>
@endsection
