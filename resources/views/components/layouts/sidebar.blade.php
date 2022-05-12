<div>
    @can('create post')
    <div class="mb-4">
        <small class="d-block text-secondary text-uppercase">Post</small>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
              Create new post
            </a>
            <a href="#" class="list-group-item list-group-item-action">Data Table Posts</a>
        </div>
    </div>
    @endcan
    @can('create category')
    <div class="mb-4">
        <small class="d-block text-secondary text-uppercase">Category</small>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
              Create a category
            </a>
            <a href="#" class="list-group-item list-group-item-action">Data Table Category</a>
        </div>
    </div>
    @endcan
    @can('create user')
    <div class="mb-4">
        <small class="d-block text-secondary text-uppercase">User</small>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
              Create a User
            </a>
            <a href="#" class="list-group-item list-group-item-action">Data Table User</a>
        </div>
    </div>
    @endcan
    <div class="mb-4">
        <small class="d-block text-secondary text-uppercase">Logout</small>
        <div class="list-group">
            <a class="list-group-item list-group-item-action" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
        </div>
    </div>
</div>