
@extends('dashboard.master')

@section('content')

<a href="{{ route('member.create') }}" class="btn btn-primary mt-3 mb-3">Crear member</a>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Telefono</th>
            <th>Correo electronico</th>
            <th>created at</th>
            <th>update at</th>
            <th>actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($members as $member)
        <tr>
            <td>
                {{$member->id}}
            </td>
            <td>
                {{$member->title}}
            </td>
            <td>
                {{$member->phone}}
            </td>
            <td>
                {{$member->email}}
            </td>
            <td>
                {{$member->created_at->format('Y-m-d')}}
            </td>
            <td>
                {{$member->updated_at->format('Y-m-d')}}
            </td>
            <td>
            <a href="{{route('member.show', $member->id)}}" class="btn btn-primary">Ver</a>
            <a href="{{route('member.edit', $member->id)}}" class="btn btn-info">Editar</a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-id="{{$member->id}}">Eliminar</button>
        </tr>
            
        @endforeach
    </tbody>
</table>

{{$members->links()}}

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Borrar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Realmente deseas eliminar el registro ?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <form action="" data-action="{{route('member.destroy', 0)}}" id="formDelete" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
        </div>
    </div>
</div>

<script>
    window.onload = function(){
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('#modalLabel').text('Vas a borrar el member: ' + id);
            let action = modal.find('#formDelete').attr('data-action').slice(0, -1) + id;
            modal.find('#formDelete').attr('action', action);
            });
    }
</script>

@endsection