@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                <ul>
                    <li><a href="/applicant" class="active">Applicants List</a></li>
                    <li><a href="/applicant/create">Create Applicant</a></li>
                </ul> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

