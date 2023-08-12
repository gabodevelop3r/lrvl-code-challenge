<div class="col-12 mt-5" style="overflow-y: scroll; height:400px;">
    <table class="table">
        <thead>
          <tr>
            <th scope="col" >#</th>
            <th scope="col" >Cash</th>
            <th scope="col" >Fecha</th>
            <th scope="col" >Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($movements as $movement)
                <tr>
                    <th scope="row">{{ $movement->id }}</th>
                    <td >{{ $movement->cash }}</td>
                    <td>{{ $movement->created_at->diffForHumans() }}</td>
                    <td scope="">
                        <div class="">
                            <div class="">
                                <a href="{{ route('movement.edit', $movement->id ) }}" class="btn btn-warning" style="width: 80px">Editar</a>
                            </div>
                            <div class="mt-1">
                                <form action="{{ route('movement.destroy',$movement->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="width: 80px">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
</div>
