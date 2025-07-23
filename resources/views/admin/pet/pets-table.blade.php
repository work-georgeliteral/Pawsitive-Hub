<x-app-layout>
	@livewire('table-header')
	<div class="row justify-content-center">
			<div class="col text-center">
				<a href="/pets/pets-grid" wire:navigate class="btn btn-primary">Grid</a>
			</div>
		</div>
	@livewire('pets-table')
</x-app-layout>