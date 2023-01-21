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

<div class="container mt-3">
  <h2>Objects</h2>
  <a href='{{ url('/object/create') }}' type="button" class="btn btn-primary btn-sm"><span class="bi bi-plus"></span>&nbsp;Добавить обьект</a>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Кадастровый номер</th>
        <th>Адрес</th>
        <th>Описание</th>
        <th>Действия</th>
      </tr>
    </thead>
    @foreach ($objects as $object)
    <tbody>
      <tr>
        <td>{{ $object->Cadastral_Number }}</td>
        <td>{{ json_encode($object->Address, JSON_UNESCAPED_UNICODE)}}</td>
        <td>{{ $object->Description }}</td>
        <td>
          <a href='{{ url('/object/create') }}' type="button" class="btn btn-primary btn-sm"><span class="bi bi-plus"></span>&nbsp;Редактировать</a>
          <a href='{{ url('/object/create') }}' type="button" class="btn btn-primary btn-sm"><span class="bi bi-plus"></span>&nbsp;Удалить</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>

</body>
</html>
