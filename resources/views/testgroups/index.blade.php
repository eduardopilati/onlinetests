@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if (isset($testgroup))
                    {{ __('app.testgroup') }} - {{ $testgroup->title }}
                    @else
                    {{ __('app.testgroups') }}
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @if (isset($testgroup))
                                <a class="btn btn-default" href="{{ route('testgroups', ['id' => $testgroup->parent_test_group_id]) }}">{{ __('app.back') }}</a>
                                <a class="btn btn-default" href="{{ route('testgroups.edit', ['id' => $testgroup->id]) }}">{{ __('app.edit') }}</a>
                            @endif
                            <a class="btn btn-success" href="{{ route('testgroups.create', [ 'id' => $id]) }}">{{ __('app.create-testgroup') }}</a>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                           @include('testgroups.listtestgroups', $testgroups)
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            {{ $testgroups->links() }}
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
