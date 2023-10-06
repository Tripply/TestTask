<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">email</th>
                            <th class="px-4 py-2">пароль</th>
                        </tr>
                        </thead>
                        <tbody id="user-table-body">
                        <tr>
                            <td contenteditable="true" style="text-align: center"></td>
                            <td id="phone_number" pattern="[0-9]{11}" contenteditable="true" style="text-align: center"></td>
                            <td>
                                <button id="add-user-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Добавить
                                </button>
                            </td>
                        </tr>

                        @foreach ($users as $user)
                            <tr>
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <td contenteditable="true" style="text-align: center">{{ $user->email }}</td>
                                <td id="password" style="text-align: center">{{ "**************" }}</td>
                                <td>
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded delete-btn">
                                        Удалить
                                    </button>
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded save-btn">
                                        Сохранить
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.save-btn').click(function () {
            var row = $(this).closest('tr');
            var userId = row.find('input[name="user_id"]').val();
            var email = row.find('td:eq(0)').text();

                $.ajax({
                    url: '/user/'+ userId,
                    type: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'PUT',
                        id: userId,
                        email: email,
                    },
                    success: function (response) {
                        location.reload();
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
        });

        $('.delete-btn').click(function () {
            var row = $(this).closest('tr');
            var userId = row.find('input[name="user_id"]').val();

            $.ajax({
                url: '/user/'+ userId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'DELETE',
                    id: userId,
                },
                success: function (response) {
                    location.reload();
                },
                error: function (error) {
                    console.error(error);
                }
            });
        });

        $('#add-user-button').click(function () {
            var row = $(this).closest('tr');
            var email = row.find('td:eq(0)').text();
            var password = row.find('td:eq(1)').text();

                $.ajax({
                    url: '/user/create',
                    type: 'GET',
                    data: {
                        email: email,
                        password: password,
                    },
                    success: function (response) {
                        location.reload();
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
        });
    });
</script>
