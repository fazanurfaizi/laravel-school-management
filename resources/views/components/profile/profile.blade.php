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
    <form action="{{ route('profile.photo.update') }}" method="POST" enctype="multipart/form-data" class="card-body media align-items-center">
        @csrf
        <img src="{{ $user->profile_photo_url }}" alt="" class="d-block ui-w-80">
        <div class="media-body ml-4">
        <label class="btn btn-outline-primary">
            Upload new photo
            <input name="photo" type="file" class="account-settings-fileinput">
        </label> &nbsp;
        <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
        </div>
        <button type="submit">Change</button>
    </form>
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
