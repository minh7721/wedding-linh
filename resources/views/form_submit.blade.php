@push('before_styles')

@endpush

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="text-center mb-5">
                <h2 class="heading-section h2">BẠN SẼ ĐẾN CHỨ</h2>
                <p class="h5">Chúng mình rất chờ đón sự kiện trọng đại này của cuộc đời. Xin hãy xác nhận sự có mặt của mình để chúng mình chuẩn bị đón tiếp một cách chu đáo nhất nhé! Trân trọng!</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <p class="mb-4 h6 font-italic">Phiền bạn một chút thời gian để điền thông tin giúp chúng mình nhé ^^</p>
                                <form method="POST" action="{{ route('will-come.post') }}" class="contactForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="mb-1" for="form-submit-name">Tên của bạn</label>
                                                <input type="text" class="form-control border p-2" name="name" id="form-submit-name" placeholder="Bạn vui lòng cho chúng mình biết bạn là ai nha ^^">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="mb-1" for="inputGroupSelect02">Bạn sẽ đến chứ?</label>
                                                <div class="input-group mb-3">
                                                    <select name="will_come" class="custom-select" id="inputGroupSelect02">
                                                        <option selected>Chọn 1 lựa chọn nhaaa</option>
                                                        <option value="1">Mình chắc chắn sẽ đến</option>
                                                        <option value="2">Mình có thể sẽ đên</option>
                                                        <option value="3">Tiếc quá mình không đến được</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form-submit-message" class="mb-1">Lời nhắn</label>
                                                <textarea name="message" class="form-control border p-2" id="form-submit-message" cols="30" rows="4" placeholder="Bạn có lời nhắn gửi gì tới chúng mình không nèee"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" value="Send Message" class="btn btn-primary">
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-stretch">
                            <div class="info-wrap w-100 p-5 img" style="background-image: url(http://127.0.0.1:8000/w.ladicdn.com/s600x750/5e51ff6161a254079fc6d2ed/album-anh-cuoi-han-quoc-phim-truong-27-20231009123127-jxx1n.jpg);">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('before_scripts')

@endpush
