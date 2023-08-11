@extends('layouts.app')

@section('content')

    <div class="d-flex">
        @include('layouts.sidebar')

        <div class="flex-fill">
            <div class="row">
                <h1 class="ml-2">Transacciones</h1>

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
            </div>
            <div class="row p-3">
                <div class="col-12 mt-4">
                    <div class="row">
                        <form action="{{ route('movement.store') }}" method="post">
                            @csrf
                            <div class="d-flex">
                                <label for="staticEmail" class="col-1 col-form-label">Ingresos</label>
                                <div class="col-md-3 col-sm-3 mr-2">
                                    <input type="number" name="cash" class="form-control" id="ingresos" placeholder="Ej: 1500">
                                    <input type="hidden" name="type" value="1">
                                </div>
                                <div class="col-md-3 col-sm-3 align-self-center">
                                    <button type="submit"
                                            class="btn btn-primary btn-sm"
                                            >
                                            Guardar
                                        </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <hr class="text-dark mt-3">
                <div class="col-12">
                    <div class="row">
                        <form action="{{ route('movement.store') }}" method="post">
                            @csrf
                            <div class="d-flex">
                                <label for="staticEmail" class="col-1 col-form-label">Egresos</label>
                                <div class="col-md-3 col-sm-3  ">
                                    <input type="number" name="cash" class="form-control" id="egresos" placeholder="Ej: 1500">
                                    <input type="hidden" name="type" value="2">
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <button type="submit"
                                            class="btn btn-primary btn-sm"
                                            >
                                            Guardar
                                        </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
