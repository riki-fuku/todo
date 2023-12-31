@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="css/index.css">
@endsection

@section('content')
    @if (session('message'))
        <div class="success__message">
            <div class="success__message-alert">{{ session('message') }}</div>
        </div>
    @endif
    @error('content')
        <div class="error__message">
            <div class="error__message-alert">
                {{ $message }}
            </div>
        </div>
    @enderror
    <div class="todo-content">
        <h2 class="todo-content__title">新規登録</h2>
        <form action="/todos" class="todo-form" method="POST">
            @csrf
            <input type="text" name="content" class="todo-form__input" value="{{ old('content') }}">
            <select name="category_id" id="category_id" class="todo-form__select" value="{{ old('category_id') }}">
                <option value="" hidden>カテゴリ</option>
                @foreach ($categories as $category)
                    @if ($category->id == old('category_id'))
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
            <div class="todo-form__button">
                <button class="todo-form__button--submit">作成</button>
            </div>
        </form>

        <h2 class="todo-content__title">Todo検索</h2>
        <form action="/todos/search" class="todo-form" method="GET">
            @csrf
            <input type="text" name="keyword" class="todo-form__input" value="{{ old('keyword') }}">
            <select name="category_id" id="category_id" class="todo-form__select">
                <option value="" hidden>カテゴリ</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <div class="todo-form__button">
                <button class="todo-form__button--submit">検索</button>
            </div>
        </form>

        <div class="todo-table">
            <table class="todo-table__inner">
                <tr class="todo-table__tr">
                    <th class="todo-table__th" colspan="1">Todo</th>
                    <th class="todo-table__th" colspan="3">カテゴリ</th>
                </tr>
                @foreach ($todos as $todo)
                    <tr class="todo-table__tr">
                        <form action="/todos/update" method="POST">
                            @method('PATCH')
                            @csrf
                            <input type="hidden" name="id" value="{{ $todo->id }}">
                            <td class="todo-table__content">
                                <input class="todo-table__content-input" type="text" name="content"
                                    value="{{ $todo->content }}">
                            </td>
                            <td class="todo-table__content">
                                <input class="todo-table__content-input" type="text" name="content"
                                    value="{{ $todo->category->name }}">
                            </td>
                            <td class="todo-table__confirm">
                                <div class="todo-table__confirm-button">
                                    <button class="todo-table__confirm-button-submit">更新</button>
                                </div>
                            </td>
                        </form>
                        <td class="todo-table__delete">
                            <form class="delete-form" action="/todos/delete" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{ $todo->id }}">
                                <div class="todo-table__delete-button">
                                    <button class="todo-table__delete-button-submit">削除</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
