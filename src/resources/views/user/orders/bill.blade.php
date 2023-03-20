<!DOCTYPE html>
<html>

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
    <title>{{ __('orders.download_bill') }}</title>
</head>

<body>

    <h1 class="text-4xl text-center">{{ __('orders.bill_title') }}</h1>
    <p class="text-right">{{ __('orders.date') }}: {{ $date }}</p>
    <br />
    <div class="flex justify-center items-center">
        <table class="w-full">
            <tr>
                <th>{{ __('orders.bill_bomb') }}</th>
                <th>{{ __('orders.bill_amount') }}</th>
                <th>{{ __('orders.bill_unit_price') }}</th>
                <th>{{ __('orders.bill_total') }}</th>
            </tr>
            @foreach ($bombs as $bomb)
            <tr>
                <td class="text-center">{{ $bomb->getName() }}</td>
                <td class="text-center">{{ $bomb->pivot->amount }}</td>
                <td class="text-center">{{ $bomb->getPrice() }}</td>
                <td class="text-center">{{ $bomb->pivot->amount * $bomb->getPrice() }}</td>
            </tr>
            @endforeach
            <tr>
                <td class="text-center">-</td>
                <td class="text-center">-</td>
                <td class="text-center">-</td>
                <td class="text-center">{{ $total }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
