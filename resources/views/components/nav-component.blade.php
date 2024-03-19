<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
        {{-- <li class="nav-item menu-open">
            <a href="" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Starter Pages
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            far fa-circle nav-icon
        </li> --}}
        @foreach ($items as $item)
        @if ($item['title'] == 'Students')
        @if (Auth::user())
                    <li class="nav-item">
                        <a href="{{ route($item['route']) }}"
                            class="nav-link {{ Route::is($item['active']) ? 'active' : '' }}">
                            <i class="{{ $item['icon'] }}"></i>
                            <p>
                                {{ $item['title'] }}
                                {{-- <span class="right badge badge-danger">New</span> --}}
                            </p>
                        </a>
                    </li>
                @endif
                @else
                <li class="nav-item">
                    <a href="{{ route($item['route']) }}"
                        class="nav-link {{ Route::is($item['active']) ? 'active' : '' }}">
                        <i class="{{ $item['icon'] }}"></i>
                        <p>
                            {{ $item['title'] }}
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</nav>
