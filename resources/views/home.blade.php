@extends('layouts.app')

@section('content')

    <div class="d-flex">
        @include('layouts.sidebar')

        <div class="flex-fill">
            <h1 class="ml-2">Ganancias</h1>
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
            <div class="row p-3">
                <div class="col-12 pt-2">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-sm-6">
                            <div class="card mb-2">


                                <div class="card-body">
                                  <h4 class="card-title mt-4 mb-4 text-center">Total Ganancias {{ $month }}</h4>
                                  <h2 class="card-text text-center">{{ $monthlyExpenses }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-5 pl-5 mt-2">
                        <form action="{{ route('byMonth') }}" method="post">
                            @csrf
                            <label for="bdaymonth">Ingresa el mes a calcular</label>
                            <input type="month" class="form-control" id="bdaymonth" name="date">
                            <button type="submit" class="btn btn-primary mt-2">Calcular</button>
                        </form>
                    </div>
                </div>

                @include('components.list-transactions')

            </div>


        </div>
    </div>
@endsection
