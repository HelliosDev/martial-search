@csrf
<div class="form-group">
    <div class="form-group">
        <div class="profile__picture">
            {{ Form::file('profile_picture', ['accept' => 'image/*', 'class'=>'dropzone', 'id' => 'profile__drop', 'required']) }}
            <img src="{{ asset('img/upload/profile/default.svg') }}" alt="Profile" class="profile__avatar" id="profile__avatar">
        </div>
    </div>
</div>
<div class="form-group">
    <div class="form-row">
        <div class="form-col">
            {{ Form::label('first-name', 'First Name') }}
            {{ Form::text('first_name', null, ['id' => 'first-name', 'required']) }}
        </div>
        <div class="form-col">
            {{ Form::label('last-name', 'First Name') }}
            {{ Form::text('last_name', null, ['id' => 'last-name', 'required']) }}
        </div>
    </div>
</div>

<div class="form-group">
    <p>Gender</p>
    <div class="form-check form-check-inline">
        {{ Form::radio('gender', 'Male', true, ['id' => 'male', 'class'=> 'form-check-input']) }}
        {{ Form::label('male', 'Male', ['class' => 'form-check-label']) }}
    </div>
    <div class="form-check form-check-inline">
        {{ Form::radio('gender', 'Female', false, ['id' => 'female', 'class'=> 'form-check-input']) }}
        {{ Form::label('female', 'Female', ['class' => 'form-check-label']) }}
    </div>
</div>

<div class="form-group">
    {{ Form::label('email', 'Email') }}
    {{ Form::email('email', null, ['id' => 'email', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', ['id' => 'password']) }}
</div>

@if($isEdit)
    <div class="form-group">
        {{ Form::label('new_password', 'New Password') }}
        {{ Form::password('new_password', ['id' => 'new_password']) }}
    </div>
@endif

<div class="form-group">
    {{ Form::label('phone-number', 'Phone Number') }}
    {{ Form::tel('phone_number', null, ['id' => 'phone-number', 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('city', 'City') }}
    {{ Form::text('city', null, ['id' => 'city', 'required']) }}
</div>