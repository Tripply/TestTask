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
                            <th class="px-4 py-2">Имя</th>
                            <th class="px-4 py-2">Телефон</th>
                            <th class="px-4 py-2">Сумма совершенных покупок</th>
                            <th class="px-4 py-2">Количество посещений</th>
                        </tr>
                        </thead>
                        <tbody id="user-table-body">
                            <tr>
                                <td contenteditable="true" style="text-align: center"></td>
                                <td id="phone_number" pattern="[0-9]{11}" contenteditable="true" style="text-align: center"></td>
                                <td style="text-align: center"></td>
                                <td style="text-align: center"></td>
                                <td>
                                    <button id="add-customer-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Добавить
                                    </button>
                                </td>
                            </tr>

                        @foreach ($customers as $customer)
                            <tr>
                                <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                                <td contenteditable="true" style="text-align: center">{{ $customer->name }}</td>
                                <td id="phone_number" pattern="[0-9]{11}" contenteditable="true" style="text-align: center">{{ $customer->phone_number }}</td>
                                <td style="text-align: center">{{ $customer->total_purchase_amount }}</td>
                                <td style="text-align: center">{{ $customer->purchase_count }}</td>
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
            var customerId = row.find('input[name="customer_id"]').val();
            var name = row.find('td:eq(0)').text();
            var phone_number = row.find('td:eq(1)').text();
            var cleanedPhoneNumber = phone_number.replace(/\D/g, '');

            if (cleanedPhoneNumber.length === 11) {
                $.ajax({
                    url: '/customer/'+ customerId,
                    type: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'PUT',
                        id: customerId,
                        name: name,
                        phone_number: phone
                    },
                    success: function (response) {
                        location.reload();
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            } else {
                alert('Номер должен содержать 11 цифр');
            }
        });

        $('.delete-btn').click(function () {
            var row = $(this).closest('tr');
            var customerId = row.find('input[name="customer_id"]').val();

            $.ajax({
                url: '/customer/'+ customerId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'DELETE',
                    id: customerId,
                },
                success: function (response) {
                    location.reload();
                },
                error: function (error) {
                    console.error(error);
                }
            });
        });

        $('#add-customer-button').click(function () {
            var row = $(this).closest('tr');
            var name = row.find('td:eq(0)').text();
            var phone_number = row.find('td:eq(1)').text();
            var cleanedPhoneNumber = phone_number.replace(/\D/g, '');

            if (cleanedPhoneNumber.length === 11) {
                $.ajax({
                    url: '/customer/create',
                    type: 'GET',
                    data: {
                        name: name,
                        phone_number: phone_number,
                    },
                    success: function (response) {
                        location.reload();
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            } else {
                alert('Номер должен содержать 11 цифр');
            }
        });
    });
</script>
