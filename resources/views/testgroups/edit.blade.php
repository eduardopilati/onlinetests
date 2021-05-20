@extends('layouts.app')

@section('content')
@php $parentTitle = isset($testgroup->parentTestGroup) ? $testgroup->parentTestGroup->title : '---'; @endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('app.create-testgroup') }}</div>
                <div class="card-body">
                    <div id='message' class='alert alert-warning display-none'></div>
                    <form action="{{ route('testgroups.update', ['id' => $testgroup->id]) }}" method="POST" autocomplete="off">
                        @csrf
                        <input type="hidden" id="testgroup-id" value="{{ $testgroup->id }}">
                        <div class="form-group">
                            <label for="name">{{ __('app.title') }}:</label>
                            <input type="text" name="title" id="title" value="{{ $testgroup->title }}" class="form-control {{ $errors->has('title')? 'is-invalid':'' }}">
                            @if ($errors->has('title')) <span class="text-danger"> {{$errors->first('title')}} </span> @endif
                        </div>

                        <div class="form-group">
                            <label for="name">{{ __('app.parent-testgroup') }}:</label>
                            <input type="text" id="parent_test_group" value="{{ $parentTitle }}" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('testgroups', ['id' => $testgroup->id]) }}" class="btn btn-default">{{ __('app.back') }}</a>
                            <button class="btn btn-default" id='move-testgroup' onclick="return false;" >{{ __('app.move-testgroup') }}</button>
                            <button type="submit" class="btn btn-success" >{{ __('app.save-testgroup') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal-move-testgroup" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-title">
    <div class="modal-dialog" role='document'>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id='modal-title'>{{ __('app.move-testgroup') }}</h4>
                <button type='button' class="close" data-dismiss='modal' aria-label="Close"><span class="fa fa-times"></span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <span id='testgroup-title' data-id='{{ $testgroup->parent_test_group_id }}' data-parentid=""></span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col" id='children-testgroups'></div>
                </div>
            </div>
            <div class="modal-footer">
            <button class="btn btn-default" data-dismiss='modal' aria-label="Close">{{ __('app.close') }}</button>
            <button class="btn btn-default" id="parent-testgroup">{{ __('app.parent-testgroup') }}</button>
            <button class="btn btn-default" id="move-here">{{ __('app.move-here') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="/js/testgroups.js"></script>
@endpush
