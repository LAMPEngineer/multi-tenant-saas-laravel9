@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
            <div class="card">
                <div class="card-header">{{ __('Application Form') }}</div>

                <div class="card-body">
                    
                   <input type="radio" name="lang" value="show" checked onclick="showHideDiv(2)"> Entity
                   <input type="radio" name="lang" value="hide" onclick="showHideDiv(1)"> Individual
                    <form method="POST" action="{{ route('storeform') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tax_id_number" class="col-md-4 col-form-label text-md-end">{{ __('Tax Id Number') }}</label>

                            <div class="col-md-6">
                                <input id="tax_id_number" type="text" class="form-control @error('tax_id_number') is-invalid @enderror" name="tax_id_number" required autocomplete="new-tax_id_number">

                                @error('tax_id_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" required autocomplete="new-phone">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="country" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control" name="country" required autocomplete="new-country">
                            </div>
                        </div>

                    <div id="div">
                        <div class="row mb-3">
                            <label for="number_of_employees" class="col-md-4 col-form-label text-md-end">{{ __('Number Of Employees') }}</label>

                            <div class="col-md-6">
                                <input id="number_of_employees" type="text" class="form-control" name="number_of_employees" autocomplete="new-number_of_employees">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="industry" class="col-md-4 col-form-label text-md-end">{{ __('Industry') }}</label>

                            <div class="col-md-6">
                                <input id="industry" type="text" class="form-control" name="industry"  autocomplete="new-industry">
                            </div>
                        </div>
                    </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @if(session('json_str'))
                        <div class="alert alert-success">
                            {{ session('json_str') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
function showHideDiv(val)
{
 if(val ==1){
    document.getElementById('div').style.display='none';}
 if(val ==2){document.getElementById('div').style.display='block';}    
}
</script>