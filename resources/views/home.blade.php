@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="flex flex-wrap -mx-4 justify-center">
			<div class="md:w-2/3">
				<div class="flex flex-col bg-white border rounded">
					<div class="py-3 px-5 mb-0 bg-black/[.03] border-b border-solid border-black/[.125]">{{ __('Dashboard') }}</div>

					<div class="flex-auto min-h-[1px] p-5">
						@if (session('status'))
							<div class="relative px-3 py-5 mb-4 border border-solid border-transparent rounded  text-green-600 bg-green-100 border-green-300" role="alert">
								{{ session('status') }}
							</div>
						@endif

						{{ __('¡Estás conectado!') }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection