@props(['label', 'required' => false, 'name', 'disabled' => false, 'opts' => [], 'value' => null])
<div>
    <label class="flex items-start gap-x-1" for="sip"><span>{{ $label }}</span>
        @if ($required)
            <svg class="w-2 text-rose-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z">
                </path>
            </svg>
        @endif
    </label>
    <select @disabled($disabled) @if ($required) required @endif type="text"
        name="{{ $name }}" id="{{ $name }}"
        placeholder="{{ $disabled ? '' : 'isi ' }}{{ $label }}..."
        value="{{ isset($detail) ? $detail->sip : '' }}" @class([
            'mt-0.5 w-full px-2 bg-badge rounded-lg py-1.5 text-white border border-slate-800 focus:border-sky-500 hover:border-sky-500 focus:hover:shadow-lg outline-0',

            'opacity-50' => $disabled,
        ])>
        <option value="" @selected(!$value) disabled>Pilih</option>
        @foreach ($opts as $op)
            <option value="{{ $op['kode'] }}" @selected($value == $op['kode'])>{{ $op['nama'] }}</option>
        @endforeach
    </select>
    @if (count($errors->get($name)))
        <span class="text-rose-400">{{ $errors->get($name)[0] }}</span>
    @endif
</div>
