@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Applicants List') }}</div>

                  <table class="table table-bordered table-striped">
                    <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Tax Id Number</th>
                                <th>Phone</th>
                                <th>Country</th>
                                <th>Number of Employees</th>
                                <th>Industry</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($applicants as $applicant)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $applicant->name }}</td>
                                <td>{{ $applicant->email }}</td>
                                <td>{{ $applicant->tax_id_number }}</td>
                                <td>{{ $applicant->phone }}</td>
                                <td>{{ $applicant->country }}</td>
                                <td>{{ $applicant->number_of_employees }}</td>
                                <td>{{ $applicant->industry }}</td>
                                <td><a href="/applicant/{{$applicant->id}}" class="active">{{__('JSON')}}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if(session('json_str'))
                        <div class="alert alert-success">
                            {{__('Generated JSON:') }}
                            {{ session('json_str') }}
                        </div>
                    @endif
                    <a href="/home" class="active">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
