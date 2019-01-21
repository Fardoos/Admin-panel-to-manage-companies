@extends('layouts.master')
@section('styles')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">{{isset($company)?"edit ":"add "}}Company</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{isset($company)?"edit ":"add "}}Company</li>
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
                <form method="post" class="form-horizontal validate_form" id="company-add-form" enctype="multipart/form-data" action="{{ isset($company)? '/companies/'.$company->comp_id : '/companies'  }}">
                    @if(isset($company))
                        <input type="hidden" name="_method" value="PATCH" />
                    @endif
                    {!! csrf_field() !!}
                    <div class="card-body">
                        <h4 class="card-title">Company Info</h4>
                        <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="fname" class="control-label col-lg-2">Name  <span
                                        class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="comp_name" value="{{ isset($company) ? $company->comp_name  : old('comp_name')  }}" class="form-control validate[required]" id="comp_name" placeholder="Name here">
                                @if ($errors->has('comp_name'))
                                    <span class="help-block">
		                                        <strong>{{ $errors->first('comp_name') }}</strong>
		                                    </span>
                                @endif
                            </div>
                        </div>
                            <div class="form-group row {{ $errors->has('comp_email') ? ' has-error' : '' }}">
                                <label class="control-label col-lg-2"> Email </label>
                                <div class="col-sm-9">
                                    <input type="text" name="comp_email" value="{{ isset($company) ? $company->comp_email  : old('comp_email')  }}" class="form-control validate[custom[email]" id="comp_email" placeholder=" Email here">
                                    @if ($errors->has('comp_email'))
                                        <span class="text-danger">
		                                        <strong>{{ $errors->first('comp_email') }}</strong>
		                                    </span>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group row {{ $errors->has('comp_website') ? ' has-error' : '' }}">
                            <label for="lname" class="control-label col-lg-2">Websit</label>
                            <div class="col-sm-9">
                                <input type="url" name="comp_website" value="{{ isset($company) ? $company->comp_website  : old('comp_website')  }}" class="form-control" id="comp_website" placeholder="websit Here">
                                @if ($errors->has('comp_website'))
                                    <span class="text-danger">
		                                        <strong>{{ $errors->first('comp_website') }}</strong>
		                                    </span>
                                @endif
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="control-label col-lg-2">File Upload</label>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="comp_logo" name="comp_logo">
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                </div>
                            </div>
                        </div>
                        <div>
                            @if(isset($company) && !empty($company->comp_logo))
                                <img src="{{!empty($company->comp_logo)?'/storage/' . $company->comp_logo:""}}" width="150px" height="150px">

                            @endif
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