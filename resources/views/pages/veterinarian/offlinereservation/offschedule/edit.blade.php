@extends('layouts.veterinarian.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Offschedule') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('offschedules.update', $offschedules->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="veterinarian_id" class="col-md-4 col-form-label text-md-right">{{ __('Veterinarian') }}</label>

                            <div class="col-md-6">
                                <select id="veterinarian_id" class="form-control @error('veterinarian_id') is-invalid @enderror" name="veterinarian_id" required autofocus>
                                    @foreach($veterinarians as $veterinarian)
                                        <option value="{{ $veterinarian->id }}" {{ $offschedules->veterinarian_id == $veterinarian->id ? 'selected' : '' }}>{{ $veterinarian->name }}</option>
                                    @endforeach
                                </select>

                                @error('veterinarian_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date', $offschedules->date) }}" required>

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="session" class="col-md-4 col-form-label text-md-right">{{ __('Session') }}</label>

                            <div class="col-md-6">
                                <select id="session" class="form-control @error('session') is-invalid @enderror" name="session" required>
                                    <option value="07:00-11:00" {{ $offschedules->session == '07:00-11:00' ? 'selected' : '' }}>07:00-11:00</option>
                                    <option value="13:00-17:00" {{ $offschedules->session == '13:00-17:00' ? 'selected' : '' }}>13:00-17:00</option>
                                </select>

                                @error('session')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Offschedule') }}
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
