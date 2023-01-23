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
                {{ __('Обьекты') }}
            </h2>
        </x-slot>
    <div class="card" style="margin:20px;">
        <div class="card-header">Страница обьекта</div>
        <div class="card-body">
              <div class="card-body">
              <h5 class="card-title">Кадастровый номер  : {{ $object->Cadastral_Number }}</h5>
              <p class="card-text">Адрес : {{ $object->Address }}</p>
              <p class="card-text">Описание : {{ $object->Description }}</p>
        </div>
          </hr>
        </div>
      </div>

</body>
</html>
</x-app-layout>
