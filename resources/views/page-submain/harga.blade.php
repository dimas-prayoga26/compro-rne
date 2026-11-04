@extends('page-submain.submain')

@section('css-additional')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<style>
    .table-container { background:#fff; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.05); padding:20px; }
    table.dataTable { border:none!important; width:100%!important; background:#fff; }
    table.dataTable thead th { background:#fff!important; color:#444; font-weight:600; border:none!important; padding:14px 12px; text-align:left; }
    table.dataTable tbody td { padding:12px; border:none!important; color:#333; }
    table.dataTable tbody tr:hover { background:#f9fbff; }
    .dataTables_wrapper .dataTables_info { float:left; margin-top:10px; font-size:14px; color:#666; }
    .dataTables_wrapper .dataTables_paginate { float:right; margin-top:10px; }
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border:none!important; padding:6px 12px; margin:0 2px; border-radius:6px;
        background:#f1f1f1; color:#333!important; cursor:pointer; transition:0.2s;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current { background:#007bff!important; color:#fff!important; }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover { background:#007bff!important; color:#fff!important; }
</style>
@endsection

@section('title', 'Harga BBM Pertamina')

@section('content')
<section id="harga" class="my-lg-5 my-md-1">
    {{-- Title --}}
    <div class="container container-title" data-aos="zoom-in" data-aos-duration="700" data-aos-once="true">
        <div class="text-title py-lg-5 py-md-4 py-sm-5">
            <h1 class="fw-bold text-center text-white">Harga BBM Pertamina</h1>
            <p class="text-white text-center fw-light">
                Update harga bahan bakar terbaru secara resmi.<br>
                Memberikan data yang Anda butuhkan untuk perencanaan efektif.
            </p>
        </div>
    </div>

    {{-- Filter Form --}}
    <div class="container my-4 p-4 rounded-3" style="background:#003c8f;" data-aos="fade-up" data-aos-duration="700">
        <h4 class="text-white text-center mb-4">Cari Data Harga BBM Pertamina</h4>
        <form id="filterForm" class="row g-3 justify-content-center">
            <div class="col-md-3">
                <label for="jenisBBM" class="form-label text-white">Jenis BBM</label>
                <select id="jenisBBM" class="form-select">
                    <option value="B40" selected>BBM Industri B40</option>
                    <option value="HSFO">BBM Industri HSFO</option>
                    <option value="LSFO">BBM Industri LSFO</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="wilayah" class="form-label text-white">Wilayah</label>
                <select id="wilayah" class="form-select">
                    <option value="1" selected>Wilayah 1</option>
                    <option value="2">Wilayah 2</option>
                    <option value="3">Wilayah 3</option>
                    <option value="4">Wilayah 4</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="periodeDate" class="form-label text-white">Tanggal Periode</label>
                <input type="date" id="periodeDate" class="form-control">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="button" id="btnFilter" class="btn btn-light w-100">Cari Data</button>
            </div>
        </form>
    </div>

    {{-- Table B40 --}}
    <div id="tableB40" class="container px-0 my-4 table-wrapper">
        <h2 class="fw-semibold mb-3">Harga BBM Industri HSD B40</h2>
        <div class="table-container">
            <table id="tblB40" class="bbmTable display" style="width:100%">
                <thead>
                    <tr>
                        <th class="d-none">Tanggal Sortir</th>
                        <th>Periode</th>
                        <th class="col-wilayah1">Harga Wilayah 1</th>
                        <th class="col-wilayah2">Harga Wilayah 2</th>
                        <th class="col-wilayah3">Harga Wilayah 3</th>
                        <th class="col-wilayah4">Harga Wilayah 4</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->B40 as $item)
                    <tr>
                        <td class="d-none">{{ $item->tanggal_awal }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_awal)->translatedFormat('d') }}-{{ \Carbon\Carbon::parse($item->tanggal_akhir)->translatedFormat('d F Y') }}</td>
                        <td>Rp {{ number_format($item->harga_1, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->harga_2, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->harga_3, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->harga_4, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Table HSFO --}}
    <div id="tableHSFO" class="container px-0 my-4 table-wrapper d-none">
        <h2 class="fw-semibold mb-3">Harga BBM Industri HSFO</h2>
        <div class="table-container">
            <table id="tblHSFO" class="bbmTable display" style="width:100%">
                <thead>
                    <tr>
                        <th class="d-none">Tanggal Sortir</th>
                        <th>Periode</th>
                        <th class="col-wilayah1">Harga Wilayah 1</th>
                        <th class="col-wilayah2">Harga Wilayah 2</th>
                        <th class="col-wilayah3">Harga Wilayah 3</th>
                        <th class="col-wilayah4">Harga Wilayah 4</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->HSFO as $item)
                    <tr>
                        <td class="d-none">{{ $item->tanggal_awal }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_awal)->translatedFormat('d') }}-{{ \Carbon\Carbon::parse($item->tanggal_akhir)->translatedFormat('d F Y') }}</td>
                        <td>Rp {{ number_format($item->harga_1, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->harga_2, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->harga_3, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->harga_4, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Table LSFO --}}
    <div id="tableLSFO" class="container px-0 my-4 table-wrapper d-none">
        <h2 class="fw-semibold mb-3">Harga BBM Industri LSFO</h2>
        <div class="table-container">
            <table id="tblLSFO" class="bbmTable display" style="width:100%">
                <thead>
                    <tr>
                        <th class="d-none">Tanggal Sortir</th>
                        <th>Periode</th>
                        <th class="col-wilayah1">Harga Wilayah 1</th>
                        <th class="col-wilayah2">Harga Wilayah 2</th>
                        <th class="col-wilayah3">Harga Wilayah 3</th>
                        <th class="col-wilayah4">Harga Wilayah 4</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->LSFO as $item)
                    <tr>
                        <td class="d-none">{{ $item->tanggal_awal }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_awal)->translatedFormat('d') }}-{{ \Carbon\Carbon::parse($item->tanggal_akhir)->translatedFormat('d F Y') }}</td>
                        <td>Rp {{ number_format($item->harga_1, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->harga_2, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->harga_3, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->harga_4, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Keterangan Wilayah --}}
    <div class="container my-4" data-aos="zoom-in" data-aos-duration="700" data-aos-once="true">
        <h4 class="text-center">Keterangan Wilayah</h4>
        <hr class="line-bar mx-auto mb-4">
        <ul class="fw-light">
            <li class="fs-5">Wilayah 1 berlaku untuk titik suplai yang berada di Sumatera, Jawa, Bali, dan Madura.</li>
            <li class="fs-5">Wilayah 2 berlaku untuk titik suplai yang berada di Kalimantan.</li>
            <li class="fs-5">Wilayah 3 berlaku untuk titik suplai yang berada di Sulawesi dan NTB.</li>
            <li class="fs-5">Wilayah 4 berlaku untuk titik suplai yang berada di Papua, Maluku, dan NTT.</li>
        </ul>
    </div>
</section>

<!-- jQuery & DataTables -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
function parsePeriodeToRange(text) {
    // contoh: "1-14 September 2025"
    let match = text.match(/(\d{1,2})-(\d{1,2}) (\w+) (\d{4})/);
    if (!match) return null;
    let [_, d1, d2, bulanText, tahun] = match;

    const bulanMap = {
        'Januari':0,'Februari':1,'Maret':2,'April':3,'Mei':4,'Juni':5,
        'Juli':6,'Agustus':7,'September':8,'Oktober':9,'November':10,'Desember':11
    };

    let bulan = bulanMap[bulanText];
    if (bulan === undefined) return null;

    let start = new Date(tahun, bulan, parseInt(d1));
    let end   = new Date(tahun, bulan, parseInt(d2));
    return {start, end};
}

$(document).ready(function(){
    function buatDataTable(id){
        return $(id).DataTable({
            paging:true, searching:false, order:[[0,'desc']],
            columnDefs:[{targets:0, visible:false, searchable:false}],
            language:{ info:"Menampilkan _START_ - _END_ dari _TOTAL_ data" }
        });
    }

    let dtB40  = buatDataTable('#tblB40');
    let dtHSFO = buatDataTable('#tblHSFO');
    let dtLSFO = buatDataTable('#tblLSFO');

    function showWilayah(dt, wilayah){
        for(let i=2;i<=5;i++){ dt.column(i).visible(i===(wilayah+1)); }
    }

    // default
    $('#tableB40').removeClass('d-none');
    showWilayah(dtB40,1);

    // filter button
    $('#btnFilter').on('click', function(){
        let jenis = $('#jenisBBM').val();
        let wilayah = parseInt($('#wilayah').val(),10);
        let selectedDate = $('#periodeDate').val() ? new Date($('#periodeDate').val()) : null;

        $('.table-wrapper').addClass('d-none');
        let aktif;
        if(jenis==='B40'){ $('#tableB40').removeClass('d-none'); aktif=dtB40; }
        if(jenis==='HSFO'){ $('#tableHSFO').removeClass('d-none'); aktif=dtHSFO; }
        if(jenis==='LSFO'){ $('#tableLSFO').removeClass('d-none'); aktif=dtLSFO; }

        showWilayah(aktif, wilayah);

        aktif.rows().every(function(){
            let row = $(this.node());
            let periodeText = this.data()[1]; // kolom periode
            let range = parsePeriodeToRange(periodeText);

            if(!selectedDate){
                row.show();
                return;
            }
            if(range && selectedDate>=range.start && selectedDate<=range.end){
                row.show();
            } else {
                row.hide();
            }
        });
    });
});
</script>
@endsection
