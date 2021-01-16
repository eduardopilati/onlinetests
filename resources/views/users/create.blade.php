@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('app.create-user') }}</div>
                <div class="card-body">
                    <form action="{{ route('users.save') }}" method="POST" autocomplete="off">
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

                        <div class="form-group form-check">
                            <input type="checkbox" name="send_email" id="send_email" class="form-check-input {{ $errors->has('send_email')? 'is-invalid':'' }}">
                            <label for="send_email">{{ __('app.send-email') }}</label>
                            @if ($errors->has('send_email')) <span class="text-danger"> {{$errors->first('send_email')}} </span> @endif
                        </div>

                        <div class="form-group">
                            <a href="{{ route('users') }}" class="btn btn-default">{{ __('app.back') }}</a>
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
