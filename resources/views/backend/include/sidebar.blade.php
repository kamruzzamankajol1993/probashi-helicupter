@php
     $usr = Auth::guard('admin')->user();
 @endphp

<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('/') }}{{ $icon }}" alt="" height="22">
                        </span>
            <span class="logo-lg ">
                            <img src="{{ asset('/') }}{{ $logo }}" alt="" height="65" style="margin-top:10px;">
                        </span>
        </a>

        <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('/') }}{{ $icon }}" alt="" height="22">
                        </span>
            <span class="logo-lg ">
                            <img src="{{ asset('/') }}{{ $logo }}" alt="" height="65" style="margin-top:10px;">
                        </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                @if ($usr->can('dashboard.view'))
                <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="uil-home-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
@endif

<li class="menu-title">ORDER SECTION</li>

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="uil-label"></i>
        <span>Offer Order</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">


        @if ($usr->can('offerOrderPendingList'))
        <li class="{{ Route::is('pending_offer_order_list')  ? 'active' : '' }}"><a href="{{ route('pending_offer_order_list') }}"> <span>Pending Offer Order List</span> </a></li>
        @endif

        @if ($usr->can('offerOrderList'))
        <li class="{{ Route::is('offer_order_list')  ? 'active' : '' }}"><a href="{{ route('offer_order_list') }}"> <span>All Offer Order List</span> </a></li>
        @endif



    </ul>
</li>


<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="uil-label"></i>
        <span>Service Order</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">


        @if ($usr->can('serviceOrderPendingList'))
        <li class="{{ Route::is('pending_service_order_list')  ? 'active' : '' }}"><a href="{{ route('pending_service_order_list') }}"> <span>Pending Service Order List</span> </a></li>
        @endif

        @if ($usr->can('serviceOrderList'))
        <li class="{{ Route::is('service_order_list')  ? 'active' : '' }}"><a href="{{ route('service_order_list') }}"> <span>All Service Order List</span> </a></li>
        @endif

    </ul>
</li>



<li class="menu-title">SERVICE PAGE CONTENT</li>

@if ($usr->can('serviceAdd') || $usr->can('serviceView') || $usr->can('serviceDelete') || $usr->can('serviceUpdate'))
<li class="{{ Route::is('serviceList.index') || Route::is('serviceList.create') || Route::is('serviceList.edit') ? 'active' : '' }}">
    <a href="{{ route('serviceList.index') }}">
        <i class="uil-label"></i>
        <span>Service</span>
    </a>
</li>
@endif


<li class="menu-title">OFFER PAGE CONTENT</li>

@if ($usr->can('offerAdd') || $usr->can('offerView') || $usr->can('offerUpdate') || $usr->can('offerDelete'))
<li class="{{ Route::is('admin.our_running_offer') || Route::is('admin.our_running_offer.create') || Route::is('admin.our_running_offer.edit')  ? 'active' : '' }}">
    <a href="{{ route('admin.our_running_offer') }}">
        <i class="uil-label"></i>
        <span>Our Running Offer</span>
    </a>
</li>
@endif

<li class="menu-title">HOME PAGE CONTENT</li>

@if ($usr->can('bannerAdd') || $usr->can('bannerView') || $usr->can('bannerUpdate') || $usr->can('bannerDelete'))
<li class="{{ Route::is('admin.banner_List')  ? 'active' : '' }}">
    <a href="{{ route('admin.banner_List') }}">
        <i class="uil-label"></i>
        <span>Banner</span>
    </a>
</li>
@endif


<li class="menu-title">CLIENT & VIDEO REVIEW SECTION</li>

@if ($usr->can('clientSayAdd') || $usr->can('clientSayView') || $usr->can('clientSayUpdate') || $usr->can('clientSayDelete'))
<li class="{{ Route::is('admin.client_say_part') || Route::is('admin.client_say_part.create') || Route::is('admin.client_say_part.edit') ? 'active' : '' }}">
    <a href="{{ route('admin.client_say_part') }}">
        <i class="uil-label"></i>
        <span>Client Say</span>
    </a>
</li>
@endif


@if ($usr->can('videoReviewAdd') || $usr->can('videoReviewView') || $usr->can('videoReviewUpdate') || $usr->can('videoReviewDelete'))
<li class="{{ Route::is('admin.video_review_part') || Route::is('admin.video_review_part.create') || Route::is('admin.video_review_part.edit')    ? 'active' : '' }}">
    <a href="{{ route('admin.video_review_part') }}">
        <i class="uil-label"></i>
        <span>Video Review</span>
    </a>
</li>
@endif


<li class="menu-title">NEWS & MEDIA PAGE CONTENT</li>

@if ($usr->can('newsMediaAdd') || $usr->can('newsMediaView') || $usr->can('newsMediaUpdate') || $usr->can('newsMediaDelete'))
<li class="{{ Route::is('admin.news_and_media')  ? 'active' : '' }}">
    <a href="{{ route('admin.news_and_media') }}">
        <i class="uil-label"></i>
        <span>News & Media</span>
    </a>
</li>
@endif

@if ($usr->can('galleryAdd') || $usr->can('galleryView') || $usr->can('galleryUpdate') || $usr->can('galleryDelete'))
<li class="{{ Route::is('admin.gallery')  ? 'active' : '' }}">
    <a href="{{ route('admin.gallery') }}">
        <i class="uil-label"></i>
        <span>Gallery</span>
    </a>
</li>
@endif


@if ($usr->can('socialAdd') || $usr->can('socialView') || $usr->can('socialUpdate') || $usr->can('socialDelete'))
<li class="{{ Route::is('admin.social_link')  ? 'active' : '' }}">
    <a href="{{ route('admin.social_link') }}">
        <i class="uil-label"></i>
        <span>Social Link</span>
    </a>
</li>
@endif




<li class="menu-title">SETTING</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-setting"></i>
                        <span>System Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        @if ($usr->can('system_information_add') || $usr->can('system_information_view') ||  $usr->can('system_information_update') ||  $usr->can('system_information_delete'))
                        <li class="{{ Route::is('admin.system_information')  ? 'active' : '' }}"><a href="{{ route('admin.system_information') }}"> <span>System Information</span> </a></li>

            @endif

                        @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                        <li class="{{ Route::is('admin.admins') || Route::is('admin.admins.create') || Route::is('admin.admins.edit') ? 'active' : '' }}">
                            <a href="{{ route('admin.admins') }}"><span>User</span> </a>
                        </li>

                   @endif


                   @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                        <li class="{{ Route::is('admin.roles') || Route::is('admin.roles.create') || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles') }}"> <span>Role List</span> </a></li>

            @endif
                   @if ($usr->can('permission.create') || $usr->can('permission.view') ||  $usr->can('permission.edit') ||  $usr->can('permission.delete'))
                     <li class="{{ Route::is('admin.permission') || Route::is('admin.permission.create') || Route::is('admin.permission.edit') ? 'active' : '' }}">
                            <a href="{{ route('admin.permission') }}"><span>Permission</span> </a>
                        </li>

                    @endif



                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>







