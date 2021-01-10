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
