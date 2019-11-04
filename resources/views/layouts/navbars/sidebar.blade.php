<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('M-J') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Motor Doble-J') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Inicio') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'index') class="active " @endif>
                <a href="{{ route('views.index') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ __('Index') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'create') class="active " @endif>
                <a href="{{ route('views.create') }}">
                    <i class="tim-icons icon-pin"></i>
                    <p>{{ __('Crear nuevo dato') }}</p>
                </a>
            </li>
                             
                      
        </ul>
    </div>
</div>
