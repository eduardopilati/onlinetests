@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('app.usergroups') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-success" href="{{ route('usergroups.create') }}">{{ __('app.create-usergroup') }}</a>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <ul class="list-group">
                                @foreach ($usergroups as $usergroup)
                                <li class="list-group-item">
                                    <span> {{ $usergroup->title }} </span>
                                        <a class="btn btn-sm btn-default fa fa-edit float-right" href="{{ route('usergroups.edit', ['id' => $usergroup->id]) }}"
                                        data-toggle="tooltip" data-placement="top" title="{{ __('app.edit') }}"></a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            {{ $usergroups->links() }}
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
