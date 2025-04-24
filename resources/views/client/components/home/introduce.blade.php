<style>
    /* Base styles */
    .ent-container {
        position: relative;
        overflow: hidden;
    }

    .ent-container::after {
        content: '';
        position: absolute;
        bottom: 50px;
        left: -70px;
        width: 800px;
        height: 800px;
        background-color: rgba(25, 5, 141, 0.05);
        border-radius: 50%;
        z-index: -1;
    }

    /* Header section */
    .icdx {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        padding: 10px;
        margin-bottom: 20px;
    }

    .icdx img {
        width: 100%;
        height: auto;
    }

    /* Content styles */
    .mtx {
        font-size: 17px;
        line-height: 1.8;
        color: #4a5568;
        margin-bottom: 30px;
        font-weight: 400;
    }

    /* Mission goals section */
    .mission-goal-new {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        padding: 0;
        list-style: none;
    }

    .mission-goal-new li {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 130px;
    }

    .imfx {
        width: 130px;
        height: 130px;
        padding: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 15px;
    }

    .imfx:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
    }

    .imfx img {
        width: 100%;
        height: auto;
        border-radius: 50%;
        object-fit: contain;
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .mission-goal-new {
            gap: 20px;
        }

        .mission-goal-new li {
            width: 120px;
        }

        .imfx {
            width: 120px;
            height: 120px;
            padding: 15px;
        }
    }

    @media (max-width: 768px) {
        .text-gradient {
            font-size: 28px;
        }

        .mtx {
            font-size: 16px;
        }

        .mission-goal-new {
            gap: 15px;
        }

        .mission-goal-new li {
            width: 100px;
        }

        .imfx {
            width: 100px;
            height: 100px;
            padding: 12px;
        }
    }

    @media (max-width: 576px) {
        .mission-goal-new {
            gap: 10px;
        }

        .mission-goal-new li {
            width: 80px;
        }

        .imfx {
            width: 80px;
            height: 80px;
            padding: 10px;
        }
    }
</style>

<section class="py-5 py-lg-5 ent-container position-relative" id="about" data-aos="fade-up" data-aos-duration="1000">
    <div class="container mb-5">
        <div class="px-3 px-lg-0">
            <div class="icdx" data-aos="fade-right" data-aos-duration="800">
                <img src="{{ asset('assets/files/icons/uXziFML.png') }}" class="lazyloading" data-was-processed="true">
            </div>
            <h2 class="text-gradient display-4 fw-bold mb-3" data-aos="fade-right" data-aos-duration="1000">
                GIỚI THIỆU VỀ<br />
                CÔNG TY TẬP ĐOÀN ANH SƠN GROUP
            </h2>
            <div class="divider m-0" data-aos="fade-left" data-aos-duration="1200"></div>
            <div class="mtx mt-4" data-aos="fade-up" data-aos-duration="1400">
                <p style="color: var(--text-gray)">
                    {!! $introduce['introduce_content'] !!}
                </p>
            </div>

            <ul class="mission-goal-new" data-aos="fade-up" data-aos-duration="1600">
                <li data-aos="zoom-in" data-aos-duration="1800">
                    <div class="imfx">
                        <img src="https://newdaymedia.com.vn/wp-content/uploads/2023/09/gold-2020.png"
                            alt="Gold Award 2020" class="lazyloading" data-was-processed="true">
                    </div>
                </li>
                <li data-aos="zoom-in" data-aos-duration="2000">
                    <div class="imfx">
                        <img src="https://newdaymedia.com.vn/wp-content/uploads/2023/09/bronze.png" alt="Bronze Award"
                            class="lazyloading" data-was-processed="true">
                    </div>
                </li>
                <li data-aos="zoom-in" data-aos-duration="2200">
                    <div class="imfx">
                        <img src="https://newdaymedia.com.vn/wp-content/uploads/2023/09/gold.png" alt="Gold Award"
                            class="lazyloading" data-was-processed="true">
                    </div>
                </li>
                <li data-aos="zoom-in" data-aos-duration="2400">
                    <div class="imfx">
                        <img src="https://newdaymedia.com.vn/wp-content/uploads/2023/09/silver-2020.png"
                            alt="Silver Award 2020" class="lazyloading" data-was-processed="true">
                    </div>
                </li>
                <li data-aos="zoom-in" data-aos-duration="2600">
                    <div class="imfx">
                        <img src="https://newdaymedia.com.vn/wp-content/uploads/2023/09/gold-2020.png"
                            alt="Gold Award 2020" class="lazyloading" data-was-processed="true">
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>
