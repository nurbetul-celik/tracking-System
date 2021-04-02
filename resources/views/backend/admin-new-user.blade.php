@extends('frontend.admin-template')
@section('content')
    <body class="hold-transition sidebar-mini">
    @include('errors.alert')
    <form method="post"
          action="{{ $entry->id > 0 ? route('post-user-created' ,[ $entry->id ]) : route('post-user-created' ,['id' => 0 ]) }}">
        <input type="hidden" value="id">
        @csrf
        <div class="card-body">
            <h3>Kullanıcı {{ $entry->id > 0 ? "Güncelle":"Ekle" }}</h3>
            <div class="form-group">
                <label for="inputName">{{__('Kullanıcı ID')}}</label>
                <input type="text" id="inputName" class="form-control" style="width: 30%"
                       value="{{ $entry->id }}" disabled required name="id">
            </div>
            <div class="form-group">
                <label for="inputName">{{__('Kullanıcı Ad Soyad')}}</label>
                <input type="text" id="inputName" class="form-control" style="width: 30%"
                       value="{{ $entry->name }}" required name="name">
            </div>
            <div class="form-group">
                <label for="inputStatus">{{__('Kullanıcı Tipi')}}</label>
                <br>
                <select id="inputStatus" class="form-control custom-select" style="width: 30%" name="type">
                    <option>{{ $entry->type }}</option>
                    <option value="admin">Admin</option>
                    <option value="supervisor">Proje Yönetisi</option>
                    <option value="personel">Kullanıcı</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputClientCompany">{{__('Email')}}</label>
                <input id="email" type="email" class="form-control" value="{{$entry->email}}" style="width: 30%"
                       required name="email">
            </div>
            <div class="form-group">
                <label for="password">{{__('Şifre')}}</label>
                <input type="password" id="password" class="form-control" value="" style="width: 30%" name="password">
            </div>
            <div class="form-group">
                <label for="inputName">{{__('Yetkiler')}}</label>
                <input type="text" id="inputName" class="form-control" style="width: 30%" value="" name="permissions">
            </div>
            <button type="submit" class="btn btn-success">{{$entry->id > 0 ? "Güncelle" : "Kaydet"}}</button>
        </div>
    </form>
    </body>
@endsection

