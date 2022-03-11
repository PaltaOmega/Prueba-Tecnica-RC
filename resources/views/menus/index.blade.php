@include('menus.navbar')

<div class="container">
    @if (Session::has('mensaje'))
        {{ Session::get('mensaje') }}
    @endif

    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    <td>
                        @can('user.edit')
                            <a href="{{ url('/usuario/'.$user->id.'/edit') }}">Editar</a>
                        @endcan

                        @can('user.delete')
                        <form action="{{ url('/usuario/'.$user->id) }}" method="POST">
                            @csrf

                            {{ method_field('DELETE') }}
                            <input type="submit" onclick="return confirm('¿Esta seguro que desea borrar al usuario?')"
                            value="Borrar">
                        </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
