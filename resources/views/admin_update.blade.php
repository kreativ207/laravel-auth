@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Update') }}</div>

                <div class="card-body">
                    <form action="/admin-update" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="inputAdmins">Admins</label>
                                <select id="inputAdmins" class="form-control" name="user">
                                    <option selected>Choose...</option>
                                    @foreach($dataUser as $user)
                                        @if(Auth::user()->id == $user->id)
                                            @continue
                                        @endif
                                        <option value="{{$user->id}}">{{$user->email}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="inputRole">Role</label>
                                <select id="inputRole" class="form-control" name="group">
                                    <option selected>Select Role</option>
                                    @foreach($dataRole as $key => $val)
                                        <option value="{{$key}}">{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
