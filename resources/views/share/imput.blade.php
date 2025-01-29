@php
    $label ??= ucfirst($name);
    $type ??= 'text';
    $name ??= null;
    $class ??= '';
    $value ??= '';
@endphp

<div @class(["form-group", $class])>
    <label for="{{ $name }}">{{ $label }}</label>

    @if ($type == 'text' || $type == 'password' || $type == 'email')
        <input class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}">
    @elseif ($name === 'sexe')
    <select class="form-select @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" required>
        <option value="F" @selected(old($name) == 'F' || $value == 'F')>Féminin</option>
        <option value="M" @selected(old($name) == 'M' || $value == 'M')>Masculin</option>
    </select>
    @elseif ($name === 'classe')
    <select class="form-select @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}" required>
        <option value="6" @selected(old($name) == '6' || $value == '6')>6ème</option>
        <option value="5" @selected(old($name) == '5' || $value == '5')>5ème</option>
        <option value="4" @selected(old($name) == '4' || $value == '4')>4ème</option>
        <option value="3" @selected(old($name) == '3' || $value == '3')>3ème</option>
        <option value="2" @selected(old($name) == '2' || $value == '2')>2ème</option>
        <option value="1" @selected(old($name) == '1' || $value == '1')>1ère</option>
        <option value="tle" @selected(old($name) == 'tle' || $value == 'tle')>Terminal</option>
    </select>
@elseif ($name === 'role')
    <select class="form-select @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" required>
        <option value="eleve" @selected(old($name) == 'eleve' || $value == 'eleve')>Élève</option>
        <option value="parent" @selected(old($name) == 'parent' || $value == 'parent')>Parent</option>
        <option value="enseignant" @selected(old($name) == 'enseignant' || $value == 'enseignant')>Enseignant</option>
        <option value="directeur" @selected(old($name) == 'directeur' || $value == 'directeur')>Directeur</option>
        <option value="secretaire" @selected(old($name) == 'secretaire' || $value == 'secretaire')>Secrétaire</option>
        <option value="intendant" @selected(old($name) == 'intendant' || $value == 'intendant')>Intendant</option>
        <option value="surveillant" @selected(old($name) == 'surveillant' || $value == 'surveillant')>Surveillant</option>
    </select>
@else
    <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}">
@endif

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>


