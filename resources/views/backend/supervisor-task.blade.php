@extends('frontend.supervisor-template')
@section('content')
    <body class="hold-transition sidebar-mini">
    @include('errors.alert')
    <form action="{{ route('get-task-supervisor') }}" method="get" role="form">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Görevler Tablosu</h3>
                <a href="{{ route ('get-supervisor-task-new') }}" class="btn btn-success"
                   style="margin-left: 96%;margin-top: -38px">Ekle</a>
            </div>
            <div class="card-body p-0">
                <table class="table d-xl-table">
                    <thead>
                    <tr>
                        <th>Kullanıcı ID</th>
                        <th>Görev ID</th>
                        <th>Görev Adı</th>
                        <th>Görev Durumu</th>
                        <th>Zorluk Seviyesi</th>
                        <th>Başlangıç Tarihi</th>
                        <th>Bitiş Tarihi</th>
                        <th></th>
                        <th>Görev Durumu</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $data['taskSupervisor'] as $taskSupervisors )
                        @if(!empty($taskSupervisors->status))
                            @if($taskSupervisors->user_id > 0 )

                                <tr>
                                    <td><input type="hidden" name="user_id"
                                               value="{{ $taskSupervisors->user_id }}">{{ $taskSupervisors->user_id  }}
                                    </td>
                                    <!-- <td> $taskSupervisors -> userInformation -> name }}</td> -->
                                    <td><input type="hidden" name="task_id"
                                               value="{{ $taskSupervisors->id }}">{{ $taskSupervisors->id }}
                                    </td>
                                    <td>{{ $taskSupervisors->name }}</td>
                                    <td>{{ $taskSupervisors->description }}</td>
                                    <td>{{ $taskSupervisors->difficulty }}</td>
                                    <td>{{ $taskSupervisors->start_date }}</td>
                                    <td>{{ $taskSupervisors->deadline_date }}</td>
                                    <td>
                                        <a href="{{ route('get-supervisor-task-arrangement',[$taskSupervisors->id]) }}"
                                           class="btn btn-primary fa fa-refresh">Düzenle</a></td>
                                    <td>
                                        <a href="{{ route('get-supervisor-description-change', [$taskSupervisors->id , $taskSupervisors->description]) }}"
                                           class="btn btn-xs btn-secondary"> Revize</a>
                                        <a href="{{ route('get-supervisor-description-change', [$taskSupervisors->id , $taskSupervisors->description]) }}"
                                           class="btn  btn-xs btn-secondary" style="margin-top: 5px"> Tamamlandı</a>
                                    </td>
                                    <td>
                                        @foreach($data['userPerformance'] as $performance)
                                            @if($taskSupervisors->id == $performance->task_id && $performance->starst == 1 )
                                                <label>
                                                    <i style="color:#09f " class="icon">★</i>
                                                </label>
                                            @elseif($taskSupervisors->id == $performance->task_id && $performance->starst == 2 )
                                                <label>
                                                    <i style="color:#09f " class="icon">★</i>
                                                    <i style="color:#09f " class="icon">★</i>
                                                </label>
                                            @elseif($taskSupervisors->id == $performance->task_id && $performance->starst == 3 )
                                                <label>
                                                    <i style="color:#09f " class="icon">★</i>
                                                    <i style="color:#09f " class="icon">★</i>
                                                    <i style="color:#09f " class="icon">★</i>
                                                </label>
                                            @elseif($taskSupervisors->id == $performance->task_id && $performance->starst == 4 )
                                                <label>
                                                    <i style="color:#09f " class="icon">★</i>
                                                    <i style="color:#09f " class="icon">★</i>
                                                    <i style="color:#09f " class="icon">★</i>
                                                    <i style="color:#09f " class="icon">★</i>
                                                </label>
                                            @elseif($taskSupervisors->id == $performance->task_id && $performance->starst == 5 )
                                                <label>
                                                    <i style="color:#09f " class="icon">★</i>
                                                    <i style="color:#09f " class="icon">★</i>
                                                    <i style="color:#09f " class="icon">★</i>
                                                    <i style="color:#09f " class="icon">★</i>
                                                    <i style="color:#09f " class="icon">★</i>
                                                </label>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('get-performance' ,[$taskSupervisors->id] ) }}">Göreve
                                            Puan Ver</a>
                                    </td>
                                </tr>
                            @endif
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $data['taskSupervisor'] -> links() }}
    </form>
    </body>
@endsection


