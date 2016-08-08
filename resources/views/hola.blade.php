<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Hola mundo</h1>
    <form action="/foo/bar" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
    <?php
     foreach ($personas as $persona):
       echo '<li>',$persona,'</li>';
     endforeach;
    ?>
    @foreach($mascotas as $mascota)
      <li> {{ $mascota }} </li>
    @endforeach
  </body>
</html>
