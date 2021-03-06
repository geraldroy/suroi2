@extends('layouts.app')

@section('title', 'Create New Package')

@section('content')
<div class="container site-content py-5 mt-5 d-flex flex-column">
    <div class="row justify-content-center m-auto w-100">
        <div class="col-md-8">
            <h1 class="mx-auto my-3 text-center"><strong>{{ __('Create New Package') }}</strong></h1>

                <div class="card p-4">
                    <form method="POST" action="{{ route('packages.store') }}" style="width:100% !important">
                        @csrf


                        <input id="agency_id" name="agency_id" type="hidden" value="{{ $agency->id }}">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" rows="5" required> </textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Activities') }}</label>

                            <div class="col-md-6">
                                <textarea id="activities" name="activities" class="form-control{{ $errors->has('activities') ? ' is-invalid' : '' }}" rows="5" required> </textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-3 col-form-label text-md-right">{{ __('Location') }}</label>

                            <div class="col-md-7">
                                <select id="location_id" name="location_id" class="form-control{{ $errors->has('location_id') ? ' is-invalid' : '' }}" required>
                                    <option value="0">None</option>
                                    @foreach ($locations as $location)
                                    <option value="{{ $location->id }}"> {{ ucwords($location->name) }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('location_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('location_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" name="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}">

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <?php $photos = ['photo1', 'photo2', 'photo3', 'photo4', 'photo5'] ?>
                        @foreach($photos as $key => $photo)
                        <div class="row py-3">
                         <div class="suroi-file form-group col-12">
                            <label for="{{ $photo }}"><strong>Upload Photo {{ $key + 1 }}</strong></label>
                            <input type="file" name="{{ $photo }}" id="{{ $photo }}" class="form-control-file">
                          </div>
                        </div>
                        @endforeach


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Package') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
