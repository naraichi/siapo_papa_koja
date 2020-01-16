@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.photo') }}
                        </th>
                        <td>
                            @if($user->photo)
                                <a href="{{ $user->photo->getUrl() }}" target="_blank">
                                    <img src="{{ $user->photo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.skpd') }}
                        </th>
                        <td>
                            {{ $user->skpd->nm_skpd ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#created_by_dasar_hukums" role="tab" data-toggle="tab">
                {{ trans('cruds.dasarHukum.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_pengumumen" role="tab" data-toggle="tab">
                {{ trans('cruds.pengumuman.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#created_by_unduhans" role="tab" data-toggle="tab">
                {{ trans('cruds.unduhan.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#created_by_kontaks" role="tab" data-toggle="tab">
                {{ trans('cruds.kontak.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="created_by_dasar_hukums">
            @includeIf('admin.users.relationships.createdByDasarHukums', ['dasarHukums' => $user->createdByDasarHukums])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_pengumumen">
            @includeIf('admin.users.relationships.userPengumumen', ['pengumumen' => $user->userPengumumen])
        </div>
        <div class="tab-pane" role="tabpanel" id="created_by_unduhans">
            @includeIf('admin.users.relationships.createdByUnduhans', ['unduhans' => $user->createdByUnduhans])
        </div>
        <div class="tab-pane" role="tabpanel" id="created_by_kontaks">
            @includeIf('admin.users.relationships.createdByKontaks', ['kontaks' => $user->createdByKontaks])
        </div>
    </div>
</div>

@endsection