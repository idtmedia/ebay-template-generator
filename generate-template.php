<?php //Generate text file on the fly
define("SITE_URL", "http://ebay.olibro.net/newhtmlgenerator");
$data = $_POST;
if (isset($data) && ($data['submit'] != "")):
    header("Content-type: text/html");
    header("Content-Disposition: attachment; filename=html-template.html");
    $banner = $data['banner'];
    $videopreview = ($data['video'] != "") ? $data['video'] : SITE_URL . '/images/video-thumb.png';
    $brandlogo = $data['brand'];
    $videourl = $data['videourl'];
    $title = $data['title'];
    $part_number = $data['part_number'];
    $product_images = explode('|', $data['pimages']);
    array_shift($product_images);
    // var_dump($product_images);
    $product_images_amount = count($product_images);
    $description_title = $data['description_title'];
    $description = $data['description'];
    $features = $data['features'];
    $spec_title = $data['spec_title'];
    $spec_text = $data['spec_text'];
    $about = $data['about'];
    $shipping = $data['shipping'];
    $returns = $data['returns'];
    $warranty = $data['warranty'];
    ?>
    <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">
    <style>
        /* Header Css */
        body {
            font-size: 16px;
            margin: 0;
            word-wrap: break-word;
        }

        div#centerpane.center-col {
            width: 100%;
            max-width: 100%;
            padding: 0;
        }

        #background * {
            box-sizing: border-box;
        }

        #showcase ul, {
            display: block;
        }


        .clear {
            clear: both;
        }

        .page {
            width: 100%;
            font-family: Arial, Arial, Helvetica, sans-serif;
            color: #232323;
            max-width: 1333px;
            margin: 0 auto;
        }

        .page td,
        .page .g-std {
            font-family: Arial, Arial, Helvetica, sans-serif;
        }

        .cols {
        }

        .col-wrapper {
            background: none center center;
        }

        div.row {
            width: 1333px;
            margin: auto;
            max-width: 100%;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            width: 100%;
            font-family: Arial, Helvetica, sans-serif;
        }

        #showcase {
            display: block;
        }

        #showcase h3 {
            font-family: 'Open Sans', sans-serif;
            font-weight: 700;
            font-size: 28px;
            color: #2c333d;
            margin: 10px 0px 20px 0px;
            line-height: 1.3em;
            text-transform: uppercase;
        }

        #showcase::after {
            clear: both;
            content: " ";
        }

        .item-details,
        .alt_image_gallery {
            width: 100%;
            padding: 10px 0px;
            text-align: center;
        }

        .item-details h1 {
            font-size: 2.4em;
            color: #232323;
            margin-top: 0;
            margin-bottom: 0.3rem;
            border-bottom: 3px solid #8b0b04;
            display: inline-block;
            width: auto;
        }

        .item-details .itemid {
            font-size: 1.125em;
            color: #232323;
        }

        .detailsandspecs {
            text-align: center;
            padding: 20px 0;
        }

        .detailstitle {
            font-size: 2.25em;
            color: #232323;
            font-weight: 700; 
            border-bottom: 3px solid #f59122;
            font-family: 'Open Sans', sans-serif;
            display: inline-block;
        }

        .detailscontent {
            font-size: 1.125em;
            color: #232323;
        }

        .featuresandspecs {
            width: 100%;
            position: relative;
            /* float: left; */
            height: auto;
            padding: 20px 0;
            display: flex;
            align-items: stretch;
            flex-wrap: wrap;
            justify-content: space-between;

        }

        .features {
            width: calc(49% - 24px);
            padding: 10px;
            border: 2px solid #8B0F04;
        }

        .featurestitle, .itemspecstitle {
            font-size: 1.5em;
            color: #232323;
            font-weight: 700;
            border-bottom: 3px solid #f59122;
            font-family: 'Open Sans', sans-serif;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .featurescontent {
            margin: 10px 0px;
            font-size: 1.125em;
            color: #232323;
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
        }

        .featurescontent p {
            margin-bottom: 1.2rem;
            margin-top: 0;
            line-height: 1.5em;
        }

        .itemspecs {
            width: calc(49% - 24px);
            padding: 10px;
            border: 2px solid #8B0F04;
        }

        .itemspeccontent {
            margin: 10px 0px;
            font-size: 1.125em;
            color: #232323;
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
        }

        .itemspec {
            padding: 5px;
            border-bottom: 1px solid #f59122;
        }

        .itemspec:last-child{
            border: none;
        }

        .toggles-content {
            padding: 20px 0;
            clear: both;
            text-align: center;
            border: 2px solid #8B0F04;
            margin-bottom: 30px;
        }

        .csslider {
            -moz-perspective: 1329px;
            -ms-perspective: 1329px;
            -webkit-perspective: 1329px;
            perspective: 1329px;
            display: inline-block;
            text-align: left;
            position: relative;
            margin-bottom: 22px;
            max-width: 100%;
        }

        .csslider > input {
            display: none;
        }

        .csslider > input:nth-of-type( 10):checked ~ ul li:first-of-type {
            margin-left: -900%;
        }

        .csslider > input:nth-of-type( 9):checked ~ ul li:first-of-type {
            margin-left: -800%;
        }

        .csslider > input:nth-of-type( 8):checked ~ ul li:first-of-type {
            margin-left: -700%;
        }

        .csslider > input:nth-of-type( 7):checked ~ ul li:first-of-type {
            margin-left: -600%;
        }

        .csslider > input:nth-of-type( 6):checked ~ ul li:first-of-type {
            margin-left: -500%;
        }

        .csslider > input:nth-of-type( 5):checked ~ ul li:first-of-type {
            margin-left: -400%;
        }

        .csslider > input:nth-of-type( 4):checked ~ ul li:first-of-type {
            margin-left: -300%;
        }

        .csslider > input:nth-of-type( 3):checked ~ ul li:first-of-type {
            margin-left: -200%;
        }

        .csslider > input:nth-of-type( 2):checked ~ ul li:first-of-type {
            margin-left: -100%;
        }

        .csslider > input:nth-of-type( 1):checked ~ ul li:first-of-type {
            margin-left: 0%;
        }

        .csslider > ul {
            position: relative;
            width: 1329px;
            max-width: 100%;
            height: 420px;
            z-index: 1;
            font-size: 0;
            line-height: 0;
            margin: 0 auto;
            padding: 0;
            overflow: hidden;
            white-space: nowrap;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .csslider > ul > li {
            position: relative;
            display: inline-block;
            width: 100%;
            height: 100%;
            overflow: hidden;
            font-size: 15px;
            font-size: initial;
            line-height: normal;
            -moz-transition: all 0.5s cubic-bezier(0.4, 1.3, 0.65, 1);
            -o-transition: all 0.5s ease-out;
            -webkit-transition: all 0.5s cubic-bezier(0.4, 1.3, 0.65, 1);
            transition: all 0.5s cubic-bezier(0.4, 1.3, 0.65, 1);
            vertical-align: top;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            white-space: normal;
            text-align: center;
        }

        .csslider > ul > li.scrollable {
            overflow-y: scroll;
        }

        .csslider > ul > li img {
            max-width: 100%;
            max-height: 100%;
        }

        .csslider > .navigation {
            position: absolute;
            bottom: -8px;
            left: 50%;
            z-index: 10;
            margin-bottom: -10px;
            font-size: 0;
            line-height: 0;
            text-align: center;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .csslider > .navigation > div {
            margin-left: -100%;
        }

        .csslider > .navigation label {
            position: relative;
            display: inline-block;
            cursor: pointer;
            border-radius: 50%;
            margin: 0 4px;
            padding: 4px;
            background: #3a3a3a;
        }

        .csslider > .navigation label:hover:after {
            opacity: 1;
        }

        .csslider > .navigation label:after {
            content: '';
            position: absolute;
            left: 50%;
            top: 50%;
            margin-left: -6px;
            margin-top: -6px;
            background: #71ad37;
            border-radius: 50%;
            padding: 6px;
            opacity: 0;
        }

        .csslider > .arrows {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .csslider.inside .navigation {
            bottom: 10px;
            margin-bottom: 10px;
        }

        .csslider.inside .navigation label {
            border: 1px solid #7e7e7e;
        }

        .csslider > input:nth-of-type(1):checked ~ .navigation label:nth-of-type(1):after,
        .csslider > input:nth-of-type(2):checked ~ .navigation label:nth-of-type(2):after,
        .csslider > input:nth-of-type(3):checked ~ .navigation label:nth-of-type(3):after,
        .csslider > input:nth-of-type(4):checked ~ .navigation label:nth-of-type(4):after,
        .csslider > input:nth-of-type(5):checked ~ .navigation label:nth-of-type(5):after,
        .csslider > input:nth-of-type(6):checked ~ .navigation label:nth-of-type(6):after,
        .csslider > input:nth-of-type(7):checked ~ .navigation label:nth-of-type(7):after,
        .csslider > input:nth-of-type(8):checked ~ .navigation label:nth-of-type(8):after,
        .csslider > input:nth-of-type(9):checked ~ .navigation label:nth-of-type(9):after,
        .csslider > input:nth-of-type(10):checked ~ .navigation label:nth-of-type(10):after,
        .csslider > input:nth-of-type(11):checked ~ .navigation label:nth-of-type(11):after {
            opacity: 1;
        }

        .csslider > .arrows {
            position: absolute;
            top: 50%;
            width: 100%;
            height: 0;
            z-index: 0;
            -moz-box-sizing: content-box;
            -webkit-box-sizing: content-box;
            box-sizing: content-box;
            z-index: 999;
        }

        .csslider > .arrows label {
            display: none;
            position: absolute;
            top: -50%;
            padding: 13px;
            box-shadow: inset 2px -2px 0 1px #3a3a3a;
            cursor: pointer;
            -moz-transition: box-shadow 0.15s, margin 0.15s;
            -o-transition: box-shadow 0.15s, margin 0.15s;
            -webkit-transition: box-shadow 0.15s, margin 0.15s;
            transition: box-shadow 0.15s, margin 0.15s;
        }

        .csslider > .arrows label:hover {
            box-shadow: inset 3px -3px 0 2px #71ad37;
            margin: 0 0px;
        }

        .csslider > .arrows label:before {
            content: '';
            position: absolute;
            top: -100%;
            left: -100%;
            height: 300%;
            width: 300%;
        }

        .csslider.infinity > input:first-of-type:checked ~ .arrows label.goto-last,
        .csslider > input:nth-of-type(1):checked ~ .arrows > label:nth-of-type(0),
        .csslider > input:nth-of-type(2):checked ~ .arrows > label:nth-of-type(1),
        .csslider > input:nth-of-type(3):checked ~ .arrows > label:nth-of-type(2),
        .csslider > input:nth-of-type(4):checked ~ .arrows > label:nth-of-type(3),
        .csslider > input:nth-of-type(5):checked ~ .arrows > label:nth-of-type(4),
        .csslider > input:nth-of-type(6):checked ~ .arrows > label:nth-of-type(5),
        .csslider > input:nth-of-type(7):checked ~ .arrows > label:nth-of-type(6),
        .csslider > input:nth-of-type(8):checked ~ .arrows > label:nth-of-type(7),
        .csslider > input:nth-of-type(9):checked ~ .arrows > label:nth-of-type(8),
        .csslider > input:nth-of-type(10):checked ~ .arrows > label:nth-of-type(9),
        .csslider > input:nth-of-type(11):checked ~ .arrows > label:nth-of-type(10) {
            display: block;
            left: 20%;
            z-index: 999;
            right: auto;
            -moz-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .csslider.infinity > input:last-of-type:checked ~ .arrows label.goto-first,
        .csslider > input:nth-of-type(1):checked ~ .arrows > label:nth-of-type(2),
        .csslider > input:nth-of-type(2):checked ~ .arrows > label:nth-of-type(3),
        .csslider > input:nth-of-type(3):checked ~ .arrows > label:nth-of-type(4),
        .csslider > input:nth-of-type(4):checked ~ .arrows > label:nth-of-type(5),
        .csslider > input:nth-of-type(5):checked ~ .arrows > label:nth-of-type(6),
        .csslider > input:nth-of-type(6):checked ~ .arrows > label:nth-of-type(7),
        .csslider > input:nth-of-type(7):checked ~ .arrows > label:nth-of-type(8),
        .csslider > input:nth-of-type(8):checked ~ .arrows > label:nth-of-type(9),
        .csslider > input:nth-of-type(9):checked ~ .arrows > label:nth-of-type(10),
        .csslider > input:nth-of-type(10):checked ~ .arrows > label:nth-of-type(11),
        .csslider > input:nth-of-type(11):checked ~ .arrows > label:nth-of-type(12) {
            display: block;
            right: 20%;
            z-index: 999;
            left: auto;
            -moz-transform: rotate(225deg);
            -ms-transform: rotate(225deg);
            -o-transform: rotate(225deg);
            -webkit-transform: rotate(225deg);
            transform: rotate(225deg);
        }

        #slider1 > input:nth-of-type(3):checked ~ ul #bg {
            width: 80%;
            padding: 22px;
            -moz-transition: .5s .5s;
            -o-transition: .5s .5s;
            -webkit-transition: .5s .5s;
            transition: .5s .5s;
        }

        #slider1 > input:nth-of-type(3):checked ~ ul #bg div {
            -moz-transform: translate(0);
            -ms-transform: translate(0);
            -o-transform: translate(0);
            -webkit-transform: translate(0);
            transform: translate(0);
            -moz-transition: .5s .9s;
            -o-transition: .5s .9s;
            -webkit-transition: .5s .9s;
            transition: .5s .9s;
        }

        #slider1 > input:nth-of-type(6):checked ~ ul #dex-sign {
            -moz-animation: sign-anim 3.5s 0.5s steps(85) forwards;
            -o-animation: sign-anim 3.5s 0.5s steps(85) forwards;
            -webkit-animation: sign-anim 3.5s 0.5s steps(85) forwards;
            animation: sign-anim 3.5s 0.5s steps(85) forwards;
        }

        .toggle-content {
            padding: 10px;
            font-size: 1.125em;
            color: #232323;
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
            text-align: left;
            display: none;
        }

        .toggle-content img {
            max-width: 100%;
        }

        .toggle-title a {
            text-decoration: none;
            font-size: 1.55em;
            color: #232323;
            font-family: 'Open Sans', sans-serif;
            font-weight: 700;
            text-transform: uppercase;
        }

        .toggle-title a span {
            text-decoration: none;
            font-size: 1.55rem;
            color: #232323;
            font-family: 'Open Sans', sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            margin-left: 20px;
        }

        .toggle label {
            display: inline-block;
        }

        .toggle input {
            display: none;
        }

        .clicker {
            display: inline-block;
            font-size: 1.55rem;
            font-family: 'Open Sans', sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            margin-left: 20px;
            cursor: pointer;
        }

        .clicker span {
            text-decoration: none;
            font-size: 1.55rem;
            color: #232323;
            font-family: 'Open Sans', sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            margin-left: 20px;
            cursor: pointer;
        }

        .toggle input:checked ~ .toggle-content {
            display: block;
        }

        @media only screen and (max-width: 768px) {
            .featuresandspecs {
                display: block;
            }

            .features, .itemspecs {
                width: calc(100% - 24px);
                margin: 0;
            }

            .features {
                margin-bottom: 20px;
            }
        }
    </style>


    <div id="container" class="page">
        <div class="header-wrapper">
            <?php
            if ($banner != ""): ?>
                <img src="<?php
                echo $banner; ?>" width="100%"/>
                <?php
            endif; ?>
        </div>

        <div class="col-wrapper">
            <div id="cols" class="cols row">
                <div id="centerpane" class=" center-col">
                    <div class="item-details">
                        <h1><?php echo $title; ?></h1>
                        <div class="itemid"><?php echo $part_number; ?></div>
                    </div>
                    <?php if ($product_images_amount > 0): ?>
                        <div class="alt_image_gallery">
                            <div id="showcase">
                                <div id="slider1" class="csslider infinity">
                                    <?php for ($i = 0; $i < $product_images_amount; $i++): ?>
                                        <input type="radio" name="slides"
                                               id="slides_<?php echo($i + 1); ?>" <?php if ($i == 1) echo 'checked="checked"'; ?> />
                                    <?php endfor; ?>
                                    <input type="radio" name="slides"
                                           id="slides_<?php echo($product_images_amount + 1); ?>"/>
                                    <ul>
                                        <?php for ($i = 0; $i < $product_images_amount; $i++): ?>
                                            <li><img src="<?php echo $product_images[$i]; ?>"/></li>
                                        <?php endfor; ?>
                                        <?php if ($videourl != ""): ?>
                                            <li><a href="<?php echo $videourl; ?>" target="_blank"><img
                                                            src="<?php echo $videopreview; ?>"></a></li>
                                        <?php endif; ?>
                                    </ul>
                                    <div class="arrows">
                                        <?php for ($i = 0; $i < $product_images_amount; $i++): ?>
                                            <label for="slides_<?php echo($i + 1); ?>"></label>
                                        <?php endfor; ?>
                                        <?php if ($videourl != ""): ?>
                                            <label for="slides_<?php echo($product_images_amount + 1); ?>"></label>
                                        <?php endif; ?>
                                        <label for="slides_1" class="goto-first"></label>
                                        <label for="slides_<?php echo($product_images_amount + 1); ?>"
                                               class="goto-last"></label>
                                    </div>
                                    <div class="navigation">
                                        <div>
                                            <?php for ($i = 0; $i < $product_images_amount; $i++): ?>
                                                <label for="slides_<?php echo($i + 1); ?>"></label>
                                            <?php endfor; ?>
                                            <label for="slides_<?php echo($product_images_amount + 1); ?>"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="detailsandspecs">
                    <div class="detailstitle"><?php echo $description_title; ?></div>
                    <div class="detailscontent">
                        <?php echo $description; ?>
                    </div>
                </div>
                <div class="featuresandspecs">
                    <div class="features">
                        <div class="featurestitle">Features</div>
                        <div class="featurescontent">
                            <?php echo $features; ?>
                        </div>
                    </div>
                    <div class="itemspecs">
                        <div class="itemspecstitle">Specs</div>
                        <div class="itemspeccontent">
                            <?php for ($i = 0; $i < count($spec_title); $i++): ?>
                                <div class="itemspec <?php if ($i % 2): echo 'odd';
                                else: echo 'even'; endif; ?>">
                                    <?php echo $spec_title[$i]; ?><br><?php echo $spec_text[$i]; ?>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
                <div class="toggles-content">
                    <div class="toggle">
                        <input id="about-chk" type="checkbox" >
                        <label for="about-chk" class="clicker">ABOUT THE BRAND
                            <span id="about-open">+</span><span id="about-close" style="display: none">-</span>
                        </label>
                        <div class="toggle-content">
                            <?php if ($brandlogo!=""): ?>
                            <img src="<?php echo $brandlogo; ?>"/>
                            <?php endif; ?>
                            <?php echo $about; ?>
                        </div>
                    </div>
                    <div class="toggle">
                        <input id="shipping-chk" type="checkbox" >
                        <label for="shipping-chk" class="clicker">Shipping
                            <span id="shipping-open">+</span><span id="shipping-close" style="display: none">-</span>
                        </label>
                        <div class="toggle-content">
                            <?php echo $shipping; ?>
                        </div>
                    </div>
                    <div class="toggle">
                        <input id="returns-chk" type="checkbox" >
                        <label for="returns-chk" class="clicker">Returns
                            <span id="returns-open">+</span><span id="returns-close" style="display: none">-</span>
                        </label>
                        <div class="toggle-content">
                            <?php echo $returns; ?>
                        </div>
                    </div>
                    <div class="toggle">
                        <input id="$warranty-chk" type="checkbox" >
                        <label for="$warranty-chk" class="clicker">Warranty
                            <span id="$warranty-open">+</span><span id="$warranty-close" style="display: none">-</span>
                        </label>
                        <div class="toggle-content">
                            <?php echo $warranty; ?>
                        </div>

                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <?php
endif; ?>