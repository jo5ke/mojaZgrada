@extends('layout.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('postRegisterBuilding') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="aid" value="{{aid}}">

                        <!-- address -->

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- address number -->

                        <div class="form-group{{ $errors->has('address_no') ? ' has-error' : '' }}">
                            <label for="address_no" class="col-md-4 control-label">Address no</label>

                            <div class="col-md-6">
                                <input id="address_no" type="number" class="form-control" name="address_no" value="{{ old('address_no') }}" required autofocus>

                                @if ($errors->has('address_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- city -->

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required autofocus>

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- city -->

                        <div class="form-group{{ $errors->has('number_of_apartments') ? ' has-error' : '' }}">
                            <label for="number_of_apartments" class="col-md-4 control-label">Number of apartments</label>

                            <div class="col-md-6">
                                <input id="number_of_apartments" type="number" class="form-control" name="number_of_apartments" value="{{ old('number_of_apartments') }}" required autofocus>

                                @if ($errors->has('number_of_apartments'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number_of_apartments') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- invoice -->

                        <div class="form-group{{ $errors->has('invoice') ? ' has-error' : '' }}">
                            <label for="invoice" class="col-md-4 control-label">Invoice of building</label>

                            <div class="col-md-6">
                                <input id="invoice" type="text" class="form-control" name="invoice" value="{{ old('invoice') }}" required autofocus>

                                @if ($errors->has('invoice'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('invoice') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- pib -->

                        <div class="form-group{{ $errors->has('pib') ? ' has-error' : '' }}">
                            <label for="pib" class="col-md-4 control-label">Pib</label>

                            <div class="col-md-6">
                                <input id="pib" type="text" class="form-control" name="pib" value="{{ old('pib') }}" required autofocus>

                                @if ($errors->has('pib'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pib') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- mat -->

                        <div class="form-group{{ $errors->has('mat') ? ' has-error' : '' }}">
                            <label for="mat" class="col-md-4 control-label">Mat</label>

                            <div class="col-md-6">
                                <input id="mat" type="text" class="form-control" name="mat" value="{{ old('mat') }}" required autofocus>

                                @if ($errors->has('mat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <!-- <input type="submit" class="btn btn-primary" value="Register"> -->
                                <button type="submit" class="btn btn-primary">
                                    Proceed to next step
                                </button>
                             
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>                  




@endsection

