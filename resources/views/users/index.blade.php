@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('app.users') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-success" href="{{ route('users.create') }}">{{ __('app.create-user') }}</a>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <ul class="list-group">
                                @foreach ($users as $user)
                                <li class="list-group-item">
                                    <span> {{ $user->name }} </span>
                                        <a class="btn btn-sm btn-default fa fa-edit float-right" href="{{ route('users.edit', ['id' => $user->id]) }}"
                                        data-toggle="tooltip" data-placement="top" title="{{ __('app.edit') }}"></a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function(){
        $("[data-toggle='tooltip']").tooltip();
    })
</script>
@endpush
