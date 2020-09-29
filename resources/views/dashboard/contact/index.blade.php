
@extends('dashboard.master')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>name</th>
            <th>email</th>
            <th>phone</th>
            <th>created at</th>
            <th>update at</th>
            <th>actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
        <tr>
            <td>
                {{$contact->id}}
            </td>
            <td>
                {{$contact->name}}
            </td>
            <td>
                {{$contact->email}}
            </td>
            <td>
                {{$contact->phone}}
            </td>
            <td>
                {{$contact->created_at->format('Y-m-d')}}
            </td>
            <td>
                {{$contact->updated_at->format('Y-m-d')}}
            </td>
            <td>
            <a href="{{route('contact.show', $contact->id)}}" class="btn btn-primary">Ver</a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-id="{{$contact->id}}">Eliminar</button>
        </tr>
            
        @endforeach
    </tbody>
</table>

{{$contacts->links()}}

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
            <form action="" data-action="{{route('contact.destroy', 0)}}" id="formDelete" method="POST">
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
            modal.find('#modalLabel').text('Vas a borrar el CONTACT: ' + id);
            let action = modal.find('#formDelete').attr('data-action').slice(0, -1) + id;
            modal.find('#formDelete').attr('action', action);
            });
    }
</script>

@endsection