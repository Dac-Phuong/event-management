<style>
    .premium-logo {
        display: flex;
        align-items: center;
        height: 40px;
        min-width: 135px;
    }

    .premium-logo .letter-a {
        font-family: 'Montserrat', sans-serif;
        font-size: 60px;
        font-weight: 800;
        background: linear-gradient(135deg, #ff6600 30%, #ff9248);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        line-height: 0.8;
        position: relative;
        margin-right: 2px;
    }

    .premium-logo .text-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-left: 5px;
        border-left: 1px solid rgba(255, 255, 255, 0.1);
        padding-left: 8px;
        height: 40px;
    }

    .premium-logo .text-name {
        font-size: 16px;
        font-weight: 300;
        color: #fff;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 2px;
        line-height: 1;
    }

    .premium-logo .text-tagline {
        font-size: 8px;
        font-weight: 500;
        color: #ff6600;
        letter-spacing: 4px;
        text-transform: uppercase;
        line-height: 1;
    }
</style>
<div class="logo-container">
    <div class="col-6 col-lg-2">
        <a href="{{url('/')}}">
            <div class="premium-logo">
                <div class="letter-a">A</div>
                <div class="text-container">
                    <div class="text-name">NH SON</div>
                    <div class="text-tagline">GROUP</div>
                </div>
            </div>
        </a>
    </div>
</div>
