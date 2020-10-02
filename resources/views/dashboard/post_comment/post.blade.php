
@extends('dashboard.master')

@section('content')

@if (count($postComments) == 0)
   
<h1>No hay comentarios para el post seleccionado</h1>

@else

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>title</th>
            <th>user_id</th>
            <th>post_id</th>
            <th>posted</th>
            <th>created at</th>
            <th>update at</th>
            <th>actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($postComments as $postComment)
        <tr>
            <td>
                {{$postComment->id}}
            </td>
            <td>
                {{$postComment->title}}
            </td>
            <td>
                {{$postComment->user_id}}
            </td>
            <td>
                {{$postComment->post_id}}
            </td>
            <td>
                {{$postComment->posted}}
            </td>
            <td>
                {{$postComment->created_at->format('Y-m-d')}}
            </td>
            <td>
                {{$postComment->updated_at->format('Y-m-d')}}
            </td>
            <td>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#commentModal" data-id="{{$postComment->id}}">Ver</button>
            <button type="button" class="btn {{($postComment->posted == 'yes') ? 'btn-danger' : 'btn-success'}} status-button" data-id="{{$postComment->id}}">Cambia estado</button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-id="{{$postComment->id}}">Eliminar</button>
        </tr>
            
        @endforeach
    </tbody>
</table>

{{$postComments->links()}}



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
            <form action="" data-action="{{route('post-comment.destroy', 0)}}" id="formDelete" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Detalle del comentario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="form-group">
                    <label for="title">Title</label>
                    <input readonly type="text" name="title" class="form-control" >            
                </div>
            
                <div class="form-group">
                    <label for="user_id">User</label>
                    <input readonly type="text" name="user_id" class="form-control">
                </div>
            
                <div class="form-group">
                    <label for="post_id">Post</label>
                    <input readonly type="text" name="post_id" class="form-control">
                </div>
            
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea readonly name="comment" cols="30" rows="10" class="form-control"></textarea>
                </div>

            </div>
            
        </div>
    </div>
</div>

<script>
    window.onload = function(){

        document.querySelectorAll('.status-button').forEach(link => link.addEventListener('click', changeStatusComment))

        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('#modalLabel').text('Vas a borrar el POSTC COMMENT: ' + id);
            let action = modal.find('#formDelete').attr('data-action').slice(0, -1) + id;
            modal.find('#formDelete').attr('action', action);
        });

        $('#commentModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id') // Extract info from data-* attributes


            fetch("/dashboard/post-comment/" + id + "/comment")
            .then(response => response.json())
            .then(data => {
                for (const property in data) {

                    if(document.querySelector(`#commentModal [name="${property}"]`))
                        document.querySelector(`#commentModal [name="${property}"]`).value = data[property];

                }
            });
            
        });
    }

    function changeStatusComment(){

        var id = this.getAttribute('data-id');

        var data = {'_token': "{{csrf_token()}}", 'postComment': id};

        fetch("/dashboard/post-comment/"+id+"/status-comment", {
            method: 'PUT', 
            body: JSON.stringify(data), // data can be `string` or {object}!
            headers:{
                'Content-Type': 'application/json'
            }
            }).then(res => res.json())
            .catch(error => console.error('Error:', error))
            .then(response => console.log('Success:', response));
    }

</script>

@endif

@endsection