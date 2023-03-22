<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @font-face {
            font-family: "DejaVu Sans";
            font-style: normal;
            font-weight: 400;
            src: url("/fonts/dejavu-sans/DejaVuSans.ttf");
            /* IE9 Compat Modes */
            src:
                local("DejaVu Sans"),
                local("DejaVu Sans"),
                url("/fonts/dejavu-sans/DejaVuSans.ttf") format("truetype");
        }

        body {
            font-family: "DejaVu Sans";
            font-size: 12px;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
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
            @foreach ($bombOrders as $bombOrder)
                <tr>
                    <td class="text-center">{{ $bombOrder->getBomb()->getName() }}</td>
                    <td class="text-center">{{ $bombOrder->getAmount() }}</td>
                    <td class="text-center">{{ $bombOrder->getBomb()->getPrice() }}</td>
                    <td class="text-center">{{ $bombOrder->getAmount() * $bombOrder->getBomb()->getPrice() }}</td>
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
