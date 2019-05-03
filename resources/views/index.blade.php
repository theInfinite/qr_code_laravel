@extends('layout')

@section('content')

    <div id="content-wrapper">

        <div class="container-fluid">

            <form method="POST" style="padding: 10px;" action="{{ url('/save-guest-detail') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="guest_name">Guest Name</label>
                    <input id="guest_name" type="text" class="form-control" name="guest_name" placeholder="Guest Name" required>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>

            </form>

        </div>
    </div>

@endsection
