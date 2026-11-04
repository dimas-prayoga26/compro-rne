@props([
    'type' => 'text',
    'name' => '',
    'id' => '',
    'label' => '',
    'placeholder' => '',
    'value' => null
])

<div class="col-lg-6 mb-3 position-relative">
    <label for="{{ $id }}" class="form-label">
        {{ $label }}
        @if($type === 'password' || $type === 'file')
            <span class="text-danger">*</span>
        @endif
    </label>

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $id }}"
        class="form-control input-profile"
        placeholder="{{ $placeholder }}"
        @if($type === 'file') accept=".pdf" @endif
        @if(!empty($value)) value="{{ $value }}" @endif
    >

    @if($type === 'password')
        <i class="fa-regular fa-eye position-absolute text-black-50 end-0 me-3"
           style="cursor: pointer; top: 60%; right: 2% !important;"
           onclick="togglePassword('{{ $id }}', this)">
        </i>

        <script>
            function togglePassword(id, icon) {
                const input = document.getElementById(id);

                const isPassword = input.type === "password";
                input.type = isPassword ? "text" : "password";

                icon.classList.toggle("fa-eye");
                icon.classList.toggle("fa-eye-slash");
            }
        </script>
    @endif
</div>
