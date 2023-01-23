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
<div class="container mt-3">
  <a href='{{ url('/object/create') }}' type="button" class="btn btn-primary btn-sm" style="--bs-btn-color: #040000;"><span class="bi bi-plus"></span>&nbsp;Добавить обьект</a>
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
          <a href="{{ url('/object/' . $object->id) }}" title="View Object"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/object/' . $object->id . '/edit') }}" title="Edit Object"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/object' . '/' . $object->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Object" style="--bs-btn-color: #040000;" ><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>

</body>
</html>
</x-app-layout>
