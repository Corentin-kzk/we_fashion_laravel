<div>
    <label for="{{$name}}" class="form-label">{{$label}}</label>
    <input type="{{$type}}" @class(['form-control','is-invalid'=> $errors->has('{{$name}}') ]) id="{{$name}}" name="{{$name}}">
    @error('{{$name}}')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
