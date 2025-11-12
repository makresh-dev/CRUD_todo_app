@extends('layout.default')


@section('content')
    <!-- Begin page content -->
    <main class="flex-shrink-0 mt-5">
        <div class="container">
            @if (session()->has('success'))
                <div class="alert alert-success" style="width: 70rem; margin-top: 20px">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" style="width: 70rem; margin-top: 20px">
                    {{ session('error') }}
                </div>
            @endif
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h6 class="border-bottom pb-2 mb-0">Recent updates</h6>
                @foreach ($tasks as $tasks)
                <div class="d-flex text-body-secondary pt-3"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-badge-right">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M13 7h-6l4 5l-4 5h6l4 -5z" />
                        </svg>
                    <p class="pb-3 mb-0 small lh-sm border-bottom">
                        <strong class="d-block text-gray-dark">{{ $tasks->title }}</strong>
                        {{ $tasks->description }} <br>
                        Deadline: {{ $tasks->deadline }}
                    </p>
                    <button class="btn btn-sm btn-outline-secondary ms-auto" style="height: 30px; align-self: center;">Remove Task</button>
            </div>
            @endforeach
        </div>
    </main>
@endsection
