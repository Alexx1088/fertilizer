
<aside class="main-sidebar sidebar-dark-blue-primary elevation-4">
    <div class="sidebar">
        <ul class="pt-3  nav nav-pills nav-sidebar flex-column" data-vidget="treeview"

        <li class="nav-item ">
                          <a href="{{ route('fertilizer.index') }}" class="nav-link">

                <i class="nav-icon fas fa-th-list"></i>
                <p class="pl-3">
                    Удобрения
                </p>
            </a>
        </li>

        <li class="nav-item ">
            {{-- <a href="{{route('admin.category.index')}}" class="nav-link"> --}}

            <a href="{{ route('culture.index') }}" class="nav-link">

                <i class="nav-icon fas fa-list"></i>
                <p >
                 Группа культур
                </p>
            </a>
        </li>
        <li class="nav-item ">
            {{-- <a href="{{route('admin.category.index')}}" class="nav-link"> --}}

            <a href="{{ route('clients.index') }}" class="nav-link">

                <i class="nav-icon fas fa-people-carry"></i>
                <p class="pl-3">
                    Клиенты
                </p>
            </a>
        </li>


    </div>
    <!-- /.sidebar -->
</aside>