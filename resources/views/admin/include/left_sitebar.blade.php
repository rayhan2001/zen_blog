<aside class="sidebar-wrapper">
    <div class="iconmenu">
        <div class="nav-toggle-box">
            <div class="nav-toggle-icon"><i class="bi bi-list"></i></div>
        </div>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
                <a href="{{route('dashboard')}}"><button class="nav-link"><i class="bi bi-house-door-fill"></i></button></a>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Slide">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#slide" type="button"><i class="bi bi-sliders"></i></button>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Settings">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#settings" type="button"><i class="bi bi-gear"></i></button>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Blogs">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#blogs" type="button"><i class="bi bi-layers"></i></button>
            </li>
        </ul>
    </div>
    <div class="textmenu">
        <div class="brand-logo">
            <img src="{{asset('adminAsset')}}/assets/images/brand-logo-2.png" width="140" alt=""/>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" id="slide">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Slide</h5>
                        </div>
                        <small class="mb-0">Some placeholder content</small>
                    </div>
                    <a href="{{route('slider')}}" class="list-group-item"><i class="bi bi-plus-lg"></i>Sliders</a>
                    <a href="{{route('manage.slider')}}" class="list-group-item"><i class="bi bi-list-check"></i>Manage</a>
                </div>
            </div>
            <div class="tab-pane fade" id="settings">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Settings</h5>
                        </div>
                        <small class="mb-0">Some placeholder content</small>
                    </div>
                    <a href="{{route('category')}}" class="list-group-item"><i class="bi bi-bookmarks"></i>Category</a>
                    <a href="{{route('authore')}}" class="list-group-item"><i class="bi bi-person"></i>Authore</a>
                </div>
            </div>
            <div class="tab-pane fade" id="blogs">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Blogs</h5>
                        </div>
                        <small class="mb-0">Some placeholder content</small>
                    </div>
                    <a href="{{route('blog')}}" class="list-group-item"><i class="bi bi-plus"></i>Add Blogs</a>
                    <a href="{{route('manage.blog')}}" class="list-group-item"><i class="bi bi-list-check"></i>Manage Blogs</a>
                </div>
            </div>
        </div>
    </div>
</aside>
