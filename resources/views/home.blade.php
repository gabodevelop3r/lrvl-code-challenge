@extends('layouts.app')

@section('content')

    <div class="d-flex">
        @include('layouts.sidebar')

        <div class="flex-fill">
            <div class="row p-3">
                <div class="col-12 pt-2">

                    <div class="row justify-content-center">
                        <div class="col-md-6 col-sm-6">
                            <div class="card mb-2">


                                <div class="card-body">
                                  <h4 class="card-title mt-4 mb-4 text-center">Total Ganancias del mes</h4>
                                  <h2 class="card-text text-center">{{ $monthlyExpenses }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="row">
                        <form action="" method="post">
                            @csrf
                            <div class="d-flex">
                                <label for="staticEmail" class="col-1 col-form-label">Ingresos</label>
                                <div class="col-md-3 col-sm-3">
                                    <input type="number" class="form-control" id="ingresos" placeholder="500">
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
                        <form action="" method="post">
                            @csrf
                            <div class="d-flex">
                                <label for="staticEmail" class="col-1 col-form-label">Ingresos</label>
                                <div class="col-md-3 col-sm-3">
                                    <input type="number" class="form-control" id="ingresos" placeholder="500">
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
            </div>
        </div>
    </div>
@endsection
