<div>
    @can('create post')
    <div class="mb-4">
        <small class="d-block text-secondary text-uppercase">Post</small>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">
                Create new post
            </a>
            <a href="#" class="list-group-item list-group-item-action">Data table posts</a>
        </div>
    </div>
    @endcan
    @can('create category')
    <div class="mb-4">
        <small class="d-block text-secondary text-uppercase">Category</small>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">
                Create a category
            </a>
            <a href="#" class="list-group-item list-group-item-action">Data table category</a>
        </div>
    </div>
    @endcan
    @can('show user')
    <div class="mb-4">
        <small class="d-block text-secondary text-uppercase">User</small>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">
                Create a user
            </a>
            <a href="#" class="list-group-item list-group-item-action">Data table user</a>
        </div>
    </div>
    @endcan
    @can('assign permission')
    <div class="mb-4">
        <small class="d-block text-secondary text-uppercase">role & permission</small>
        <div class="list-group">
            <a href="{{ route('roles.index') }}" class="list-group-item list-group-item-action">Roles</a>
            <a href="{{ route('permissions.index') }}" class="list-group-item list-group-item-action">Permissions</a>
            <a href="{{ route('assign.create') }}" class="list-group-item list-group-item-action">Assign Permission</a>
        </div>
    </div>
    @endcan
    <div class="mb-4">
        <small class="d-block text-secondary text-uppercase">logout</small>
        <div class="list-group">
            <a class="list-group-item list-group-item-action" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>

    
</div>