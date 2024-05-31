@php 
    $sImageIndex = isset($smallIndex) ?  $smallIndex : 0;
    $inputIndex = isset($index) ? $index : ''; 
    $imgData = isset($data) ? is_array($data->image) ? asset($data->image[$sImageIndex]) : $data->image : '';
    $inputVal = isset($data) ? is_array($data->image) ? $data->image[$sImageIndex] : $data->getOriginal('image') : '';
    $inputName = $multiple ? 'thumbnail['.$inputIndex.']'.'['.$name.']' : $name;
    $inputId =  $inputIndex != '' ? $name.'-'.$inputIndex : $name;
@endphp

<div class="image-upload mb-2 w-full" >    

    <div class="max-width-200 my-1">
        <img src="{{ $imgData != '' ? $imgData : '/images/placeholder.png' }}" data-src="/images/placeholder.png"  class="img-thumbnail d-block" />

        <button type="button" onclick="selectImage('{{ $inputId }}')" class="btn btn-success w-100 waves-effect waves-light">
            Choose image
        </button>
        
        <input type="hidden" id="{{ $inputId }}" value="{{ old($inputName) ? old($inputName) : $inputVal }}" class="form-control" name="{{ $inputName }}" placeholder="Cover image">
    </div>                         
    
</div>