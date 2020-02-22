<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="nav-item {{ request()->path() == 'admin_panel/dashboard' ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}"><i class="la la-home"></i><span class="menu-title">Dashboard</span></a>
        </li>
     <!--   <li class=" navigation-header">
          <span data-i18n="nav.category.layouts">Main Category</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
        </li>
        <li class=" nav-item"><a href="#"><i class="la la-columns"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Main Categories</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="{{ route('admin.main.category.create') }}" data-i18n="nav.page_layouts.1_column">New Main Category</a>
            </li>
            <li><a class="menu-item" href="{{ route('admin.main.category.index') }}" data-i18n="nav.page_layouts.2_columns">View Main Categories</a>
            </li>
          </ul>
        </li> -->
        <li class="navigation-header">
          <span class="black">Quotations</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Quotations"></i>
        </li>
        <li class="nav-item"><a href="#"><i class="la la-terminal"></i><span class="menu-title">Client Quotations</span></a>
          <ul class="menu-content">
            <li class="{{ request()->path() == 'admin_panel/quotations' || request()->routeIs('admin.quotation.show') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.quotation.index') }}">View Quotations</a>
            </li>
          </ul>
        </li>
        <li class="navigation-header">
          <span class="black">Settings</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
          data-placement="right" data-original-title="Settings"></i>
        </li>
        <li class="nav-item"><a href="#"><i class="la la-internet-explorer"></i><span class="menu-title">Website Settings</span></a>
          <ul class="menu-content">
            <li class="{{ request()->path() == 'admin_panel/social_media' || request()->routeIs('admin.social_media.edit') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.social_media.index') }}">Social Media</a>
            </li>
            <li class="{{ request()->path() == 'admin_panel/contacts' || request()->routeIs('admin.contact.edit') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.contact.index') }}">Contact Info</a>
            </li>
            <li class="{{ request()->path() == 'admin_panel/emails' ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.email.index') }}">Email Settings</a>
            </li>
            <li class="{{ request()->path() == 'admin_panel/slider' || request()->path() == 'admin_panel/slider/create' || request()->routeIs('admin.slider.edit') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.slider.index') }}">Slider</a>
            </li>
          </ul>
        </li>
        <li class="nav-item"><a href="#"><i class="la la-file-text"></i><span class="menu-title">Home Page</span></a>
          <ul class="menu-content">
            <li class="{{ request()->path() == 'admin_panel/seo_settings' ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.seo_settings.index') }}">SEO Settings</a>
            </li>
            <li class="{{ request()->path() == 'admin_panel/home_page/contents' ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.home_page_contents.edit') }}">Page Contents</a>
            </li>
            <li class="{{ request()->path() == 'admin_panel/home_page/banners' || request()->routeIs('admin.home_page_banners.edit') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.home_page_banners.index') }}">Banners</a>
            </li>
          </ul>
        </li>
        <li class="nav-item"><a href="#"><i class="la la-file-text"></i><span class="menu-title">Pages</span></a>
          <ul class="menu-content">
            <li class="{{ request()->path() == 'admin_panel/pages' || request()->routeIs('admin.pages.edit') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.pages.index') }}">All Pages</a>
            </li>
            <li class="{{ request()->path() == 'admin_panel/faqs' || request()->path() == 'admin_panel/faqs/create' || request()->routeIs('admin.faqs.edit') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.faqs.index') }}">FAQ</a>
            </li>
          </ul>
        </li>
        <li class="nav-item"><a href="#"><i class="la la-envelope"></i><span class="menu-title">Messages</span></a>
          <ul class="menu-content">
            <li class="{{ request()->path() == 'admin_panel/messages' || request()->routeIs('admin.message.show')  ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.message.index') }}">View Messages</a>
            </li>
          </ul>
        </li>
        <li class="navigation-header">
          <span class="black">Category</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Category"></i>
        </li>
        <li class="nav-item"><a href="#"><i class="la la-tasks"></i><span class="menu-title">Categories</span></a>
          <ul class="menu-content">
            <li class="{{ request()->path() == 'admin_panel/subcategory/create' ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.subcategory.create') }}">New Category</a>
            </li>
            <li class="{{ request()->path() == 'admin_panel/subcategories' || request()->routeIs('admin.subcategory.edit') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.subcategory.index') }}">View Categories</a>
            </li>
          </ul>
        </li>
        <li class="navigation-header">
          <span class="black">Product</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
          data-placement="right" data-original-title="Product"></i>
        </li>
        <li class="nav-item"><a href="#"><i class="la la-cube"></i><span class="menu-title">Products</span></a>
          <ul class="menu-content">
            <li class="{{ request()->path() == 'admin_panel/product/create' ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.product.create') }}">New Product</a>
            </li>
            <li class="{{ request()->path() == 'admin_panel/product_specifications' ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.product_specifications.index') }}">Product Specifications</a>
            </li>
          </ul>
        </li>
        <li class="nav-item"><a href="#"><i class="la la-industry"></i><span class="menu-title">Industry Boxes</span></a>
          <ul class="menu-content">
            <li class="{{ request()->path() == 'admin_panel/products/industry' || request()->is('admin_panel/product/industry-boxes/*/edit') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.product.industry.index') }}">View Products</a>
            </li>
          </ul>
        </li>
        <li class="nav-item"><a href="#"><i class="la la-hdd-o"></i><span class="menu-title">Style Boxes</span></a>
          <ul class="menu-content">
            <li class="{{ request()->path() == 'admin_panel/products/styles' || request()->is('admin_panel/product/box-styles/*/edit') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.product.styles.index') }}">View Products</a>
            </li>
          </ul>
        </li>
        <li class="nav-item"><a href="#"><i class="la la-object-ungroup"></i><span class="menu-title">Other Products</span></a>
          <ul class="menu-content">
            <li class="{{ request()->path() == 'admin_panel/products/others' || request()->is('admin_panel/product/other-products/*/edit') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.product.others.index') }}">View Products</a>
            </li>
          </ul>
        </li>
        <li class=" navigation-header">
          <span class="black">Clients</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
          data-placement="right" data-original-title="Clients"></i>
        </li>
        <li class="nav-item {{ request()->path() == 'admin_panel/clients' ? 'active' : '' }}"><a href="{{ route('admin.clients.index') }}"><i class="la la-users"></i><span class="menu-title">Clients List</span></a>
        </li>
        <li class="nav-item {{ request()->path() == 'admin_panel/subscribers' ? 'active' : '' }}"><a href="{{ route('admin.subscribers.index') }}"><i class="la la-user"></i><span class="menu-title">Subscribers List</span></a>
        </li>
        <li class=" navigation-header">
          <span class="black">Blog</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
          data-placement="right" data-original-title="Blog"></i>
        </li>
        <li class="nav-item"><a href="#"><i class="la la-briefcase"></i><span class="menu-title">Blog Category</span></a>
          <ul class="menu-content">
            <li class="{{ request()->path() == 'admin_panel/blog_category/create' ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.blog_category.create') }}">New Category</a>
            </li>
            <li class="{{ request()->path() == 'admin_panel/blog_categories' || request()->routeIs('admin.blog_category.edit') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.blog_category.index') }}">View Categories</a>
            </li>
          </ul>
        </li>
        <li class="nav-item"><a href="#"><i class="la la-briefcase"></i><span class="menu-title">Posts</span></a>
          <ul class="menu-content">
            <li class="{{ request()->path() == 'admin_panel/blog/create' ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.blog.create') }}">New Post</a>
            </li>
            <li class="{{ request()->path() == 'admin_panel/blogs' || request()->routeIs('admin.blog.edit') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.blog.index') }}">View Posts</a>
            </li>
          </ul>
        </li>
        <li class="navigation-header">
          <span class="black">System Administrators</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
          data-placement="right" data-original-title="System Administrators"></i>
        </li>
        <li class="nav-item"><a href="#"><i class="la la-briefcase"></i><span class="menu-title">Admin Management</span></a>
          <ul class="menu-content">
            <li class="{{ request()->path() == 'admin_panel/administrator/create' ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.administrators.create') }}">Add New</a>
            </li>
            <li class="{{ request()->path() == 'admin_panel/administrators' || request()->routeIs('admin.administrators.edit') ? 'active' : '' }}"><a class="menu-item" href="{{ route('admin.administrators.index') }}">View All</a>
            </li>
          </ul>
        </li>
      </ul>
      <br/>
    </div>
  </div>