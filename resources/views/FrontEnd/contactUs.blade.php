<body>
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

    <div class="container">
        <div>
            <h4 class="py-3 fw-bold">CONTACT US</h4>
        </div>
        <div>
            <h5 class="pt-4">Have a query? <b>contact 3D Cakes Edinburgh or 3D Cakes Milngavie</b></h5>
        </div>
        <div class="row">
            <div class="col-auto">
                <div class=""><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2734.7735877064038!2d-3.236763477758812!3d55.946001970168105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4887c7acd007cdc7%3A0x56a45b9667ea2c8!2s20%20Roseburn%20Terrace%2C%20Edinburgh%20EH12%206AW%2C%20UK!5e0!3m2!1sen!2sin!4v1699526812012!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div>
                    <h5 class="fw-bold pt-3">3D Cakes Edinburgh</h5>
                    <p>20 Roseburn Terrace<br>
                        Edinburgh<br>
                        Midlothian<br>
                        EH12 6AW </p>
                    <p class="mb-1"><b>Phone:</b> Phone service available Monday - Sunday 0131 337 9990. </p>
                    <p><b>Email:</b> enquiries@3d-cakes.co.uk </p>
                    <h5 class="">Opening Times</h5>
                    <h5 class="fw-bold">Cake orders & collections: </h5>
                    <p>Monday - Friday 9am - 5pm (please call 0131 337 9990 upon arrival if<br> collecting after 2pm)
                    </p>

                    <p>Saturday: 9am - 4pm</p>

                    <p>Sunday: 10am - 3pm (by appointment only)</p>
                    <h4>Delivery service 7 days a week.</h4>
                    <h6>Cake design consultations are available 7 days a week by appointment<br> only (In store, via
                        telephone or Zoom).</h6>
                    <p class="my-3 fw-bold">David Duncan Sugarcraft School Edinburgh</p>

                    <p class="mb-3 fw-bold"> www.davidduncansugarcraftschool.co.uk</p>
                    <h4>Opening Times:</h4>
                    <p class=" fw-bold">Access available 30 minutes prior to class start time. For a list of<br> class
                        dates/times please see website.</p>
                    <p class="mb-3 fw-bold">Email: hello@davidduncansugarcraftschool.co.uk</p>
                    <div class="pt-3"><img class="img-fluid" src="{{ url('images/edinburgh-store.jpg') }}" alt="store-image"></div>
                    <div class="pt-5 mt-5">
                        <h6 class="fw-bold">David Duncan Cake Supplies</h6>
                        <h6 class="fw-bold"> Ashington</h6>
                        <h6 class="fw-bold"> Northumberland</h6>
                        <h6 class="fw-bold"> NE63 8UQ</h6>
                        <h6 class="fw-bold"> Phone: Phone service currently not available</h6>
                        <h6 class="fw-bold"> Email: enquiries@3d-cakes.co.uk </h6>
                    </div>
                    <div class="py-3">
                        <h5 class="">Opening Times</h5>
                    </div>
                    <div class="h6 fw-bold">Monday-Tuesday: 10am - 5pm</div>
                </div>

            </div>
            <div class="col-auto">
                <div class=""><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2234.4346182578497!2d-4.318907922804889!3d55.941838677414616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x488845312d6c4817%3A0x5888d181df7731ed!2s38%20Station%20Rd%2C%20Milngavie%2C%20Glasgow%20G62%208AB%2C%20UK!5e0!3m2!1sen!2sin!4v1699526923572!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div>
                    <h5 class="fw-bold pt-3">3D Cakes Milngavie</h5>
                    <p>38 Station Road<br>
                        Milngavie<br>
                        G62 8AB
                    </p>
                    <p class="mb-1"><b>Phone: Phone service available Monday - Sunday 0141 378 0027
                        </b></p>
                    <p><b>Email: glasgow@3d-cakes.co.uk</b> </p>
                    <h5 class="">Opening Times</h5>
                    <h5 class="fw-bold">Cake orders & collections: </h5>
                    <p>Monday - Friday 9am - 5pm</p>

                    <p>Saturday: 9am - 4pm</p>

                    <p>Sunday: 10am - 3pm</p>
                    <h4>Delivery service 7 days a week.</h4>
                    <h6>Cake design consultations are available 7 days a week by appointment<br> only (In store, via
                        telephone or Zoom).</h6>
                    <p class="my-3 fw-bold">David Duncan Sugarcraft School Glasgow </p>

                    <p class="mb-3 fw-bold">www.davidduncansugarscraftschool.co.uk</p>
                    <h4>Opening Times:</h4>
                    <p class=" fw-bold">Access available 30 minutes prior to class start time. For a list of<br> class
                        dates/times please see website.</p>
                    <p class="mb-3 fw-bold">Email: hello@davidduncansugarcraftschool.co.uk</p>
                    <div class="pt-3"><img class="img-fluid" src="{{ url('images/edinburgh-store.jpg') }}" alt="store-image" style="margin-top: 8%;"></div>
                    <div class="pt-5 mt-5">
                        <h6 class="fw-bold">3D Cakes Office</h6>
                        <h6 class="fw-bold">(Marketing/Advertising, Job applicants, Customer Relations)</h6>
                        <h6 class="fw-bold"> Email: enquiries@3d-cakes.co.uk and mark for attention of office</h6>
                    </div>
                    <div class="py-3">
                        <h5 class="">Opening Times</h5>
                    </div>
                    <div class="h6 fw-bold">Monday-Tuesday: 10am - 5pm</div>
                </div>
            </div>
        </div>
    </div>
    @include('FrontEnd.uiLayouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/global.js') }}"></script>
</body>

</html>