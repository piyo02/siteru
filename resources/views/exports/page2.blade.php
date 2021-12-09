<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $violation_letter->number }}</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> --}}

    <style>
        hr.rounded {
            border-top: 8px solid black;
            border-radius: 5px;
            margin-top: -10px;
        }
        hr.rounded-sm {
            border-top: 2px solid black;
            border-radius: 5px;
            margin-top: -13px;
        }
    </style>
</head>
<body>
    <table class="table table-borderless table-sm">
        <tbody>
            <tr>
                <td width="75px" class="pt-4">
                    <img src="{{ public_path('storage/images/kendari.png') }}" width="70px">
                </td>
                <td class="text-center pt-3">
                    <h3>PEMERINTAH KOTA KENDARI</h3>
                    <h2><b>DINAS PEKERJAAN UMUM DAN PENATAAN RUANG</b></h2>
                    <p><i>Jl. Abunaawas No. 24 Kendari Telepon/Fax. (0401) 322491</i></p>
                </td>
            </tr>
        </tbody>
    </table>
    <hr class="rounded">
    <hr class="rounded-sm">
    <div class="text-center mb-5">
        <h1><U>LAMPIRAN</U></h1>
    </div>
    
    @foreach ($attachment_letters as $attachment_letter)
        <img src="{{ public_path('storage') . '/' . $attachment_letter->attachment }}" width="400px" style="margin: 0 60px 30px 0">
    @endforeach

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script> --}}
</body>
</html>