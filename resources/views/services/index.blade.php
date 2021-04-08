@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4>{!! trans('global.All services') !!}</h4>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('services.create') }}" title="{{ trans('global.Add new service') }}"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>ID</th>
            <th>{{ trans('global.Name') }}</th>
            <th>{{ trans('global.Unitprice') }}</th>
            <th>{{ trans('global.Billing period') }}</th>
            <th>{{ trans('global.Service start date') }}</th>
            <th>{{ trans('global.Service end date') }}</th>
            <th width="280px">{{ trans('global.Action') }}</th>
        </tr>
        @foreach ($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->name }}</td>
                <td>{{ $service->unitprice }}</td>
                <td>{{ $service->billing_period->period }}</td>
                <td>{{ !empty($service->start_date) ? date_format($service->start_date, 'd.m.Y') : '' }}</td>
                <td>{{ !empty($service->end_date) ? date_format($service->end_date, 'd.m.Y') : '' }}</td>
                <td>
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST">

                        <a class="btn btn-primary" href="{{ route('services.show', $service->id) }}" title="show">
                            <i class="fas fa-eye"></i>
                        </a>

                        <a class="btn btn-warning" href="{{ route('services.edit', $service->id) }}">
                            <i class="fas fa-edit"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger" type="submit" title="delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $services->links() !!}

@endsection
