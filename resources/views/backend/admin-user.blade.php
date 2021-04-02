@extends('frontend.admin-template')
@section('content')
    <body class="hold-transition sidebar-mini">
    @include('errors.alert')
    <form action="{{route('get-user')}}" method="get" role="form">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Kullanıcılar Tablosu</h3>
                <a href="{{ route('get-user-new') }}" class="btn btn-success"
                   style="margin-left: 96%;margin-top: -38px">
                    Ekle </a>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Ad Soyad</th>
                        <th>Kullanıcı Tipi</th>
                        <th>Mail</th>
                        <th>Yetkileri</th>
                        <th style="width: 40px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $users)
                        @if(!empty($users->status))
                            <tr>
                                <td>{{$users->name}}</td>
                                <td>{{$users->type}}</td>
                                <td>{{$users->email}}</td>
                                <td>{{$users->permissions}}</td>
                                <td><a href="{{route('get-user-arrangement',$users->id) }}"
                                       class="btn btn-primary btn-sm fa fa-refresh">Düzenle</a></td>
                                <td><a href="{{route('get-delete',$users->id)}}"
                                       class="btn btn-danger btn-sm fa fa-trash"
                                       onclick="return confirm('Emin misiniz?')">Sil</a></td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{$user->links()}}
    </form>
    </body>
@endsection

