@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('app.edit-usergroup') }}</div>
                <div class="card-body">
                    <form action="{{ route('usergroups.update', $usergroup->id) }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('app.title') }}:</label>
                            <input type="text" name="title" id="title" value="{{ $usergroup->title }}" class="form-control {{ $errors->has('title')? 'is-invalid':'' }}">
                            @if ($errors->has('title')) <span class="text-danger"> {{$errors->first('title')}} </span> @endif
                        </div>

                        <div class="form-group">
                            <a href="{{ route('usergroups') }}" class="btn btn-default">{{ __('app.back') }}</a>
                            <button type="submit" class="btn btn-success" >{{ __('app.save-usergroup') }}</button>
                        </div>
                    </form>
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
