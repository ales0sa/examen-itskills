<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title> Examen </title>
  </head>
  <body>


<nav class="navbar navbar-light bg-light">


    <a href="{{ url('/') }}/test" class="btn btn-outline-success" > Probar Base de Datos </a>
    <a href="{{ url('/') }}/json" class="btn btn-outline-primary" > JSON Completo </a>

    {{ $invoices->links() }}

</nav>





<div class="container-fluid">

<table class="table">
    <thead>
            <th>Fecha</th>
            <th>Tipo</th>
            <th>CUIT</th>
            <th>Razon Social</th>
            <th>Cantidad Items</th>
            <th>Total</th>
            <th>Acciones</th>
    </thead>

    <tbody>

    @foreach($invoices as $invoice)

        <tr>
            <td> {{ $invoice->created_at_format_es }}</td>
            <td> {{ $invoice->type }} {{ $invoice->letter }} </td>
            <td> {{ $invoice->document_type }} {{ $invoice->document_number_format }} </td>
            <td> {{ $invoice->social_reason }} 
                <small> {{ $invoice->impositive_profile }} </small>
            </td>
            <td> {{ $invoice->item_count }} </td>
            <td> {{ $invoice->total }} </td>
            <td> 
                <a href="{{ url('/') }}/detail/{{ $invoice->id }}"  class="btn btn-sm btn-outline-primary"> Detalle </a> 
                <a href="{{ url('/') }}/detail/{{ $invoice->id }}/json"  class="btn btn-sm btn-outline-secondary">  JSON </a> </td>            
            </tr>

    @endforeach

    </tbody>



</table>


</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>

