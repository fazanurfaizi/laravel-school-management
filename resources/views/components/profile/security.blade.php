<div class="tab-pane" id="security">
    <h6>SECURITY</h6>
    <hr>
    <form method="POST" action="{{ route('change.password') }}">
        @csrf
        <div class="form-group">
            <label class="d-block">Change Password</label>
            <div class="form-group">
                <input
                    id="current_password"
                    type="password"
                    class="form-control"
                    placeholder="Enter your old password"
                    name="current_password"
                    autocomplete="current-password"
                >
                @error('current_password')
                    @foreach ($errors->get('current_password') as $message)
                        <small class="form-text text-danger">
                            <strong>{{ $message }}</strong>
                        </small>
                    @endforeach
                @enderror
            </div>
            <div class="form-group">
                <input
                    id="current_password"
                    type="password"
                    class="form-control"
                    placeholder="Enter your old password"
                    name="current_password"
                    autocomplete="current-password"
                >
                @error('current_password')
                    @foreach ($errors->get('current_password') as $message)
                        <small class="form-text text-danger">
                            <strong>{{ $message }}</strong>
                        </small>
                    @endforeach
                @enderror
            </div>
            <div class="form-group">
                <input
                    id="current_password"
                    type="password"
                    class="form-control"
                    placeholder="Enter your old password"
                    name="current_password"
                    autocomplete="current-password"
                >
                @error('current_password')
                    @foreach ($errors->get('current_password') as $message)
                        <small class="form-text text-danger">
                            <strong>{{ $message }}</strong>
                        </small>
                    @endforeach
                @enderror
            </div>
            {{-- <input type="password" class="form-control mt-1" placeholder="New password" name="new_password" autocomplete="current-password">
            <input type="password" class="form-control mt-1" placeholder="Confirm new password" name="new_confirm_password" autocomplete="current-password"> --}}
        </div>
        <button type="submit" class="btn btn-primary">Change Password</button>
    </form>
    <hr>
    <form>
        <div class="form-group">
            <label class="d-block">Two Factor Authentication</label>
            @if (!$user->enabled2fa)
                <button class="btn btn-info" type="button">Enable two-factor authentication</button>
            @else
                <p>2fa</p>
            @endif
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
