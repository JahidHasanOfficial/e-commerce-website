<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div class="user-details">
            <div class="d-flex">
                <div class="me-2">
                    <img src="assets/images/users/avatar-4.jpg" alt="" class="avatar-md rounded-circle">
                </div>
                <div class="user-info w-100">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Donald Johnson
                            <i class="mdi mdi-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-account-circle text-muted me-2"></i> Profile</a></li>
                            <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-cog text-muted me-2"></i> Settings</a></li>
                            <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-lock-open-outline text-muted me-2"></i> Lock screen</a></li>
                            <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-power text-muted me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                    <p class="text-white-50 m-0">Administrator</p>
                </div>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{ route('admin.index') }}" class="waves-effect {{ request()->routeIs('admin.index') ? 'active' : '' }}">
                        <i class="mdi mdi-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{-- Category --}}
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <i class="mdi mdi-email"></i>
                        <span>Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.index') ? 'active' : '' }}">Category List</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.categories.create') }}" class="{{ request()->routeIs('admin.categories.create') ? 'active' : '' }}">Add Category</a>
                        </li>
                    </ul>
                </li>

                {{-- Sub Category --}}
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect {{ request()->routeIs('admin.subcategories.*') ? 'active' : '' }}">
                        <i class="mdi mdi-email"></i>
                        <span>Sub Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.subcategories.index') }}" class="{{ request()->routeIs('admin.subcategories.index') ? 'active' : '' }}">Sub Category List</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.subcategories.create') }}" class="{{ request()->routeIs('admin.subcategories.create') ? 'active' : '' }}">Add Sub Category</a>
                        </li>
                    </ul>
                </li>

                {{-- Child Category --}}
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect {{ request()->routeIs('admin.childcategories.*') ? 'active' : '' }}">
                        <i class="mdi mdi-email"></i>
                        <span>Child Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.childcategories.index') }}" class="{{ request()->routeIs('admin.childcategories.index') ? 'active' : '' }}">Child Category List</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.childcategories.create') }}" class="{{ request()->routeIs('admin.childcategories.create') ? 'active' : '' }}">Add Child Category</a>
                        </li>
                    </ul>
                </li>

                {{-- Brands --}}
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect {{ request()->routeIs('admin.brands.*') ? 'active' : '' }}">
                        <i class="mdi mdi-email"></i>
                        <span>Brands</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.brands.index') }}" class="{{ request()->routeIs('admin.brands.index') ? 'active' : '' }}">Brand List</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.brands.create') }}" class="{{ request()->routeIs('admin.brands.create') ? 'active' : '' }}">Add Brand</a>
                        </li>
                    </ul>
                </li>

                {{-- Colors --}}
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect {{ request()->routeIs('admin.colors.*') ? 'active' : '' }}">
                        <i class="mdi mdi-email"></i>
                        <span>Colors</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.colors.index') }}" class="{{ request()->routeIs('admin.colors.index') ? 'active' : '' }}">Color List</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.colors.create') }}" class="{{ request()->routeIs('admin.colors.create') ? 'active' : '' }}">Add Color</a>
                        </li>
                    </ul>
                </li>

                {{-- Sizes --}}
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect {{ request()->routeIs('admin.sizes.*') ? 'active' : '' }}">
                        <i class="mdi mdi-email"></i>
                        <span>Sizes</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.sizes.index') }}" class="{{ request()->routeIs('admin.sizes.index') ? 'active' : '' }}">Size List</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.sizes.create') }}" class="{{ request()->routeIs('admin.sizes.create') ? 'active' : '' }}">Add Size</a>
                        </li>
                    </ul>
                </li>

                {{-- Products --}}
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                        <i class="mdi mdi-email"></i>
                        <span>Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.index') ? 'active' : '' }}">Product List</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.products.create') }}" class="{{ request()->routeIs('admin.products.create') ? 'active' : '' }}">Add Product</a>
                        </li>
                    </ul>
                </li>

                {{-- Coupon --}}
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect {{ request()->routeIs('admin.coupons.*') ? 'active' : '' }}">
                        <i class="mdi mdi-email"></i>
                        <span>Coupon</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.coupons.index') }}" class="{{ request()->routeIs('admin.coupons.index') ? 'active' : '' }}">Coupon List</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.coupons.create') }}" class="{{ request()->routeIs('admin.coupons.create') ? 'active' : '' }}">Add Coupon</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
