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
    @foreach ($geometry as $geometr)
    <form action="{{ url('geometry/' .$geometr->id) }}?id={{ $_GET['id'] }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$geometr->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="geometry__of__object__of__evaluation" id="geometry__of__object__of__evaluation" value="{{$geometr->geometry}}" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success" style="--bs-btn-color: #040000;"></br>
    </form>
    @endforeach
</body>
</html>
</x-app-layout>
