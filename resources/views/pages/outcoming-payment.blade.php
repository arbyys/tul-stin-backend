@extends('layouts.app')

@section('title', 'odchozí platba')

@section('content')
    <h3 class="mb-3">Odchozí platba</h3>
    <div class="responsive-50">
        <form action="{{ route('new_outcoming_payment') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="amount" class="form-label">Částka</label>
                <input type="number" required class="form-control" placeholder="Zadejte částku" id="amount">
            </div>
            <div class="mb-3">
                <label for="currency" class="form-label">Měna platby</label>
                <select id="currency" name="currency" required class="form-select">
                    @foreach($currencies as $currency)
                        <option @if($loop->first)selected @endif" value="{{ $currency->code }}">{{ $currency->code }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Potvrdit</button>
        </form>
    </div>
@endsection
