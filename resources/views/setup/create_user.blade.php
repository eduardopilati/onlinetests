@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('app.create-user') }}</div>
                <div class="card-body">
                    <div class="alert alert-warning">{{ __('app.setup_alertuserpassword') }}</div>
                    <form action="{{ route('setup.saveuser') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('app.name') }}:</label>
                            <input type="text" name="name" id="name" class="form-control {{ $errors->has('name')? 'is-invalid':'' }}">
                            @if ($errors->has('name')) <span class="text-danger"> {{$errors->first('name')}} </span> @endif

                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('app.email') }}:</label>
                            <input type="email" name="email" id="email" class="form-control {{ $errors->has('email')? 'is-invalid':'' }}">
                            @if ($errors->has('email')) <span class="text-danger"> {{$errors->first('email')}} </span> @endif
                        </div>

                        <div class="form-group">
                            <a href="{{ url('/') }}" class="btn btn-default">{{ __('app.back') }}</a>
                            <button type="submit" class="btn btn-success" >{{ __('app.create-user') }}</button>
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
