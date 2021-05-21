@extends('layouts.main')
@section('title', 'Notificações')

@section('content')
    <div class="border-b px-4 py-3 sticky top-0 w-full border-l border-r border-gray-700 bg-black text-white">
        <div class="flex justify-between items-center">
            <!-- Title -->
            <div class=" flex items-center">
                <img src="{{ asset('img/profiles/default-user.png') }}" alt="{{ Auth::user()->username }}"
                    class="rounded-full w-6 h-6 show-mobile">
                <h2 class="text-gray-100 font-bold text-xl">
                    Notificações
                </h2>
            </div>
            <!-- /Title -->

            <!-- Configs -->
            <div>
                <a href="#" class="rounded-full bg-opacity-0 hover:bg-opacity-40 bg-blue-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M24 14.187v-4.374c-2.148-.766-2.726-.802-3.027-1.529-.303-.729.083-1.169 1.059-3.223l-3.093-3.093c-2.026.963-2.488 1.364-3.224 1.059-.727-.302-.768-.889-1.527-3.027h-4.375c-.764 2.144-.8 2.725-1.529 3.027-.752.313-1.203-.1-3.223-1.059l-3.093 3.093c.977 2.055 1.362 2.493 1.059 3.224-.302.727-.881.764-3.027 1.528v4.375c2.139.76 2.725.8 3.027 1.528.304.734-.081 1.167-1.059 3.223l3.093 3.093c1.999-.95 2.47-1.373 3.223-1.059.728.302.764.88 1.529 3.027h4.374c.758-2.131.799-2.723 1.537-3.031.745-.308 1.186.099 3.215 1.062l3.093-3.093c-.975-2.05-1.362-2.492-1.059-3.223.3-.726.88-.763 3.027-1.528zm-4.875.764c-.577 1.394-.068 2.458.488 3.578l-1.084 1.084c-1.093-.543-2.161-1.076-3.573-.49-1.396.581-1.79 1.693-2.188 2.877h-1.534c-.398-1.185-.791-2.297-2.183-2.875-1.419-.588-2.507-.045-3.579.488l-1.083-1.084c.557-1.118 1.066-2.18.487-3.58-.579-1.391-1.691-1.784-2.876-2.182v-1.533c1.185-.398 2.297-.791 2.875-2.184.578-1.394.068-2.459-.488-3.579l1.084-1.084c1.082.538 2.162 1.077 3.58.488 1.392-.577 1.785-1.69 2.183-2.875h1.534c.398 1.185.792 2.297 2.184 2.875 1.419.588 2.506.045 3.579-.488l1.084 1.084c-.556 1.121-1.065 2.187-.488 3.58.577 1.391 1.689 1.784 2.875 2.183v1.534c-1.188.398-2.302.791-2.877 2.183zm-7.125-5.951c1.654 0 3 1.346 3 3s-1.346 3-3 3-3-1.346-3-3 1.346-3 3-3zm0-2c-2.762 0-5 2.238-5 5s2.238 5 5 5 5-2.238 5-5-2.238-5-5-5z" />
                    </svg>
                </a>
            </div>
            <!-- /Configs -->
        </div>
        <div class="sm:px-32 px-12 mt-8 flex justify-between items-center font-bold">
            <a href="#" class="border-b-2 border-blue-600 text-blue-600">Tudo</a>
            <a href="#" class="text-gray-400 hover:text-blue-600">Menções</a>
        </div>
    </div>

    @foreach (Auth::user()->notifications as $notification)
        <a href="#">
            <div class="border-b border-l border-r border-dim-200 text-white">
                <div class="flex md:items-center p-6">
                    <div>
                        <svg viewBox="0 0 24 24" width="48" height="48" aria-hidden="true" class="text-blue-500" fill="currentColor">
                            <g>
                                <path
                                    d="M21.697 16.468c-.02-.016-2.14-1.64-2.103-6.03.02-2.533-.812-4.782-2.347-6.334-1.375-1.393-3.237-2.164-5.242-2.172h-.013c-2.004.008-3.866.78-5.242 2.172-1.534 1.553-2.367 3.802-2.346 6.333.037 4.332-2.02 5.967-2.102 6.03-.26.194-.366.53-.265.838s.39.515.713.515h4.494c.1 2.544 2.188 4.587 4.756 4.587s4.655-2.043 4.756-4.587h4.494c.324 0 .61-.208.712-.515s-.005-.644-.265-.837zM12 20.408c-1.466 0-2.657-1.147-2.756-2.588h5.512c-.1 1.44-1.29 2.587-2.756 2.587z">
                                </path>
                            </g>
                        </svg>
                    </div>
                    <div class="notification-max-w">
                        <i class="fas {{ $notification->data['fas'] }} text-red-600"></i>
                        {{ $notification->data['title'] }} &bull;
                        {{ $notification->created_at->diffForHumans() }}
                    </div>
                </div>
                <!--middle creat tweet below icons-->
                <div class="flex items-center">
                    <div class="w-full pl-11">
                        <div class="flex items-center">

                        </div>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        ::-webkit-scrollbar {
            display: flow-root;
        }

    </style>
@endpush
