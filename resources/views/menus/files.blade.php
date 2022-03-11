@include('menus.navbar')

<div class="container">

    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Usuario asociado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documents as $document)
                <tr>
                    <td>{{ $document->id }}</td>
                    <td>{{ $document->name }}</td>
                    <td>{{ $document->name_user }}</td>

                    <td>
                        <a href="{{ url('/descarga/'.$document->id) }}">Descargar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
