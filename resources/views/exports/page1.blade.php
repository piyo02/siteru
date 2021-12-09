<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $violation_letter->number }}</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
    <div class="text-end"><span style="margin-right: 60px;">Kendari,</span><span style="margin-right: 30px;">{{ date('d - m - Y') }}</span></div>
    <div class="text-end"><i style="margin-right: 172px;">K e p a d a</i></div>
    <table class="table table-sm">
        <tr>
            <td width="80px">Nomor</td>
            <td width="10px">:</td>
            <td width="270px">{{ $violation_letter->number }}</td>
            <td></td>
            <td><span style="margin-left: 240px;">Yth. Sdr(i) {{ $violation_letter->offender }}</span></td>
        </tr>
        <tr>
            <td width="80px">Lampiran</td>
            <td width="10px">:</td>
            <td width="270px"> Lembar</td>
            <td></td>
            <td><span style="margin-left: 220px;">di -</span></td>
        </tr>
        <tr>
            <td width="80px">Perihal</td>
            <td width="10px">:</td>
            <td width="270px"><b><u>{{ $violation_letter->regarding }}</u></b></td>
            <td></td>
            <td><span style="margin-left: 250px;"><b><u>T e m p a t</u></b></span></td>
        </tr>
    </table>
    
    <div style="margin-left: 50px">
        <span>Dasar Pelaksanaan:</span>
        <ol>
            <li>Undang-Undang Nomor 26 Tahun 2007 Tentang Penataan Ruang;</li>
            <li>Peraturan Daerah Nomor 1 Tahun 2012 Tentang Rencana Tata Ruang Wilayah (RTRW) Kota Kendari Tahun 2010-2030;</li>
            <li>Peraturan Daerah Nomor 1 Tahun 2013 Tentang Reteribusi Izin Mendirikan Bangunan;</li>
            <li>Peraturan Daerah Nomor 15 Tahun 2008 Tentang Garis Sempadan Bangunan;</>
            <li>Peraturan Walikota Kendari Nomor 36 Tahun 2011 Tentang Petunjuk Pelaksanaan Peraturan Daerah Nomor 15 Tahun 2008 Tentang Garis Sempadan Bangunan; dan</>
            <li>Peraturan Walikota Kendari Nomor 55 Tahun 2019 Tentang Tata Cara Pengenaan Sanksi Administratif Pelanggaran Pemanfaatan Ruang.</>
        </ol>
        <span>Berdasarkan hasil pemantauan dan pemeriksaan Petugas Pengendalian Pemanfaatan Ruang, bahwa Aktifitas Pembangunan Saudara(i) melanggar Undang-Undang Pemanfaatan Ruang tersebut diatas, yaitu :</span>
        <ol>
            @foreach ($violations as $violation)
                <li>{{ $violation->description }}</li>
            @endforeach
        </ol>
        <span>Pada lokasi dimaksud sebagai berikut :</span>
        <table class="table table-borderless table-sm">
            <tr>
                <td width="200px">Kegiatan Pembangunan</td>
                <td width="10px">:</td>
                <td>{{ $violation_letter->activity }}</td>
            </tr>
            <tr>
                <td width="200px">Jalan</td>
                <td width="10px">:</td>
                <td>{{ $violation_letter->street }}</td>
            </tr>
            <tr>
                <td width="200px">Kelurahan</td>
                <td width="10px">:</td>
                <td>{{ $violation_letter->village }}</td>
            </tr>
            <tr>
                <td width="200px">Kecamatan</td>
                <td width="10px">:</td>
                <td>{{ $violation_letter->districts }}</td>
            </tr>
        </table>
        <span>Untuk menghindari adanya kerugian Saudara(i) yang lebih besar, diminta untuk segera menghentikan kegiatan pembangunan fisik apa pun sebelum memiliki izin pemanfaatan ruang dan/atau mendapat persetujuan dari Pemerintah Kota Kendari dan segera memenuhi Teguran/Panggilan ini pada Kantor Dinas PUPR Kota Kendari dengan membawa serta Teguran/Panggilan ini dan surat-surat pendukung lainnya pada :</span>
        <table class="table table-borderless table-sm">
            <tr>
                <td width="50px">Waktu</td>
                <td width="10px">:</td>
                <td>Setiap hari kerja Kantor paling lambat 3 (tiga) hari terhitung sejak diterimanya Surat Teguran/Panggilan ini.</td>
            </tr>
            <tr>
                <td width="50px">Tempat</td>
                <td>:</td>
                <td>Ruang Pengendalian dan Kelayakan Tata Ruang.</td>
            </tr>
            <tr>
                <td width="50px">Untuk</td>
                <td>:</td>
                <td>Mendapatkan petunjuk teknis.</td>
            </tr>
        </table>
        <p>Bila Saudara(i) tidak mengindahkan Teguran/Panggilan ini, maka akan diambil langkah yang lebih tegas dengan pemberian Sanksi Administratif.</p>
        <span>Demikian disampaikan untuk dilaksanakan atas perhatiannya diucapkan terima kasih.</span>
    </div>

    <table class="table table-borderless table-sm">
        <tr>
            <td width="50%" class="text-center">Yang Menerima Panggilan</td>
            <td width="50%" class="text-center">An. Kepala Dinas PU & Penataan Ruang</td>
        </tr>
        <tr>
            <td width="50%" class="text-center"></td>
            <td width="50%" class="text-center">Kabid. Penataan Ruang,</td>
        </tr>
        <tr>
            <td width="50%" class="text-center">
                <img src="{{ public_path('storage') . '/' . $violation_letter->signature }}" height="80px">
            </td>
            <td width="50%" class="text-center">
                <img src="{{ public_path('storage') . '/' . $signature->value }}" height="80px">
            </td>
        </tr>
        <tr>
            <td width="50%" class="text-center">{{ $violation_letter->offender }}</td>
            <td width="50%" class="text-center"><b><u>{{ $violation_letter->name }}</u></b></td>
        </tr>
        <tr>
            <td width="50%" class="text-center"></td>
            <td width="50%" class="text-center">{{ $violation_letter->employee_number }}</td>
        </tr>
    </table>

    Tembusan:
    <ol>
        <li>Kepala Dinas PUPR Kota Kendari di Kendari;</li>
        <li>Kasat. Pol. PP Kota Kendari di Kendari;</li>
        <li>Kepala Bagian Hukum dan HAM Setda Kota Kendari di Kendari;</li>
        <li>Camat <u>{{ $violation_letter->village }}</u></li>
        <li>Lurah <u>{{ $violation_letter->districts }}</u></li>
    </ol>
    <br><br>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>