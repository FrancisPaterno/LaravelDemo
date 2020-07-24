@extends('layout.default')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            {{$form_title}}
        </h3>
    </div>
    <!--begin::Form-->
    <form method="POST" action="/room/types/store">
        @csrf
        <div class="card-body">
            <div class="form-group mb-8">
                <div class="alert alert-custom alert-default" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                    <div class="alert-text">
                        {{$form_description}}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="type" class="col-2 col-form-label">Type*</label>
                <div class="col-10">
                    <input type="text" class="form-control @error('type') is-invalid @enderror" value="{{ old('type') }}" id="type" name="type" />
                    @error('type')
                    <p class="invalid-feedback">{{$errors->first('type')}}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-2 form-control-label">Description</label>
                <div class="col-10">
                    <textarea class="form-control" id="description" name="description" rows="3">{{old('description')}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="rate" class="col-2 from-control-label">Rate*</label>
                <div class="col-10">
                    <input type="text" class="form-control @error('rate') is-invalid @enderror" id="rate" name="rate" value="{{ old('rate')}}" />
                    @error('rate')
                    <p class="invalid-feedback">{{$errors->first('rate')}}</p>
                    @enderror
                </div>
            </div>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-10">
                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                    <button type="reset" class="btn btn-secondary" onclick="javascript:location.href='/room/types';">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection