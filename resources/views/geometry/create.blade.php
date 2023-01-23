<!DOCTYPE html>
<html lang="en">
<head>
  <title>Геометрия</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <form action="{{ url('geometry') }}" method="post">
        {!! csrf_field() !!}
        <label>Геометрия</label></br>
        <input type="text" name="geometry__of__object__of__evaluation" id="geometry__of__object__of__evaluation" class="form-control"></br>
        <input type="hidden" name="object_id" id="object_id" value="{{ $ObjId }}" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

</body>
</html>
