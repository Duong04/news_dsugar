@extends('admins.layouts.master')

@section('script-bottom')
@endsection

@section('content')
    <div class="container">
        <div class="page-inner row">
            <div class="col-4">
                <div class="col-md-12">
                    <div class="card card-profile">
                        <div class="card-header" style="background-image: url('/templates/img/blogpost.jpg')">
                            <div class="profile-picture">
                                <div class="avatar avatar-xl">
                                    <img src="{{ $user->avatar }}" alt="..." class="avatar-img rounded-circle" />
                                </div>
                            </div>
                        </div>
                        @php
                            $roleClasses = [
                                'Super Admin' => 'badge-success',
                                'Editor' => 'badge-warning',
                                'Author' => 'badge-primary',
                                'Contributor' => 'badge-info',
                                'Subscriber' => 'badge-secondary',
                                'Support' => 'badge-danger',
                            ];
                        @endphp
                        <div class="card-body">
                            <div class="user-profile text-center">
                                <div class="name">Hizrian, 19</div>
                                <div class="badge {{ $roleClasses[$user->role->name] }}">{{ $user->role->name }}</div>
                                <div class="desc">A man who hates loneliness</div>
                                <div class="social-media">
                                    <a class="btn btn-info btn-twitter btn-sm btn-link" href="#">
                                        <span class="btn-label just-icon"><i class="icon-social-twitter"></i>
                                        </span>
                                    </a>
                                    <a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#">
                                        <span class="btn-label just-icon"><i class="icon-social-facebook"></i>
                                        </span>
                                    </a>
                                    <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#">
                                        <span class="btn-label just-icon"><i class="icon-social-instagram"></i>
                                        </span>
                                    </a>
                                </div>
                                <div class="view-profile">
                                    <a href="#" class="btn btn-secondary w-100">View Full Profile</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row user-stats text-center">
                                <div class="col">
                                    <div class="number">125</div>
                                    <div class="title">Post</div>
                                </div>
                                <div class="col">
                                    <div class="number">25K</div>
                                    <div class="title">Followers</div>
                                </div>
                                <div class="col">
                                    <div class="number">134</div>
                                    <div class="title">Following</div>
                                </div>
                            </div>
                        </div>
                        <div>
                          <ul>
                            <li>
                              <span></span>
                              <span></span>
                            </li>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
