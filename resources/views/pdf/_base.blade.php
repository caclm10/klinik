<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .header {
            border-bottom: 2px solid #35c4f2;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 20px;
            color: #333;
        }

        .header p {
            margin: 4px 0 0;
            color: #666;
            font-size: 11px;
        }

        h2 {
            font-size: 14px;
            margin: 20px 0 10px;
            color: #35c4f2;
            border-bottom: 1px solid #eee;
            padding-bottom: 4px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 16px;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
            vertical-align: top;
        }

        th {
            background: #35c4f2;
            color: #fff;
        }

        tbody tr:nth-child(even) {
            background: #f9f9f9;
        }

        .meta td {
            border: none;
            padding: 4px 0;
        }

        .meta td:first-child {
            width: 160px;
            font-weight: bold;
            color: #555;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .badge {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 10px;
            color: #fff;
            background: #1591dc;
        }

        .status-lunas {
            background: #33b43c;
        }

        .status-belum {
            background: #e3bc1f;
        }

        .capitalize {
            text-transform: capitalize;
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
