@extends('layouts.template')
@section('styles')

@endsection
@section('content')
{{-- <?php
    $dbhost = 'localhost';
    $dbname='pgwl';
    $dbuser = '';
    $dbpass = 'password';

    $dbconn = pg_connect("host=$dbhost dbname=$dbname user=$dbuser password=$dbpass")
        or die('Could not connect: ' . pg_last_error());

    $query = 'SELECT * FROM students';
    $result = pg_query($query) or die('Error message: ' . pg_last_error());

    while ($row = pg_fetch_row($result)) {
        var_dump($row);
    }

    pg_free_result($result);
    pg_close($dbconn);
?> --}}
<div class="container mt-4">
<div class="card shadow">
    <div class="card-header">
        <h3>Data Mahasiswa</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>id</td>
                    <td>Nama Titik</td>
                    <td>Deskripsi</td>
                    <td>Dibuat pada</td>
                    <td>Diupdate pada</td>
                    <td>Geom</td>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Jokowi</td>
                    <td>B</td>
                    <td>1</td>
                    <td>Jokowi</td>

                </tr>

            </tbody>
        </table>
    </div>
</div>
</div>
@endsection

@section('script')



@endsection
