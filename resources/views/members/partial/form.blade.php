<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name">이름</label>
    <input type="text" name="name" id="name" value="{{ old('name' , $member->name) }}" class="form-control"/>
    {!! $errors->first('name','<span class="form-error">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
    <label for="body">조원 소개</label>
    <textarea name="body" id="body" rows="10" class="form-control">{{ old('body' , $member->body)}}</textarea>
    {!! $errors->first('body','<span class="form-error">:message</span>') !!}
</div>






