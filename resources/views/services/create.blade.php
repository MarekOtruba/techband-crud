@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4>{{ trans('global.Add new service') }}</h4>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('services.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> {!! trans('global.There were some problems with your input.') !!}
        </div>
    @endif
    <form action="{{ route('services.store') }}" method="POST" >
        @csrf

        <div class="row">
            @include('services.fields')
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary">{!! trans('global.Save') !!}</button>
            </div>
        </div>

    </form>
@endsection
