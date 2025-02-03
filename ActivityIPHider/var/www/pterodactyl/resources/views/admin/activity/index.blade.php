@extends('layouts.admin')

@section('title')
    Activity Logs
@endsection

@section('content-header')
    <h1>Activity Logs<small>View all activity logs with IPs.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">Admin</a></li>
        <li class="active">Activity Logs</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Activity Log List</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Timestamp</th>
                                <th>User</th>
                                <th>Action</th>
                                <th>IP Address</th>
                            </tr>
                            @foreach($activities as $activity)
                                <tr>
                                    <td>{{ $activity->created_at }}</td>
                                    <td>{{ $activity->actor->email ?? 'System' }}</td>
                                    <td>{{ $activity->event }}</td>
                                    <td>{{ $activity->ip }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="text-center">
                {{ $activities->links() }}
            </div>
        </div>
    </div>
@endsection
