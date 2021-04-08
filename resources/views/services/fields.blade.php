
<div class="col-xs-12">
    <div class="form-group">
        {!! Form::label('name', trans('global.Name')) !!}
        {!! Form::text('name', $service->name, ['class' => 'form-control']) !!}
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="col-xs-12">
    <div class="form-group">
        {!! Form::label('unitprice', trans('global.Unitprice')) !!}
        {!! Form::text('unitprice', $service->unitprice, ['class' => 'form-control']) !!}
        @error('unitprice')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="col-xs-12">
    <div class="form-group">
        {!! Form::label('unitprice', trans('global.Billing period')) !!}
        {!! Form::select('billing_period_id', $billingPeriods, $service->billing_period_id, ['class' => 'form-control']) !!}
        @error('billing_period_id')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="col-xs-12">
    <div class="form-group">
        {!! Form::label('start_date', trans('global.Service start date')) !!}
        {!! Form::text('start_date', !empty($service->start_date) ? date_format($service->start_date, 'Y-m-d') : '', ['class' => 'form-control date']) !!}
        @error('start_date')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="col-xs-12">
    <div class="form-group">
        {!! Form::label('end_date', trans('global.Service end date')) !!}
        {!! Form::text('end_date', !empty($service->end_date) ? date_format($service->end_date, 'Y-m-d') : '', ['class' => 'form-control date']) !!}
        @error('end_date')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

@section('javascript')
<script type="text/javascript">
    $(".date").datepicker({
        dateFormat: "yy-mm-dd"
    });
</script>
@endsection
