@extends('layouts.app')

@section('content')

    <div class="d-flex">
        @include('layouts.sidebar')

        <div class="flex-fill ">
            <div class="col-12 ml-4 mt-4 form-margin">
                <h3 class="text-center text-secondary">Editar movimiento #{{ $movement->id }}</h3>
                <form action="{{ route('movement.update', $movement->id ) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="input-cash">Dinero</label>
                        <input name="cash" value="{{ $movement->cash }}" type="number" class="form-control" id="input-cash" placeholder="Ej: 1500">
                    </div>
                    <div class="form-group">
                        <label class="my-1 mr-2" for="movement-type">Tipo de movimiento</label>
                        <select name="cash_movement_type_id" class="form-control my-1 mr-sm-2" id="movement-type">

                            @foreach ($movementTypes as $movementType)
                                <option
                                    {{ ($movement->cash_movement_type_id == $movementType->id ? 'selected' : '')  }}
                                    value="{{ $movementType->id }}"
                                    >
                                    {{ $movementType->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mt-2">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
