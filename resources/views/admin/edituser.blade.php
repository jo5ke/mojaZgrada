@extends('admin.layout.auth')

@section('content')

<div class="container">
        <form class="login_form cf"  method="POST" action="{{ route('postEditUserAccount') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                <input type="hidden" name="id" value="{{ $user->id }}">
                <label for="first_name" class="col-md-4 control-label">First Name</label>

                <div class="col-md-6">
                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" required autofocus>

                    @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label for="last_name" class="col-md-4 control-label">Last Name</label>

                <div class="col-md-6">
                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" >

                    @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Adresa</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" >

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('number_of_occupants') ? ' has-error' : '' }}">
                <label for="phone" class="col-md-4 control-label">Number of occupants</label>

                <div class="col-md-6">
                    <input id="number_of_occupants" type="date" class="form-control" name="number_of_occupants" value="{{ $user->number_of_occupants }}" >

                    @if ($errors->has('number_of_occupants'))
                        <span class="help-block">
                            <strong>{{ $errors->first('number_of_occupants') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone" class="col-md-4 control-label">Phone</label>

                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control" name="phone" value="{{ $user->phone }}">

                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            
            <div class="form-group{{ $errors->has('apartment_number') ? ' has-error' : '' }}">
                <label for="apartment_number" class="col-md-4 control-label">Apartment number</label>

                <div class="col-md-6">
                    <input id="apartment_number" type="text" class="form-control" name="apartment_number" value="{{ $user->apartment_number }}">

                    @if ($errors->has('apartment_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('apartment_number') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button style="margin-top:50px;" type="submit" class="btn btn-primary" value="edit">
                        Edit
                    </button>
                
                </div>
            </div>
            

        </form>

        <form class="login_form cf"  method="POST" action="{{ route('postDeleteUserAccount') }}">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $user->id }}">

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button style="margin-top:50px;" type="submit" class="btn btn-danger" value="delete">
                        Delete
                    </button>
                
                </div>
            </div>
        </form>

</div>

@endsection
