<!DOCTYPE html>
<html lang="en">

<head>
    <title>Accadmey</title>
    @include('template.css')
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .heading-box {
            text-align: center;
            margin-top: 20px;
        }

        .heading-box h4 {
            margin: 10px 0;
        }

        /* Custom styles for columns */
        .custom-col {
            height: 200px; /* Set desired height */
            background-color: #f0f0f0; /* Set desired background color */
            border-radius: 5px;
            margin-bottom: 20px; /* Space between columns */
            overflow: hidden; /* Hide overflow */
            position: relative; /* Position for absolute content */
        }

        .custom-col img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease; /* Smooth hover transition */
        }

        .custom-col:hover img {
            transform: scale(1.1); /* Scale up on hover */
        }

        .custom-col .content-overlay {
            background-color: rgba(0, 0, 0, 0.5); /* Overlay color */
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0; /* Initially hidden */
            transition: opacity 0.3s ease; /* Smooth transition */
        }

        .custom-col:hover .content-overlay {
            opacity: 1; /* Show overlay on hover */
        }

        .custom-col .content-overlay p {
            color: #fff; /* Text color */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            margin: 0;
            padding: 0 20px; /* Padding for text */
        }

        /* Style for the anchor tag */
        .custom-col a {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5); /* Overlay color for anchor tag */
            color: #fff; /* Text color for anchor tag */
            text-decoration: none; /* Remove underline */
            padding: 10px 0; /* Padding for anchor tag */
            transition: background-color 0.3s ease; /* Smooth transition */
        }

        .custom-col a:hover {
            background-color: rgba(0, 0, 0, 0.8); /* Darker overlay on hover */
        }

        @import url("https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700&display=swap");
body {
    background: #fafafa;
}
.accordion {
    display: flex;
    flex-direction: column;
    font-family: "Sora", sans-serif;
    max-width: 991px;
    min-width: 320px;
    margin: 50px auto;
    padding: 0 50px;
}
.accordion h1 {
    font-size: 32px;
    text-align: center;
}
.accordion-item {
    margin-top: 16px;
    border: 1px solid #fcfcfc;
    border-radius: 6px;
    background: #ffffff;
    box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px;
}
.accordion-item .accordion-item-title {
    position: relative;
    margin: 0;
    display: flex;
    width: 100%;
    font-size: 15px;
    cursor: pointer;
    justify-content: space-between;
    flex-direction: row-reverse;
    padding: 14px 20px;
    box-sizing: border-box;
    align-items: center;
}
.accordion-item .accordion-item-desc {
    display: none;
    font-size: 14px;
    line-height: 22px;
    font-weight: 300;
    color: #444;
    border-top: 1px dashed #ddd;
    padding: 10px 20px 20px;
    box-sizing: border-box;
}
.accordion-item input[type="checkbox"] {
    position: absolute;
    height: 0;
    width: 0;
    opacity: 0;
}
.accordion-item input[type="checkbox"]:checked ~ .accordion-item-desc {
    display: block;
}
.accordion-item
    input[type="checkbox"]:checked
    ~ .accordion-item-title
    .icon:after {
    content: "-";
    font-size: 20px;
}
.accordion-item input[type="checkbox"] ~ .accordion-item-title .icon:after {
    content: "+";
    font-size: 20px;
}
.accordion-item:first-child {
    margin-top: 0;
}
.accordion-item .icon {
    margin-left: 14px;
}

@media screen and (max-width: 767px) {
    .accordion {
        padding: 0 16px;
    }
    .accordion h1 {
        font-size: 22px;
    }
}

    </style>
</head>

<body>

    @include('template.topnav')

    <!-- ======= Header ======= -->
    @include('template.header')
    <!-- End Header -->

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <p class="heading-box" style="text-align: center;">
                <h6 style="text-align: center;">What do you need to Learn?</h6>
                </p>
                <hr>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="custom-col">
                    <img src="{{ asset() }}" alt="Image Description">
                    <a href="{{url('crypto_table')}}">menual Testing</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="custom-col">
                    <img src="{{ asset() }}" alt="Image Description">
                    <a href="link_to_page_2">APA Testing</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="custom-col">
                    <img src="{{ asset() }}" alt="Image Description">
                    <a href="link_to_page_3">Data Base Testing</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="custom-col">
                    <img src="{{ asset() }}" alt="Image Description">
                    <a href="{{url('crypto_table')}}">Automation Testing</a>
                </div>
            </div>

            <!-- Add more columns here with images and content -->
        </div>
        <br>
        <div class="row">
            <div class="accordion">
                <h1>Frequently Asked Questions</h1>
                <div class="accordion-item">
                    <input type="checkbox" id="accordion1">
                    <label for="accordion1" class="accordion-item-title"><span class="icon"></span>What is SEO, and why is it important for online businesses?</label>
                    <div class="accordion-item-desc">SEO, or Search Engine Optimization, is the practice of optimizing a website to improve its visibility on search engines like Google. It involves various techniques to enhance a site's ranking in search results. SEO is crucial for online businesses as it helps drive organic traffic, increases visibility, and ultimately leads to higher conversions.</div>
                </div>

                <div class="accordion-item">
                    <input type="checkbox" id="accordion2">
                    <label for="accordion2" class="accordion-item-title"><span class="icon"></span>How long does it take to see results from SEO efforts?</label>
                    <div class="accordion-item-desc">The timeline for seeing results from SEO can vary based on several factors, such as the competitiveness of keywords, the current state of the website, and the effectiveness of the SEO strategy. Generally, it may take several weeks to months before noticeable improvements occur. However, long-term commitment to SEO is essential for sustained success.</div>
                </div>

                <div class="accordion-item">
                    <input type="checkbox" id="accordion3">
                    <label for="accordion3" class="accordion-item-title"><span class="icon"></span>What are the key components of a successful SEO strategy?</label>
                    <div class="accordion-item-desc">A successful SEO strategy involves various components, including keyword research, on-page optimization, quality content creation, link building, technical SEO, and user experience optimization. These elements work together to improve a website's relevance and authority in the eyes of search engines.</div>
                </div>

                <div class="accordion-item">
                    <input type="checkbox" id="accordion4">
                    <label for="accordion4" class="accordion-item-title"><span class="icon"></span>How does mobile optimization impact SEO?</label>
                    <div class="accordion-item-desc">Mobile optimization is crucial for SEO because search engines prioritize mobile-friendly websites. With the increasing use of smartphones, search engines like Google consider mobile responsiveness as a ranking factor. Websites that provide a seamless experience on mobile devices are more likely to rank higher in search results.</div>
                </div>

                <div class="accordion-item">
                    <input type="checkbox" id="accordion5">
                    <label for="accordion5" class="accordion-item-title"><span class="icon"></span>What is the role of backlinks in SEO, and how can they be acquired?</label>
                    <div class="accordion-item-desc">Backlinks, or inbound links from other websites to yours, play a significant role in SEO. They are considered a vote of confidence and can improve a site's authority. Quality over quantity is crucial when acquiring backlinks. Strategies for obtaining backlinks include creating high-quality content, guest posting, reaching out to industry influencers, and participating in community activities. It's important to focus on natural and ethical link-building practices.</div>
                </div>

            </div>

        </div>
    </div>

    <!-- Yasir Hameed -->

    <!-- ======= Footer ======= -->
    @include('template.footer')

</body>

</html>
