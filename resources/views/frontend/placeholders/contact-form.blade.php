<form method="post" action="{{ route('contacts.store') }}">
    @csrf
    <div class="news-latter-box">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="form-floating mb-5">
                    <!-- <label for="exampleInputEmail1" class="form-label">Email address</label> -->
                    <input type="text" name="name" class="form-control"
                    placeholder="First &amp; Last Name" id="fullName"
                    aria-describedby="emailHelp">
                    <label for="fullName">First &amp; Last Name</label>
                    <div class="error d-none">please fill the required field.</div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="form-floating mb-5">
                    <input type="email" name="email" class="form-control" placeholder="Email"
                    id="email">
                    <label for="email">Email</label>
                    <div class="invalid-feedback">Looks good!</div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="form-floating mb-5">
                    <input type="text" name="phone" class="form-control" placeholder="Phone"
                    id="phoneNum">
                    <label for="phoneNum">Phone</label>
                    <div class="invalid-feedback">Looks good!</div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="form-floating mb-5">
                    <input type="text" name="jobtype" class="form-control" placeholder="Job Type"
                    id="jobType">
                    <label for="jobType">Job Type</label>
                    <div class="invalid-feedback">Looks good!</div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="form-floating mb-5">
                    <textarea type="text" name="message" class="form-control" placeholder="Message"
                    id="message"></textarea>
                    <label for="message">Message</label>
                    <div class="invalid-feedback">Looks good!</div>
                </div>
            </div>
            <div class="col-12">
                <div class="send-message-btn">
                    <button class="send-btn" type="submit">Send</button>
                </div>
            </div>
        </div>
    </div>
</form>