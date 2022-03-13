@extends('layout.master')
@section('title', 'Data Transaksi')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Form Input Resep</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('transaction.index') }}">Data Resep</a></div>
            <div class="breadcrumb-item">Form Input Resep</div>
        </div>
    </div>

    <div class="section-body">
    <form action="{{ route('transaction.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    {{ csrf_field() }}

        <div class="row">
            <div class="col-12 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="type2[]" value="0" required>
                            <label class="form-check-label" for="type">
                                <h4>Non Racikan</h4>
                            </label>
                        </div>

                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label>Obat</label>
                            <input type="text" class="form-control" placeholder="Cari Obat" id="values1" onchange="checkcombo('loading1', 'values1', 'combobox1', '{{ route('obat.json') }}')">
                            <select class="form-control" name="obat[]" id="combobox1" required>
                                <option value="">Pilih Obat</option>
                            </select>
                            <div id="loading1" class="loading">
                                <img src="{{ url('assets/img/loading.gif') }}"><small>Loading..</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Signa</label>
                            <input type="text" class="form-control" placeholder="Cari Signa" id="values2" onchange="checkcombo('loading2', 'values2', 'combobox2', '{{ route('signa.json') }}')">
                            <select class="form-control" name="signa[]" id="combobox2" required>
                                <option value="">Pilih Signa</option>
                            </select>
                            <div id="loading2" class="loading">
                                <img src="{{ url('assets/img/loading.gif') }}"><small>Loading..</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Qty</label>
                            <input type="text" name="qty2[]" placeholder="Masukkan Qty" class="form-control" required>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-12 col-md-9 col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="type[]" value="1" required>
                            <label class="form-check-label" for="type">
                                <h4>Racikan</h4>
                            </label>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table" id="multiForm">
                            <tr>
                                <th>Obat</th>
                                <th>Qty</th>
                                <th>Signa</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Cari Obat" id="values3" onchange="checkcombo('loading3', 'values3', 'combobox3', '{{ route('obat.json') }}')">
                                        <select class="form-control" name="obat_id[]" id="combobox3" required>
                                            <option value="">Pilih Obat</option>
                                        </select>
                                        <div id="loading3" class="loading">
                                            <img src="{{ url('assets/img/loading.gif') }}"><small>Loading..</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="qty[]" placeholder="Masukkan Qty" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Cari Signa" id="values4" onchange="checkcombo('loading4', 'values4', 'combobox4', '{{ route('signa.json') }}')">
                                        <select class="form-control" name="signa_m_id[]" id="combobox4" required>
                                            <option value="">Pilih Signa</option>
                                        </select>
                                        <div id="loading4" class="loading">
                                            <img src="{{ url('assets/img/loading.gif') }}"><small>Loading..</small>
                                        </div>
                                    </div>
                                </td>
                               
                                <td><input type="button" name="add" value="Add" id="addRemoveIp" class="btn btn-outline-dark"></td>
                            </tr>
                        </table>
                        <h5>Input Racikan Manual</h5>
                        <div class="form-group">
                        <table class="table" id="multiForm2">
                            <tr>
                                <th>Racikan Manual</th>
                                <th>Qty</th>
                                <th>Signa</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>
                                <div class="form-group">
                                        <input type="text" name="name[]" placeholder="Masukkan Racikan Manual" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="qty[]" placeholder="Masukkan Qty" class="form-control" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Cari Signa" id="values7" onchange="checkcombo('loading7', 'values7', 'combobox7', '{{ route('signa.json') }}')">
                                        <select class="form-control" name="signa_m_id[]" id="combobox7" required>
                                            <option value="">Pilih Signa</option>
                                        </select>
                                        <div id="loading7" class="loading">
                                            <img src="{{ url('assets/img/loading.gif') }}"><small>Loading..</small>
                                        </div>
                                    </div>
                                </td>
                               
                                <td><input type="button" name="add" value="Add" id="addRemoveIp2" class="btn btn-outline-dark"></td>
                            </tr>
                        </table>
                        </div>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <a href="{{ route('transaction.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </form>
    </div>
