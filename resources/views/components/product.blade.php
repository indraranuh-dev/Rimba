<section class="section" id="product">
    <div class="container">

        <div class="row">
            <div class="col-12 text-center">
                <h2 class="section-title">Katalog</h2>
                <p class="2-75">
                    <strong>Maya Spring Bed</strong> memiliki berbagai macam produk dengan kualitas premium
                    dan dengan harga yang terjangkau.
                </p>
            </div>

            @foreach ($products as $product)
            <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                <article class="card shadow">
                    <img class="rounded card-img-top" src="{{url($product->thumbnail)}}" alt="{{$product->slug_name}}">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a class="text-dark" href="javascript:void(0)" data-slug="{{$product->slug_name}}"
                                show-modal>{{$product->name}}</a>
                        </h4>
                        <a href="https://linktr.ee/mayaspringbed" class="btn btn-xs btn-primary btn-cart btn-block"
                            target="_blank">
                            <i class="ti-shopping-cart"></i>
                            Beli Produk
                        </a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="modal fade modal-product" id="modal-description" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true" data-aos="fade-down">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body align-items-center justify-content-center" style="display:flex;height: 120px"
                modal-body-loader>
                <span class="loading"></span>
            </div>
            <div class="modal-body d-none" modal-body-real>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        style="fill:#fff;transform:;-ms-filter:">
                        <path
                            d="M9.172 16.242L12 13.414 14.828 16.242 16.242 14.828 13.414 12 16.242 9.172 14.828 7.758 12 10.586 9.172 7.758 7.758 9.172 10.586 12 7.758 14.828z">
                        </path>
                        <path
                            d="M12,22c5.514,0,10-4.486,10-10S17.514,2,12,2S2,6.486,2,12S6.486,22,12,22z M12,4c4.411,0,8,3.589,8,8s-3.589,8-8,8 s-8-3.589-8-8S7.589,4,12,4z">
                        </path>
                    </svg>
                </button>
                <div class="product-image text-center">
                    <img src="" alt="detail" width="60%">
                </div>
                <div class="product-info table-responsive">
                </div>
            </div>
        </div>
    </div>
</div>

<style></style>