<div class="form-group">
    <label>{{$label}}</label>
    <input type="{{$type}}" value="{{isset($value)?$value:old($key)}}" name="{{$key}}"
           class="@error($key)is-invalid @enderror form-control"
           @if($required) required @endif>
    @error($key)
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>
