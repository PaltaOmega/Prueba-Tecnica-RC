@if (count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<label for="name">Nombre</label>
<input type="text" name="name" value="{{ isset($document->Name)?$document->Name:'' }}" id="name">
<br>

<input type="file" name="archivo" value="" id="archivo">
<br>

<select class="form-select" name="user_id" aria-label="Default select example" id="user_id">
    <option selected value="">Usuario a asociar el archivo</option>
    @foreach ($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
    @endforeach
</select>
<br>

<label for="confirmar"></label>
<input type="submit" value="Ingresar documento">

