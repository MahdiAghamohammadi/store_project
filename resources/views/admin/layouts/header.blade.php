<header class="header-main">

    <section class="sidebar-header bg-gray">
        <section class="px-2 d-flex justify-content-between flex-md-row-reverse">
            <span id="sidebar-toggle-show" class="d-inline d-md-none pointer"><i class="fas fa-toggle-off"></i></span>
            <span id="sidebar-toggle-hide" class="d-none d-md-inline pointer"><i class="fas fa-toggle-on"></i></span>
            <span><img class="logo" src="{{ asset('admin-assets/images/logo.png') }}" alt=""></span>
            <span class="d-md-none pointer" id="menu-toggle"><i class="fas fa-ellipsis-h"></i></span>
        </section>
    </section>


    <section id="body-header" class="body-header">
        <section class="d-flex justify-content-between">
            <!-- right -->
            <section>
                <!-- search -->
                <span class="mr-5">
                    <span id="search-area" class="search-area d-none">
                        <i id="search-area-hide" class="fas fa-times pointer"></i>
                        <input id="search-input" type="text" class="search-input" name="" id="">
                        <i class="fas fa-search pointer"></i>
                    </span>
                    <i id="search-toggle" class="p-1 fas fa-search d-none d-md-inline pointer"></i>
                </span>
                <!-- full screen -->
                <span id="full-screen" class="mr-5 pointer d-none d-md-inline">
                    <i id="screen-compress" class="fas fa-compress d-none"></i>
                    <i id="screen-expand" class="fas fa-expand"></i>
                </span>
            </section>

            <!-- left -->
            <section>
                <!-- notification -->
                <span class="ml-2 ml-md-4 position-relative">
                    <!-- icon -->
                    <span id="header-notification-toggle" class="pointer">
                        <i class="ml-1 far fa-bell"></i>
                        @if ($notifications->count() !== 0)
                            <sup class="badge badge-danger">{{ $notifications->count() }}</sup>
                        @endif
                    </span>
                    <!-- notification box -->
                    <section id="header-notification" class="rounded header-notification">
                        <!-- header -->
                        <section class="d-flex justify-content-between">
                            <span class="px-2">نوتیفیکیشن ها</span>
                            <span class="px-2">
                                <span class="badge badge-danger">جدید</span>
                            </span>
                        </section>
                        <!-- notification list -->
                        <ul class="px-0 rounded list-group">
                            @foreach ($notifications as $notification)
                                <li class="list-group-item list-group-item-action">
                                    <section class="media">
                                        <section class="pr-2 media-body">
                                            <p class="notification-time">{{ $notification['data']['message'] }}</p>
                                        </section>
                                    </section>
                                </li>
                            @endforeach
                        </ul>
                    </section>
                </span>
                <!-- comments -->
                <span class="ml-2 ml-md-4 position-relative">
                    <span id="header-comment-toggle" class="pointer">
                        <i class="ml-1 far fa-comment-alt"></i>
                        @if ($unseenComments->count() !== 0)
                            <sup class="badge badge-danger">{{ $unseenComments->count() }}</sup>
                        @endif
                    </span>


                    <!-- box comment -->
                    <section id="header-comment" class="header-comment">
                        <!-- search -->
                        <section class="px-4 border-bottom">
                            <input type="text" class="my-4 form-control form-control-sm" placeholder="جستجو">
                        </section>
                        <!-- comment list -->
                        <section class="header-comment-wrapper">
                            <ul class="px-0 rounded list-group">
                                @foreach ($unseenComments as $unseenComment)
                                    <li class="list-group-item list-group-item-action">
                                        <section class="media">
                                            <img src="{{ asset('admin-assets/images/avatar-2.jpg') }}" alt="avatar"
                                                class="notification-img">
                                            <section class="pr-1 media-body">
                                                <section class="d-flex justify-content-between">
                                                    <h5 class="comment-user">{{ $unseenComment->user->fullName }}
                                                    </h5>
                                                    <span>{{ $unseenComment->body }} <i
                                                            class="fas fa-circle text-success comment-user-status"></i></span>
                                                </section>
                                            </section>
                                        </section>
                                    </li>
                                @endforeach
                            </ul>
                        </section>
                    </section>
                </span>
                <!-- avatar -->
                <span class="ml-3 ml-md-5 position-relative">
                    <span id="header-profile-toggle" class="pointer">
                        <img src="{{ asset('admin-assets/images/avatar-2.jpg') }}" alt="avatar"
                            class="header-avatar">
                        <span class="header-username">مهدی آقامحمدی</span>
                        <i class="fas fa-angle-down"></i>
                    </span>
                    <section id="header-profile" class="rounded header-profile">
                        <section class="rounded list-group">
                            <a href="#" class="list-group-item list-group-item-action header-profile-link">
                                <i class="fas fa-cog"></i>تنظیمات
                            </a>
                            <a href="#" class="list-group-item list-group-item-action header-profile-link">
                                <i class="fas fa-user"></i>کاربر
                            </a>
                            <a href="#" class="list-group-item list-group-item-action header-profile-link">
                                <i class="far fa-envelope"></i>پیام ها
                            </a>
                            <a href="#" class="list-group-item list-group-item-action header-profile-link">
                                <i class="fas fa-lock"></i>قفل صفحه
                            </a>
                            <a href="#" class="list-group-item list-group-item-action header-profile-link">
                                <i class="fas fa-sign-out-alt"></i>خروج
                            </a>
                        </section>
                    </section>
                </span>

            </section>
        </section>
    </section>

</header>
