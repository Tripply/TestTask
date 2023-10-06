<x-guest-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="color: #e5e7eb">
                    <div class="card-header">Расчет клиента с учетом скидки</div>
                    <div class="card-body" >
                        <form method="GET" action="{{ route('purchase.create') }}" class="mt-6 space-y-6">
                            @csrf


                            <div>
                                <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                                <label >Имя </label>
                                <label for="customer_id">{{ $customer->name}}</label>
                            </div>

                            <div>
                                <input type="hidden" name="discount" value="{{ $discount }}">
                                <label >Скидка </label>
                                <label id="discount" name="discount" for="customer_id">{{ $discount}}</label>
                            </div>

                            <div>
                                <x-text-input id="summ" name="summ" class="mt-1 block w-full" inputmode="numeric" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Добавить') }}</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>


