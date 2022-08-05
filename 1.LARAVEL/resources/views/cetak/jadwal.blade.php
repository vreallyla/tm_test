<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document</title>
    <style>
        @page {
            margin: 0.3cm 0.6cm;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 2.3cm;
            margin-bottom: 1cm;
        }

        .bg-head {
            background-color: #063763;
            text-align: center;
            font-size: 1.3rem;
            padding: 23px 0px;
        }

        .bg-thead {
            background-color: #0c5394;
        }

        .bg-white {
            background-color: #fff;
        }

        .bg-group {
            background-color: #c9d9f8;
        }

        .text-white {
            color: #fff;
        }

        .text-black {
            color: #242424;
        }

        .w-full {
            width: 100%;
        }


        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
        }

        footer td {
            font-size: 12px;
        }

        footer table {
            position: relative;
            width: 100%;
            padding-top: 11px;
        }

        main table {
            border-collapse: collapse;
        }

        main table td,
        main table th {
            border: 1px #242424 solid;
        }

        .text-center {
            text-align: center;
        }

        header table.filter td,
        header table.filter th {
            border: 0px #fff solid;
            padding-left: 12px;
            padding-bottom: 4px;
        }

        main table th {
            padding: 10px 0px;
        }

        main table td {
            padding: 5px 0px;

        }


        .w-no {
            width: 44px;
        }

        .w-klinik {
            width: 150px;
        }

        table {
            width: 100%;
        }

        .px-2 {
            padding: 0 0.25rem;
        }
    </style>
</head>

<body>

    <main>
        <div class="bg-head text-white w-full">DATA JADWAL DOKTER RS TRUSTMEDIKA SURABAYA</div>

        <table>
            <thead>
                <tr class="bg-thead text-white">
                    <th class="w-no text-center">No</th>
                    <th class="w-klinik px-2">Klinik</th>
                    <th>Senin</th>
                    <th>Selasa</th>
                    <th>Rabu</th>
                    <th>Kamis</th>
                    <th>Jum'at</th>
                    <th>Sabtu</th>
                    <th>Minggu</th>
                </tr>
            </thead>
            <tbody>
                @inject('hari', 'App\Models\Hari')

                @foreach ($poli as $i => $item)
                    <tr class="bg-group text-black">
                        <td class="w-no text-center">{{ $i + 1 }}</td>
                        <td class="w-klinik px-2">{{ $item['nama'] }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @foreach ($item['m_pegawai'] as $pegawai)
                        <tr class="bg-white text-black">
                            <td class="w-no text-center"></td>
                            <td class="w-klinik px-2">{{ $pegawai['nama'] }}</td>
                            @foreach ($hari->getJadwal($pegawai['id'])->get() as $dt)
                                <td class="text-center">{{ $dt->jam_masuk ? $dt->jam_masuk . ' - ' . $dt->jam_pulang : '' }}</td>
                            @endforeach

                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </main>
</body>

</html>
