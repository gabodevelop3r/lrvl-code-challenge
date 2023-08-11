<div class="col-12 mt-5" style="overflow-y: scroll; height:400px;">
    <ul class="list-group">
        @foreach ($movements as $movement)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <strong class="{{ ( $movement->cash_movement_type_id === 1 ? 'text-success' : 'text-danger' )   }}"> ${{ $movement->cash }} </strong>
                <span> {{ $movement->created_at->diffForHumans() }} </span>
            </li>
        @endforeach
    </ul>
</div>
