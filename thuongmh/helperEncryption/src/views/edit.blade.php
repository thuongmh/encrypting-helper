@extends('thuongmh::app')
@section('content')
    <h3 style="margin-bottom: 50px">Create Key Encryption</h3>
    <form action="{{ route('encryption.store') }}" method="post">
        {{csrf_field()}}
        <div class="form-group row">
            <label for="key" class="col-sm-3 col-form-label">Key  <span class="required_danger" style="color: red">(*)</span></label>
            <div class="col-sm-9">
                <input  type="text" name="key" class="form-control" id="key"
                        placeholder="Key" value="{{ $keyEncryption->key }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="value" class="col-sm-3 col-form-label">Value  <span class="required_danger" style="color: red">(*)</span></label>
            <div class="col-sm-9">
                <input  type="text" name="value" class="form-control" id="value"
                        placeholder="Value" value="{{ $keyEncryption->value }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3"></div>
            <div class="col-sm-9 ">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
@endsection
