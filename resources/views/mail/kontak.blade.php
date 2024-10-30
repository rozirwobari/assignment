<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RZW Email Template</title>
    <style>
        /* Add inline styles for compatibility */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        .rzw-box {
            width: 100%;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin: 20px auto;
        }
        h1 {
            text-align: center;
            font-size: 24px;
            color: #333;
            margin: 0 0 20px 0;
        }
        .rzw-content {
            padding: 0 10px;
        }
        .rzw-table {
            width: 100%;
            border-collapse: collapse;
        }
        .rzw-table td {
            padding: 8px 0;
            vertical-align: top;
            font-size: 14px;
            color: #555;
        }
        .rzw-table td:first-child {
            font-weight: bold;
            color: #333;
        }
        .rzw-table td:nth-child(2) {
            width: 10px;
        }
    </style>
</head>
<body>

    <div class="rzw-box">
        <h1>{{ $data['subject'] }}</h1>
        <div class="rzw-content">
            <table class="rzw-table">
                <tr>
                    <td><strong>Nama</strong></td>
                    <td>:</td>
                    <td>{{ $data['name'] }}</td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td>:</td>
                    <td>{{ $data['email'] }}</td>
                </tr>
                <tr>
                    <td><strong>Pesan</strong></td>
                    <td>:</td>
                    <td>{{ $data['message'] }}</td>
                </tr>
            </table>
        </div>
    </div>

</body>
</html>
