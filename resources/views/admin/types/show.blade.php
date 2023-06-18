@extends('layouts.admin')

@section('title')
    {{ $type->name }}
@endsection

@section('content')
<div class="container text-white mt-5">
    <h1 class="text-center">{{ $type->name }}</h1>
        <div class="d-flex justify-content-between">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.types.index') }}">Classi</a></li>
                <li class="breadcrumb-item active">{{ $type->name }}</li>
            </ol>
            <div>
                <a class="btn btn-primary" href="{{ route('admin.types.edit', $type->slug) }}">
                    <i class="fa-solid fa-pencil"></i>
                </a>
                <form class="m-0 p-0 d-inline-block" action="{{ route('admin.types.destroy', $type->slug) }}"
                    method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-secondary delete-button" data-item-title="{{ $type->name }}" type="submit">
                        <i class="fa-solid fa-eraser"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="row bg-dark justify-content-center rounded-5 py-5 px-4 ">
            <div class="box-image d-flex  align-items-center d-flex mb-5 mb-lg-0 col-12 col-lg-6">
                <img src="{{ $type->image }}" alt="{{ $type->name }}" class="object-fit-contain w-75" />
            </div>
           <ul class="text-light list-unstyled">
                @php
                    $formattedText = preg_replace('/###\s*(.*)/', '<br><span class="feat">$1</span><br>', $type['description']);
                    $formattedAgain = str_replace('*', '<br>', $formattedText);
                @endphp
                <li>
                    <span>{!! $formattedAgain !!}</span>
                </li>
            </ul>
        </div>
</div>
@endsection
