@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Send Text Blast
                    <div class="float-right">
                    <span class="badge badge-{{ $server === "ONLINE" ? "success" : "danger" }}">SMS Server is {{$server}}</span>
                        <span class="badge badge-{{ intval($api) > 0 ? "primary" : "danger" }}">{{$api}} message/s left</span>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/custom') }}">
                        @csrf
                        <div class="form-group">
                            <select class="custom-select" multiple size id="districts" name="districts[]" required>
                                dd($districts);
                                @if (count($districts) > 0)
                                <option value="">Choose one or more districts</option>
                                @else
                                <option value="">There are no districts registered</option>
                                @endif
                                @foreach ($districts as $district)
                                @if ($district->recipients->count() > 0)
                                <option value='{{$district->id}}'>{{$district->name}} ({{$district->recipients->count()}})</option>
                                @endif
                                @endforeach
                                </select>
                            @error('message')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="textmessage">Enter message:</label>
                            <textarea class="form-control" id="textmessage" name="textmessage" placeholder="What's your message?" required></textarea>
                            @error('textmessage')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Message') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
