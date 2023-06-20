@extends('layouts.project')

{{-- Head | title --}}
@section('title')
    Laravel | Project
@endsection

{{-- Main Content --}}
@section('content')

    {{-- project --}}
    <section class="container d-flex text-white bg-dark p-4 mt-5">

        {{-- projectbook --}}
        <div class="d-flex flex-column pe-5">

            {{-- title --}}
            <h4 class="text-uppercase fw-bold">{{ $project['title'] }}</h4>

            {{-- cliente --}}
            <h6 class="card-subtitle mb-2">
                <span class="text-white-50">Cliente: </span>
                {{ $project['customer'] }}
            </h6>

            {{-- tipologia di cliente --}}
            <h6 class="card-subtitle mb-2">
                <span class="text-white-50">Settore: </span>
                {{ $project['type_customer'] }}
            </h6>

            {{-- prezzo del progetto --}}
            <h6 class="card-subtitle mb-2">
                <span class="text-white-50">Costo: </span>
                <span>€</span>
                {{ $project['price'] }}
            </h6>

            {{-- data creazione --}}
            <h6 class="card-subtitle mb-2">
                <span class="text-white-50">Data: </span>
                {{ $project['created'] }}
            </h6>

            <p class="card-text">{{ $project['description'] }}</p>

            <div class="d-flex justify-content-between">
                {{-- edit --}}
                {{-- bottone con rotta che riconduce all'id della tabella dell'elemento selezionato --}}
                <a href="{{ route('admin.work.edit', $project['id'] ) }}" class="btn btn-info fw-bold">Modifica</a>
    
                {{-- delete --}}
                {{-- Inserisco nell'attributo action la rotta destroy, passando la variabile $project['id'] per cancellare l'elemento corrente --}}
                <form action="{{ route('admin.work.destroy', $project['id']) }}" method="POST">
    
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger fw-bold">Cancella</button>
                </form>
            </div>
        </div>

    </section>
@endsection