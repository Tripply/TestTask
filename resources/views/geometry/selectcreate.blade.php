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
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Геометрия') }}
            </h2>
        </x-slot>
<div class="container mt-3">

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
        <td>{{ json_decode($object->Address, JSON_UNESCAPED_UNICODE)}}</td>
        <td>{{ $object->Description }}</td>
        <td>

            <a href="{{ url('/geometry/create') }}?id={{ $object->id }}" title=""><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Выбрать</button></a>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>

</body>
</html>
</x-app-layout>
