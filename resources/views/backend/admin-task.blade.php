@extends('frontend.admin-template')
@section('content')
    <body class="hold-transition sidebar-mini">
    @include('errors.alert')
    <form action="{{ route('get-task') }}" method="get" role="form">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Görevler Tablosu</h3>
                <a href="{{ route ('get-task-new') }}" class="btn btn-success"
                   style="margin-left: 96%;margin-top: -38px">Ekle</a>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Kullanıcı Adı</th>
                        <th>Görev ID</th>
                        <th>Görev Adı</th>
                        <th>Görev Durumu</th>
                        <th>Zorluk Seviyesi</th>
                        <th>Başlangıç Tarihi</th>
                        <th>Bitiş Tarihi</th>
                        <th style="width: 40px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $task as $tasks )
                        @if(!empty($tasks->status))
                            <tr>
                                <td>{{$tasks->userInformation->name }}</td>
                                <td>{{$tasks->id }}</td>
                                <td>{{$tasks->name }}</td>
                                <td>{{$tasks->description }}</td>
                                <td>{{$tasks->difficulty }}</td>
                                <td>{{$tasks->start_date }}</td>
                                <td>{{$tasks->deadline_date }}</td>
                                <td><a href="{{ route('get-task-arrangement',[$tasks->id]) }}"
                                       class="btn btn-primary btn-sm fa fa-refresh">Düzenle</a></td>
                                <td><a href="{{ route('get-delete-task', [$tasks->id] )}}"
                                       class="btn btn-danger btn-sm fa fa-trash"
                                       onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</a></td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </form>
    </body>
@endsection


