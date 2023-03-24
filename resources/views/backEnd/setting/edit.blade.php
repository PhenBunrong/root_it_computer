@extends('layouts.master')


@section('title', 'Setting')
@section('setting.index' , 'active')


@section('content')
<section class="content-header">
  <h1>
  <i class="fas fa-database"></i> &nbsp;Setting Management
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Setting</li>
  </ol>
</section>

<section id="content_section" class="content" data-aos="fade-up" data-aos-duration="3000">
    <div class="box">
        <div class="box-header bg-white">
        <form action="{{ route('settings.store') }}" method="post">
            @csrf

            
            <div class="form-group">
                <label for="app_name">App Name</label>
                <input type="text" name="app_name" class="form-control @error('app_name') is-invalid @enderror" id="app_name" placeholder="App name" value="{{ old('app_name' , config('settings.app_name')) }}">
                @error('app_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="app_description">App Description</label>
                <textarea type="text" name="app_description" class="form-control @error('app_description') is-invalid @enderror" id="app_description" placeholder="App description" >{{ old('app_description', config('settings.app_description')) }}</textarea>
                @error('app_description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="currency_symbol">Currency Symbol</label>
                <input type="text" name="currency_symbol" class="form-control @error('currency_symbol') is-invalid @enderror" id="currency_symbol" placeholder="Currency symbol" value="{{ old('currency_symbol', config('settings.currency_symbol')) }}">
                @error('currency_symbol')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
            
                
                <button class="btn btn-primary float-right"  type="submit" >Change Setting</button>
            
        </form>
        </div>
    </div>
</section>
@endsection