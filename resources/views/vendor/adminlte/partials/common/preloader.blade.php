@inject('preloaderHelper', 'JeroenNoten\LaravelAdminLte\Helpers\PreloaderHelper')

<div class="{{ $preloaderHelper->makePreloaderClasses() }}" style="{{ $preloaderHelper->makePreloaderStyle() }}">

    @hasSection('preloader')

        {{-- Use a custom preloader content --}}
        @yield('preloader')

    @else

        {{-- Use the default preloader content --}}
        <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
        <h4 class="mt-4 text-dark">{{__('Loading')}}</h4>
    @endif
</div>