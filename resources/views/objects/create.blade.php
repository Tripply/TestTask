<!DOCTYPE html>
<html lang="en">
<head>
  <title>Objects</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <form action="{{ url('object') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="Cadastral_Number" id="Cadastral_Number" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="Address" id="Address" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="Description" id="Description" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

</body>
</html>
