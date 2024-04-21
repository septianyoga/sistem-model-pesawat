<div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="index.html">
        <span class="align-middle">Si Pesawat</span>
    </a>


    <ul class="sidebar-nav">
        <li class="sidebar-header">
            Pages
        </li>

        <li class="sidebar-item {{ $title == 'Dashboard' ? 'active' : '' }}">
            <a class="sidebar-link" href="/dashboard">
                <i class="fa-solid fa-gauge"></i> <span class="align-middle">Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item {{ $title == 'Kelola User' ? 'active' : '' }}">
            <a class="sidebar-link" href="/users">
                <i class="fa-solid fa-users"></i> <span class="align-middle">Kelola User</span>
            </a>
        </li>

        <li class="sidebar-item {{ $title == 'Kelola EBOM' ? 'active' : '' }}">
            <a class="sidebar-link" href="/ebom">
                <i class="fa-solid fa-users"></i> <span class="align-middle">Kelola EBOM</span>
            </a>
        </li>

        <li class="sidebar-item {{ $title == 'Kelola MBOM' ? 'active' : '' }}">
            <a class="sidebar-link" href="/mbom">
                <i class="fa-solid fa-users"></i> <span class="align-middle">Kelola MBOM</span>
            </a>
        </li>

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
