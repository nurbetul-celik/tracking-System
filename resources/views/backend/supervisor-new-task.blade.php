@extends('frontend.supervisor-template')
@extends('errors.alert')
@section('content')
    <body class="hold-transition sidebar-mini">

    <form
        action="{{ $supervisorTask->id > 0 ? route('post-supervisor-task-created' , [$supervisorTask->id] ) : route('post-supervisor-task-created' , ['id' => 0] ) }}"
        method="post" role="form" style="margin-left: 75px">
        @csrf

        <div class="card-body">
            <h3>Görev {{ $supervisorTask->id > 0 ? "Güncelle":"Ekle" }}</h3>
            <div class="form-group">
                <label for="inputName">{{__('Görev ID')}}</label>
                <input type="text" id="inputName" class="form-control" style="width: 30%" disabled
                       value="{{ $supervisorTask-> id}}" name="id">
                <div class="form-group">
                    <label for="inputName">{{__('Kullanıcı ID')}}</label>
                    <input type="text" id="inputName" class="form-control" style="width: 30%"
                           value="" name="user_id">
                </div>
            </div>
            <div class="form-group">
                <label for="inputName">{{__('Görev')}}</label>
                <textarea class="form-control" rows="5" id="comment" required
                          name="name">{{ $supervisorTask->name }}</textarea>
            </div>
            <div class="form-group">
                <label for="inputName">{{__('Görev Zorluk')}}</label>
                <input type="text" id="inputName" class="form-control" style="width: 30%"
                       value="{{ $supervisorTask->difficulty }}" placeholder="1 ile 5 arasında bir değer giriniz"
                       name="difficulty">
            </div>
            <div class="form-group">
                <label for="inputDescription">{{__('Görev Başlangıç Tarihi')}}</label>
                <input type="date" id="startedDate" class="form-control" style="width: 30%" required name="startedDate"
                       value="{{ $supervisorTask->start_date }}">
            </div>
            <div class="form-group">
                <label for="inputDescription">{{__('Görev Bitiş Tarihi')}}</label>
                <input type="date" id="finishedDate" class="form-control" style="width: 30%" required
                       name="finishedDate" value="{{ $supervisorTask->deadline_date }}">
            </div>
            <div class="form-group">
                <label for="inputStatus">{{__('Görev Durumu')}}</label>
                <br>
                <select id="inputStatus" class="form-control custom-select" style="width: 30%" name="description">
                    <option> {{ $supervisorTask->description }} </option>
                    <option value="waiting">Görev Atandı</option>
                    <option value="started"> Göreve Başlandı</option>
                    <option value="on_confirmation">Görev Onayda</option>
                    <option value="revision"> Görev Revizede</option>
                    <option value="finished">Görev Tamamlandı</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-success">{{ $supervisorTask->id > 0 ? "Güncelle" : "Kaydet"}}</button>
    </form>
    </body>
@endsection



