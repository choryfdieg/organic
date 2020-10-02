@csrf

<div class="form-group">
    <label for="title">Nombre</label>
    <input type="text" name="title" class="form-control" value="{{old('title', $vendor->title)}}">            
</div>

<div class="form-group">
    <label for="url_clean">Url limpia</label>
    <input type="text" name="url_clean" class="form-control"  value="{{old('url_clean', $vendor->url_clean)}}">
</div>

<div class="form-group">
    <label for="phone">Telefono</label>
    <input type="text" name="phone" class="form-control" value="{{old('phone', $vendor->phone)}}">            
</div>

<div class="form-group">
    <label for="email">Correo Electronico</label>
    <input type="text" name="email" class="form-control" value="{{old('email', $vendor->email)}}">            
</div>

<div class="form-group">
    <label for="address">Direccion</label>
    <input type="text" name="address" class="form-control" value="{{old('address', $vendor->address)}}">            
</div>

<div class="form-group">
    <label for="city_id">Ciudad</label>
    <select type="text" name="city_id" class="form-control"  value="{{old('city_id', $vendor->city_id)}}">
        @foreach ($cities as $id => $name)
            <option {{($vendor->city_id == $id) ? 'selected' : ''}} value="{{$id}}">{{$name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="category_id">Categoria</label>
    <select type="text" name="category_id" class="form-control"  value="{{old('category_id', $vendor->category_id)}}">
        @foreach ($categories as $id => $title)
            <option {{($vendor->category_id == $id) ? 'selected' : ''}} value="{{$id}}">{{$title}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="tags">Tags</label>
    <select multiple type="text" name="tags[]" class="form-control">
        @foreach ($tags as $id => $title)
            <option {{in_array($id, old('tags') ?: $vendor->tags->pluck('id')->toArray()) ? 'selected' : ''}} value="{{$id}}">{{$title}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="posted">Publicado</label>
    <select type="text" name="posted" class="form-control"  value="{{old('posted', $vendor->posted)}}">
        @include('dashboard.partials.option-yes-not', ['value' => $vendor->posted])
    </select>
</div>

<div class="form-group">
    <label for="description">Descripcion corta</label>
    <textarea name="description" cols="30" rows="4" class="form-control">{{old('description', $vendor->description)}}</textarea>
</div>

<div class="form-group">
    <label for="long_description">Descripcion larga</label>
    <textarea name="long_description" cols="30" rows="10" id="vendor_long_description" class="form-control">{{old('long_description', $vendor->long_description)}}</textarea>
</div>

<div class="form-group">
    <label for="service_description">Descripcion de servicios</label>
    <textarea name="service_description" cols="30" rows="10" id="vendor_service_description" class="form-control">{{old('service_description', $vendor->service_description)}}</textarea>
</div>

<input type="submit" value="Guardar cambios" class="btn btn-primary">

