
<h1>{{ $modo }} Usuario</h1>

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
<input type="text" name="name" value="{{ isset($user->name)?$user->name:old('name') }}" id="name">
<br>

<label for="email">Correo</label>
<input type="text" name="email" value="{{ isset($user->email)?$user->email:old('email') }}" id="email">
<br>

<label for="password">Contraseña</label>
<input type="password" name="password" value="" id="password">
<br>

<label for="confirmar"></label>
<input type="submit" value="{{ $modo }} datos">
