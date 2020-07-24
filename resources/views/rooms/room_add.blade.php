@extends('layout.default')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            {{$form_title}}
        </h3>
    </div>
    <!--begin::Form-->
    <form method="POST" action="/rooms/room/store">
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
                <label for="name" class="col-2 col-form-label">Room*</label>
                <div class="col-10">
                    <input class="form-control @error('room') is-invalid @enderror" type="text" value="{{old('room')}}" id="room" name="room" />
                    @error('room')
                    <p class="invalid-feedback">{{$errors->first('room')}}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-2 col-form-label">Description</label>
                <div class="col-10">
                    <input class="form-control" type="text" value="{{old('description')}}" id="description" name="description" />
                </div>
            </div>
            <div class="form-group row">
                <label for="room_type_id" class="col-2 col-form-label">Type*</label>
                <div class="col-10">
                    <select class="form-control @error('room_type_id') is-invalid @enderror" id="room_type_id" name="room_type_id">
                        @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->type}}</option>
                        @endforeach
                    </select>
                    @error('room_type_id')
                    <p class="invalid-feedback">{{$errors->first('room_type_id')}}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="room_status_id" class="col-2 col-form-label">Status*</label>
                <div class="col-10">
                    <select name="room_status_id" id="room_status_id" class="form-control @error('room_status_id') is-invalid @enderror">
                        @foreach($statuses as $status)
                        <option value="{{$status->id}}">{{$status->status}}</option>
                        @endforeach
                    </select>
                    @error('room_status_id')
                    <p class="invalid-feedback">{{$errors->first('room_status_id')}}</p>
                    @enderror
                </div>
            </div>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
            <div class="card-footer">
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-10">
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <button type="button" class="btn btn-secondary" onclick="javascript:location.href='/rooms/room';">Cancel</button>
                    </div>
                </div>
            </div>
    </form>
</div>
@endsection