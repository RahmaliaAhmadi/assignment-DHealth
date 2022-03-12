@extends('layout.master')
@section('title', 'Data Transaksi')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Transaksi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/dashboard' )}}">Dashboard</a></div>
            <div class="breadcrumb-item">Data Transaksi</div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Table Transaksi</h4>

                </div>
                <div class="card-body">
                    <form action="{{ route('transaction.destroy', 'delete') }}" method="POST" id="myform" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a href="{{ route('transaction.create') }}" class="btn btn-primary">Create</a>
                        <button id="deletebutton" type="submit" form='myform' class="btn btn-danger"><i class="demo-pli-cross" disabled></i> Delete</button>
                        <a href="{{ url('/report-transaction') }}" class="btn btn-success" target="_blank">Cetak Resep</a>
                        <input type="hidden" class="alls" name="alls" value="0" form='myform'>
                    </form>
                    <br>
                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th data-field="check"><input type="checkbox" class="select-all"> </th>
                                    <th data-field="no" data-sortable="true">No</th>
                                    <th data-field="obat" data-sortable="true">Obat</th>
                                    <th data-field="signa" data-sortable="true">Signa</th>
                                    <th data-field="qty" data-sortable="true">Qty</th>
                                    <th data-field="action" data-align="center" data-sortable="true">Action</th>
                                </tr>
                            </thead>
                            <?php $no = 1; ?>
                            <tbody>
                                @foreach($data as $value)
                                <tr>
                                    <td><input type="checkbox" name="check[]" type="checkbox" value="{{ $value->id }}" form="myform"></td>

                                    <td>{{ $no++ }}</td>
                                    <td>{{ $value->obat->obatalkes_nama }}{{ $value->name }}</td>
                                    <td>{{ $value->signa->signa_nama }}</td>
                                    <td>{{ $value->qty }}</td>

                                    <td>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <a href="#editModal" class="btn btn-info btn-sm" data-toggle="modal" data-id="{{ $value->id }}" title="Edit Data">
                                            <i class="fas fa-eye">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center float-right">{{ $data->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
