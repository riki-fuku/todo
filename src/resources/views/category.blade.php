@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="css/category.css">
@endsection

@section('content')
    @if (session('message'))
        <div class="success__message">
            <div class="success__message-alert">{{ session('message') }}</div>
        </div>
    @endif
    @error('name')
        <div class="error__message">
            <div class="error__message-alert">
                {{ $message }}
            </div>
        </div>
    @enderror
    <div class="category-content">
        <form action="/categories" class="category-form" method="POST">
            @csrf
            <input type="text" name="name" class="category-form__input" value="{{ old('name') }}">
            <div class="category-form__button">
                <button class="category-form__button--submit">作成</button>
            </div>
        </form>

        <div class="category-table">
            <table class="category-table__inner">
                <tr class="category-table__tr">
                    <th class="category-table__th" colspan="3">category</th>
                </tr>
                @foreach ($categories as $category)
                    <tr class="category-table__tr">
                        <form action="/categories/update" method="POST">
                            @method('PATCH')
                            @csrf
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <td class="category-table__content">
                                <input class="category-table__content-input" type="text" name="name"
                                    value="{{ $category->name }}">
                            </td>
                            <td class="category-table__confirm">
                                <div class="category-table__confirm-button">
                                    <button class="category-table__confirm-button-submit">更新</button>
                                </div>
                            </td>
                        </form>
                        <td class="category-table__delete">
                            <form class="delete-form" action="/categories/delete" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{ $category->id }}">
                                <div class="category-table__delete-button">
                                    <button class="category-table__delete-button-submit">削除</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
