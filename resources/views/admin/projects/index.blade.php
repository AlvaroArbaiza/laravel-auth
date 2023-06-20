@extends('layouts.project')

@section('title')
    Laravel | work
@endsection

@section('content')
    <div class="container my-5">

        @if( Session::has('success') ) 
            <div class="alert alert-success">
                {!! Session::get('success') !!} 
            </div>
        @endif

        {{-- work - projects --}}
        <div class="row row-gap-5">

            @foreach ($projects as $project)                
                <div class="col-6">

                    {{-- card --}}
                    <div class="card">
                        <img src="..." class="card-img-top" alt="...">

                        {{-- card-body --}}
                        <div class="card-body">

                            {{-- title --}}
                            <a href="{{ route('admin.work.show', [ 'work' => $project['id'] ]) }}">
                                <h5 class="card-title">
                                    {{ $project['title'] }}
                                </h5>
                            </a>

                            {{-- cliente --}}
                            <h6 class="card-subtitle mb-2">
                                <span class="text-body-secondary">Cliente: </span>
                                {{ $project['customer'] }}
                            </h6>

                            {{-- tipologia di cliente --}}
                            <h6 class="card-subtitle mb-2">
                                <span class="text-body-secondary">Settore: </span>
                                {{ $project['type_customer'] }}
                            </h6>

                            {{-- prezzo del progetto --}}
                            <h6 class="card-subtitle mb-2">
                                <span class="text-body-secondary">Costo: </span>
                                <span>€</span>
                                {{ $project['price'] }}
                            </h6>

                            {{-- data creazione --}}
                            <h6 class="card-subtitle mb-2">
                                <span class="text-body-secondary">Data: </span>
                                {{ $project['created'] }}
                            </h6>

                            <p class="card-text">{{ $project['description'] }}</p>

                            {{-- edit --}}
                            <a href="{{ route('admin.work.edit', $project['id'] ) }}" class="btn btn-info">Modifica</a>
        
                            {{-- delete --}}
                            <form action="{{ route('admin.work.destroy', $project['id']) }}" method="POST">
        
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="delete btn btn-danger">Cancella</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- add new project --}}
        <div class="row mt-5">
            <div class="d-flex justify-content-center">
                <a href="{{ route('admin.work.create') }}" class="text-decoration-none">
                    <span class="text-white fw-bold fs-1 border border-3 border-light text-uppercase p-2">aggiungi nuovo progetto</span>
                </a>
            </div>
        </div>
    </div>
    
@endsection