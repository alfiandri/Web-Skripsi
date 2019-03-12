<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Skripsi - Laporan Hasil Prediksi</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        body{
            font-family:'Times New Roman', sans-serif;
            color:#333;
            text-align:left;
            font-size:18px;
            margin:0;
        }
        caption{
            font-size:20px;
            margin-bottom:15px;
        }
        .center{
            text-align: center;
        }
        .right{
            text-align: right;
        }
        .left{
            text-align: left;
        }
        /* table{
            border:1px solid #333;
            border-collapse:collapse;
            margin:0 auto;
            width:740px;
        } */
        /* td, tr, th{
            padding:12px;
            border:1px solid #333;
            width:185px;
        } */
        th{
            background-color: #f3f3f3;
        }
       /*  h4, p{
            margin:0px;
        } */
    </style>
</head>
<body>
    <div class="container">
        <div class="col s12">
            <div class="center">
                <caption>
                    <h5><b>Laporan Hasil Prediksi</b></h5>
                </caption>
                <caption>
                    <h6>{{ date('d/m/Y') }}</h6>
                </caption>
            </div>
            <div class="row">
                <div class="col left">
                    User : {{ Auth::user()->username }}
                </div>
            </div>
            <table width="100%" class="striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Inflasi</th>
                        <th>Kurs Dollar</th>
                        <th>Suku Bunga</th>
                        <th>Hasil Prediksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->bulan }}</td>
                            <td>{{ $row->inflasi }} %</td>
                            <td>Rp {{ number_format($row->kursdollar) }}</td>
                            <td>{{ $row->sukubunga }} %</td>
                            <td>Rp {{ number_format($row->hasil*100) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="container">
            <div class="row" style="margin-top: 20px;">
                <div class="col s7 offset-s10" style="width: 30%;">
                    Medan, {{ date('d F Y') }}
                    <br>
                    Diterbitkan oleh,
                    <br>
                    <p><img src="https://i.ibb.co/5BzPwYy/sig.jpg">
{{--                     <div style="display:block; height: 100px; background-image: url({{ public_path('img/sig.png') }}); background-position: center; background-size: cover">
                    </div> --}}
                    <br>
                    Alfiandri Putra P.
                </div>
            </div>
        </div>
    </div>
</body>
</html>