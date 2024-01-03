@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@include('FrontEnd.uiLayouts.header')

<style>
    .para {
        text-align: justify;

        font-family: "Century Gothic";
    }

    .light {
        color: #777;
    }

    .end-para {
        line-height: 26px;
        font-family: "Century Gothic";
    }

    .aboutus {
        width: 130vh;
    }

    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        /* 16:9 aspect ratio (height: width) */
        height: 0;
        overflow: hidden;
        box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
    }

    .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>

<body>

    <div class="container">
        <h1 class="ms-3">About Us</h1>
        <h5 class="ms-3 my-4">World of 3D Cakes: <b>Wedding Cakes, Occasion Cakes</b></h5>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-5">
                <h5 class="para mb-2 px-3">
                    In 2007, at the age of 22, David Duncan gave up a secure job in the IT industry and took the first
                    steps to make an old dream come true. David has always had a strong creative streak; from helping
                    his grandmother bake and decorate the most beautiful cakes in her kitchen when he was a little boy,
                    to sculpting in clay in his school’s art department – the seeds were sown that would eventually grow
                    into the highly successful and award-winning 3D Cakes.
                </h5>

                <p class="light mb-2 px-3">
                    From a humble start in 2005, making spectacular wedding cakes for friends and friends of friends in
                    his kitchen, things accelerated quickly to an ever-expanding business. David is now one of Europe’s
                    most renowned cake designers, most famous for his fashion-inspired cakes. David and his team have
                    been honoured to design and create cakes for HM The Queen, HRH The Prince of Wales, J.K Rowling,
                    Prince William, Bon Jovi, Crowded House, and high profile brands including Dior and Chanel.
                </p>

                <p class="light mb-2 px-3">
                    3D Cakes Edinburgh won the VOWS (Voted Outstanding Wedding Supplier) ‘Cake Designer’ Award in 2008 &
                    2009.
                </p>

                <p class="light mb-2 px-3">
                    In 2010 a selection of 3D's wedding designs featured in the summer issue of VOGUE magazine in the
                    UK. Later that year, David changed his focus to a previously unfounded niche in the UK market –
                    creating realistic sculpture cakes.
                </p>

                <p class="light mb-2 px-3">
                    In 2011, the company's fashion inspired designs were showcased at Copenhagen Fashion Week.
                </p>

                <p class="light mb-2 px-3">
                    In 2012, David expanded into the field of cake master classes, with 3D Cakes having tutored in
                    excess of 32,000 students to date at the David Duncan Sugarcraft School. A highlight of 2012 was
                    creating a giant cake (a map of Scotland) for Holyrood Palace depicting HM The Queen’s Diamond
                    Jubilee Tour Route.
                </p>

                <p class="light mb-2 px-3">
                    In April 2013, the team created a cake for the Royal Yacht Brittania’s 60th Anniversary
                    celebrations, with the cake being displayed on board the Yacht, in the magnificent State Dining
                    Room. In September of that year, David was honoured to design a cake for Prince William, whom gifted
                    the cake to Yao Ming for his birthday and rhino conservation work.
                </p>

                <p class="light mb-2 px-3">
                    In February 2014, 3D Cakes Edinburgh won both ‘South East Wedding Cake Designer of the Year’ and the
                    overall ‘Scottish Wedding Cake Designer of The Year’ at the Scottish Wedding Awards. 2014 was to be
                    a big year for the team, with their expanding online tutorial service and the brand new ‘David
                    Duncan Cake Supplies’ online store launched in summer 2014 - click here to visit the site, this also
                    coincided with the launch of the 3D Cakes 24 Hour Deals website.
                </p>

                <p class="light mb-2 px-3">
                    In March 2015, 3D Cakes again won both the "South East Wedding Cake Designer of the Year" and the
                    overall "Scottish Wedding Cake Designer of the Year" at the Scottish Wedding Awards 2015 and were
                    thrilled to again win ‘South East Wedding Cake Designer of The Year’ at the Scottish Wedding awards
                    in February 2016, were again finalists in the 2017 awards, as well as Runner-Up in The Confetti
                    Awards 2017.
                </p>

                <h5 class="para mb-2 px-3">
                    In December 2017, the 3D Cakes Edinburgh team were honoured to create a replica of HMS Queen
                    Elizabeth Aircraft Carrier which David presented to HM The Queen at the commissioning ceremony for
                    the ship in Portsmouth.
                </h5>

                <h5 class="para mb-2 px-3">
                    2018 saw the David Duncan Masterclass Tour begin in Copenhagen, with future tours planned for Paris
                    and Milan.
                </h5>

                <h5 class="para mb-2 px-3">
                    In early 2019, 3D Cakes Edinburgh were finalists in the Confetti Awards and again won both the
                    "South East Wedding Cake Designer of the Year" and the overall "Scottish Wedding Cake Designer of
                    the Year" at the Scottish Wedding Awards.
                </h5>
            </div>
            <div class="col-12 col-lg-7 p-0 mt-xl-0 mt-md-0 mt-4 ">
                <div class="video-container">
                    <iframe class="mb-3" title="vimeo-player" src="https://player.vimeo.com/video/81207833?h=d19d6c3cd8" width="660" height="371" frameborder="0" allowfullscreen></iframe>
                </div>


                <div class=""><img class="aboutus img-fluid" src="aboutus2.jpg" alt=""></div>

                <div class="last-para">
                    <p class="end-para">
                        In December 2019, the 3D Cakes Edinburgh team were once again honoured to create a cake for
                        royalty, this time a replica of HMS Prince of Wales Aircraft Carrier for the commissioning
                        ceremony for the ship in Portsmouth. December also saw David being interviewed on BBC Breakfast
                        and creating a Christmas cake tutorial for the channel.
                    </p>

                    <p class="end-para">
                        2020/2021 are expected to be another great couple of years for both companies, who are again
                        finalists in The Confetti Awards and The Scottish Wedding Awards, with many exciting ventures
                        planned.
                    </p>
                </div>
            </div>
        </div>
    </div>

    @include('FrontEnd.uiLayouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/global.js') }}"></script>
</body>

</html>