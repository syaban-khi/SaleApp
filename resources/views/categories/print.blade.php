<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .header-info {
            text-align: center;
            margin-bottom: 30px;
        }

        .header-info p {
            margin: 5px 0;
        }

        .header-info strong {
            font-size: 20px;
        }

        table.static {
            position: relative;
            width: 95%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        table.static th, table.static td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        table.static th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        table.static td {
            background-color: #ffffff;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #555;
        }

        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="header-info">
        <p><strong>{{ $shop->shop_name ?? 'K STORE' }}</strong></p>
        <p>Alamat: {{ $shop->address ?? 'Jalan Caia Blok K' }}</p>
        <p>Telp: {{ $shop->phone_number ?? '0213030' }} | Email: {{ $shop->email ?? 'kStore@gmail.com' }}</p>
        <p>Tanggal Print: {{ date('d-m-Y') }}</p>
    </div>
    <div class="form-group">
        <p align="center"><b>Report Category Data</b></p>
        <table class="static">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Category Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($printCategory as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->category_name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
