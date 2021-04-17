<section class="section section-on-footer" data-background="{{asset('img/backgrounds/bg-dots.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title">
                    {{request()->routeIs('contactUs') ? 'Info Kontak' : 'Hubungi Kami'}}
                </h2>
            </div>
            <div class="col-lg-8 mx-auto">
                <div class="bg-white rounded text-center p-5 shadow-down">
                    <form id="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Nama">
                                    <p class="help-block m-0 text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                    <p class="help-block m-0 text-danger"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" placeholder="Subjek">
                            <p class="help-block m-0 text-danger"></p>
                        </div>
                        <div class="form-group">
                            <textarea name="message" name="message" class="form-control" rows="4"
                                placeholder="Pesan"></textarea>
                            <p class="help-block m-0 text-danger"></p>
                        </div>
                        <div id="success"></div>
                        <fieldset>
                            <button type="button" class="btn btn-primary w-100" data-action="contact">
                                <span>Kirim Pesan</span>
                                <div class="spinner-border ml-3 d-none" role="status"></div>
                            </button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>