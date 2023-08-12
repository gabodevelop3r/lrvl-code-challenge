@extends('layouts.app')

@section('content')

    <div class="d-flex">
        @include('layouts.sidebar')

        <div class="flex-fill">
            <div class="row">
                <div class="col-12 mt-4">

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
