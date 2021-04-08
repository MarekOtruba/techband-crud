@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4>{{ trans('global.Calculate monthly price') }}</h4>
            </div>
        </div>
    </div>
    <form action="{{ route('calculator.showResult') }}" method="POST" >
        @csrf
        <div class="col-xs-12">
            <div class="form-group">
                {!! Form::label('calculator_date', trans('global.Chosen date')) !!}
                {!! Form::text('calculator_date', !empty($calculator_date) ? date_format($calculator_date, 'Y-m-d') : '', ['class' => 'form-control date']) !!}
                @error('calculator_date')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 text-center">
            <button type="submit" class="btn btn-primary">{!! trans('global.Calculate') !!}</button>
        </div>
    </form>
    @if(isset($result))
    <div class="col-xs-12">
        <strong>{{ trans('global.Monthly price') }}</strong>
        <span>{!! $result !!}</span>
    </div>
    @endif

@endsection

@section('javascript')
    <script type="text/javascript">
        $(".date").datepicker({
            dateFormat: "yy-mm-dd"
        });
    </script>
@endsection
