@extends('layouts.master')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">{{isset($employee)?"edit ":"add "}}employee</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{isset($employee)?"edit ":"add "}}employee</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="post" class="form-horizontal validate_form" id="employee-add-form" enctype="multipart/form-data" action="{{ isset($employee)? '/employees/'.$employee->emp_id : '/employees'  }}">
                        @if(isset($employee))
                            <input type="hidden" name="_method" value="PATCH" />
                        @endif
                        {!! csrf_field() !!}
                        <div class="card-body">
                            <h4 class="card-title">employee Info</h4>
                            <div class="form-group row {{ $errors->has('emp_first_name') ? ' has-error' : '' }}">
                                <label for="emp_first_name" class="control-label col-lg-2">First Name  <span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="emp_first_name" value="{{ isset($employee) ? $employee->emp_first_name  : old('emp_first_name')  }}" class="form-control validate[required]" id="emp_first_name" placeholder="Name here">
                                    @if ($errors->has('emp_first_name'))
                                        <span class="help-block">
		                                        <strong>{{ $errors->first('emp_first_name') }}</strong>
		                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('emp_last_name') ? ' has-error' : '' }}">
                                <label for="emp_last_name" class="control-label col-lg-2">Last Name  <span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="emp_last_name" value="{{ isset($employee) ? $employee->emp_last_name  : old('emp_last_name')  }}" class="form-control validate[required]" id="emp_last_name" placeholder="Last Name here">
                                    @if ($errors->has('emp_last_name'))
                                        <span class="help-block">
		                                        <strong>{{ $errors->first('emp_last_name') }}</strong>
		                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('emp_email') ? ' has-error' : '' }}">
                                <label class="control-label col-lg-2"> Email </label>
                                <div class="col-sm-9">
                                    <input type="text" name="emp_email" value="{{ isset($employee) ? $employee->emp_email  : old('emp_email')  }}" class="form-control validate[custom[email]" id="emp_email" placeholder=" Email here">
                                    @if ($errors->has('emp_email'))
                                        <span class="text-danger">
		                                        <strong>{{ $errors->first('emp_email') }}</strong>
		                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('emp_phone') ? ' has-error' : '' }}">
                                <label for="emp_phone" class="control-label col-lg-2">Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" name="emp_phone" value="{{ isset($employee) ? $employee->emp_phone  : old('emp_phone')  }}" class="form-control" id="emp_phone" placeholder="Phone Here">
                                    @if ($errors->has('emp_phone'))
                                        <span class="text-danger">
		                                        <strong>{{ $errors->first('emp_phone') }}</strong>
		                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-lg-2">Single Select</label>
                                <div class="col-sm-9">
                                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="comp_id" id="comp_id">
                                        <option value="">Select company</option>
                                        @if(!empty($companies))
                                            @foreach($companies as $company)
                                                <option value="{{$company->comp_id}}" {{isset($employee) && $company->comp_id == $employee->comp_id ? 'selected':$company->comp_id ==old('comp_id')?'selected':''}} >{{$company->comp_name}}</option>
                                            @endforeach
                                        @endif


                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection