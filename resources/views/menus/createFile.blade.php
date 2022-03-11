@include('menus.navbar')

<div class="container">
    <form action="{{ url('registro_documentos') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('menus.upload')
    </form>
</div>
