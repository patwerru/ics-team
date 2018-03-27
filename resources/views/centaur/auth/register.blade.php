@extends('Centaur::layout')

@section('title', 'Register')

@section('content')
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2"></div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <img class="img-responsive" src="{{ asset('imgs/banner.png') }}"width="100%">
        </div>
    </div>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <img class="img-responsive" src="{{ asset('imgs/lable.png') }}" width="100%">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Register</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('auth.register.attempt') }}">
                    <fieldset>
                        <div class="form-group {{ ($errors->has('first_name')) ? 'has-error' : '' }}">
                            <input class="form-control" placeholder="First name" name="first_name" type="text" value="{{ old('first_name') }}">
                            {!! ($errors->has('first_name') ? $errors->first('first_name', '<p class="text-danger">:message</p>') : '') !!}
                        </div>
                        <div class="form-group {{ ($errors->has('last_name')) ? 'has-error' : '' }}">
                            <input class="form-control" placeholder="Last name" name="last_name" type="text" value="{{ old('last_name') }}">
                            {!! ($errors->has('last_name') ? $errors->first('last_name', '<p class="text-danger">:message</p>') : '') !!}
                        </div>
                        <div class="form-group {{ ($errors->has('id_number')) ? 'has-error' : '' }}">
                            <input class="form-control" placeholder="ID number" name="id_number" type="text" value="{{ old('id_number') }}">
                            {!! ($errors->has('id_number') ? $errors->first('id_number', '<p class="text-danger">:message</p>') : '') !!}
                        </div>
                        <div class="form-group {{ ($errors->has('phone')) ? 'has-error' : '' }}">
                            <input class="form-control" placeholder="Phone number" name="phone" type="text" value="{{ old('phone') }}">
                            {!! ($errors->has('phone') ? $errors->first('phone', '<p class="text-danger">:message</p>') : '') !!}
                        </div>
                        <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                            <input class="form-control" placeholder="E-mail" name="email" type="text" value="{{ old('email') }}">
                            {!! ($errors->has('email') ? $errors->first('email', '<p class="text-danger">:message</p>') : '') !!}
                        </div>
                        <div class="form-group {{ ($errors->has('user_type')) ? 'has-error' : '' }}">
                            <select class="form-control" name="user_type">
                                <option value="">Select user type</option>
                                <option value="magistrate">Magistrate</option>
                                <option value="registry_staff">Registry staff</option>
                                <option value="lawyer">Lawyer</option>
                            </select>
                            {!! ($errors->has('user_type') ? $errors->first('user_type', '<p class="text-danger">:message</p>') : '') !!}
                        </div>
                        <div class="form-group  {{ ($errors->has('password')) ? 'has-error' : '' }}">
                            <input class="form-control" placeholder="Password" name="password" type="password">
                            {!! ($errors->has('password') ? $errors->first('password', '<p class="text-danger">:message</p>') : '') !!}
                        </div>
                        <div class="form-group  {{ ($errors->has('password_confirmation')) ? 'has-error' : '' }}">
                            <input class="form-control" placeholder="Confirm Password" name="password_confirmation" type="password">
                            {!! ($errors->has('password_confirmation') ? $errors->first('password_confirmation', '<p class="text-danger">:message</p>') : '') !!}
                        </div>
                        <input name="_token" value="{{ csrf_token() }}" type="hidden">
                        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Create Account">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop