@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}" />
@endsection





@section('header')
@endsection
  
@section('content')
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2>Contact</h2>
        </div>
        <form action="/confirm" method="post" class="form">
            @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label-item">お名前</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form-group__content">
                    <div class="form-group__item">
                        <input class="last-name" type="text" name="last_name" placeholder="　例:山田" value="{{ old('last_name', session('contact_data')['last_name'] ?? '') }}" />
                        <input class="first-name" type="text" name="first_name" placeholder="　例:太郎" value="{{ old('first_name', session('contact_data')['first_name'] ?? '') }}" />
                    </div>
                    <div class="form__error">
                        @error('last_name')
                        {{ $message }}
                        @enderror
                        @error('first_name')
                        {{ $message }}
                        @enderror
                        
                    </div>
                </div> 
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label-item">性別</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form-group__content">
                    <div class="form-group__item-radio">
                       <label><input type="radio" name="gender" class="gender-radio" value="1" {{ old('gender', session('selected_gender')) == '1' ? 'checked' : '' }} checked>男性</label>
                       <label><input type="radio" name="gender" class="gender-radio" value="2" {{ old('gender', session('selected_gender')) == '2' ? 'checked' : '' }}>女性</label>
                       <label><input type="radio" name="gender" class="gender-radio" value="3" {{ old('gender', session('selected_gender')) == '3' ? 'checked' : '' }}>その他</label>                                     
                    </div>
                    <div class="form__error">
                        @error('gender')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label-item">メールアドレス</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form-group__content">
                    <div class="form-group__item">
                       <input type="email" class="email" name="email" placeholder="　例:test@example.com" value="{{ old('email', session('contact_data')['email'] ?? '') }}" />
                    </div>
                    <div class="form__error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label-item">電話番号</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form-group__content">
                    <div class="form-group__item">
                          <input type="tel" class="phone1" name="phone1"  placeholder="080" value="{{ old('phone1', session('contact_data')['phone1'] ?? '') }}" /> - 
                          <input type="tel" class="phone2" name="phone2"  placeholder="1234" value="{{ old('phone2', session('contact_data')['phone2'] ?? '') }}" /> - 
                          <input type="tel" class="phone3" name="phone3"  placeholder="5678" value="{{ old('phone3', session('contact_data')['phone3'] ?? '') }}" />
                    </div>
                    <div class="form__error">
                        @error('phone1')
                        {{ $message }}
                        @enderror
                        @error('phone2')
                        {{ $message }}
                        @enderror
                        @error('phone3')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>    
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label-item">住所</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form-group__content">
                    <div class="form-group__item">
                       <input type="text" class="address" name="address" placeholder="　例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address', session('contact_data')['address'] ?? '') }}" />
                    </div>
                    <div class="form__error">
                        @error('address')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>    
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label-item">建物名</span>
                </div>
                <div class="form-group__content">
                    <div class="form-group__item">
                       <input type="text" class="building" name="building" placeholder="　例:千駄ヶ谷マンション101" value="{{ old('building', session('contact_data')['building'] ?? '') }}" />
                    </div>                   
                </div>
            </div>    
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label-item">お問い合わせの種類</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form-group__content">
                    <div class="form-group__item">
                       <select name="category_id" id="" class="content">
                        <option class="form-group__default" value="" hidden ">選択してください</option>
                        @foreach($categories as $category)
                           <option value="{{ $category->id }}"{{ old('category_id', session('contact_data')['category_id'] ?? '') == $category->id ? 'selected' : '' }} >{{ $category->content }}</option>
                        @endforeach
                       </select>
                    </div>
                    <div class="form__error">
                        @error('category_id')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div> 
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label-item">お問い合わせ内容</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form-group__content">
                    <div class="form-group__item">
                       <textarea class="detail" name="detail" id="" placeholder="お問い合わせ内容をご記載ください"/>{{ old('detail', session('contact_data')['detail'] ?? '') }}</textarea>
                    </div>
                    <div class="form__error">
                        @error('detail')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>   
            <div class="from__button">
                <button class="form__button-submit" type="submit">確認画面</button>
            </div>                              
        </form>
    </div>
@endsection('content')