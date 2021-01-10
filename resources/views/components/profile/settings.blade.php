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
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
