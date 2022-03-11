@include('menus.navbar')

<div class="container">
    <form action="{{ url('usuario') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('menus.form', ['modo'=>'Crear'])
    </form>
</div>
