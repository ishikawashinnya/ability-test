@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('header')
@endsection

@section('content')   
        <div class="confilm__content">
            <div class="confilm-form__heading">
              <h2>Confirm</h2>
            </div>
            
            <form action="/thanks" method="post" class="form">
              @csrf
              <div class="confirm-table">
                  <table class="confirm-table__inner">
                      <tr class="confirm-table__row">
                          <th class="confirm-table__header">お名前</th>
                          <td class="confirm-table__text">
                              <input class="confirm-table__text--item" type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly />
                              <input class="confirm-table__text--item" type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly />
                          </td>
                      </tr>
                      <tr class="confirm-table__row">
                          <th class="confirm-table__header">性別</th>
                          <td class="confirm-table__text">
                              <input class="confirm-table__text--item" type="text" name="gender" value="{{ $contact['gender'] }}" readonly hidden/>
                              @if ($contact['gender'] == '1')
                                  男性
                              @elseif ($contact['gender'] == '2')
                                  女性
                              @else
                                  その他
                              @endif
                          </td>
                      </tr>
                      <tr class="confirm-table__row">
                          <th class="confirm-table__header">メールアドレス</th>
                          <td class="confirm-table__text">
                            <input class="confirm-table__text--item" type="email" name="email" value="{{ $contact['email'] }}" readonly />
                          </td>
                      </tr>
                      <tr class="confirm-table__row">
                        <th class="confirm-table__header">電話番号</th>
                        <td class="confirm-table__text">
                            <input class="confirm-table__text--item" type="tel" name="tell" value="{{ $contact['tell'] }}" readonly />
                        </td>
                      </tr>
                      <tr class="confirm-table__row">
                          <th class="confirm-table__header">住所</th>
                          <td class="confirm-table__text">
                            <input class="confirm-table__text--item" type="text" name="address" value="{{ $contact['address'] }}" readonly />
                          </td>
                      </tr>
                      <tr class="confirm-table__row">
                          <th class="confirm-table__header">建物名</th>
                          <td class="confirm-table__text">
                            <input class="confirm-table__text--item" type="text" name="building" value="{{ $contact['building'] }}" readonly />
                          </td>
                      </tr>
                      <tr class="confirm-table__row">
                          <th class="confirm-table__header">お問い合わせの種類</th>
                          <td class="confirm-table__text">                       
                            <input class="confirm-table__text--item" type="text" name="category_id" value="{{ $contact['category_id'] }}" readonly hidden/>
                            @if (isset($contact['category_id']))
                                @foreach ($categories as $category)
                                    @if ($category->id == $contact['category_id'])
                                        {{ $category->content }}
                                    @endif
                                @endforeach
                            @endif
                          </td>
                      </tr>
                      <tr class="confirm-table__row">
                          <th class="confirm-table__header">お問い合わせ内容</th>
                          <td class="confirm-table__text">
                            <textarea class="confirm-table__text--textarea"  name="detail" readonly />{{ $contact['detail'] }}</textarea>
                          </td>
                      </tr>                 
                  </table>
              </div>
              <div class="form__button">
                <button class="form__button-submit" type="submit">送信</button>
                <a href="/" class="correct__button">修正</a>
              </div>
            </form>
            
        </div>
@endsection('content')            
        
    
   
