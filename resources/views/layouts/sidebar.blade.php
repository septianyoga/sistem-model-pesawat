<div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="index.html">
        <span class="align-middle">Si Pesawat</span>
    </a>


    <ul class="sidebar-nav">
        <li class="sidebar-header">
            Pages
        </li>

        <li class="sidebar-item ">
            {{-- <a class="sidebar-link" href="/dashboard">
                <i class="fa-solid fa-gauge"></i> <span class="align-middle">Dashboard</span>
            </a> --}}
            <a data-bs-target="#pages" data-bs-toggle="collapse"
                class="sidebar-link collapsed d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-gauge"></i>
                    <span class="align-middle ms-2">Dashboard</span>
                </div>
                <i data-feather="chevron-right"></i>
            </a>
            <ul id="pages"
                class="sidebar-dropdown ms-3 list-unstyled collapse {{ $title == 'Dashboard' || $title == 'View Data EBOM' || $title == 'View Data MBOM' || $title == 'Add Data EBOM' || $title == 'Add Data MBOM' || $title == 'Update Data EBOM' || $title == 'Update Data MBOM' ? 'show' : '' }}"
                data-bs-parent="#sidebar">
                <li class="sidebar-item {{ $title == 'Dashboard' ? 'active' : '' }} "><a class='sidebar-link'
                        href='/dashboard'><i class="fa-solid fa-ellipsis"></i>
                        Dashboard</a></li>
                <li class="sidebar-item {{ $title == 'View Data EBOM' ? 'active' : '' }}"><a class='sidebar-link'
                        href='/ebom'><i class="fa-solid fa-ellipsis"></i>
                        View Data EBOM</a></li>
                <li class="sidebar-item {{ $title == 'View Data MBOM' ? 'active' : '' }}"><a class='sidebar-link '
                        href='/mbom'><i class="fa-solid fa-ellipsis"></i>
                        View Data MBOM</a></li>
            </ul>
        </li>

        <li class="sidebar-item">
        </li>

        <li class="sidebar-item {{ $title == 'Kelola User' ? 'active' : '' }}">
            <a class="sidebar-link" href="/users">
                <i class="fa-solid fa-users"></i> <span class="align-middle">Kelola User</span>
            </a>
        </li>

        {{-- <li class="sidebar-item {{ $title == 'Kelola EBOM' ? 'active' : '' }}">
            <a class="sidebar-link" href="/ebom">
                <i class="fa-solid fa-users"></i> <span class="align-middle">Kelola EBOM</span>
            </a>
        </li>

        <li class="sidebar-item {{ $title == 'Kelola MBOM' ? 'active' : '' }}">
            <a class="sidebar-link" href="/mbom">
                <i class="fa-solid fa-users"></i> <span class="align-middle">Kelola MBOM</span>
            </a>
        </li> --}}

        <li class="sidebar-item {{ $title == 'Kelola Model Referensi' ? 'active' : '' }}">
            <a class="sidebar-link" href="/model_referensi">
                <i class="fa-solid fa-plane"></i> <span class="align-middle">Kelola Data Model</span>
            </a>
        </li>

        <li class="sidebar-item {{ $title == 'View Data Referensi Model Pesawat' ? 'active' : '' }}">
            <a class="sidebar-link" href="/view_model">
                <i class="fa-regular fa-eye"></i> <span class="align-middle">View Data Referensi Model Pesawat</span>
            </a>
        </li>

    </ul>
</div>
