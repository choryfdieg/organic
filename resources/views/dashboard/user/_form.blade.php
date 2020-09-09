@csrf

<div class="form-group">
    <label for="name">Name</label>
<input type="text" name="name" class="form-control" value="{{old('name', $user->name)}}">            
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="text" name="email" class="form-control"  value="{{old('email', $user->email)}}">
</div>

<div class="form-group">
    <label for="rol_id">Rol</label>
    <select type="text" name="rol_id" class="form-control"  value="{{old('rol_id', $user->rol_id)}}">
        @foreach ($rols as $id => $key)
            <option {{($user->rol_id == $id) ? 'selected' : ''}} value="{{$id}}">{{$key}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="password">Password</label>
<input type="password" name="password" class="form-control" value="{{old('password', $user->password)}}">            
</div>

<input type="submit" value="Enviar" class="btn btn-primary">