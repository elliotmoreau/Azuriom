@push('footer-scripts')
    <script>
        const addListener = function(el) {
            el.addEventListener('click', function () {
                const element = el.parentNode.parentNode;

                element.parentNode.removeChild(element);
            });
        }

        document.querySelectorAll('.{{ $name }}-remove').forEach(function (el) {
            addListener(el);
        });

        document.getElementById('{{ $name }}-add-button').addEventListener('click', function () {
            let input = '<div class="input-group mb-2"><input type="text" name="{{ $name }}[]" class="form-control"><div class="input-group-append">';
            input += '<button class="btn btn-outline-danger {{ $name }}-remove" type="button"><i class="fas fa-times"></i></button>';
            input += '</div></div>';

            const newElement = document.createElement('div');
            newElement.innerHTML = input;

            addListener(newElement.querySelector('.{{ $name }}-remove'));

            document.getElementById('{{ $name }}-input').appendChild(newElement);
        });
    </script>
@endpush

<div id="{{ $name }}-input">

    @forelse($values ?? [] as $value)
        <div class="input-group mb-2">
            <input type="text" class="form-control" name="{{ $name }}[]" value="{{ $value }}">
            <div class="input-group-append">
                <button class="btn btn-outline-danger {{ $name }}-remove" type="button"><i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    @empty
        <div class="input-group mb-2">
            <input type="text" class="form-control" name="{{ $name }}[]" placeholder="{{ $placeholder ?? '' }}">
            <div class="input-group-append">
                <button class="btn btn-outline-danger {{ $name }}-remove" type="button"><i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    @endforelse
</div>

<div class="my-1">
    <button type="button" id="{{ $name }}-add-button" class="btn btn-sm btn-success">
        <i class="fas fa-plus"></i> {{ trans('messages.actions.add') }}
    </button>
</div>