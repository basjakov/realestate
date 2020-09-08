<div class="col-md-4">
    <div class="sidebar left">

        <div class="my-account-nav-container">

            <ul class="my-account-nav">
                <li class="sub-nav-title">Manage Account</li>
                <li><a href="{{route('home')}}" class="current"><i class="sl sl-icon-user"></i>Պրոֆիլ</a></li>
                <li><a href="my-bookmarks.html"><i class="sl sl-icon-star"></i> Bookmarked Listings</a></li>
            </ul>

            <ul class="my-account-nav">
                <li class="sub-nav-title">Manage Listings</li>

                <li><a href="{{route('announcement.create')}}"><i class="sl sl-icon-action-redo"></i>Ավելացնել անշարժ գույք</a></li>
            </ul>

            <ul class="my-account-nav">
                <li><a href="{{route('realtor.edit',Auth::user()->id)}}"><i class="sl sl-icon-user"></i>Փոխել տվյալները</a></li>
                <li><a href="{{route('password')}}"><i class="sl sl-icon-lock"></i> Change Password</a></li>
                <li><a href="{{route('logout')}}"><i class="sl sl-icon-power"></i>Դուրս գալ</a></li>
            </ul>

        </div>

    </div>
</div>
