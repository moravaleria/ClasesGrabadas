<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
      <div class="container text-center">

      <form action="{{ route('users.store')}}" method="post">
        @csrf
        <div class="input-group mb-3">
            <label class="input-group-text" for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" placeholder="Username" name="name">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="correo">correo:</label>
            <input type="email" class="form-control" id="correo" placeholder="Username" name="email">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="telefono">Telefono:</label>
            <input type="phone" class="form-control" id="telefono" placeholder="Username" name="phone">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="password">Contraseña:</label>
            <input type="password" class="form-control" id="password" placeholder="Username" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Usuario</button>
      </form>

        <table class="table table-striped">
              <thead>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Telefono</th>
              </thead>
              <tbody>
                  @foreach ($users as $user)
                  <tr>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->phone}}</td>
                  </tr>
                  @endforeach
              </tbody>
        </table>
    
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>