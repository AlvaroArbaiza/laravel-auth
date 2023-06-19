@extends('layouts.project')

@section('title')
    Laravel | Dashboard
@endsection

@section('content')

    <section class="jumbotron mt-5 mx-5">
        <div class="container d-flex align-items-center h-100">

            <div>
                <div class="content d-flex align-items-center gap-4 text-white">
                    <i class="fa-solid fa-laptop-code"></i>
                    <h3>Web Developer</h3>
                </div>
                <hr class="border-white border-4 opacity-100">
                <div class="d-flex align-items-center gap-4 text-white fs-2">
                    <span>Css</span>
                    <span>Javascript</span>
                    <span>Vue</span>
                    <span>Vite</span>
                    <span>Php</span>
                    <span>MySQL</span>
                    <span>Laravel</span>
                </div>

            </div>
        </div>
    </section>
@endsection