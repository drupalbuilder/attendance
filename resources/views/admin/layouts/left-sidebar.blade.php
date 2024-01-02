<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin/dashboard') }}">
    <div class="sidebar-brand-icon">
    <img class="logo w-75" src="{{ url('images/3dcakeLogo.png') }}">
    </div>
  </a>
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  <!-- Nav Item - Dashboard -->
  @can('isAdmin')
  <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('admin/dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <li class="nav-item">
       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ui-users" aria-expanded="true' " aria-controls="ui-users">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage Users</span>
        <i class="menu-arrow"></i>
      </a>
      <div id="ui-users" class="collapse {{ Request::is('admin/users') || Request::is('admin/user/add') ? 'show' : '' }}" aria-labelledby="ui-users" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
        <ul class="nav flex-column sub-menu-2">
          <li class="nav-item {{ Request::is('admin/users') ? 'active' : '' }}">
            <a class="collapse-item" href="{{url('admin/users')}}">Users List</a>
          </li>
          <li class="nav-item {{ Request::is('admin/user/add') ? 'active' : '' }}">
            <a class="collapse-item" href="{{url('admin/user/add')}}">Add User</a>
          </li>
        </ul>
      </div>
      </div>
    </li>

  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ui-category" aria-expanded="true" aria-controls="ui-category">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage Category</span>
        <i class="menu-arrow"></i>
      </a>
      <div id="ui-category" class="collapse {{ Request::is('admin/category/list') || Request::is('admin/category/add') ? 'show' : '' }}" aria-labelledby="ui-category" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <ul class="nav flex-column sub-menu-2">
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/category/list')}}">Category List</a>
              </li>
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/category/add')}}">Add Category</a>
              </li>

            </ul>
          </div>
      </div>
  </li>
 <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ui-product" aria-expanded="true" aria-controls="ui-product">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage Product</span>
        <i class="menu-arrow"></i>
      </a>
      <div id="ui-product" class="collapse {{ Request::is('admin/product/list') || Request::is('admin/product/add') ? 'show' : '' }}" aria-labelledby="ui-product" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <ul class="nav flex-column sub-menu-2">
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/product/list')}}">Product List</a>
              </li>
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/product/add')}}">Add Product</a>
              </li>

            </ul>
          </div>
      </div>
</li>


<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ui-faq" aria-expanded="true" aria-controls="ui-faq">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">FAQ</span>
        <i class="menu-arrow"></i>
      </a>
      <div id="ui-faq" class="collapse {{ Request::is('admin/faq/list') || Request::is('admin/faq/add') ? 'show' : '' }}" aria-labelledby="ui-faq" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <ul class="nav flex-column sub-menu-2">
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/faq/list')}}">FAQ List</a>
              </li>
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/faq/add')}}">Add FAQ</a>
              </li>

            </ul>
          </div>
      </div>
</li>
<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ui-block" aria-expanded="true" aria-controls="ui-block">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage Block</span>
        <i class="menu-arrow"></i>
      </a>
      <div id="ui-block" class="collapse {{ Request::is('admin/block/list') || Request::is('admin/block/add') || Request::is('admin/blockcategory/list') || Request::is('admin/blockcategory/add')  ? 'show' : '' }}" aria-labelledby="ui-block" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <ul class="nav flex-column sub-menu-2">
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/block/list')}}">Block List</a>
              </li>
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/block/add')}}">Add Block</a>
              </li>
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/blockcategory/list')}}">Category List</a>
              </li>
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/blockcategory/add')}}">Add Category</a>
              </li>
            </ul>
          </div>
      </div>
</li>
<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ui-card" aria-expanded="true" aria-controls="ui-card">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage Card</span>
        <i class="menu-arrow"></i>
      </a>
      <div id="ui-card" class="collapse {{ Request::is('admin/card/list') || Request::is('admin/card/add') ? 'show' : '' }}" aria-labelledby="ui-block" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <ul class="nav flex-column sub-menu-2">
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/card/list')}}">Card List</a>
              </li>
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/card/add')}}">Add Card</a>
              </li>

            </ul>
          </div>
      </div>
</li>
<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ui-attribute" aria-expanded="true" aria-controls="ui-attribute">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage Attributes</span>
        <i class="menu-arrow"></i>
      </a>
      <div id="ui-attribute" class="collapse {{ Request::is('admin/attribute/list') || Request::is('admin/attribute/add') ? 'show' : '' }}" aria-labelledby="ui-attribute" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <ul class="nav flex-column sub-menu-2">
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/attribute/list')}}">Attributes List</a>
              </li>
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/attribute/add')}}">Add Attributes</a>
              </li>
            </ul>
          </div>
      </div>
</li>

<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ui-page" aria-expanded="true" aria-controls="ui-page">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage Page</span>
        <i class="menu-arrow"></i>
      </a>
      <div id="ui-page" class="collapse {{ Request::is('admin/page/list') || Request::is('admin/page/add') ? 'show' : '' }}" aria-labelledby="ui-page" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <ul class="nav flex-column sub-menu-2">
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/page/list')}}">Page List</a>
              </li>
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/page/add')}}">Add Page</a>
              </li>

            </ul>
          </div>
      </div>
</li>

  <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ui-blockcategory" aria-expanded="true" aria-controls="ui-blockcategory">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage Block Category</span>
        <i class="menu-arrow"></i>
      </a>
      <div id="ui-blockcategory" class="collapse {{ Request::is('admin/blockcategory/list') || Request::is('admin/blockcategory/add') ? 'show' : '' }}" aria-labelledby="ui-category" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <ul class="nav flex-column sub-menu-2">
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/blockcategory/list')}}">Block Category List</a>
              </li>
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/blockcategory/add')}}">Add Block Category</a>
              </li>
            </ul>
          </div>
      </div>
  </li> -->


<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ui-banners" aria-expanded="true" aria-controls="ui-banners">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage Banners</span>
        <i class="menu-arrow"></i>
      </a>
      <div id="ui-banners" class="collapse {{ Request::is('admin/banners/list') || Request::is('admin/banners/add') ? 'show' : '' }}" aria-labelledby="ui-banners" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <ul class="nav flex-column sub-menu-2">
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/banners/list')}}">Banners List</a>
              </li>
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/banners/add')}}">Add Banners</a>
              </li>

            </ul>
          </div>
      </div>
</li>





<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ui-cms" aria-expanded="true" aria-controls="ui-cms">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage cms</span>
        <i class="menu-arrow"></i>
      </a>
      <div id="ui-cms" class="collapse {{ Request::is('admin/cms/list') || Request::is('admin/cms/add') ? 'show' : '' }}" aria-labelledby="ui-cms" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <ul class="nav flex-column sub-menu-2">
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/cms/list')}}">Admin Cp</a>
              </li>
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/cms/add')}}">Add cards</a>
              </li>
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/cms/text')}}">Add text & images</a>
              </li>
            </ul>
          </div>
      </div>
</li>


<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ui-menu" aria-expanded="true" aria-controls="ui-menu">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage Menu</span>
        <i class="menu-arrow"></i>
      </a>
      <div id="ui-menu" class="collapse {{ Request::is('admin/menu/list') || Request::is('admin/menu/add') ? 'show' : '' }}" aria-labelledby="ui-menu" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <ul class="nav flex-column sub-menu-2">
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/menu/list')}}">Menu List</a>
              </li>
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/menu/add')}}">Add Menu</a>
              </li>

            </ul>
          </div>
      </div>
</li>



<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ui-content_test" aria-expanded="true" aria-controls="ui-content_test">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">content_test</span>
        <i class="menu-arrow"></i>
      </a>
      <div id="ui-content_test" class="collapse {{ Request::is('admin/test_c/list') || Request::is('admin/test_c/one') || Request::is('admin/test_c/xt') ||Request::is('admin/test_c/cd') ? 'show' : '' }}" aria-labelledby="ui-content" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <ul class="nav flex-column sub-menu-2">
            <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/test_c/list')}}">list content</a>
              </li>
              <li class="nav-item">
                <a class="collapse-item" href="{{url('admin/test_c/one')}}">one</a>
              </li>

            </ul>
          </div>
      </div>
</li>
@endcan

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
</ul>
<!-- End of Sidebar
