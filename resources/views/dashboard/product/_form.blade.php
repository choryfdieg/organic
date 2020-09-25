@csrf

<div class="form-group">
    <label for="title">Titulo</label>
    <input type="text" name="title" class="form-control" value="{{old('title', $product->title)}}">            
</div>

<div class="form-group">
    <label for="url_clean">Url limpia</label>
    <input type="text" name="url_clean" class="form-control"  value="{{old('url_clean', $product->url_clean)}}">
</div>

<div class="form-group">
    <label for="short_description">Descripcion corta</label>
    <textarea name="short_description" cols="30" rows="10" class="form-control rich_text">{{old('short_description', $product->short_description)}}</textarea>
</div>


<div class="form-group">
    <label for="description">Descripcion larga</label>
    <textarea name="description" cols="30" rows="10" class="form-control rich_text">{{old('description', $product->description)}}</textarea>
</div>

<div class="form-group">
    <label for="price">Precio</label>
    <input type="number" min="0" name="price" class="form-control" value="{{old('price', $product->price)}}">            
</div>

<div class="form-group">
    <label for="offer_price">Precio en oferta</label>
    <input type="number" min="0" name="offer_price" class="form-control" value="{{old('offer_price', $product->offer_price)}}">            
</div>

<div class="form-group">
    <label for="type_product_id">Tipo de producto</label>
    <select type="text" name="type_product_id" class="form-control"  value="{{old('type_product_id', $product->type_product_id)}}">
        <option value="1">Producto simple</option>
        <option value="2">Servicio</option>
    </select>
</div>

<div class="form-group">
    <label for="stock">Existencias</label>
    <input type="number" min="0" name="stock" class="form-control" value="{{old('title', $product->stock)}}">            
</div>

<div class="form-group">
    <label for="member_id">Vendedor</label>
    <select type="text" name="member_id" class="form-control"  value="{{old('member_id', $product->member_id)}}">
        @foreach ($members as $id => $title)
            <option {{($product->member_id == $id) ? 'selected' : ''}} value="{{$id}}">{{$title}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="category_product_id">Categoria</label>
    <select type="text" name="category_product_id" class="form-control"  value="{{old('category_product_id', $product->category_product_id)}}">
        <option value="1">Nutricion</option>
        <option value="2">Armonia</option>
        <option value="3">Higiene y aseo</option>
        <option value="4">Servicios</option>
    </select>
</div>

<div class="form-group">
    <label for="category_id">Estado del producto</label>
    <select type="text" name="status_product_id" class="form-control"  value="{{old('status_product_id', $product->status_product_id)}}">
        <option value="1">Disponible</option>
        <option value="2">Agotado</option>
        <option value="3">Sobre pedido</option>
    </select>
</div>

<div class="form-group">
    <label for="posted">Publicado</label>
    <select type="text" name="posted" class="form-control"  value="{{old('posted', $product->posted)}}">
        @include('dashboard.partials.option-yes-not', ['value' => $product->posted])
    </select>
</div>


<input type="submit" value="Enviar" class="btn btn-primary">

