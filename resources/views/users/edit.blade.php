@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('app.edit-user') }}</div>
                <div class="card-body">
                    <div id='message' class='alert alert-success display-none'></div>
                    <form action="{{ route('users.update', $user->id) }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('app.name') }}:</label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control {{ $errors->has('name')? 'is-invalid':'' }}">
                            @if ($errors->has('name')) <span class="text-danger"> {{$errors->first('name')}} </span> @endif

                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('app.email') }}:</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control {{ $errors->has('email')? 'is-invalid':'' }}">
                            @if ($errors->has('email')) <span class="text-danger"> {{$errors->first('email')}} </span> @endif
                        </div>

                        <div class="form-group">
                            <a href="{{ route('users') }}" class="btn btn-default">{{ __('app.back') }}</a>
                            <button type="submit" class="btn btn-success" id='sendemail' onclick="return false;">{{ __('app.send-password-email') }}</button>
                            <button type="submit" class="btn btn-success" >{{ __('app.save-user') }}</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">{{ __('app.usergroups') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-success add-usergroups" onclick="return false;">{{ __('app.link-usergroup') }}</a>
                        </div>
                    </div>

                    @if (count($user->userGroups) > 0)
                        <div class="row mt-3">
                            <div class="col">
                                <ul class="list-group">
                                    @foreach ($user->userGroups as $group)
                                    <li class="list-group-item">
                                        <span>{{ $group->title }}</span>
                                        <a class="btn btn-sm btn-default fa fa-times float-right unlinkusergroup" data-group='{{ $group->id }}' data-toggle="tooltip" data-placement="top" title="{{ __('app.unlink') }}"></a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div id="users-modal"></div>
@endsection

@push('js')
    <script src="/js/users.js"></script>
    <script>
        var urlusergroups = "{{ route('users.usergroups', $user->id) }}"
        var urllinkusergroup = "{{ route('users.linkusergroup', $user->id) }}"
        var urlunlinkusergroup = "{{ route('users.unlinkusergroup', $user->id) }}"
        var urlsendemail = "{{ route('users.sendemail', $user->id) }}"
    </script>
@endpush
