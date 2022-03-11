@include('menus.navbar')

<div class="container">
    <form action="{{ url('/usuario/'.$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{ method_field('PATCH') }}
        @include('menus.form', ['modo'=>'Editar'])
    </form>
</div>
