@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    {{ __('Name')}}
                                </th>
                                <td>
                                    {{ appliants->name  }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ __('Email') }}
                                </th>
                                <td>
                                    {{ appliant->email }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ __('Tax Id Number') }}
                                </th>
                                <td>
                                    {{ appliant->tax_id_number }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
