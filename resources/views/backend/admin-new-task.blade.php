@extends('frontend.admin-template')
@section('content')
    <body class="hold-transition sidebar-mini">
    <form method="post"
          action="{{ $entry->id > 0 ? route('post-task-created', [ $entry->id ]) : route('post-task-created', [ 'id' => 0 ])  }}">
        <input type="hidden" value="id">
        @csrf
        <div class="card-body">
            <h3>Görev {{ $entry->id > 0 ? "Güncelle":"Ekle" }}</h3>
            <div class="form-group">
                <label for="inputId"> {{ __('Görev ID') }}</label>
                <input type="text" class="form-control" style="width: 30%" name="id" disabled
                       value="{{ $entry->id  }}">
            </div>

            <div class="form-group">
                <label for="inputId"> {{ __('Kullanıcı Adı') }}</label>
                <input type="text" class="form-control" style="width: 30%" name="name"
                       value=" {{ $entry->id > 0 ? $entry->userInformation->name : "" }} ">
            </div>

            <div class="form-group">
                <label for="inputId"> {{ __('Kullanıcı/Proje Yönetici ID') }}</label>
                <input type="text" class="form-control" style="width: 30%" name="user_id"
                       value="">
            </div>
            <div class="form-group">
                <label for="inputName">{{__('Görev')}}</label>
                <textarea class="form-control" rows="5" id="comment" required
                          name="name">{{ $entry->name }}</textarea>
            </div>
            <div class="form-group">
                <label for="inputDescription">{{__('Görev Başlangıç Tarihi')}}</label>
                <input type="date" id="startedDate" class="form-control" style="width: 30%"
                       value="{{ $entry->start_date   }}" name="startedDate">
            </div>
            <div class="form-group">
                <label for="inputDescription">{{__('Görev Bitiş Tarihi')}}</label>
                <input type="date" id="finishedDate" class="form-control" style="width: 30%"
                       value="{{ $entry->deadline_date  }}" name="finishedDate">
            </div>
            <div class="form-group">
                <label for="inputStatus">{{__('Görev Durumu')}}</label>
                <br>
                <select id="inputStatus" class="form-control custom-select" style="width: 30%" name="description">
                    <option> {{ $entry->description }}</option>
                    <option value="waiting">Görev Atandı</option>
                    <option value="started"> Göreve Başlandı</option>
                    <option value="on_confirmation">Görev Onayda</option>
                    <option value="revision"> Görev Revizede</option>
                    <option value="finished">Görev Tamamlandı</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-success">{{$entry->id > 0 ? "Güncelle" : "Kaydet"}}</button>
    </form>
    </body>
@endsection




