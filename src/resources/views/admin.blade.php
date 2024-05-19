@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('header')
<nav>
  <ul class="header-nav">
    <li class="header-nav__item">
        <form class="form" action="/logout" method="post">
            @csrf
            <button class="header-nav__button">ログアウト</button>
        </form>
    </li>
  </ul>
</nav>
@endsection

@section('content')
<div class="admin_content">
    <div class="admin-form__heading">
      <h2>Admin</h2>
    </div>

    <form class="search-form " action="/admin/search" method="get">
        @csrf
        <div class="search-form__item">
            <input class="search-form__item-input" type="text" name="keyword" value="{{ old('keyword') }}">
            <select class="search-form__item-select--gender" name="gender">
                <option name="gender" class="gender-select" value="" hidden>性別</option>
                <option name="gender" class="gender-select" value="1">男性</option>
                <option name="gender" class="gender-select" value="2">女性</option>
                <option name="gender" class="gender-select" value="3">その他</option>
            </select>
            <select class="search-form__item-select--category_id" name="category_id">
                <option value="" hidden>お問い合わせの種類</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->content }}
                        </option>
                    @endforeach
            </select>
            <input type="date" class="search-form__item-date" />

        </div>
        <div class="search-form__button">
            <button class="search-form__button-submit" type="submit">検索</button>
        </div>
        <div class="reset__button">
            <button class="reset__button-submit" type="submit">リセット</button>
        </div>
    </form>

    <div class="export__button">
        <button class="export__button-submit" type="submit">エクスポート</button>
    </div>

   {{ $contacts->links() }}

    <div class="admin-table">
        <table class="admin-table__inner">
            <tr class="admin-table__row">
                <th class="admin-table__header">
                    <span class="admin-table__header-span">お名前</span>
                    <span class="admin-table__header-span">性別</span>
                    <span class="admin-table__header-span">メールアドレス</span>
                    <span class="admin-table__header-span">お問い合わせの種類</span>
                </th>
            </tr>
            @foreach ($contacts as $contact)
                <tr class="admin-table__row">
                    <td class="admin-table__text">
                        <input class="admin-table__text--name" type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly />
                        <input class="admin-table__text--name" type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly />
                    </td>
                    <td class="admin-table__text">
                        <input type="text" name="gender" value="{{ $contact['gender'] }}" readonly hidden/>
                        @if ($contact['gender'] == '1')
                            男性
                        @elseif ($contact['gender'] == '2')
                            女性
                        @else
                            その他
                        @endif
                    </td>
                    <td class="admin-table__text">
                        <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
                    </td>
                    <td class="admin-table__text">                       
                        <input type="text" name="category_id" value="{{ $contact['category_id'] }}" readonly hidden/>
                            @if (isset($contact['category_id']))
                                @foreach ($categories as $category)
                                    @if ($category->id == $contact['category_id'])
                                        {{ $category->content }}
                                    @endif
                                @endforeach
                            @endif
                    </td>
                    <td class="admin-table__text">
                        <div class="admin-form__button">
                            <button class="detail-form__button-submit" type="submit">
                                詳細
                            </button>
                        </div>
                    </td>
                    
                </tr>
            @endforeach
        </table>
    </div>
   
</div>
@endsection