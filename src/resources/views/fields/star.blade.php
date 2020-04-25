<!-- radio -->
@php
    $value = old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : 0 ));
    $field['count'] = $field['count'] ?? 5;
@endphp

@include('crud::fields.inc.wrapper_start')
    <div>
        <label>{!! $field['label'] !!}</label>
        @include('crud::fields.inc.translatable_icon')
    </div>

    <div class="rate form-check">
        @while ($field['count']--)
            <input @include('crud::fields.inc.attributes') type="radio" id="star-{{ $field['name'].'-'.$field['count'] }}" name="{{$field['name']}}" value="{{ $field['count']+1 }}" {{ $field['count']+1 == $value ? 'checked' : '' }}/>
            <label for="star-{{ $field['name'].'-'.$field['count'] }}" title="{{ $field['count']+1 }}">{{ $field['count'] }} stars</label>
        @endwhile
    </div>

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block" style="clear: both;">{!! $field['hint'] !!}</p>
    @endif
@include('crud::fields.inc.wrapper_end')

@if ($crud->fieldTypeNotLoaded($field))
    @php
        $crud->markFieldTypeAsLoaded($field);
    @endphp
    
    {{-- FIELD CSS  --}}
    @push('crud_fields_styles')
        <style>
            .rate {
                float: left;
                height: 46px;
                padding: 0 10px;
            }
            .rate:not(:checked) > input {
                position:absolute;
                top:-9999px;
            }
            .rate:not(:checked) > label {
                float:right;
                width:1em;
                overflow:hidden;
                white-space:nowrap;
                cursor:pointer;
                font-size:30px;
                color: {{ isset($field['options']) ? ($field['options']['unchecked_color'] ?? '#ccc') : '#ccc' }};
            }
            .rate:not(:checked) > label:before {
                content: '{{ isset($field['options']) ? ($field['options']['icon'] ?? '★') : '★' }} ';
            }
            .rate > input:checked ~ label {
                color: {{ isset($field['options']) ? ($field['options']['checked_color'] ?? '#ffc700') : '#ffc700' }};
            }
            .rate:not(:checked) > label:hover,
            .rate:not(:checked) > label:hover ~ label {
                color: #deb217;
            }
            .rate > input:checked + label:hover,
            .rate > input:checked + label:hover ~ label,
            .rate > input:checked ~ label:hover,
            .rate > input:checked ~ label:hover ~ label,
            .rate > label:hover ~ input:checked ~ label {
                color: {{ isset($field['options']) ? ($field['options']['hover_color'] ?? '#c59b08') : '#c59b08' }};
            }
        </style>
    @endpush
@endif