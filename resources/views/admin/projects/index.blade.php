@extends('layouts.project')

@section('title')
    Laravel | work
@endsection

@section('content')
    <div class="container my-5">
        <div class="row row-gap-5">

            @foreach ($projects as $project)                
                <div class="col-6">

                    {{-- card --}}
                    <div class="card">
                        <img src="..." class="card-img-top" alt="...">

                        {{-- card-body --}}
                        <div class="card-body">

                            {{-- title --}}
                            <h5 class="card-title">
                                {{ $project['title'] }}
                            </h5>

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
                        </div>
                      </div>
                </div>
            @endforeach
        </div>
    </div>
    
@endsection