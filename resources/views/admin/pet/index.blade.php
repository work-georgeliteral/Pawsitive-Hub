<x-app-layout>
	<div class="row">
		<col-sm-12 class="col-md-12 col-lg-2">
			@livewire('table-header')
		</col-sm-12>
		<div class="col d-flex justify-content-center">
			@livewire('admin.pet.index')
		</div>
	</div>
</x-app-layout>