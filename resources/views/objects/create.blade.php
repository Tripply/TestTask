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
    <form action="{{ url('object') }}" method="post" style="margin-left: 5%;margin-right: 5%;">
        {!! csrf_field() !!}
        <label>Кадастровый номер</label></br>
        <input type="text" name="Cadastral_Number" id="Cadastral_Number" class="form-control"></br>
        <label>Адрес</label></br>
        <input type="text" name="Address" id="Address" class="form-control"></br>
        <label>Описание</label></br>
        <input type="text" name="Description" id="Description" class="form-control"></br>
        <input type="submit" value="Сохранить" class="btn btn-success" style="--bs-btn-color: #040000;"></br>
    </form>

</body>
</html>
</x-app-layout>
