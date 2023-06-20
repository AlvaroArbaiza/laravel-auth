@extends('layouts.project')

{{-- Head | title --}}
@section('title')
    Laravel | Create
@endsection

{{-- Main Content --}}
@section('content')

<div class="container text-white">
    <div class="row justify-content-center my-5">
        <div class="col-9 p-5 border rounded bg-dark">

            <h2 class="mb-5">Inserisci tutti i campi per generare un nuovo progetto</h2>

            {{-- form --}}
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf

                {{-- title --}}
                <div class="mb-3">
                    <label for="project_title" class="form-label">Titolo</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="project_title" name="title">
                    {{-- error --}}
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- description --}}
                <div class="mb-3">
                    <label for="project_description" class="form-label">Descrizione</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="project_description" rows="3" name="description"></textarea>
                    {{-- error --}}
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- customer --}}
                <div class="mb-3">
                    <label for="project_customer" class="form-label">Cliente</label>
                    <input type="text" class="form-control @error('customer') is-invalid @enderror" id="project_customer" name="customer">
                    {{-- error --}}
                    @error('customer')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- type customer --}}
                <div class="mb-3">
                    <label for="project_type_customer" class="form-label">Settore</label>
                    <input type="text" class="form-control @error('type_customer') is-invalid @enderror" id="project_type_customer" name="type_customer">
                    {{-- error --}}
                    @error('type_customer')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- price --}}
                <div class="mb-3">
                    <label for="project_price" class="form-label">Costo</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="project_price" name="price">
                    {{-- error --}}
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- created --}}
                <div class="mb-3">
                    <label for="project_created" class="form-label">Data</label>
                    <input type="date" class="form-control @error('created') is-invalid @enderror" id="project_created" name="created">
                    {{-- error --}}
                    @error('created')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection