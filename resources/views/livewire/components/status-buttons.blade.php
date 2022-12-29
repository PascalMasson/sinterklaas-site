<div
    class="inline-flex items-center rounded-md shadow-sm mb-0">
    <button
        wire:click="updateStatus('VRIJ')"
        name="status"
        value="VRIJ"
        class="{{$this->generateButtonClasses('VRIJ')}}"
        {{$this->canSetCadeauStatus($cadeau, "VRIJ") ? '' : 'disabled'}}
    >
        Vrij
    </button>
    <button
        wire:click="updateStatus('GERESERVEERD')"
        name="status"
        value="GERESERVEERD"
        class="{{$this->generateButtonClasses('GERESERVEERD')}}"
        {{$this->canSetCadeauStatus($cadeau, "GERESERVEERD") ? '' : 'disabled'}}
    >
        Gereserveerd
    </button>
    <button
        wire:click="updateStatus('GEKOCHT')"
        name="status"
        value="GEKOCHT"
        class="{{$this->generateButtonClasses('GEKOCHT')}}"
        {{$this->canSetCadeauStatus($cadeau, "GEKOCHT") ? '' : 'disabled'}}
    >
        Gekocht
    </button>
</div>
