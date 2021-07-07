@extends(backpack_view('layouts.plain'))

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        <h3 class="text-center mb-4">Veuillez confirmer votre identité</h3>
        <div class="card">
            <div class="card-body">
                <form class="col-md-12 p-t-10" role="form" method="POST" action="{{ route('backpack.auth.login') }}">                  
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label class="control-label" for="{{ $username }}">{{ config('backpack.base.authentication_column_name') }}</label>

                        <div>
                            <input type="text" class="form-control{{ $errors->has($username) ? ' is-invalid' : '' }}" name="{{ $username }}" value="{{ user_web()? user_web()->email : old($username)}}" id="{{ $username }}" {{ user_web()? 'readonly' : ''}} >

                            @if ($errors->has($username))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first($username) }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="password">{{ trans('backpack::base.password') }}</label>

                        <div>
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password">

                            @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <!--                        <div class="form-group">
                                                <div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="remember"> {{ trans('backpack::base.remember_me') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>-->



                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-block btn-primary">
                                {{ trans('backpack::base.login') }}
                            </button>
                        </div>
                    </div>
                    <div class="form-group">  
                        
                        {!! NoCaptcha::display() !!}
                        
                        @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('g-recaptcha-response') }}</strong>
                        </span>
                        @endif
                        
                        
                    </div>

                </form>
            </div>
        </div>
        <!--            @if (backpack_users_have_email())
                        <div class="text-center"><a href="{{ route('backpack.auth.password.reset') }}">{{ trans('backpack::base.forgot_your_password') }}</a></div>
                    @endif
                    @if (config('backpack.base.registration_open'))
                        <div class="text-center"><a href="{{ route('backpack.auth.register') }}">{{ trans('backpack::base.register') }}</a></div>
                    @endif-->
        <div class="text-center"><a href="/home">Retourner à l'espace de travail</a></div>
    </div>
</div>

@endsection
@section('before_scripts')
{!! NoCaptcha::renderJs() !!}
@endsection
