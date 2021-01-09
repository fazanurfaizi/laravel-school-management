@extends('layouts.app')

@section('content')
<div class="row gutters-sm">
    <div class="col-md-4 d-none d-md-block">
        <div class="card">
            <div class="card-body">
                <nav class="nav flex-column nav-pills nav-gap-y-1">
                    <a href="#profile" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user mr-2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        Profile
                    </a>
                    <a href="#info" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                        Information
                    </a>
                    <a href="#security" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield mr-2">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                        Security
                    </a>
                    <a href="#account-social-links" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-rss mr-2">
                            <path d="M4 11a9 9 0 0 1 9 9"/><path d="M4 4a16 16 0 0 1 16 16"/><circle cx="5" cy="19" r="1"/>
                        </svg>
                        Connections
                    </a>
                    <a href="#notification" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell mr-2">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                        Notification
                    </a>
                    <a href="#account" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings mr-2">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                        </svg>
                        Account Settings
                    </a>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header border-bottom mb-3 d-flex d-md-none">
                <ul class="nav nav-tabs card-header-tabs nav-gap-x-1" role="tablist">
                    <li class="nav-item">
                        <a href="#profile" data-toggle="tab" class="nav-link has-icon active">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#info" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#security" data-toggle="tab" class="nav-link has-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#notification" data-toggle="tab" class="nav-link has-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-social-links" data-toggle="tab" class="nav-link has-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-rss mr-2">
                                <path d="M4 11a9 9 0 0 1 9 9"/><path d="M4 4a16 16 0 0 1 16 16"/><circle cx="5" cy="19" r="1"/>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#account" data-toggle="tab" class="nav-link has-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body tab-content">
                <div class="tab-pane active" id="profile">
                    <h6>PROFILE</h6>
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <hr>
                    <div class="card-body media align-items-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="d-block ui-w-80">
                        <div class="media-body ml-4">
                        <label class="btn btn-outline-primary">
                            Upload new photo
                            <input type="file" class="account-settings-fileinput">
                        </label> &nbsp;
                        <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                        </div>
                    </div>
                    <hr class="border-light m-0">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input
                                type="text"
                                class="form-control"
                                class="form-control @error('firstname') is-invalid @enderror"
                                name="firstname"
                                placeholder="Enter your firstname"
                                value="{{ $user->firstname }}"
                            >
                            @error('firstname')
                                @foreach ($errors->get('firstname') as $message)
                                    <small class="form-text text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @endforeach
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input
                                type="text"
                                class="form-control @error('lastname') is-invalid @enderror"
                                id="lastname"
                                name="lastname"
                                placeholder="Enter your lastname"
                                value="{{ $user->lastname }}"
                            >
                            @error('lastname')
                                @foreach ($errors->get('lastname') as $message)
                                    <small class="form-text text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @endforeach
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input
                                type="text"
                                class="form-control @error('username') is-invalid @enderror"
                                id="name"
                                name="name"
                                placeholder="Enter your username"
                                value="{{ $user->name }}"
                            >
                            @error('username')
                                @foreach ($errors->get('username') as $message)
                                    <small class="form-text text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @endforeach
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                placeholder="Enter your email"
                                value="{{ $user->email }}"
                                autocomplete="email"
                                autofocus
                            >
                            @error('email')
                                @foreach ($errors->get('email') as $message)
                                    <small class="form-text text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @endforeach
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                        <button type="reset" class="btn btn-light">Reset Changes</button>
                    </form>
                </div>

                <div class="tab-pane" id="info">
                    <h6>INFORMATION</h6>
                    <hr>
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="bio">Your Bio</label>
                            <textarea class="form-control autosize" id="bio" placeholder="Write something about you" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 62px;">A front-end developer that focus more on user interface design, a web interface wizard, a connector of awesomeness.</textarea>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" placeholder="Enter your location" value="Bay Area, San Francisco, CA">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Information</button>
                        <button type="reset" class="btn btn-light">Reset Changes</button>
                    </form>
                </div>

                <div class="tab-pane" id="security">
                    <h6>SECURITY</h6>
                    <hr>
                    <form>
                        <div class="form-group">
                            <label class="d-block">Change Password</label>
                            <input type="text" class="form-control" placeholder="Enter your old password">
                            <input type="text" class="form-control mt-1" placeholder="New password">
                            <input type="text" class="form-control mt-1" placeholder="Confirm new password">
                        </div>
                    </form>
                    <hr>
                    <form>
                        <div class="form-group">
                            <label class="d-block">Two Factor Authentication</label>
                            <button class="btn btn-info" type="button">Enable two-factor authentication</button>
                            <p class="small text-muted mt-2">Two-factor authentication adds an additional layer of security to your account by requiring more than just a password to log in.</p>
                        </div>
                    </form>
                    <hr>
                    <form>
                        <div class="form-group mb-0">
                            <label class="d-block">Sessions</label>
                            <p class="font-size-sm text-secondary">This is a list of devices that have logged into your account. Revoke any sessions that you do not recognize.</p>
                            <ul class="list-group list-group-sm">
                                <li class="list-group-item has-icon">
                                <div>
                                    <h6 class="mb-0">San Francisco City 190.24.335.55</h6>
                                    <small class="text-muted">Your current session seen in United States</small>
                                </div>
                                <button class="btn btn-light btn-sm ml-auto" type="button">More info</button>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>

                <div class="tab-pane" id="account-social-links">
                    <h6>SOCIAL MEDIA</h6>
                    <hr>
                    <div class="card-body">
                        <button type="button" class="btn btn-twitter">Connect to <strong>Twitter</strong></button>
                    </div>
                    <hr class="border-light m-0">
                    <div class="card-body">
                        <h5 class="mb-2">
                        <a href="javascript:void(0)" class="float-right text-muted text-tiny"><i class="ion ion-md-close"></i> Remove</a>
                        <i class="ion ion-logo-google text-google"></i>
                        You are connected to Google:
                        </h5>
                        nmaxwell@mail.com
                    </div>
                    <hr class="border-light m-0">
                    <div class="card-body">
                        <button type="button" class="btn btn-facebook">Connect to <strong>Facebook</strong></button>
                    </div>
                    <hr class="border-light m-0">
                    <div class="card-body">
                        <button type="button" class="btn btn-instagram">Connect to <strong>Instagram</strong></button>
                    </div>
                </div>

                <div class="tab-pane" id="notification">
                    <h6>NOTIFICATION SETTINGS</h6>
                    <hr>
                    <form>
                        <div class="form-group">
                            <label class="d-block mb-0">Security Alerts</label>
                            <div class="small text-muted mb-3">Receive security alert notifications via email</div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1" checked="">
                                <label class="custom-control-label" for="customCheck1">Email each time a vulnerability is found</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck2" checked="">
                                <label class="custom-control-label" for="customCheck2">Email a digest summary of vulnerability</label>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <label class="d-block">SMS Notifications</label>
                            <ul class="list-group list-group-sm">
                                <li class="list-group-item has-icon">
                                    Comments
                                    <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1" checked="">
                                        <label class="custom-control-label" for="customSwitch1"></label>
                                    </div>
                                </li>
                                <li class="list-group-item has-icon">
                                    Updates From People
                                    <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                        <label class="custom-control-label" for="customSwitch2"></label>
                                    </div>
                                </li>
                                <li class="list-group-item has-icon">
                                    Reminders
                                    <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch3" checked="">
                                        <label class="custom-control-label" for="customSwitch3"></label>
                                    </div>
                                </li>
                                <li class="list-group-item has-icon">
                                    Events
                                    <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch4" checked="">
                                        <label class="custom-control-label" for="customSwitch4"></label>
                                    </div>
                                </li>
                                <li class="list-group-item has-icon">
                                    Pages You Follow
                                    <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch5">
                                        <label class="custom-control-label" for="customSwitch5"></label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>

                <div class="tab-pane" id="account">
                    <h6>ACCOUNT SETTINGS</h6>
                    <hr>
                    <div class="form-group">
                        <label class="d-block text-danger">Delete Account</label>
                        <p class="text-muted font-size-sm">Once you delete your account, there is no going back. Please be certain.</p>
                    </div>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                        Delete Account
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        class="form-control"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                    >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>

@endsection
