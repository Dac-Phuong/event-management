    <style>
        .core-values .container .card {
            position: relative;
            width: 300px;
            height: 420px;
            margin: 20px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
            transition: 0.5s;
        }

        .core-values .container .card:hover {
            filter: blur(0px);
            transform: scale(1.1);
            opacity: 1;
        }

        .core-values .container .card .circle {
            position: relative;
            width: 100%;
            height: 100%;
            background: #000;
            clip-path: circle(180px at center 0);
            text-align: center;
        }

        .core-values .container .card .circle h2 {
            color: #fff;
            font-size: 4.5em;
            padding: 30px 0;
        }

        .core-values .container .card .content {
            position: absolute;
            bottom: 10px;
            padding: 20px;
            page-break-after: 20px;
            text-align: center;
        }

        .core-values .container .card .content a {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            background: #000;
            color: #fff;
            border-radius: 40px;
            text-decoration: none;
            margin-top: 20px;
        }

        .core-values .container .card .circle,
        .core-values .container .card .content a {
           background: linear-gradient(135deg, #1D66A7, #00d4ff);
        }
    </style>

    <section class="core-values py-5">
        <div class="container mb-4">
            <h2 class="text-primary text-center fw-bold fs-1 mb-1">Giá trị cốt lõi </h2>
            <p class="text-center">Những nguyên tắc cốt lõi giúp chúng tôi phát triển và mang lại giá trị bền vững.</p>
        </div>
        <div class="container d-flex flex-wrap justify-content-center align-items-center align-items-center">
            <div class="card">
                <div class="circle">
                    <h2 class="fw-bold">1</h2>
                </div>
                <div class="content">
                    <p>
                        Chúng tôi trân trọng, gìn giữ bản sắc dân tộc, và luôn cố gắng tìm
                        hiểu thêm để mang đến những giá trị văn hóa chân thực và sâu sắc
                        nhất.
                    </p>
                    <a href="javascript:void(0)">Văn hóa Việt Nam</a>
                </div>
            </div>
            <div class="card">
                <div class="circle">
                    <h2 class="fw-bold">2</h2>
                </div>
                <div class="content">
                    <p>
                        Không ngừng đổi mới, kết hợp tinh hoa truyền thống với xu hướng hiện đại để
                        tạo ra những sản phẩm và trải nghiệm độc đáo.
                    </p>
                    <a href="javascript:void(0)">Sáng tạo</a>
                </div>
            </div>
            <div class="card">
                <div class="circle">
                    <h2 class="fw-bold">3</h2>
                </div>
                <div class="content">
                    <p>
                        Cam kết chất lượng trong từng hoạt động, đặt trách nhiệm và sự tín nhiệm
                        lên hàng đầu để mang lại giá trị bền vững cho cộng đồng và đối tác.
                    </p>
                    <a href="javascript:void(0)">Trách nhiệm & Uy tín</a>
                </div>
            </div>
        </div>
    </section>
