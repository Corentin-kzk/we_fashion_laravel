

<label for="{{$name}}" class="form-label">{{$label}}</label>
<select multiple id="{{$name}}-tom-select" name="{{$name}}[]" autocomplete="off" aria-label="Selectionner les tailles disponible">
    <option>Selectionner les tailles disponible</option>
    @foreach($options as $optKey => $optValue)
        <option @selected($values->contains($optKey)) value="{{$optKey}}">{{$optValue}}</option>
    @endforeach
</select>