</section>
@endsection
@section('js-custom')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    $('.loading').hide();
    var i = 0;
    $("#addRemoveIp").click(function() {
        ++i;
        var route = "{{ route('obat.json') }}";
            var loading5 = "{{ asset('assets/img/loading.gif') }}";
            var loading = "loading5";
            var value = "obatalkes_nama";
            var combobox = "obat_id";
            var routeSigna = "{{ route('signa.json') }}";
            var loadingSigna = "loading6";
            var valueSigna = "signa_nama";
            var comboboxSigna = "signa_m_id";
        $("#multiForm").append(
            '<tr>'+
            '<td>'+
                '<input type="text" name="obatalkes_nama" placeholder="cari Obat" id="obatalkes_nama" class="form-control" ' +
                'onchange="checkcombo(\'' + loading + '\', \'' + value + '\', \'' + combobox + '\', \'' + route + '\')">' +
                '<select class="form-control" name="obat_id[]" id="obat_id" required>' +
                '<option value="">Pilih Obat</option>' +
                '</select>' +
                '<div id="loading5" class="loading">' +
                '<img src="' + loading5 + '" ><small>Loading..</small>' +
                '</div>'+
                '</td>'+
            '<td><input type="number" name="qty[]" placeholder="Masukkan Qty" class="form-control required"></td>'+
            '<td>'+
                '<input type="text" name="signa_nama" placeholder="cari Signa" id="signa_nama" class="form-control" ' +
                'onchange="checkcombo(\'' + loadingSigna + '\', \'' + valueSigna + '\', \'' + comboboxSigna + '\', \'' + routeSigna + '\')">' +
                '<select class="form-control" name="signa_m_id[]" id="signa_m_id" required>' +
                '<option value="">Pilih Signa</option>' +
                '</select>' +
                '<div id="loading5" class="loading">' +
                '<img src="' + loading5 + '" ><small>Loading..</small>' +
                '</div>'+
                '</td>'+
            '<td><button type="button" class="remove-item btn btn-danger">Delete</button></td>'+
            '</tr>'
        );
        $('.loading').hide();
    });
    
    $(document).on('click', '.remove-item', function() {
        $(this).parents('tr').remove();
    });
    $("#addRemoveIp2").click(function() {
        ++i;
        var route = "{{ route('obat.json') }}";
            var loading8 = "{{ asset('assets/img/loading.gif') }}";
            var loading = "loading8";
            var value = "obatalkes_nama";
            var combobox = "obat_id";
            var routeSigna = "{{ route('signa.json') }}";
            var loadingSigna = "loading9";
            var valueSigna = "signa_nama";
            var comboboxSigna = "signa_m_id";
        $("#multiForm2").append(
            '<tr>'+
            '<td><input type="text" name="name[]" placeholder="Masukkan Racikan Manual" class="form-control" ></td>'+
            '<td><label>Qty</label><input type="number" name="qty[]" placeholder="Masukkan Qty" class="form-control" ></td>'+
            '<td>'+
                '<input type="text" name="signa_nama" placeholder="cari Signa" id="signa_nama" class="form-control" ' +
                'onchange="checkcombo(\'' + loadingSigna + '\', \'' + valueSigna + '\', \'' + comboboxSigna + '\', \'' + routeSigna + '\')">' +
                '<select class="form-control" name="signa_m_id[]" id="signa_m_id">' +
                '<option value="">Pilih Signa</option>' +
                '</select>' +
                '<div id="loading8" class="loading">' +
                '<img src="' + loading8 + '" ><small>Loading..</small>' +
                '</div>'+
                '</td>'+
            '<td><button type="button" class="remove-item2 btn btn-danger">Delete</button></td>'+
            '</tr>'
        );
        $('.loading').hide();
    });
    $(document).on('click', '.remove-item2', function() {
        $(this).parents('tr').remove();
    });
    function checkcombo(loading, values, combobox, route) { //ketika halaman sudah selesai di load
        //menyembunyikan loading
        //ketika user mengganti dan memilih data Guru
        $('#' + combobox).hide(); //sembunyikan combobox matpel
        $('#' + loading).show(); //memunculkan loading.gif
        $.ajax({
            type: "GET", //method pengiriman data bisa dengan GET atau POST
            url: route, //menuju URL function yang ada di course controller
            data: {
                value: $('#' + values).val()
            }, //data yang akan dikirim ke file yg dituju
            dataType: "json",
            beforeSend: function(e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function(response) { //ketika proses pengiriman berhasil
                setTimeout(function() {
                    $('#' + loading).hide(); //sembunyikan loading

                    //set isi dengan combobox kota
                    //lalu munculkan kembali combobox kotanya
                    $('#' + combobox).html(response.list_data).show();
                }, 3000);
            },
            error: function(xhr, ajaxOptions, thrownError) { //ketika ada error
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); //munculkan alert error
            }
        });
    };
</script>
@endsection