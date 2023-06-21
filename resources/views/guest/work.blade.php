@extends('layouts.project')

@section('title')
    Laravel | Work
@endsection

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-6 text-white">
            <h2 class="text-uppercase text-center mb-5 fw-bold">work</h2>
            <ul>
                @foreach ($projects as $element) 
                    <li>{{ $element['title'] }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>


@endsection