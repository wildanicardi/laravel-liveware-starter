@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data Article') }}</div>

                <div class="card-body">
                    <livewire:article-index></livewire:article-index>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
