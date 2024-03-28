@extends('layouts.template')
@section('styles')

@endsection
@section('content')
<div class="container mt-4">
<div class="card shadow">
    <div class="card-header">
        <h3>Data Mahasiswa</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Deskripsi</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Jokowi</td>
                    <td>B</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Praboro</td>
                    <td>B</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Janggar</td>
                    <td>B</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
</div>
@endsection

@section('script')



@endsection
