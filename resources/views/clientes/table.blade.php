<div class="table-responsive">
    <table class="table" id="clientes-table">
        <thead>
            <tr>
        <th>@lang('models/clientes.fields.NOMECLIE')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientes as $clientes)
            <tr>
            <td>{{ $clientes->NOMECLIE }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['clientes.destroy', $clientes->CHAVPFJ], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('clientes.show', [$clientes->CHAVPFJ]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('clientes.edit', [$clientes->CHAVPFJ]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               <!-- {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!} -->
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
