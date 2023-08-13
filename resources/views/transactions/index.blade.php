@extends('layouts.app')

@section('content')

    <div class="d-flex">
        @include('layouts.sidebar')

        <div class="flex-fill">
            <div class="col-12 mt-1">
                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                <strong>ERROR!</strong> {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                  </div>
                @endif
                @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                @endif
            </div>
            <div class="col-12 ml-4 mt-4 form-margin">
                <h3 class="text-center text-secondary">Transacciones</h3>
                <form action="{{ route('movement.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="input-cash">Ingresos</label>
                        <input name="cash" type="number" class="form-control" id="input-cash" placeholder="Ej: 1500">
                        <input type="hidden" name="cash_movement_type_id" value="1">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mt-2">Guardar Ingreso</button>
                    </div>
                </form>
                <hr class="text-dark border-1">
                <form action="{{ route('movement.store') }}" method="post">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="input-cash">Egresos</label>
                        <input name="cash" type="number" class="form-control" id="input-cash" placeholder="Ej: 1500">
                        <input type="hidden" name="cash_movement_type_id" value="2">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mt-2">Guardar Egreso</button>
                    </div>
                </form>

            </div>


        </div>
@endsection
